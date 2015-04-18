<?php
/*---------------------------------------------------------------------------
  

                                               

  Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )  

                           

  Support: https://git.oschina.net/smeoa/smeoa               
 -------------------------------------------------------------------------*/

class HomeAction extends CommonAction {
	protected $config=array('app_type'=>'asst');
	//过滤查询字段

	function _search_filter(&$map) {
		if (!empty($_POST['keyword'])) {
			$map['type|name|code'] = array('like', "%" . $_POST['keyword'] . "%");
		}
	}

	public function index() {
		$widget['jquery-ui'] = true;		
		$this -> assign("widget", $widget);
				
		cookie("current_node", null);
		cookie("top_menu", null);

		$config = D("UserConfig") -> get_config();
		$this -> assign("home_sort", $config['home_sort']);
		$this -> _mail_list();
		$this -> _flow_list();
		$this -> _schedule_list();
		$this -> _notice_list();
		$this -> _doc_list();
		$this -> _forum_list();
		$this -> _news_list();
		$this -> _slide_list();
		$this -> display();
	}

	public function set_sort() {
		$val = $_REQUEST["val"];
		$data['home_sort'] = $val;
		$model = D("UserConfig") -> set_config($data);
	}

	protected function _mail_list() {
		$user_id = get_user_id();
		$model = D('Mail');

		//获取最新邮件
		$where['user_id'] = $user_id;
		$where['is_del'] = array('eq', '0');
		$where['folder'] = array( array('eq', 1), array('gt', 6), 'or');

		$new_mail_list = $model -> where($where) -> field("id,name,create_time") -> order("create_time desc") -> limit(6) -> select();
		$this -> assign('new_mail_list', $new_mail_list);
	
		//获取未读邮件
		$where['read'] = array('eq', '0');
		$unread_mail_list = $model -> where($where) -> field("id,name,create_time") -> order("create_time desc") -> limit(6) -> select();
		$this -> assign('unread_mail_list', $unread_mail_list);
	}

	protected function _flow_list(){
		$user_id = get_user_id();
		$emp_no = get_emp_no();
        $user_name = get_user_name();
		$model = D('Flow');
		// 过滤贷款表 1
		$FlowType = M("FlowType");
		$type_list = $FlowType -> where('tag = 82') ->  select();
		$type_list = rotate($type_list);
	
		//带审批的列表  处理待办事项
		
		$FlowLog = M("FlowLog");
		$where['emp_no'] = $emp_no;
		$where['_string'] = "result is null";
		$log_list = $FlowLog -> where($where) -> field('flow_id') -> select();
		$log_list = rotate($log_list);
		if (!empty($log_list)) {
			$map['id'] = array('in', $log_list['flow_id']);
			$map['type'] = array('not in', $type_list['id']); // 过滤贷款表 2
			$todo_flow_list = $model -> where($map) -> field("id,name,user_name,type,create_time") -> limit(6)-> order("create_time desc")->select();
			$this -> assign("todo_flow_list", $todo_flow_list);		
		}
		//已提交  追踪流程
		$map = array();
		$map['user_id'] = $user_id;
		$map['type'] = array('not in', $type_list['id']);	 // 过滤贷款表 2
		$submit_process_list = $model -> where($map) -> field("id,name,confirm_name,type,create_time") -> limit(6)->order("create_time desc")-> select();
		$this -> assign("submit_flow_list", $submit_process_list);
		

  	  // 权限操作  
		//贷款审批  我的任务
  	  $uid = get_user_id();
  	  $deptid = get_dept_id();
  	  $positionid =  M("user")->where('id='.$uid ) -> getField('position_id');
	  
	   $DaiInfo = M("FlowDai") ->where('id='.$daiid )->find(); //获得当前 贷款信息
  	  $dai_uid = $DaiInfo['user_id'];
	  
	  $this ->todo_dai_list = M("FlowDai") -> where('stepman = "'.$user_name.'"') -> limit(6) -> select();
  	  // if ($deptid == 1) {
  // 		// $this ->todo_dai_list = M("FlowDai") -> where('stepman = "'.$user_name.'" and isdone =0') -> limit(6) -> select();
  //
  // 	  }
  // //信贷经理
//   if ($deptid == 7 && $positionid == 5) {
//   	$this->isxinj = 1;
//   }
//   //风控经理
//   if ($deptid == 6 && $positionid == 5) {
//   	$this->isfengj = 1;
//   }
//   //执行董事
//   if ($deptid ==  2) {
//   	$this->iszhi = 1;
//   }
//   //总经理
//   if ($deptid ==  5) {
//   	$this->iszong = 1;
//   }
//   //财务部
//   if ($deptid ==  8) {
//   	$this->iscai = 1;
//   }
//   //24 行政部
//   if ($deptid ==  24) {
//   	$this->iszheng = 1;
//   }
//   //合同组
//   if ($deptid ==  30) {
//   	$this->ishe = 1;
//   }
  
  	  //信贷经理
  	  if ($deptid == 7 && $positionid == 5) {
		$this ->todo_dai_list = M("FlowDai") -> where('stepman = "信贷经理"') -> limit(6) -> select();
  	  }
  	  //风控经理
  	  if ($deptid == 6 && $positionid == 5) {
		$this ->todo_dai_list = M("FlowDai") -> where('stepman = "风控经理"') -> limit(6) -> select();
  	  }
  	  //执行董事
  	  if ($deptid ==  2) {
		$this ->todo_dai_list = M("FlowDai") -> where('stepman = "执行董事"') -> limit(6) -> select();
  	  }
  	  //总经理
  	  if ($deptid ==  5) {
		$this ->todo_dai_list = M("FlowDai") -> where('stepman = "总经理"') -> limit(6) -> select();
  	  }
  	  //财务部
  	  if ($deptid ==  8) {
		$this ->todo_dai_list = M("FlowDai") -> where('stepman = "财务部"') -> limit(6) -> select();
  	  }
  	  // 行政部
  	  if ($deptid ==  24) {
		$this ->todo_dai_list = M("FlowDai") -> where('stepman = "行政部"') -> limit(6) -> select();
  	  }
  	  // 合同组
  	  if ($deptid ==  30) {
		$this ->todo_dai_list = M("FlowDai") -> where('stepman = "合同组"') -> limit(6) -> select();
  	  }
  	  // 管理员  －－－－－－ 所有为1
  	  if ($uid ==  1) {
  $this ->todo_dai_list = M("FlowDai") -> where('stepman = "'.$user_name.'"') -> limit(6) -> select();
  	  }
	  
		
		//贷款审批  我受理的
		$this ->my_dai_list = M("FlowDai") -> where('user_id = "'.$user_id.'" and isdone =0') -> limit(6) -> select();
		//贷款审批  贷中
		$this ->daiing_list = M("FlowDai") -> where('isdone = 0') -> limit(6) -> select();
		//贷款审批  已贷
		$this ->dai_done_list = M("FlowDai") -> where('isdone = 1') -> limit(6) -> select();
		
		// 还款提醒
		// $this ->notice_list = M("FlowFieldData") -> where("(field_id = 409 and val ='1') or (field_id = 408 and val ='1')") -> select();
		// $this ->notice_list = M("FlowDai") -> where('isdone = 1') -> limit(6) -> select();
		$this ->notice_list = M("Flow") -> where('type = 65 or type =58') -> limit(6) -> select();
		$this ->now = mktime();
		
	}

