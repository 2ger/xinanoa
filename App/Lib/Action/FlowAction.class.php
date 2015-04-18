<?php
/*---------------------------------------------------------------------------

 -------------------------------------------------------------------------*/

class FlowAction extends CommonAction {
	protected $config = array('app_type' => 'flow', 'action_auth' => array('folder' => 'read', 'mark' => 'admin', 'report' => 'admin'));

	function _search_filter(&$map) {
		$map['is_del'] = array('eq', '0');
		if (!empty($_REQUEST['keyword'])) {
			$keyword = $_POST['keyword'];
			$map['name'] = array('like', "%" . $keyword . "%");
		}
	}

	function index() {

		$user_id = get_user_id();
		$User = M("User");
		  $this->positionid = $User->where('id='.$user_id ) -> getField('position_id');
		  
		$model = D("Flow");
		$model = D('FlowTypeView');
		$where['is_del'] = 0;

		$role_list = D("Role") -> get_role_list($user_id);
		$role_list = rotate($role_list);
		$role_list = $role_list['role_id'];
		
	  
	  // 已核准的出差申请单
	  $this->chucai =  M("Flow")->where("(type=36 and user_id='$user_id') or (type=68 and user_id='$user_id')" ) -> select();//68
		

		$duty_list = D("Role") -> get_duty_list($role_list);
		$duty_list = rotate($duty_list);
		$duty_list = $duty_list['duty_id'];

		$where['request_duty'] = array('in', $duty_list);

		$list = $model -> where($where) -> order('sort') -> select();
		$this -> assign("list", $list);
		$this -> _assign_tag_list();
		$this -> display();
	}

	function _flow_auth_filter($folder, &$map) {
		$emp_no = get_emp_no();
		$user_id = get_user_id();
		
		// 过滤贷款表 1
		$FlowType = M("FlowType");
		$type_list = $FlowType -> where('tag = 82') ->  select();
		$type_list = rotate($type_list);
		$map['type'] = array('not in', $type_list['id']);	 // 过滤贷款表 2

		
		switch ($folder) {
			case 'confirm' :
				$this -> assign("folder_name", '待办');
				$FlowLog = M("FlowLog");
				$where['emp_no'] = $emp_no;
				$where['_string'] = "result is null";
				$log_list = $FlowLog -> where($where) -> field('flow_id') -> select();

				$log_list = rotate($log_list);
				if (!empty($log_list)) {
					$map['id'] = array('in', $log_list['flow_id']);
				} else {
					$map['_string'] = '1=2';
				}
				break;

			case 'darft' :
				$this -> assign("folder_name", '草稿');
				$map['user_id'] = $user_id;
				$map['step'] = 10;
				break;

			case 'submit' :
				$this -> assign("folder_name", '追踪流程');//提交
				// 
			
				$map['user_id'] = array('eq', $user_id);
				$map['step'] = array( array('gt', 10),array('eq', 0), 'or');

				break;
                
			case 'repeat' :
				$this -> assign("folder_name", '取回工作重办');
				$this -> assign("repeat", 1);
				$map['user_id'] = array('eq', $user_id);
				$map['step'] = array( array('eq', 40),array('eq', 0), 'or');

				break;

			case 'finish' :
				$this -> assign("folder_name", '办理');
				$FlowLog = M("FlowLog");
				$where['emp_no'] = $emp_no;
				$where['_string'] = "result is not null";
				$log_list = $FlowLog -> where($where) -> field('flow_id') -> select();
				$log_list = rotate($log_list);
				if (!empty($log_list)) {
					$map['id'] = array('in', $log_list['flow_id']);
				} else {
					$map['_string'] = '1=2';
				}
				break;

			case 'receive' :
				$this -> assign("folder_name", '收到');
				$FlowLog = M("FlowLog");
				$where['emp_no'] = $emp_no;
				$where['step'] = 100;
				$log_list = $FlowLog -> where($where) -> field('flow_id') -> select();
				$log_list = rotate($log_list);
				if (!empty($log_list)) {
					$map['id'] = array('in', $log_list['flow_id']);
				} else {
					$map['_string'] = '1=2';
				}
				break;
				
			case 'repeal' : // 撤销
				$this -> assign("folder_name", '撤销流程');
				$this -> assign("repeal", 1);
				$map['user_id'] = array('eq', $user_id);
				$map['step'] = array( array('neq', 40),array('neq', 0),array('neq', 10), 'and');
				break;

				
			case 'report' :
				$this -> assign("folder_name", '所有流程');
				$role_list = D("Role") -> get_role_list($user_id);
				$role_list = rotate($role_list);
				$role_list = $role_list['role_id'];

				$duty_list = D("Role") -> get_duty_list($role_list);
				$duty_list = rotate($duty_list);
				$duty_list = $duty_list['duty_id'];

				if (!empty($duty_list)) {
					$map['report_duty'] = array('in', $duty_list);
					$map['step'] = array('gt', 10);
				} else {
					$this -> error("没有权限");
				}
				break;
		}
	}

	function folder() {

		$widget['date'] = true;
		$this -> assign("widget", $widget);

		$emp_no = get_emp_no();
		$user_id = get_user_id();

		$flow_type_where['is_del'] = array('eq', 0);

		
		
		$flow_type_list = M("FlowType") -> where($flow_type_where) -> getField("id,name");
		$this -> assign("flow_type_list", $flow_type_list);

		$map = $this -> _search();
		if (method_exists($this, '_search_filter')) {
			$this -> _search_filter($map);
		}

		$folder = $_REQUEST['fid'];

		$this -> assign("folder", $folder);

		if (empty($folder)) {
			$this -> error("系统错误");
		}

		$this -> _flow_auth_filter($folder, $map);
		$model = D("Flow");

		if ($_REQUEST['mode'] == 'export') {
			$this -> _folder_export($model, $map);
		} else {
			$this -> _list($model, $map);
		}
		$this -> display();
	}

	private function _folder_export($model, $map) {
		$list = $model -> where($map) -> select();

		//导入thinkphp第三方类库
		Vendor('Excel.PHPExcel');

		$inputFileName = "Public/templete/contact.xlsx";
		$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
		$objPHPExcel = new PHPExcel();

		$objPHPExcel -> getProperties() -> setCreator("OA") -> setLastModifiedBy("OA") -> setTitle("Office 2007 XLSX Test Document") -> setSubject("Office 2007 XLSX Test Document") -> setDescription("Test document for Office 2007 XLSX, generated using PHP classes.") -> setKeywords("office 2007 openxml php") -> setCategory("Test result file");
		// Add some data
		$i = 1;
		//dump($list);

		//编号，类型，标题，登录时间，部门，登录人，状态，审批，协商，抄送，审批情况，自定义字段
		$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue("A$i", "编号") -> setCellValue("B$i", "类型") -> setCellValue("C$i", "标题") -> setCellValue("D$i", "登录时间") -> setCellValue("E$i", "部门") -> setCellValue("F$i", "登录人") -> setCellValue("G$i", "状态") -> setCellValue("H$i", "审批") -> setCellValue("I$i", "协商") -> setCellValue("J$i", "抄送") -> setCellValue("J$i", "审批情况");
		foreach ($list as $val) {
			$i++;
			//dump($val);
			$id = $val['id'];
			$doc_no = $val["doc_no"];
			//编号
			$name = $val["name"];
			//标题
			$confirm_name = strip_tags($val["confirm_name"]);
			//审批
			$consult_name = strip_tags($val["consult_name"]);
			//协商
			$refer_name = strip_tags($val["refer_name"]);
			//协商
			$type_name = $val["type_name"];
			//流程类型
			$user_name = $val["user_name"];
			//登记人
			$dept_name = $val["dept_name"];
			//不美分
			$create_time = $val["create_time"];
			$create_time = toDate($val["create_time"], 'Y-m-d H:i:s');
			//创建时间
			$step = show_step_type($val["step"]);
			//

			//编号，类型，标题，登录时间，部门，登录人，状态，审批，协商，抄送，审批情况，自定义字段
			$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue("A$i", $doc_no) -> setCellValue("B$i", $type_name) -> setCellValue("C$i", $name) -> setCellValue("D$i", $create_time) -> setCellValue("E$i", $dept_name) -> setCellValue("F$i", $user_name) -> setCellValue("G$i", $step) -> setCellValue("H$i", $confirm_name) -> setCellValue("I$i", $consult_name);

			$model_flow_field = D("FlowField");
			$field_list = $model_flow_field -> get_data_list($id);
			//	dump($field_list);
			$k = 0;
			if (!empty($field_list)) {
				foreach ($field_list as $field) {
					$k++;
					$field_data = $field['name'] . ":" . $field['val'];
					$location = get_cell_location("J", $i, $k);
					$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue($location, $field_data);
				}
			}
		}
		// Rename worksheet
		$objPHPExcel -> getActiveSheet() -> setTitle('流程统计');

		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$objPHPExcel -> setActiveSheetIndex(0);
		$file_name = "流程统计.xlsx";
		// Redirect output to a client’s web browser (Excel2007)
		header("Content-Type: application/force-download");
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header("Content-Disposition:attachment;filename =" . str_ireplace('+', '%20', URLEncode($file_name)));
		header('Cache-Control: max-age=0');

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		//readfile($filename);
		$objWriter -> save('php://output');
		exit ;
	}