	protected function _doc_list() {
		$user_id = get_user_id();
		$model = D('Doc');
		//获取最新邮件

		$where['is_del'] = array('eq', '0');
		$folder_list=D("SystemFolder")->get_authed_folder(get_user_id(),"DocFolder");
		$where['folder']=array("in",$folder_list);		
		$doc_list = $model -> where($where) -> field("id,name,create_time") -> order("create_time desc") -> limit(6) -> select();
		$this -> assign("doc_list", $doc_list);
	}
	
	protected function _news_list() {
		$user_id = get_user_id();
		$model = D('News');

		$where['is_del'] = array('eq', '0');
		$folder_list=D("SystemFolder")->get_authed_folder(get_user_id(),"NewsFolder");
		$where['folder']=array("in",$folder_list);		
		$news_list = $model -> where($where) -> field("id,name,create_time") -> order("create_time desc") -> limit(6) -> select();
		$this -> assign("news_list",$news_list);
	}	
	
	
	protected function _slide_list() {
		$slide_list = M("Slide") -> where($where) -> order('sort asc') -> select();		
		$this -> assign("slide_list",$slide_list);
	}
	
	protected function _schedule_list() {
		$user_id = get_user_id();
		$model = M('Schedule');
		//获取最新邮件
		$start_date = date("Y-m-d");
		$where['user_id'] = $user_id;
		$where['start_date'] = array('egt', $start_date);
		$schedule_list = M("Schedule") -> where($where) -> order('start_date,priority desc') -> limit(6) -> select();
		$this -> assign("schedule_list", $schedule_list);

		$model = M("Todo");
		$where = array();
		$where['user_id'] = $user_id;
		$where['status'] = array("in", "1,2");
		$todo_list = M("Todo") -> where($where) -> order('priority desc,sort asc') -> limit(6) -> select();
		$this -> assign("todo_list", $todo_list);
	}

	protected function _notice_list() {
		$model = D('Notice');
		//获取最新通知
		$where['is_del'] = array('eq', '0');
	    // $folder_list=D("SystemFolder")->get_authed_folder(get_user_id(),"NoticeFolder");
    //     $where['folder']=array("in",$folder_list);
		$new_notice_list = $model -> where($where) -> field("id,name,user_name,create_time") -> order("create_time desc") -> limit(6) -> select();
		$this -> assign("new_notice_list", $new_notice_list);
	}

	protected function _forum_list() {
		$model = D('Forum');
		$where['is_del'] = array('eq', '0');
		$folder_list=D("SystemFolder")->get_authed_folder(get_user_id(),"ForumFolder");
		$where['folder']=array("in",$folder_list);		
		$new_forum_list = $model -> where($where) -> field("id,name,create_time") -> order("create_time desc") -> limit(6) -> select();
		$this -> assign("new_forum_list", $new_forum_list);
	}

}
?>