	function customer() { //客户管理

		$widget['date'] = true;
		$this -> assign("widget", $widget);

		$emp_no = get_emp_no();
		$user_id = get_user_id();

		$type = $_REQUEST['fid'];
		//flowid  58：企业 65：个人
		$this -> assign("folder_name", '所有客户');
		$this ->list = M("FlowFieldData") -> where('field_id = 409 or field_id = 408') -> select();
		switch ($type) {
			case '1' ://信用 409 408
				$this -> assign("folder_name", '信用正常');
				//通过字段＋值 得到 flow_id-s
				$list = M("FlowFieldData") -> where("(field_id = 409 and val ='1') or (field_id = 408 and val ='1')") -> select();//(field_id = 409 and val ＝'1') or (field_id = 408 and val ＝'1')
				$this ->list =$list;
				
				// if (empty($list)) {
	// 				$this ->notice ='无数据！';
	// 			}else{
	// 				$this ->notice ='有！'.$list[1]['field_id'];
	// 			}
				break;

			case '2' :
				$this -> assign("folder_name", '信用次级');
				$list = M("FlowFieldData") -> where("(field_id = 409 and val ='2') or (field_id = 408 and val ='2')") -> select();
				$this ->list =$list;
				break;
			case '3' :
				$this -> assign("folder_name", '信用次级');
				$list = M("FlowFieldData") -> where("(field_id = 409 and val ='3') or (field_id = 408 and val ='3')") -> select();
				$this ->list =$list;
				break;
			case '4' :
				$this -> assign("folder_name", '信用瑕疵');
				$list = M("FlowFieldData") -> where("(field_id = 409 and val ='4') or (field_id = 408 and val ='4')") -> select();
				$this ->list =$list;
				break;
		// －－－－－－－－－－－－－－－－－－    366   金额过滤	388	－－－－－－－－－－－－－－－－－－   
			case '5' :
				$this -> assign("folder_name", '1万〜10万');
				$list = M("FlowFieldData") -> where("(field_id = 366 and val >=10000 and val <=100000) or (field_id = 388  and val >=10000 and val <=100000)") -> select();
				$this ->list =$list;
				break;
			case '6' :
				$this -> assign("folder_name", '10万〜100万');
				$list = M("FlowFieldData") -> where("(field_id = 366 and val >=100000 and val <=1000000) or (field_id = 388  and val >=100000 and val <=1000000)") -> select();
				$this ->list =$list;
				break;
			case '7' :
				$this -> assign("folder_name", '100万〜1000万');
				$list = M("FlowFieldData") -> where("(field_id = 366 and val >=1000000 and val <=10000000) or (field_id = 388  and val >=1000000 and val <=10000000)") -> select();
				$this ->list =$list;
				break;
			case '8' :
				$this -> assign("folder_name", '1000万以上');
				$list = M("FlowFieldData") -> where("(field_id = 366 and val >=10000000) or (field_id = 388  and val >=10000000)") -> select();
				$this ->list =$list;
				break;
				
				// －－－－－－－－－－－－－－－－－－    359   行业	382	－－－－－－－－－－－－－－－－－－   
				//  1金融和保险  2房地产  3建筑建材  4汽车  5饮食
			case '9' :
				$this -> assign("folder_name", '房地产');
				$list = M("FlowFieldData") -> where("(field_id = 359 and val like '%2') or (field_id = 382 and val like '%2')") -> select();
				$this ->list =$list;
				break;
			case '10' :
					$this -> assign("folder_name", '建筑建材');
				$list = M("FlowFieldData") -> where("(field_id = 359 and val like '%3') or (field_id = 382 and val like '%3')") -> select();
					$this ->list =$list;
					break;
			// －－－－－－－－－－－－－－－－－－    413   抵压物	397	－－－－－－－－－－－－－－－－－－   
			// 汽车  土地  房产  其它
			case '11' :
					$this -> assign("folder_name", '土地');
					$list = M("FlowFieldData") -> where("(field_id = 413 and val ='2') or (field_id = 397 and val ='2')") -> select();
					$this ->list =$list;
					break;
			case '12' :
					$this -> assign("folder_name", '汽车');
					$list = M("FlowFieldData") -> where("(field_id = 413 and val ='1') or (field_id = 397 and val ='1')") -> select();
					$this ->list =$list;
					break;
			case '13' :
					$this -> assign("folder_name", '房产');
					$list = M("FlowFieldData") -> where("(field_id = 413 and val ='3') or (field_id = 397 and val ='3')") -> select();
					$this ->list =$list;
					break;
			case '14' :
					$this -> assign("folder_name", '其它');
					$list = M("FlowFieldData") -> where("(field_id = 413 and val ='4') or (field_id = 397 and val ='4')") -> select();
					$this ->list =$list;
					break;

		}
//		
				
				
				
				
				
//
//
// 		$flow_type_list = M("FlowType") -> where($flow_type_where) -> getField("id,name");
		
		$this -> display();
	}

	function add() {
		

		$this->from = $_REQUEST['from'];
		
		$widget['date'] = true;
		$widget['uploader'] = true;
		$widget['editor'] = true;
		$this -> assign("widget", $widget);

		$type_id = $_REQUEST['type'];
		$model = M("FlowType");
		$flow_type = $model -> find($type_id);
		$this -> assign("flow_type", $flow_type);

		$model_flow_field = D("FlowField");
		$field_list = $model_flow_field -> get_field_list($type_id);
		$this -> assign("field_list", $field_list);
		
		// $this -> showsend = 1; // 邮箱按钮
		
		$user_id = get_user_id();
	//	position_id
		$User = M("user"); // 实例化User对象
		//$User = $User->where('id='.$user_id )->find(); //获得用户
		$this -> UserInfo = $User->where('id='.$user_id )->find(); //获得用户
	
		$Position = M('Position'); //   职位
		$this -> PositionName = $Position->where('id='.$this -> UserInfo['position_id'] )->find();
        
		$Rank = M('Rank'); //   公司
		$this -> CompanyName = $Rank->where('id='.$this -> UserInfo['rank_id'] )->find();
        
		$this->NowTime  = mktime();
		
		$this -> display();
	}
	function add1() {// 申请表单  站外引用
		
		$widget['date'] = true;
		$widget['uploader'] = true;
		$widget['editor'] = true;
		$this -> assign("widget", $widget);

		$type_id = $_REQUEST['type'];
		$model = M("FlowType");
		$flow_type = $model -> find($type_id);
		$this -> assign("flow_type", $flow_type);

		$model_flow_field = D("FlowField");
		$field_list = $model_flow_field -> get_field_list($type_id);
		$this -> assign("field_list", $field_list);
		
		$this -> showsend = 1; // 邮箱按钮
		
		$user_id = get_user_id();
	//	position_id
		$User = M("user"); // 实例化User对象
		//$User = $User->where('id='.$user_id )->find(); //获得用户
		$this -> UserInfo = $User->where('id='.$user_id )->find(); //获得用户
	
		$Position = M('Position'); //   职位
		$this -> PositionName = $Position->where('id='.$this -> UserInfo['position_id'] )->find();
        
		$Rank = M('Rank'); //   公司
		$this -> CompanyName = $Rank->where('id='.$this -> UserInfo['rank_id'] )->find();
        
		$this->NowTime  = mktime();
		
		$this -> display();
	}

	function add2() { // 审批流程中，如果没有表，则在这里新建。 新建后再跳到  editdai
		
		$widget['date'] = true;
		$widget['uploader'] = true;
		$widget['editor'] = true;
		$this -> assign("widget", $widget);

		$dai = $_REQUEST['dai'];
		$this -> assign("dai", $dai);
		$step = $_REQUEST['step'];
		$this -> assign("step", $step);
		
		$daiid = $_REQUEST['dai'];
		$type = $_REQUEST['type'];
		$this -> assign("nextstep", next_step($step));
		$nextstep = next_step($step);
		$nextis = is_step_done($daiid,$nextstep);
		$this -> assign("nextis", $nextis);
		$this -> assign("daiid", $daiid);
		

		$type_id = $_REQUEST['type'];
		$model = M("FlowType");
		$flow_type = $model -> find($type_id);
		$this -> assign("flow_type", $flow_type);

		$model_flow_field = D("FlowField");
		$field_list = $model_flow_field -> get_field_list($type_id);
		$this -> assign("field_list", $field_list);
		
		
		$user_id = get_user_id();
	
		$User = M("user"); // 实例化User对象
		//$User = $User->where('id='.$user_id )->find(); //获得用户
		$this -> UserInfo = $User->where('id='.$user_id )->find(); //获得用户
	
		$Position = M('Position'); //   职位
		$this -> PositionName = $Position->where('id='.$this -> UserInfo['position_id'] )->find();
        
		$Rank = M('Rank'); //   公司
		$this -> CompanyName = $Rank->where('id='.$this -> UserInfo['rank_id'] )->find();
        
		$this->NowTime  = mktime();
		
    	  // 权限操作  信贷员判断
    	  $uid = get_user_id();
    	  $deptid = get_dept_id();
    	  $positionid = $User->where('id='.$user_id ) -> getField('position_id');
        $DaiInfo = M("FlowDai") ->where('id='.$daiid )->find(); //获得当前 贷款信息
	  
    	  $dai_uid = $DaiInfo['user_id'];
    	  if ($uid == $dai_uid) {
    	  	 $this->isxin = 1;
    	  }
		  
		  if ($uid ==  1) {
			   $this->isxin = 1;
			   $this->isfengj = 1;
			    $this->isxinj = 1;
				 $this->iszong = 1;
				  $this->iscai = 1;
				   $this->iszheng = 1;
		  }
		  
		$this -> display();
	}
	
	function adddyw() { // 审批流程中，如果没有表，则在这里新建。 新建后再跳到  editdai
		
		$widget['date'] = true;
		$widget['uploader'] = true;
		$widget['editor'] = true;
		$this -> assign("widget", $widget);

		$dai = $_REQUEST['dai'];
		$this -> assign("dai", $dai);
		$step = $_REQUEST['step'];
		$this -> assign("step", $step);

		$type_id = $_REQUEST['type'];
		$model = M("FlowType");
		$flow_type = $model -> find($type_id);
		$this -> assign("flow_type", $flow_type);

		$model_flow_field = D("FlowField");
		$field_list = $model_flow_field -> get_field_list($type_id);
		$this -> assign("field_list", $field_list);
		
		
		$user_id = get_user_id();
	
		$User = M("user"); // 实例化User对象
		//$User = $User->where('id='.$user_id )->find(); //获得用户
		$this -> UserInfo = $User->where('id='.$user_id )->find(); //获得用户
	
		$Position = M('Position'); //   职位
		$this -> PositionName = $Position->where('id='.$this -> UserInfo['position_id'] )->find();
        
		$Rank = M('Rank'); //   公司
		$this -> CompanyName = $Rank->where('id='.$this -> UserInfo['rank_id'] )->find();
        
		$this->NowTime  = mktime();
		
		$this -> display();
	}
	
    
	function adddai() {
		
		$widget['date'] = true;
		$widget['uploader'] = true;
		$widget['editor'] = true;
		$this -> assign("widget", $widget);
        
$flow_id = $_REQUEST['flowid']; //取得id
$create_time = M("Flow") -> where("id=$flow_id") -> getField('create_time');//('create_date');
$this -> assign("flowid", $flow_id);
$this -> assign("create_date", $create_time);

$issou = M("flow_dai") ->where("com='$flow_id'" ) -> find();
if ($issou['com'] !='') {
	$this -> success('客户表单已受理!','index.php?m=flow&a=dai&id='.$issou['id']); 
}else{

//1 取得 flowdai 需要的数据  create tell for  money

$flow = D("flow_field_data");
$customer = $flow ->where('field_id = 166 AND flow_id='.$flow_id ) -> getField('val');
$money = $flow ->where('field_id = 173 AND flow_id='.$flow_id ) -> getField('val');
$tel = $flow ->where('field_id = 168 AND flow_id='.$flow_id ) -> getField('val');
$what_for = $flow ->where('field_id = 174 AND flow_id='.$flow_id ) -> getField('val');
$type = $flow ->where('field_id = 175 AND flow_id='.$flow_id ) -> getField('val');


// 2 新建 flow_dai 表 
        $Form    =    M("flow_dai");// 1  创建一个新贷款记录  $daiId =   时间
        $Form  -> com = $flow_id;
        $Form  -> user_id = get_user_id(); //信贷员id
        $Form  -> user_name = get_user_name(); //信贷员
        $Form  -> customer = $customer;
        $Form  -> tel = $tel;
        $Form  -> money = $money;
        $Form  -> what_for = $what_for;
        $Form  -> type = $type;
        $Form  -> aply_time = $create_time;//申请时间
        $Form  -> create_time = mktime();//受理时间
        $Form  -> nowstep = 'step21';//受理时间
        $Form  -> stepman = get_user_name();//受理时间
        $Form  -> update_time = mktime();//受理时间
        $Form  -> step21 = 2;
        $daiId  = $Form->add();
        
  $this -> assign("daiid", $daiId);
  
  //3 更新flow 中的 daiid   +  更新状态为已受理(step 改为 40) ok
  D("Flow") -> where("id=$flow_id") -> setField('dai', $daiId);
  D("Flow") -> where("id=$flow_id") -> setField('step', 40);

  //更新flowlog
  $Log = M("FlowLog"); 
  $data['dai_id'] = $daiId;
  $data['result'] = 1;
  $data['step'] = '受理';
  $data['dostep'] = '受理';
  $data['emp_no'] = get_emp_no();
  $data['user_id'] = get_user_id();
  $data['user_name'] = get_user_name();
  $data['create_time'] = mktime();
  $data['comment'] = "受理客户申请";
  $Log->add($data);
  
 
 
 //5 跳转到 add.html
		$this -> success('受理成功!','index.php?m=flow&a=dai&id='.$daiId);       
 
		$user_id = get_user_id();
		$User = M("user"); // 实例化User对象
		$this -> UserInfo = $User->where('id='.$user_id )->find(); //获得用户
	
		$Position = M('Position'); //   职位
		$this -> PositionName = $Position->where('id='.$this -> UserInfo['position_id'] )->find();
        
		$Rank = M('Rank'); //   公司
		$this -> CompanyName = $Rank->where('id='.$this -> UserInfo['rank_id'] )->find();
        
		$this->NowTime  = mktime();
		
		}
		
	    // $this -> display();
	}
	
	function addkh() { //9-2 归档客户
		//通过 daiid和 type 获得 flowid 》 通过flowid 和 field ID 获得 数值  》 (根据type判断是个人还是企业)添加到客户表 》 跳转
		// 60 表决  58企业档案  42个人档案 45申请表
	$dai = $_REQUEST['daiid']; //取得id	
	$type = $_REQUEST['type']; //取得id
	$flowid = M("Flow") -> where("dai=$dai AND type =45") -> getField('id');
		


//1 通过flowid 和 field ID 获得 数值
$flow = D("flow_field_data");
$customer = $flow ->where('field_id = 166 AND flow_id='.$flowid )  -> getField('val');
$tel = $flow ->where('field_id = 168 AND flow_id='.$flowid )  -> getField('val');
$money = $flow ->where('field_id = 173 AND flow_id='.$flowid )  -> getField('val');
$biz_license = $flow ->where('field_id = 180 AND flow_id='.$flowid )  -> getField('val');//身份证号、营业执照
$what_for = $flow ->where('field_id = 174 AND flow_id='.$flowid ) -> getField('val');


// // 2 新建  表
$Form    =    M("flow");
 $Form  -> dai = $dai;
  $Form  -> type = 58;
  $Form  -> name = '企业客户';
  $Form  -> content = '企业客户';
  $Form  -> content = '企业客户';
  $Form  -> confirm = 'dept_1|';
  $Form  -> confirm = 'dept_1|';
  $Form  -> user_id = get_user_id(); //信贷员id
  $Form  -> user_name = get_user_name(); //信贷员
  $Form  -> create_time = mktime();//受理时间
  $Form  -> step = 40;//受理时间
  $newflowid  = $Form->add();
  $this ->$newflowid =  $newflowid;

  // 填充值
 $Formdata    =    M("flow_field_data");
//358 企业名称
 $Formdata -> flow_id = $newflowid;
 $Formdata -> field_id = 358;
 $Formdata -> val = $customer;
 $Formdata -> add();
 //374 用途
 $Formdata -> flow_id = $newflowid;
 $Formdata -> field_id = 374;
 $Formdata -> val = $what_for;
 $Formdata -> add();
 //366 用途
 $Formdata -> flow_id = $newflowid;
 $Formdata -> field_id = 366;
 $Formdata -> val = $money;
 $Formdata -> add();
 //行业
 $Formdata -> flow_id = $newflowid;
 $Formdata -> field_id = 359;
 $Formdata -> val = 1;
 $Formdata -> add();

  
  // //3 更新flow 中的 daiid   +  更新状态为已受理(step 改为 40) ok
 //  D("Flow") -> where("id=$flow_id") -> setField('dai', $daiId);
 //  D("Flow") -> where("id=$flow_id") -> setField('step', 40);
 //
 //
 //
 // //5 跳转到 add.html
 // 		$this -> success('受理成功!','index.php?m=flow&a=dai&id='.$daiId);
 //
		$user_id = get_user_id();
		$User = M("user"); // 实例化User对象
		$this -> UserInfo = $User->where('id='.$user_id )->find(); //获得用户
	
		$Position = M('Position'); //   职位
		$this -> PositionName = $Position->where('id='.$this -> UserInfo['position_id'] )->find();
        
		$Rank = M('Rank'); //   公司
		$this -> CompanyName = $Rank->where('id='.$this -> UserInfo['rank_id'] )->find();
        
		$this->NowTime  = mktime();
		
		
	     $this -> display();
	}
	
	function folderdai() {

	// 	$widget['date'] = true;
// 		$this -> assign("widget", $widget);
// 
// 		$emp_no = get_emp_no();
// 		$user_id = get_user_id();

		$flow_where['is_del'] = array('eq', 0);
		$flow_where['type'] = array('eq', 42);

		$flow_list = M("Flow") -> where($flow_where) -> select();
		$this -> assign("list", $flow_list);

		$this -> display();
	}
	

	function khdai() { //客房填表

        $widget['date'] = true;
        $this -> assign("widget", $widget);

        $emp_no = get_emp_no();
        $user_id = get_user_id();


		$flow_where['is_del'] = array('eq', 0);
		$flow_where['type'] = array('eq', 45);
		$flow_where['step'] = array('neq', 40);

		$flow_list = M("Flow") -> where($flow_where) -> select();
		$this -> assign("list", $flow_list);

		$this -> display();
	}

	function mydai() { //我受理的

        $widget['date'] = true;
        $this -> assign("widget", $widget);

        $emp_no = get_emp_no();
        $user_id = get_user_id();


		$flow_where['user_id'] = array('eq',  $user_id);

		$flow_list = M("FlowDai") -> where($flow_where) -> select();
		$this -> assign("list", $flow_list);

		$this -> display();
	}
	function daitodo() { // 贷款， 待办事项

        $widget['date'] = true;
        $this -> assign("widget", $widget);

        $emp_no = get_emp_no();
        $user_id = get_user_id();
        $user_name = get_user_name();
    	 
    	  $deptid = get_dept_id();
    	  $positionid =  M("user")->where('id='.$user_id ) -> getField('position_id');
		// $flow_where['stepman'] = array('eq',  $user_name);

		// $flow_list = M("FlowDai") -> where($flow_where) -> select();
		
		
    	  //信贷经理
    	  if ($deptid == 7 && $positionid == 5) {
  		$this ->list = M("FlowDai") -> where('stepman = "信贷经理"') ->  select();
  		$this ->listcount = M("FlowDai") -> where('stepman = "信贷经理"') ->  count();
    	  }
    	  //风控经理
    	  else if ($deptid == 6 && $positionid == 5) {
  		$this ->list = M("FlowDai") -> where('stepman = "风控经理"') ->  select();
    	  }
    	  //执行董事
    	   else if ($deptid ==  2) {
  		$this ->list = M("FlowDai") -> where('stepman = "执行董事"') ->  select();
    	  }
    	  //总经理
    	  else  if ($deptid ==  5) {
  		$this ->list = M("FlowDai") -> where('stepman = "总经理"') ->  select();
    	  }
    	  //财务部
    	  else  if ($deptid ==  8) {
  		$this ->list = M("FlowDai") -> where('stepman = "财务部"') ->  select();
    	  }
    	  // 行政部
    	   else if ($deptid ==  24) {
  		$this ->list = M("FlowDai") -> where('stepman = "行政部"') ->  select();
    	  }
    	  // 合同组
    	  else  if ($deptid ==  30) {
  		$this ->list = M("FlowDai") -> where('stepman = "合同组"') ->  select();
    	  }
    	  // 管理员  －－－－－－ 所有为1
    	   else  {
    $this ->list = M("FlowDai") -> where('stepman = "'.$user_name.'"') ->  select();
    	  }
		  
		// $this -> assign("list", $flow_list);

		$this -> display();
	}

	function daiing() { // 贷款中的所有

        $widget['date'] = true;
        $this -> assign("widget", $widget);

        $emp_no = get_emp_no();
        $user_id = get_user_id();
        $user_name = get_user_name();

		$flow_where['isdone'] = array('eq', 0);

		$flow_list = M("FlowDai") -> where($flow_where) -> select();
		$this -> assign("list", $flow_list);
		$this -> assign("user_name", $user_name);

		$this -> display();
	}
	function daidone() { // 贷款中的所有

        $widget['date'] = true;
        $this -> assign("widget", $widget);

        $emp_no = get_emp_no();
        $user_id = get_user_id();
        $user_name = get_user_name();

		$flow_where['isdone'] = array('eq', 1);

		$flow_list = M("FlowDai") -> where($flow_where) -> select();
		$this -> assign("list", $flow_list);

		$this -> display();
	}
    
	function del() { //删除 客户申请
        $id=$_REQUEST['flowid'];
        D("Flow") -> where("id=$id") -> setField("is_del", 1);
		$this -> assign('jumpUrl', 'index.php?m=flow&a=khdai');
		$this -> success('删除成功!');

	}
	function deldai() { //删除 已受理贷款
        $id=$_REQUEST['daiid'];
        M("FlowDai") -> where("id=$id") -> delete();
		// $this -> assign('jumpUrl', 'index.php?m=flow&a=mydai');
		$this -> success('删除成功!');
	}
    
	/** 插入新新数据  **/
	protected function _insert() {
		$model = D("Flow");
		if (false === $model -> create()) {
			$this -> error($model -> getError());
		}
		if (in_array('user_id', $model -> getDbFields())) {
			$model -> user_id = get_user_id();
		};
		if (in_array('user_name', $model -> getDbFields())) {
			$model -> user_name = get_user_name();
		};
		/*保存当前数据对象 */
		$list = $model -> add();

		$model_flow_filed = D("FlowField") -> set_field($list);
        
       $dai = $_POST["dai"];
       $steps = $_POST["steps"];
       $nextstep = next_step($steps); 
       $type = $_POST["type"];
       $step = $_POST["step"];
            if ($step == 20) { //点完成时
                D("FlowDai") -> where("id=$dai") -> setField("$steps", 1); //当前步变1，
					 // update_time + nowstep + stepman
					 D("FlowDai") -> where("id=$dai") -> setField("update_time", mktime());
					 D("FlowDai") -> where("id=$dai") -> setField("nowstep", $nextstep);
					 D("FlowDai") -> where("id=$dai") -> setField("stepman", get_step_man($dai,$nextstep));
				if ($steps == 'step92') { //如果是最后一步
					 D("FlowDai") -> where("id=$dai") -> setField("isdone", 1); // isdone + 1，
				}
                //下一步变2   如果下一步为0则变2  为1则不变
                $isDone = M("FlowDai") -> where("id=$dai") -> getField("$nextstep"); 
                if ($isDone == 0) {
                D("FlowDai") -> where("id=$dai") -> setField("$nextstep", 2); 
					 // update_time + nowstep + stepman
					 D("FlowDai") -> where("id=$dai") -> setField("update_time", mktime());
					 D("FlowDai") -> where("id=$dai") -> setField("nowstep", $nextstep);
					 D("FlowDai") -> where("id=$dai") -> setField("stepman", get_step_man($dai,$nextstep));
                }
                //更新flowlog
                $Log = M("FlowLog"); 
                $data['dai_id'] = $dai;
                $data['result'] = 1;
                $data['step'] = $steps;
                $data['dostep'] = $steps;
                $data['emp_no'] = get_emp_no();
                $data['user_id'] = get_user_id();
                $data['user_name'] = get_user_name();
                $data['create_time'] = mktime();
                $data['comment'] = "已完成";
                $Log->add($data);
           
            }
            
        $kh = $_POST['kh']; //客户表 1为客户填  2为信贷员手工填
        
		if ($list !== false) {//保存成功
            // 有数据，则说明是贷款流程中的表，新增后不跳转
            if ($dai !='') {
                $this -> success('成功!',"index.php?m=flow&a=editdai&id=$dai&type=$type&step=$step");
            }else if($kh ==1 and $type == 45) { //客户填 ，提示成功
    		    $this -> assign('jumpUrl', get_return_url());
               $this -> success('提交成功，我们的信贷员将尽快与您取得联系，请保持手机正常开机!');
            }else if($kh ==2 and $type == 45) { // 手功填，成功后，跳转到流程表
                $this -> success('添加成功!',"index.php?m=flow&a=adddai&flowid=$list");
            }else{
    			$this -> assign('jumpUrl', get_return_url());
    			$this -> success('提交成功!');
            }
		} else {
			$this -> error('提交失败!');
			//失败提示
		}
	}
	

		
	function read() {
		$widget['uploader'] = true;
		$widget['editor'] = true;
		$this -> assign("widget", $widget);
		$folder = $_REQUEST['fid'];
		$this -> assign("folder", $folder);
		// if (empty($folder)) {
//             $this -> error("系统错误");
//         }
		$this -> _flow_auth_filter($folder, $map);

		
		$list = $_REQUEST['customer'];
		if ($list == '1') {
			$this -> assign("c", 1);
		}
		
		$model = D("Flow");
		$id = $_REQUEST['id'];
		// $where['id'] = array('eq', $id);
	// 	$where['_logic'] = 'and';
	// 	$map['_complex'] = $where;
		$vo = $model -> where("id=".$id) -> find();
		// if (empty($vo)) {
//             $this -> error("系统错误");
//         }

		$flow_type_id = $vo['type'];
		$this->from = $vo['from'];
		$this -> assign('vo', $vo);
		$this -> assign("emp_no", $vo['emp_no']);
		$this -> assign("user_name", $vo['user_name']);

		$model_flow_field = D("FlowField");
		$field_list = $model_flow_field -> get_data_list($id);
		$this -> assign("field_list", $field_list);

		$model = M("FlowType");
		$flow_type = $model -> find($flow_type_id);
		$this -> assign("flow_type", $flow_type);

		$model = M("FlowLog");
		$where = array();
		$where['flow_id'] = $id;
		$where['step'] = array('lt', 100);
		$where['_string'] = "result is not null";
		$flow_log = $model -> where($where) -> order("id") -> select();
		$this -> assign("flow_log", $flow_log);

		$where = array();
		$where['flow_id'] = $id;
		$where['emp_no'] = get_emp_no();
		$where['_string'] = "result is null";
		$to_confirm = $model -> where($where) -> find();
		$this -> assign("to_confirm", $to_confirm);

		if (!empty($to_confirm)) {
			$is_edit = $flow_type['is_edit'];
			$this -> assign("is_edit", $is_edit);
		} else {
			$is_edit = $flow_type['is_edit'];
			if ($is_edit <> "2") {
				$this -> assign("is_edit", 0);
			}
		}

		$where = array();
		$where['flow_id'] = $id;
		$where['_string'] = "result is not null";
		$where['emp_no'] = array('neq', $vo['emp_no']);
		$confirmed = $model -> Distinct(true) -> where($where) -> field('emp_no,user_name') -> select();
		$this -> assign("confirmed", $confirmed);
		$this -> display();
	}
    
    
	function readdai() {
		$widget['uploader'] = true;
		$widget['editor'] = true;
		$this -> assign("widget", $widget);
		$folder = $_REQUEST['fid'];
		$this -> assign("folder", $folder);
		if (empty($folder)) {
			$this -> error("系统错误");
		}
		$this -> _flow_auth_filter($folder, $map);

		$model = D("Flow");//$model = D("FlowDai");
		$id = $_REQUEST['id'];
		$where['id'] = array('eq', $id);
		$where['_logic'] = 'and';
		$map['_complex'] = $where;
		$vo = $model -> where($map) -> find();
		if (empty($vo)) {
			$this -> error("系统错误");
		}

		$flow_type_id = $vo['type'];
		$this -> assign('vo', $vo);
		$this -> assign("emp_no", $vo['emp_no']);
		$this -> assign("user_name", $vo['user_name']);

		$model_flow_field = D("FlowField");
		$field_list = $model_flow_field -> get_data_list($id);
		$this -> assign("field_list", $field_list);

		$model = M("FlowType");
		$flow_type = $model -> find($flow_type_id);
		$this -> assign("flow_type", $flow_type);

		$model = M("FlowLog");
		$where = array();
		$where['flow_id'] = $id;
		$where['step'] = array('lt', 100);
		$where['_string'] = "result is not null";
		$flow_log = $model -> where($where) -> order("id") -> select();
		$this -> assign("flow_log", $flow_log);

		$where = array();
		$where['flow_id'] = $id;
		$where['emp_no'] = get_emp_no();
		$where['_string'] = "result is null";
		$to_confirm = $model -> where($where) -> find();
		$this -> assign("to_confirm", $to_confirm);

		if (!empty($to_confirm)) {
			$is_edit = $flow_type['is_edit'];
			$this -> assign("is_edit", $is_edit);
		} else {
			$is_edit = $flow_type['is_edit'];
			if ($is_edit <> "2") {
				$this -> assign("is_edit", 0);
			}
		}

		$where = array();
		$where['flow_id'] = $id;
		$where['_string'] = "result is not null";
		$where['emp_no'] = array('neq', $vo['emp_no']);
		$confirmed = $model -> Distinct(true) -> where($where) -> field('emp_no,user_name') -> select();
		$this -> assign("confirmed", $confirmed);
		$this -> display();
	}
	function edit() {
		$widget['date'] = true;
		$widget['uploader'] = true;
		$widget['editor'] = true;
		$this -> assign("widget", $widget);

		$folder = $_REQUEST['fid'];
		$this -> assign("folder", $folder);

		// if (empty($folder)) {
//             $this -> error("系统错误");
//         }
		$this -> _flow_auth_filter($folder, $map);

		$model = D("Flow");
		$id = $_REQUEST['id'];
		$where['id'] = array('eq', $id);
		$where['_logic'] = 'and';
		$map['_complex'] = $where;
		$vo = $model -> where($map) -> find();
		// if (empty($vo)) {
	// 		$this -> error("系统错误");
	// 	}
		$this -> assign('vo', $vo);
		$model_flow_field = D("FlowField");
		$field_list = $model_flow_field -> get_data_list($id);
		$this -> assign("field_list", $field_list);

		$model = M("FlowType");
		$type = $vo['type'];
		$flow_type = $model -> find($type);
		$this -> assign("flow_type", $flow_type);
        
        
		$model = M("FlowLog");
		$where['flow_id'] = $id;
		$where['_string'] = "result is not null";
		$flow_log = $model -> where($where) -> select();

		$this -> assign("flow_log", $flow_log);
		$where = array();
		$where['flow_id'] = $id;
		$where['emp_no'] = get_emp_no();
		$where['_string'] = "result is null";
		$confirm = $model -> where($where) -> select();
		$this -> assign("confirm", $confirm[0]);
		$this -> display();
	}
  
  	function dai() {

		$this -> assign("now",mktime());
        $daiid = $_REQUEST['id'];
        $DaiInfo = M("FlowDai") ->where('id='.$daiid )->find(); //获得当前 贷款信息
        $this -> assign("DaiInfo", $DaiInfo);
        $this -> assign("id", $daiid);

    	$user_id = get_user_id();
    	$User = M("user"); // 实例化User对象
    	$this -> UserInfo = $User->where('id='.$user_id )->find(); //获得当前 登陆用户
        
         $this -> allsteps =  M("DaiStep") ->select();
         
		// 抵压物列表－－－－－－－－－－－－－－－－－－
		// $map['type'] = array(array('gt',51),array('lt',55)) ; //type = 52 or type = 53 or type = 54
		$map['dai'] = $daiid;
		$map['type'] = array(array('gt',51),array('lt',55)) ; //type = 52 or type = 53 or type = 54
		 $this -> dyw = M("Flow") ->where($map)->select(); //获得当前 贷款信息
			 
        //无刷新审批－－－－－－－－－－－－－－－－－－
		if($_POST){
			$id = $_POST["id"]; //当前贷款的id
			$dai = $id;
			$done = $_POST["done"]; // 不通过为2/ 通过为 1
			$step = $_POST["step"]; //当前步 或指定步
			$dostep = $_POST["dostep"]; //当前步 或指定步
            
            // 更新flowlog  > daiid +  username +userid +  emp_no + 内容 + 时间 + step + dostep
            $Log = M("FlowLog"); 
            $data['dai_id'] = $id;
            $data['result'] = $done;
            $data['step'] = $step;
            $data['dostep'] = $dostep;
            $data['emp_no'] = get_emp_no();
            $data['user_id'] = get_user_id();
            $data['user_name'] = get_user_name();
            $data['create_time'] = mktime();
            $data['comment'] = $_POST["comment"];
            $Log->add($data);

            //当步变1 或指定步变 2
			$list = D("FlowDai") -> where("id=$id") -> setField($step, $done);
			
			if ($step != $dostep and !$done) {//定步变 2 时
   			 D("FlowDai") -> where("id=$dai") -> setField("update_time", mktime());
   			 D("FlowDai") -> where("id=$dai") -> setField("nowstep", $step);
   			 D("FlowDai") -> where("id=$dai") -> setField("stepman", get_step_man($daiid,$step));
			}
  
        // 下一步变2  done为1 且下一步不为 1 时
         $nextstep = next_step($step);
        $next_step_done = M("FlowDai") -> where("id=$id") -> getField($nextstep);
        
        if ($done and !$next_step_done) {
             $list = D("FlowDai") -> where("id=$id") -> setField($nextstep, 2);

			 // update_time + nowstep + stepman
			 D("FlowDai") -> where("id=$dai") -> setField("update_time", mktime());
			 D("FlowDai") -> where("id=$dai") -> setField("nowstep", $nextstep);
			 D("FlowDai") -> where("id=$dai") -> setField("stepman", get_step_man($daiid,$nextstep));
       
			if ($list !== false) {
                  // $this -> success('成功!');// 审批成功
			} else {
				 // $this -> error( '失败!'); // 审批提示
			}
             }
		
		}
        //无刷新审批 END－－－－－－－－－－－－－－－－－－ －－－－－－－－－－－－－－－－－－
        
      // 输出评论 BENGIN  在common.php中  get_dai_log
      
	  // 权限操作  信贷员判断
	  $uid = get_user_id();
	  $deptid = get_dept_id();
	  $positionid = $User->where('id='.$user_id ) -> getField('position_id');
	  
	  $dai_uid = $DaiInfo['user_id'];
	  if ($uid == $dai_uid) {
	  	 $this->isxin = 1;
	  }
	  //信贷经理
	  if ($deptid == 7 && $positionid == 5) {
	  	$this->isxinj = 1;
	  }
	  //风控经理
	  if ($deptid == 6 && $positionid == 5) {
	  	$this->isfengj = 1;
	  }
	  //执行董事
	  if ($deptid ==  2) {
	  	$this->iszhi = 1;
	  }
	  //总经理
	  if ($deptid ==  5) {
	  	$this->iszong = 1;
	  }
	  //财务部
	  if ($deptid ==  8) {
	  	$this->iscai = 1;
	  }
	  //24 行政部
	  if ( get_user_name() ==  "龙玉轩") {
	  	$this->iszheng = 1;
	  }
	  //合同组
	  if ($deptid ==  30) {
	  	$this->ishe = 1;
	  }
	  // 管理员  －－－－－－ 所有为1
	  if ($uid ==  1) {
		  $this->isxin = 1;
		   $this->isfengj = 1;
		    $this->isxinj = 1;
	  	$this->iszhi = 1;
			 $this->iszong = 1;
			  $this->iscai = 1;
			   $this->iszheng = 1;
	  }
	 
	  
	 
 
		$this -> display();
	}
   
  	function hou() {

		$this -> assign("now",mktime());
        $daiid = $_REQUEST['id'];
        $DaiInfo = M("FlowDai") ->where('id='.$daiid )->find(); //获得当前 贷款信息
        $this -> assign("DaiInfo", $DaiInfo);
        $this -> assign("id", $daiid);

    	$user_id = get_user_id();
    	$User = M("user"); // 实例化User对象
    	$this -> UserInfo = $User->where('id='.$user_id )->find(); //获得当前 登陆用户
        
         $this -> allsteps =  M("DaiStep") ->select();
         
		// 抵压物列表－－－－－－－－－－－－－－－－－－
		// $map['type'] = array(array('gt',51),array('lt',55)) ; //type = 52 or type = 53 or type = 54
		$map['dai'] = $daiid;
		$map['type'] = array(array('gt',51),array('lt',55)) ; //type = 52 or type = 53 or type = 54
		 $this -> dyw = M("Flow") ->where($map)->select(); //获得当前 贷款信息
			 
        //无刷新审批－－－－－－－－－－－－－－－－－－
		if($_POST){
			$id = $_POST["id"]; //当前贷款的id
			$done = $_POST["done"]; // 不通过为2/ 通过为 1
			$step = $_POST["step"]; //当前步 或指定步
			$dostep = $_POST["dostep"]; //当前步 或指定步
			$setstep = $_POST["setstep"]; //当前步 或指定步
            
            // 更新flowlog  > daiid +  username +userid +  emp_no + 内容 + 时间 + step + dostep
            $Log = M("FlowLog"); 
            $data['dai_id'] = $id;
            $data['result'] = $done;
            $data['step'] = $step;
            $data['dostep'] = $dostep;
            $data['emp_no'] = get_emp_no();
            $data['user_id'] = get_user_id();
            $data['user_name'] = get_user_name();
            $data['create_time'] = mktime();
            $data['comment'] = $_POST["comment"];
            $Log->add($data);

            //当步变1
			$list = D("FlowDai") -> where("id=$id") -> setField($step, $done);
  
        // 下一步变2  done为1 且下一步不为 1 时 
        $next_step_done = M("FlowDai") -> where("id=$id") -> getField(next_step($step));
		
		if ($done) {
			
			if ($setstep == "step1038") { //客户逾期
							 D("FlowDai") -> where("id=$id") -> setField($setstep, 2); 
			}else if ($step == "step1037") { //如果是 办公室录入 step1037
				 D("FlowDai") -> where("id=$id") -> setField("step1041", 2); // isdone + 1，
			}
			else if (!$next_step_done){
             $list = D("FlowDai") -> where("id=$id") -> setField(next_step($step), 2);
			}
			
			if ($list !== false) {
                  $this -> success('成功!'.$setstep);// 审批成功
			} else {
				 $this -> error( $step.'失败!'.$setstep); // 审批提示
			}
			
		}
		
		
		}
        //无刷新审批 END－－－－－－－－－－－－－－－－－－ －－－－－－－－－－－－－－－－－－
        
      // 输出评论 BENGIN  在common.php中  get_dai_log
      
	  // 权限操作  信贷员判断
	  $uid = get_user_id();
	  $deptid = get_dept_id();
	  $positionid = $User->where('id='.$user_id ) -> getField('position_id');
	  
	  $dai_uid = $DaiInfo['user_id'];
	  if ($uid == $dai_uid) {
	  	 $this->isxin = 1;
	  }
	  //信贷经理
	  if ($deptid == 7 && $positionid == 2) {
	  	$this->isxinj = 1;
	  }
	  //风控经理
	  if ($deptid == 6 && $positionid == 2) {
	  	$this->isfengj = 1;
	  }
	  //执行董事
	  if ($deptid ==  2) {
	  	$this->iszhi = 1;
	  }
	  //总经理
	  if ($deptid ==  5) {
	  	$this->iszong = 1;
	  }
	  //财务部
	  if ($deptid ==  8) {
	  	$this->iscai = 1;
	  }
	  //24 行政部
	  if ($deptid ==  24) {
	  	$this->iszheng = 1;
	  }
	  //信贷合同组
	  if ($deptid ==  30) {
	  	$this->ishe = 1;
	  }
	  
	  // 管理员  －－－－－－ 所有为1
	  if ($uid ==  1) {
		  $this->isxin = 1;
		   $this->isfengj = 1;
		    $this->isxinj = 1;
	  		$this->iszhi = 1;
			 $this->iszong = 1;
			  $this->iscai = 1;
			   $this->iszheng = 1;
			   $this->ishe = 1;
	  }

		$this -> display();
	}
	       
	function editdai() {
		$widget['date'] = true;
        $widget['uploader'] = true;
        $widget['editor'] = true;
        $this -> assign("widget", $widget);

		// $folder = $_REQUEST['fid'];
//         $this -> assign("folder", $folder);
//
//         if (empty($folder)) {
//             $this -> error("系统错误");
//         }
	$user_id = get_user_id();
	$User = M("user"); // 实例化User对象
	$this -> UserInfo = $User->where('id='.$user_id )->find(); //获得用户

	$Position = M('Position'); //   职位
	$this -> PositionName = $Position->where('id='.$this -> UserInfo['position_id'] )->find();
    
	$Rank = M('Rank'); //   公司
	$this -> CompanyName = $Rank->where('id='.$this -> UserInfo['rank_id'] )->find();
    
		$this -> _flow_auth_filter($folder, $map);


$daiid = $_REQUEST['id'];
$type = $_REQUEST['type'];
$step = $_REQUEST['step'];
$this -> assign("step", $step);
$this -> assign("nextstep", next_step($step));
$nextstep = next_step($step);
$nextis = is_step_done($daiid,$nextstep);
$this -> assign("nextis", $nextis);
$this -> assign("daiid", $daiid);

// 按步骤显示绿 －  ok 已在common.php中定义 function get_dai_step($id,$step)

//列出表单

//无刷新操作
        // 
		$model = D("Flow"); //通过daiid 和 type 找到flow_id   // 如果没有则 选跳转到添加， 添加成功后再跳转回来
		//$id = $_REQUEST['id'];
		$where['dai'] = array('eq', $daiid);
        $where['type'] = array('eq', $type);
		$where['_logic'] = 'and';
		$map['_complex'] = $where;
		//$vo = $model -> where($map) -> find();
		 $vo = $model -> where("dai=$daiid and type =$type") -> find();
     
		if (empty($vo)) {  //去注示会自动跳转上一页
           //  $this -> error("无记录".$id);
            $this -> success( '正在拼命加载表!',"index.php?m=flow&a=add2&type=$type&dai=$daiid&step=$step");
         }
		    $id = $vo['id']; //取得flowid
		$this -> assign('id', $id);
        
		$this -> assign('vo', $vo);
        
		$model_flow_field = D("FlowField"); // 表单数据  XXX 读不出 没有新建到 flow field data
		$field_list = $model_flow_field -> get_data_list($id);
		$this -> assign("field_list", $field_list);

		$model = M("FlowType"); // 基本审批信息 如抄送 表单名称  ok
		$flow_type = $model -> find($type);
		$this -> assign("flow_type", $flow_type);
     
        
        
		$model = M("FlowLog");
		$where['flow_id'] = $id;
		$where['_string'] = "result is not null";
		$flow_log = $model -> where($where) -> select();

		$this -> assign("flow_log", $flow_log);
		$where = array();
		$where['flow_id'] = $id;
		$where['emp_no'] = get_emp_no();
		$where['_string'] = "result is null";
		$confirm = $model -> where($where) -> select();
		$this -> assign("confirm", $confirm[0]);


  	  // 权限操作  信贷员判断
  	  $uid = get_user_id();
  	  $deptid = get_dept_id();
  	  $positionid = $User->where('id='.$user_id ) -> getField('position_id');

      $DaiInfo = M("FlowDai") ->where('id='.$daiid )->find(); //获得当前 贷款信息
	  
  	  $dai_uid = $DaiInfo['user_id'];
  	  if ($uid == $dai_uid) {
  	  	 $this->isxin = 1;
  	  }
	  
	  if ($uid ==  1) {
		  $this->isxin = 1;
		   $this->isfengj = 1;
		    $this->isxinj = 1;
			 $this->iszong = 1;
			  $this->iscai = 1;
			   $this->iszheng = 1;
	  }
	  
		$this -> display();
	}

	/* 更新数据  */
	protected function _update() {
		$name = $this -> getActionName();
		$model = D($name);
		if (false === $model -> create()) {
			$this -> error($model -> getError());
		}
		$flow_id = $model -> id;
		$list = $model -> save();

		$model_flow_filed = D("FlowField") -> set_field($flow_id);
        

        $dai = $_REQUEST['dai']; //
       $steps = $_REQUEST['steps']; // 当前步变1， 下一步变2  2：如果下一步为1则不变  // 当前步 step411
       $step = $_REQUEST['step']; //10/20  仅20时执行 设置状态  // 状态
       
   //     $array = array("step21","step22","step23","step24","step3","step411","step412","step42","step43","step51","step52","step6","step7","step81","step82","step83","step84","step85","step91","step92");
   //
   //
   // $nextstep=array_search($steps,$array)+1;  // 获取字符串在数组中的位置
   $nextstep = next_step($steps); 
       
       if ($step == 20) { //点完成时
           D("FlowDai") -> where("id=$dai") -> setField("$steps", 1); //当前步变1，
					 // update_time + nowstep + stepman
					 D("FlowDai") -> where("id=$dai") -> setField("update_time", mktime());
					 D("FlowDai") -> where("id=$dai") -> setField("nowstep", $nextstep);
					 D("FlowDai") -> where("id=$dai") -> setField("stepman", get_step_man($dai,$nextstep));
		if ($steps == 'step92') { //如果是最后一步
			 D("FlowDai") -> where("id=$dai") -> setField("isdone", 1); // isdone = 1，
		}
           //下一步变2   如果下一步为0则变2  为1则不变
           $isDone = M("FlowDai") -> where("id=$dai") -> getField("$nextstep"); 
           if ($isDone == 0) {
           D("FlowDai") -> where("id=$dai") -> setField("$nextstep", 2); 
					 // update_time + nowstep + stepman
					 D("FlowDai") -> where("id=$dai") -> setField("update_time", mktime());
					 D("FlowDai") -> where("id=$dai") -> setField("nowstep", $nextstep);
					 D("FlowDai") -> where("id=$dai") -> setField("stepman", get_step_man($dai,$nextstep));
		   
           }
           
           //更新flowlog
           $Log = M("FlowLog"); 
           $data['dai_id'] = $dai;
           $data['result'] = 1;
           $data['step'] = $steps;
           $data['dostep'] = $steps;
           $data['emp_no'] = get_emp_no();
           $data['user_id'] = get_user_id();
           $data['user_name'] = get_user_name();
           $data['create_time'] = mktime();
           $data['comment'] = "已完成";
           $Log->add($data);
           
           
       }
		if (false !== $list) {
			$this -> assign('jumpUrl', get_return_url());
			$this -> success( '编辑成功!');
			//成功提示
		} else {
			$this -> error('编辑失败!');
			//错误提示
		}
	}

	public function mark() {
		$action = $_REQUEST['action'];
		switch ($action) {
			case 'approve' :
				$model = D("FlowLog");
				if (false === $model -> create()) {
					$this -> error($model -> getError());
				}

				$model -> result = 1;

				$flow_id = $model -> flow_id;
				$step = $model -> step;
				//保存当前数据对象
				$list = $model -> save();
				$model = D("FlowLog");
				$model -> where("step=$step and flow_id=$flow_id and result is null") -> delete();

				if ($list !== false) {//保存成功
					D("Flow") -> next_step($flow_id, $step);
					$this -> assign('jumpUrl', U('flow/folder?fid=confirm'));
					$this -> success('操作成功!');
				} else {
					//失败提示
					$this -> error('操作失败!');
				}
				break;
			case 'back' :
				$model = D("FlowLog");
				if (false === $model -> create()) {
					$this -> error($model -> getError());
				}

				$model -> result = 2;
				if (in_array('user_id', $model -> getDbFields())) {
					$model -> user_id = get_user_id();
				};
				if (in_array('user_name', $model -> getDbFields())) {
					$model -> user_name = get_user_name();
				};

				$flow_id = $model -> flow_id;
				$step = $model -> step;
				//保存当前数据对象
				$list = $model -> save();
				$emp_no=$_REQUEST['emp_no'];
				if ($list !== false) {//保存成功
					D("Flow") -> next_step($flow_id,$step,$emp_no);
					$this -> assign('jumpUrl', U('flow/folder?fid=confirm'));
					$this -> success('操作成功!');
				} else {
					//失败提示
					$this -> error('操作失败!');
				}
				break;
			case 'reject' :
				$model = D("FlowLog");
				if (false === $model -> create()) {
					$this -> error($model -> getError());
				}
				$model -> result = 0;
				if (in_array('user_id', $model -> getDbFields())) {
					$model -> user_id = get_user_id();
				};
				if (in_array('user_name', $model -> getDbFields())) {
					$model -> user_name = get_user_name();
				};

				$flow_id = $model -> flow_id;
				$step = $model -> step;
				//保存当前数据对象
				$list = $model -> save();
				//可以裁决的人有多个人的时候，一个人评价完以后，禁止其他人重复裁决。
				$model = D("FlowLog");
				$model -> where("step=$step and flow_id=$flow_id and result is null") -> delete();

				if ($list !== false) {//保存成功
					D("Flow") -> where("id=$flow_id") -> setField('step', 0);

					$user_id = M("Flow") -> where("id=$flow_id") -> getField('user_id');
					$this -> _pushReturn($new, "您有一个流程被否决", 1, $user_id);

					$this -> assign('jumpUrl', U('flow/folder?fid=confirm'));
					$this -> success('操作成功!');
				} else {
					//失败提示
					$this -> error('操作失败!');
				}
				break;
			default :
				break;
		}
	}

	public function approve() {

		$model = D("FlowLog");
		if (false === $model -> create()) {
			$this -> error($model -> getError());
		}
		$model -> result = 1;

		$flow_id = $model -> flow_id;
		$step = $model -> step;
		//保存当前数据对象
		$list = $model -> save();

		$model = D("FlowLog");
		$model -> where("step=$step and flow_id=$flow_id and result is null") -> setField('is_del', 1);

		if ($list !== false) {//保存成功
			D("Flow") -> next_step($flow_id, $step);
			$this -> assign('jumpUrl', U('flow/confirm'));
			$this -> success('操作成功!');
		} else {
			//失败提示
			$this -> error('操作失败!');
		}
	}

	public function reject() {
		$model = D("FlowLog");
		if (false === $model -> create()) {
			$this -> error($model -> getError());
		}
		$model -> result = 0;
		if (in_array('user_id', $model -> getDbFields())) {
			$model -> user_id = get_user_id();
		};
		if (in_array('user_name', $model -> getDbFields())) {
			$model -> user_name = get_user_name();
		};

		$flow_id = $model -> flow_id;
		$step = $model -> step;
		//保存当前数据对象
		$list = $model -> save();
		//可以裁决的人有多个人的时候，一个人评价完以后，禁止其他人重复裁决。
		$model = D("FlowLog");
		$model -> where("step=$step and flow_id=$flow_id and result is null") -> setField('is_del', 1);

		if ($list !== false) {//保存成功
			D("Flow") -> where("id=$flow_id") -> setField('step', 0);

			$user_id = M("Flow") -> where("id=$flow_id") -> getField('user_id');

			$this -> _pushReturn($new, "您有一个流程被否决", 1, $user_id);

			$this -> assign('jumpUrl', U('flow/confirm'));
			$this -> success('操作成功!');
		} else {
			//失败提示
			$this -> error('操作失败!');
		}
	}
	
	public function timeline() {
		$dai = $_GET[id];
		$this->dai = M("FlowDai") -> where("id=$dai") -> find();
		$flow = D("FlowLog");
	 	$this->log = $flow ->where('dai_id='.$dai) ->order('create_time desc') -> select();
		
		$this -> display();
	}
	
	public function down() {
		$this -> _down();
	}

	public function upload() {
		$this -> _upload();
	}

	protected function _assign_tag_list() {
		$model = D("SystemTag");
		$tag_list = $model -> get_tag_list('id,name', 'FlowType');
		$this -> assign("tag_list", $tag_list);
	}
}
