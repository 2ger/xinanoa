<?php
/*---------------------------------------------------------------------------

 -------------------------------------------------------------------------*/
 
function get_file_path($sid){
	if (is_array($sid)) {
		$where['sid'] = array("in", array_filter($sid));
	} else {
		$where['sid'] = array('in', array_filter(explode(';', $sid)));
	}	
	$list=M("File")->where($where)->getField('savename');
	return $list;
}	

function is_weixin(){
	if ( strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false ) {
		return true;
	}
	return false;
}

function get_new_count(){
	
	$emp_no = get_emp_no();

	//获取未读邮件
	$data=array();

	$user_id = get_user_id();
	$where['user_id'] = $user_id;
	$where['is_del'] = array('eq', '0');
	$where['folder'] = array('eq', 1);
	$where['read'] = array('eq', '0');
	$new_mail_inbox = M("Mail") -> where($where) -> count();
	$data['bc-mail']['bc-mail-inbox']=$new_mail_inbox;

	//获取未读邮件
	$where['user_id'] = $user_id;
	$where['is_del'] = array('eq', '0');
	$where['folder'] = array('gt', 6);
	$where['read'] = array('eq', '0');
	$new_mail_myfolder = M("Mail") -> where($where) -> count();
	$data['bc-mail']['bc-mail-myfolder']=$new_mail_myfolder;

	//获取待裁决
	$where = array();
	$FlowLog = M("FlowLog");
		 
	$where['emp_no'] = $emp_no;
	$where['_string'] = "result is null";
	$log_list = $FlowLog -> where($where) -> field('flow_id') -> select();
	
	$log_list = rotate($log_list);
	$new_confirm_count=0;
	if (!empty($log_list)) {
		$map['id'] = array('in', $log_list['flow_id']);
		$new_confirm_count = M("Flow") -> where($map) -> count();
	}
	$data['bc-flow']['bc-flow-confirm']=$new_confirm_count;

	//获取收到的流程
	$where = array();
	$where['emp_no'] = $emp_no;
	$where['step'] = 100;
	$where['is_read']=1;

	$log_list =  M("FlowLog") -> where($where) -> field('flow_id') -> select();
	$log_list = rotate($log_list);
	$new_receive_count=0;
	if (!empty($log_list)) {
		$map['id'] = array('in',$log_list['flow_id']);
		$new_receive_count = M("Flow") -> where($map) -> count();
	}
	$data['bc-flow']['bc-flow-receive']=$new_receive_count;

	//获取最新通知
	$where = array();
	$where['is_del'] = array('eq', '0');
	$folder_list = D("SystemFolder") -> get_authed_folder(get_user_id(),"NoticeFolder");
	$where['folder']=array('in',$folder_list);
	$where['create_time']=array("egt",time() - 3600 * 24 * 30);
	$readed = array_filter(explode(",",get_user_config("readed_notice")));

	$where['id']=array("not in",$readed);
		
	$new_notice_count =  M('Notice') -> where($where) -> count();
	
	$data['bc-notice']['bc-notice-new']=$new_notice_count;

	//获取待办事项
	$where = array();
	$where['user_id'] = $user_id;
	$where['status'] = array("in", "1,2");
	$new_todo_count = M("Todo") -> where($where) -> count();
	$data['bc-personal']['bc-personal-todo']=$new_todo_count;

	//获取日程事项
	$where = array();
	$where['user_id'] = $user_id;
	$where['start_date'] = array("elt",date("Y-m-d"));
	$where['end_date'] = array("egt",date("Y-m-d"));	
	$new_schedule_count = M("Schedule") -> where($where) -> count();
	$data['bc-personal']['bc-personal-schedule']=$new_schedule_count;

	//获取最新消息
	$model = M("Message");
	$where = array();
	$where['owner_id'] = $user_id;
	$where['receiver_id']=$user_id;
	$where['is_read'] = array('eq','0');
	$new_message_count = M("Message") -> where($where) -> count();
	$data['bc-message']['bc-message-new']=$new_message_count;

	return $data;
}

function is_mobile($mobile){
	return preg_match("/^(?:13\d|14\d|15\d|18[0123456789])-?\d{5}(\d{3}|\*{3})$/", $mobile);
}

function is_email($email){
	return strlen($email) > 6 && preg_match("/^[\w\-\.]+@[\w\-\.]+(\.\w+)+$/", $email);
}

/**
 * 发送HTTP请求方法，目前只支持CURL发送请求
 * @param  string $url    请求URL
 * @param  array  $params 请求参数
 * @param  string $method 请求方法GET/POST
 * @return array  $data   响应数据
 */
function http($url, $params, $method = 'GET', $header = array(), $multi = false){
	$opts = array(
		CURLOPT_TIMEOUT        => 30,
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_SSL_VERIFYPEER => false,
		CURLOPT_SSL_VERIFYHOST => false,
		CURLOPT_HTTPHEADER     => $header
	);

	/* 根据请求类型设置特定参数 */
	switch(strtoupper($method)){
		case 'GET':
			$opts[CURLOPT_URL] = $url . '?' . str_replace("&amp;","&",http_build_query($params));
			break;
		case 'POST':
			//判断是否传输文件
			//$params = $multi ? $params : http_build_query($params);
			$opts[CURLOPT_URL] = $url;
			$opts[CURLOPT_POST] = 1;
			$opts[CURLOPT_POSTFIELDS] = $params;
			break;
		default:
			throw new Exception('不支持的请求方式！');
	}

	/* 初始化并执行curl请求 */
	$ch = curl_init();
	curl_setopt_array($ch, $opts);
	$data  = curl_exec($ch);
	$error = curl_error($ch);
	curl_close($ch);
	if($error) throw new Exception('请求发生错误：' . $error);
	return  $data;
}

/**
 * 不转义中文字符和\/的 json 编码方法
 * @param array $arr 待编码数组
 * @return string
 */
function jsencode($arr) {
	$str = str_replace ( "\\/", "/", json_encode ( $arr ) );
	$search = "#\\\u([0-9a-f]+)#ie";
	
	if (strpos ( strtoupper(PHP_OS), 'WIN' ) === false) {
		$replace = "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))";//LINUX
	} else {
		$replace = "iconv('UCS-2', 'UTF-8', pack('H4', '\\1'))";//WINDOWS
	}
	
	return preg_replace ( $search, $replace, $str );
}

// 数据保存到文件
function data2file($filename, $arr=''){
	if(is_array($arr)){
		$con = var_export($arr,true);
		$con = "<?php\nreturn $con;\n?>";
	} else{
		$con = $arr;
		$con = "<?php\n $con;\n?>";
	}
	write_file($filename, $con);
}

/**
 * 系统加密方法
 * @param string $data 要加密的字符串
 * @param string $key  加密密钥
 * @param int $expire  过期时间 单位 秒
 * @return string
 * @author winky
 */

function encrypt($data,$key = '', $expire = 0) {
    $key  = md5(empty($key) ? C('DATA_AUTH_KEY') : $key);
    $data = base64_encode($data);
    $x    = 0;
    $len  = strlen($data);
    $l    = strlen($key);
    $char = '';

    for ($i = 0; $i < $len; $i++) {
        if ($x == $l) $x = 0;
        $char .= substr($key, $x, 1);
        $x++;
    }

    $str = sprintf('%010d', $expire ? $expire + time():0);

    for ($i = 0; $i < $len; $i++) {
        $str .= chr(ord(substr($data, $i, 1)) + (ord(substr($char, $i, 1)))%256);
    }
    return str_replace(array('+','/','='),array('-','_',''),base64_encode($str));
}

/**
 * 系统解密方法
 * @param  string $data 要解密的字符串 （必须是encrypt方法加密的字符串）
 * @param  string $key  加密密钥
 * @return string
 * @author winky
 */
function decrypt($data, $key = ''){
    $key    = md5(empty($key) ? C('DATA_AUTH_KEY') : $key);
    $data   = str_replace(array('-','_'),array('+','/'),$data);
    $mod4   = strlen($data) % 4;
    if ($mod4) {
       $data .= substr('====', $mod4);
    }
    $data   = base64_decode($data);
    $expire = substr($data,0,10);
    $data   = substr($data,10);

    if($expire > 0 && $expire < time()) {
        return '';
    }
    $x      = 0;
    $len    = strlen($data);
    $l      = strlen($key);
    $char   = $str = '';

    for ($i = 0; $i < $len; $i++){
        if ($x == $l) $x = 0;
        $char .= substr($key, $x, 1);
        $x++;
    }

    for ($i = 0; $i < $len; $i++) {
        if (ord(substr($data, $i, 1))<ord(substr($char, $i, 1))) {
            $str .= chr((ord(substr($data, $i, 1)) + 256) - ord(substr($char, $i, 1)));
        }else{
            $str .= chr(ord(substr($data, $i, 1)) - ord(substr($char, $i, 1)));
        }
    }
    return base64_decode($str);
}

function upload_filter($val){
	$allow_type=array('doc','docx','xls','xlsx','ppt','pptx','dwg','rar','zip','7z','pdf','txt','rtf','jpg','jpeg','png','tip','psd');
	if(in_array($val,$allow_type)){
		return true;
	}else{
		return false;
	}
}

function get_save_path(){
	$app_path=__APP__;
	$save_path=C('SAVE_PATH');
	$app_path=str_replace("/index.php?s=","",$app_path);
	$app_path=str_replace("/index.php","",$app_path);
	return C('SAVE_PATH');
}

function get_save_url(){
	$app_path=__APP__;
	$save_path=C('SAVE_PATH');
	$app_path=str_replace("/index.php?s=","",$app_path);
	$app_path=str_replace("/index.php","",$app_path);
	return $app_path."/".$save_path;
}

function _encode($arr) {
	$na = array();
	foreach ($arr as $k => $value) {
		$na[_urlencode($k)] = _urlencode($value);
	}
	return addcslashes(urldecode(json_encode($na)), "\r\n");
}

function _urlencode($elem) {
	if (is_array($elem)) {
		foreach ($elem as $k => $v) {
			$na[_urlencode($k)] = _urlencode($v);
		}
		return $na;
	}
	return urlencode($elem);
}

function get_img_info($img) {
	$img_info = getimagesize($img);
	if ($img_info !== false) {
		$img_type = strtolower(substr(image_type_to_extension($img_info[2]), 1));
		$info = array("width" => $img_info[0], "height" => $img_info[1], "type" => $img_type, "mime" => $img_info['mime'], );
		return $info;
	} else {
		return false;
	}
}

function get_return_url($level=null){
	if(empty($level)){
		$return_url = cookie('return_url');
	}else{
		$return_url = cookie('return_url_'.$level);
	}
	return $return_url;
}

function get_system_config($code) {
	$model = M("SystemConfig");
	$where['code'] = array('eq', $code);
	$count=$model -> where($where)->count();
	if($count>1){
		return $model -> where($where) -> getfield("val,name");
	}else{
		return $model -> where($where) -> getfield("val");
	}
}

function get_user_config($field) {
	$model = M("UserConfig");
	$user_id = get_user_id();
	$where['id'] = array('eq', $user_id);
	$result = $model -> where($where) -> getfield($field);
	if (empty($result)) {
		return get_system_config(strtoupper($field));
	} else {
		return $result;
	}
}

function get_user_info($id,$field) {
	$model = D("UserView");
	$where['id'] = array('eq', $id);
	$result = $model -> where($where) ->getfield($field);
	//dump($field);
	return $result;
}


function get_dai_step($step) { //取得步骤 是否完成  btn-success
	$model = D("FlowDai");
    $daiid = $_REQUEST['id'];
	$where['id'] = array('eq', $daiid);
	$result = $model -> where($where) ->getfield($step);
	//dump($field);
	if($result == 1){
	    return "btn-success";
	}else if($result == 2){
	    return "btn-danger";
	}
	
}
function get_dai_step_icon($step) { //取得步骤
	$model = D("FlowDai");
    $daiid = $_REQUEST['id'];
	$where['id'] = array('eq', $daiid);
	$result = $model -> where($where) ->getfield($step);
	//dump($field);
	if($result == 1){
	    return "fa-check-circle";
	}else{
	    return "fa-bell";
	}
	
}

function get_user_id() {
	$user_id = session(C('USER_AUTH_KEY'));
	return isset($user_id) ? $user_id : 0;
}

function get_emp_no() {
	$emp_no = session("emp_no");
	return isset($emp_no) ? $emp_no : 0;
}

function del_folder($dir) {
	//打开文件目录
	$dh = opendir($dir);
	//循环读取文件
	while ($file = readdir($dh)) {
		if ($file != '.' && $file != '..') {
			$fullpath = $dir . '/' . $file;

			//判断是否为目录
			if (!is_dir($fullpath)) {
				//echo $fullpath."已被删除<br>";
				//如果不是,删除该文件
				if (!unlink($fullpath)) {
				}
			} else {
				//如果是目录,递归本身删除下级目录
				del_folder($fullpath);
			}
		}
	}
	//关闭目录
	closedir($dh);
	//删除目录

	if (rmdir($dir)) {
		return true;
	} else {
		return false;
	}
}

function get_user_name() {
	$user_name = session('user_name');
	return isset($user_name) ? $user_name : 0;
}

function get_dept_id(){
	return session('dept_id');		
}

function get_dept_name(){
	$result=M("Dept")->find(session("dept_id"));
	return $result['name'];
}

function get_module($str) {
		$arr_str = explode("/", $str);
		return $arr_str[0];
}

function get_bc_class($str){
	$arr_str=explode(" ",$str);
	foreach($arr_str as $val){		
		if(strpos($val,"bc-")!==false){
			return $val;
		}
	}
}

function toDate($time, $format = 'Y-m-d H:i:s') {
	if (empty($time)) {
		return '';
	}
	$format = str_replace('#', ':', $format);
	return date($format, $time);
}

function date_to_int($date) {
	$date = explode("-", $date);
	$time = explode(":", "00:00");
	$time = mktime($time[0], $time[1], 0, $date[1], $date[2], $date[0]);
	return $time;
}

function fix_time($time) {
	return substr($time, 0, 5);
}

function filter_search_field($v1) {
	if ($v1 == "keyword")
		return true;
	$prefix = substr($v1, 0, 3);
	$arr_key = array("be_", "en_", "eq_", "li_", "lt_", "gt_", "bt_");
	if (in_array($prefix, $arr_key)) {
		return true;
	} else {
		return false;
	}
}

function filter_flow_field($val) {	
	if (strpos($val,"flow_field_") !== false){
		return true;
	}else{
		return false;
	}
}

function get_cell_location($col,$row,$col_offset=0,$row_offset=0){
	if(!is_numeric($col)){
		$col=ord($col)-65;
	}
	$location=array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z");
	$col=$col+$col_offset;
	$row=$row+$row_offset;
	return $location[$col].$row;
}

function get_model_fields($model) {
	$arr_field = array();
	if (isset($model -> viewFields)) {
		foreach ($model->viewFields as $key => $val) {
			unset($val['_on']);
			unset($val['_type']);
			if(!empty($val[0])&&($val[0] == "*")){
				$model = M($key);
				$fields = $model -> getDbFields();
				$arr_field = array_merge($arr_field, array_values($fields));
			} else {
				$arr_field = array_merge($arr_field, array_values($val));
			}
		}
	} else {
		$arr_field = $model -> getDbFields();
	}
	return $arr_field;
}

function show_step_type($step) {
	if ($step >= 20 && $step<30) {
		return "审批";
	}
	if ($step >= 30) {
		return "协商";
	}
}

function show_result($result) {
	if ($result == 1) {
		return "同意";
	}
	if ($result == 0) {
		return "否决";
	}
	if ($result == 2) {
		return "退回";
	}	
}

function show_step($step) {
	if ($step == 40) {
		return "通过";
	}
	if ($step > 30) {
		return "协商中";
	}
	if ($step == 30) {
		return "待协商";
	}
	if ($step > 20) {
		return "审批中";
	}
	if ($step == 20) {
		return "待审批";
	}
	if ($step == 10) {
		return "临时保管";
	}
	if ($step == 0) {
		return "否决";
	}
}


function get_flow_field($flowid,$field,$field2) { //取得客户姓名 46
	$flow = D("flow_field_data");
 	$name = $flow ->where('flow_id='.$flowid.' and (field_id = '.$field.' or field_id = '.$field2.')' ) -> find();//.$flowid
	return $name['val'];
}

function get_customer_name($flowid) { //取得客户姓名
	$flow = D("flow_field_data");
	//$name = $flow ->getFieldByflow_id($flowid,'val') ; //根据 floid 取得 step //得到第一个
 	$name = $flow ->where('field_id = 126 AND flow_id='.$flowid ) -> find();//.$flowid
	return $name['val'];
}

// 受理表单  begin -------------------------------------------------
function get_customer_name_46($flowid) { //取得客户姓名 46
	$flow = D("flow_field_data");
 	$name = $flow ->where('field_id = 166 AND flow_id='.$flowid ) -> find();//.$flowid
	return $name['val'];
}

function get_customer_money_46($flowid) { //申请借款金额 46
	$flow = D("flow_field_data");
 	$name = $flow ->where('field_id = 173 AND flow_id='.$flowid ) -> find();//.$flowid
	return $name['val'];
}
function get_customer_tel_46($flowid) { //手机号 46
	$flow = D("flow_field_data");
 	$name = $flow ->where('field_id = 168 AND flow_id='.$flowid ) -> find();//.$flowid
	return $name['val'];
}

function get_customer_for_46($flowid) { //借款用途 46
	$flow = D("flow_field_data");
 	$name = $flow ->where('field_id = 174 AND flow_id='.$flowid ) -> find();//.$flowid
	return $name['val'];
}

function get_customer_cteate_46($flowid) { //申请时间 46
	$flow = D("flow");
 	$name = $flow ->where('id='.$flowid ) -> getField('create_date');//.$flowid
 	// 
	return $name;
}
// 受理表单  end -------------------------------------------------

function get_days($time) { // 相隔时间换成 天数
 //	$time = mktime() - $time;
   // $time = intval($time/3600/24).'天'.date('H小时i分',$time);
    // $time = intval($time/3600/24).'天'.date('H小时i分s秒',$time);
	$timed = mktime() - $time-3600*24;
$sj=floor($timed/3600/24);
	if($sj<0)
	{
$sj=0;
}
 	$timeh = mktime() - $time-3600*8;
    $time = floor($sj).'天'.date('H小时i分',$timeh);
	return $time;
}



// 获得客户信息 -------------------------------------------------

function get_cus_name($flowid){
		$name = M("flow_field_data") -> where("flow_id=$flowid AND (field_id = 377 or field_id = 358)") -> getField('val');
		return $name;
}
function get_cus_money($flowid){
		$name = M("flow_field_data") -> where("flow_id=$flowid AND (field_id = 366 or field_id = 388)") -> getField('val');
		return $name;
}
function get_cus_hy($flowid){
		$name = M("flow_field_data") -> where("flow_id=$flowid AND (field_id = 359 or field_id = 382)") -> getField('val');
		$hy=array("1"=>"金融和保险","2"=>"房地产","3"=>"建筑建材","4"=>"汽车","5"=>"饮食");
		$arr=explode(",",$name);
		// $all = '';
	// 	foreach($arr as $i){
	// 		 $all = $all + $hy[$i];
	// 	}
	//
		return  $hy[$arr[0]].' '.$hy[$arr[1]].' '.$hy[$arr[2]];//$all;//
}
function get_cus_type($flowid){
		$name = M("flow") -> where("id=$flowid") -> getField('type');
		if ($name == 65) {
			return '个人';
		}else{
			return '企业';
		}
}

function get_cus_dy($flowid){
	$name = M("flow_field_data") -> where("flow_id=$flowid AND (field_id = 411 or field_id = 398)") -> getField('val');
	return $name;
}

function get_cus_date($flowid){
	$name = M("flow") -> where("id=$flowid") -> getField('create_time');
	return $name;
}

function get_cus_flow($daiid){ //通过 dai 取得 flowid
	$name = M("flow") -> where("dai=$daiid AND (type = 65 or type =58)") -> getField('id');
	return $name;
}
function get_pay_date($daiid){//通过 dai 取得 flowid  > 通过flowid + data field 370 392 > paytime
	$flowid = M("flow") -> where("dai=$daiid") -> getField('id');
	$timestr = M("flow_field_data") -> where("flow_id=$flowid AND (field_id = 370 or field_id = 392)") -> getField('val');
	return $timestr;
}
function get_pay_danger($daiid){
// // //通过 dai 取得 flowid  > 通过flowid + data field 370 392 > paytime  >判断在上下10天内则 danger
// 	$flowid = M("flow") -> where("dai=$daiid") -> getField('id');
// 	$timestr = M("flow_field_data") -> where("flow_id=$flowid AND (field_id = 370 or field_id = 392)") -> getField('val');
$timestr = M("flow") -> where("id=$daiid") -> getField('create_time');
	$isdanger = date('d H:i:s',mktime()) - date('d',$timestr);
	if ($isdanger >= -3 or $isdanger <=3) {
		return 'danger';
	}
	
}

function get_pay_li($money){//利息计算   未完整
	// $flowid = M("flow") -> where("dai=$daiid") -> getField('id');
// 	$timestr = M("flow_field_data") -> where("flow_id=$flowid AND (field_id = 370 or field_id = 392)") -> getField('val');
$timestr = round($money/12,2);
	return $timestr;
}
// 获得客户信息  end -------------------------------------------------



// 贷款流程评价   -------------------------------------------------
function get_dai_log($daiid,$step) { //贷款流程评价 
	$flow = D("FlowLog");
 	$log = $flow ->where('dai_id='.$daiid.' AND (step ="'.$step.'" OR dostep ="'.$step.'")' ) -> select();//.$flowid
   
    $table = '<table class="table '.$step.' table-striped table-bordered" >
        <tr><th>序号</th><th>步骤</th><th>结果</th><th>备注</th><th>审批时间</th><th>审批人</th></tr>';
    $arrlength=count($log);
    for($x=0;$x<$arrlength;$x++) {
        $id = $x+1;
        
        if ($log[$x]['result'] ==1) {
          $result = '通过 <i class="fa fa-check-circle"></i>';//
          $tr = 'success';
        }else{
            $result = '不通过 <i class="fa fa-exclamation"></i>'; //
          $tr = 'danger';
        }
        $time = date('Y-m-d H:i:s',$log[$x]['create_time']);
        $stepname =  M("DaiStep") -> where("step='".$log[$x]['step']."'") -> getField('name');
        
      $table = $table.'<tr class="'.$tr.'"><td>'.$id.'</td><td>'.$stepname.'</td><td>'.$result.'</td><td>'.$log[$x]['comment'].'</td><td>'.$time.'</td><td>'.$log[$x]['user_name'].'</td></tr>';
      }
    
  $table =  $table.'</table>';
  if ($log) {
     return $table;
  }else{
      // return '';
  }
  
}
// 贷款流程评价   end-------------------------------------------------

// 取得每一步完成时间 -------------------------------------------------
function get_step_done_time($daiid,$dostep) { 
	$flow = M("FlowLog");
 	$time = $flow ->where('dai_id='.$daiid.' AND dostep ="'.$dostep.'" AND result =1' ) -> getField('create_time');;//.$flowid
    if ($time !='') {
        $time = date('Y-m-d H:i',$time);
    }else{
        $time = '';
    }
    return $time;
   
}
// 取得每一步完成时间 end-------------------------------------------------


// 取得每一步处理人（非信贷员步骤） -------------------------------------------------
function get_step_done_man($daiid,$dostep,$default) { 
	$flow = M("FlowLog");
 	$time = $flow ->where('dai_id='.$daiid.' AND dostep ="'.$dostep.'"' ) -> getField('user_name');
    if ($time !='') {
        return $time;
    }else{
        return $default;
    }
   
   
}
// 取得每一步处理人 end-------------------------------------------------

// 取得每一步负责人 -------------------------------------------------
function get_step_man($dai,$step) { 
	$flow = M("DaiStep");
 	$stepname = $flow ->where('step="'.$step.'"' ) -> getField('stepman');
	$user_name = M("FlowDai") -> where("id=$dai") -> getField("user_name");
	
    if ($stepname !='') {
        return $stepname;
    }else{
        return $user_name;
    }
   
   
}
// 取得每一步负责人 end-------------------------------------------------
 
// 根据步骤名取得 步骤状态   -------------------------------------------------
function is_step_done($daiid,$step) {
    $Step = M("FlowDai");
    $done =  $Step -> where("id='".$daiid."'") -> getField($step);
    return $done;
}


// 上一步 下一步   -------------------------------------------------
function pre_step($step) {
    
    $Step = M("DaiStep");
    $now =  $Step -> where("step='".$step."'") -> getField('id');
    $id = $now-1;
    $pre =  $Step -> where("id='".$id."'") -> getField('step');
    return $pre;
}
function next_step($step) {
    $Step = M("DaiStep");
    $now =  $Step -> where("step='".$step."'") -> getField('id');
    $id = $now+1;
    $next =  $Step -> where("id='".$id."'") -> getField('step');
    return $next;
    
}
// 上一步 下一步   end-------------------------------------------------

function dai_step($step) { // 流程步骤名称
    $Step = M("DaiStep");
    $now =  $Step -> where("step='".$step."'") -> getField('name');
    return $now;
}


function type_name($typeid) { //  取得流程类型名字
    $Step = M("FlowType");
    $now =  $Step -> where("id='".$typeid."'") -> getField('name');
    return $now;
}


function progress($flowid) { // 流程 进度百分比
	$flow = D("flow_log");
	//$step = $flow ->getFieldByflow_id($flowid,'step') ; //根据 floid 取得 step //得到第一个
 	$step = $flow ->where('flow_id='.$flowid ) -> select();//.$flowid
		$step =  $step[count($step)-1]['step'];
	if($step == 29) {
		return "90";
	}
	if($step == 28) {
		return "80";
	}
	if ($step == 27) {
		return "70";
	}
	if ($step == 26) {
		return "60";
	}
	if ($step == 25) {
		return "50";
	}
	if ($step == 24) {
		return "40";
	}
	if ($step == 23) {
		return "30";
	}
	if ($step == 22) {
		return "20";
	}
	if ($step == 21) {
		return "10";
	}
}

function nownman($flowid) { // 流程 负责人
	$flow = D("flow_log");
 	$step = $flow ->where('flow_id='.$flowid ) -> select();//.$flowid
	$step =  $step[count($step)-1]['step'];
	$nownman = $flow ->where('step = '.$step.' AND flow_id='.$flowid ) -> select();
	return $nownman[0]['user_name'];
	
}



function IP($ip = '', $file = 'UTFWry.dat') {
	$_ip = array();
	if (isset($_ip[$ip])) {
		return $_ip[$ip];
	} else {
		import("ORG.Net.IpLocation");
		$iplocation = new IpLocation($file);
		$location = $iplocation -> getlocation($ip);
		$_ip[$ip] = $location['country'] . $location['area'];
	}
	return $_ip[$ip];
}

function sort_by($array, $keyname = null, $sortby = 'asc') {
	$myarray = $inarray = array();
	# First store the keyvalues in a seperate array
	foreach ($array as $i => $befree) {
		$myarray[$i] = $array[$i][$keyname];
	}
	# Sort the new array by
	switch ($sortby) {
		case 'asc' :
			# Sort an array and maintain index association...
			asort($myarray);
			break;
		case 'desc' :
		case 'arsort' :
			# Sort an array in reverse order and maintain index association
			arsort($myarray);
			break;
		case 'natcasesor' :
			# Sort an array using a case insensitive "natural order" algorithm
			natcasesort($myarray);
			break;
	}
	# Rebuild the old array
	foreach ($myarray as $key => $befree) {
		$inarray[] = $array[$key];
	}
	return $inarray;
}

function fix_array_key($list, $key) {
	$arr = null;
	foreach ($list as $val) {
		$arr[$val[$key]] = $val;
	}
	return $arr;
}

function fill_option($list,$data) {
	$html = "";
	foreach ($list as $key => $val){
		if(is_array($val)) {
			$id = $val['id'];
			$name = $val['name'];
			if($id==$data){
				$selected="selected";
			}else{
				$selected="";
			}
			$html = $html . "<option value='{$id}' $selected>{$name}</option>";
		} else {
			if($key==$data){
				$selected="selected";
			}else{
				$selected="";
			}
			$html = $html . "<option value='{$key}' $selected>{$val}</option>";
		}
	}
	echo $html;
}

/**
 +----------------------------------------------------------
 * 产生随机字串，可用来自动生成密码
 * 默认长度6位 字母和数字混合 支持中文
 +----------------------------------------------------------
 * @param string $len 长度
 * @param string $type 字串类型
 * 0 字母 1 数字 其它 混合
 * @param string $addChars 额外字符
 +----------------------------------------------------------
 * @return string
 +----------------------------------------------------------
 */
function rand_string($len = 6, $type = '', $addChars = '') {
	$str = '';
	switch ($type) {
		case 0 :
			$chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz' . $addChars;
			break;
		case 1 :
			$chars = str_repeat('0123456789', 3);
			break;
		case 2 :
			$chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ' . $addChars;
			break;
		case 3 :
			$chars = 'abcdefghijklmnopqrstuvwxyz' . $addChars;
			break;
		default :
			// 默认去掉了容易混淆的字符oOLl和数字01，要添加请使用addChars参数
			$chars = 'ABCDEFGHIJKMNPQRSTUVWXYZabcdefghijkmnpqrstuvwxyz23456789' . $addChars;
			break;
	}
	if ($len > 10) {//位数过长重复字符串一定次数
		$chars = $type == 1 ? str_repeat($chars, $len) : str_repeat($chars, 5);
	}
	if ($type != 4) {
		$chars = str_shuffle($chars);
		$str = substr($chars, 0, $len);
	} else {
		// 中文随机字
		for ($i = 0; $i < $len; $i++) {
			$str .= msubstr($chars, floor(mt_rand(0, mb_strlen($chars, 'utf-8') - 1)), 1);
		}
	}
	return $str;
}

function list_to_tree($list, $root = 0, $pk = 'id', $pid = 'pid', $child = '_child') {
	// 创建Tree
	$tree = array();
	if (is_array($list)) {
		// 创建基于主键的数组引用
		$refer = array();
		foreach ($list as $key => $data) {
			$refer[$data[$pk]] = &$list[$key];
		}
		foreach ($list as $key => $data) {
			// 判断是否存在parent
			$parentId = 0;
			if (isset($data[$pid])) {
				$parentId = $data[$pid];
			}
			if ((string)$root == $parentId) {
				$tree[] = &$list[$key];
			} else {
				if (isset($refer[$parentId])) {
					$parent = &$refer[$parentId];
					$parent[$child][] = &$list[$key];
				}
			}
		}
	}
	return $tree;
}

function tree_to_list($tree, $level = 0, $pk = 'id', $pid = 'pid', $child = '_child'){
	$list = array();
	if (is_array($tree)) {
		foreach ($tree as $val) {
			$val['level'] = $level;			
			if (isset($val['_child'])) {
				$child = $val['_child'];
				if (is_array($child)) {
					unset($val['_child']);
					$list[] = $val;
					$list = array_merge($list, tree_to_list($child, $level + 1));
				}
			} else {
				$list[] = $val;
			}
		}
		return $list;
	}
}

function left_menu($tree, $level = 0) {
	$level++;
	$html = "";
	if (is_array($tree)) {
		$html = "<ul class=\"tree_menu\">\r\n";
		foreach ($tree as $val) {
			if (isset($val["name"])) {
				$title = $val["name"];
				if (!empty($val["url"])) {
					$url = U($val['url']);
				} else {
					$url = "#";
				}
				$id = $val["id"];
				if (empty($val["id"])) {
					$id = $val["name"];
				}
				if (isset($val['_child'])) {
					$html = $html . "<li>\r\n<a node=\"$id\" href=\"" . "$url\"><i class=\"fa fa-angle-right level$level\"></i><span>$title</span></a>\r\n";
					$html = $html . left_menu($val['_child'], $level);
					$html = $html . "</li>\r\n";
				} else {
					$html = $html . "<li>\r\n<a  node=\"$id\" href=\"" . "$url\"><i class=\"fa fa-angle-right level$level\"></i><span>$title</span></a>\r\n</li>\r\n";
				}
			}
		}
		$html = $html . "</ul>\r\n";
	}
	return $html;
}

function select_tree_menu($tree){	
	$html = "";
	if (is_array($tree)){
		$list=tree_to_list($tree);			
		foreach ($list as $val){
			$html = $html . "<option value='{$val['id']}'>".str_pad("",$val['level']*3,"│")."├─" ."{$val['name']}</option>";			
		}	
	}
	return $html;
}

function popup_tree_menu($tree, $level = 0){
	$level++;
	$html = "";
	if (is_array($tree)) {
		$html = "<ul class=\"tree_menu\">\r\n";
		foreach ($tree as $val) {
			if (isset($val["name"])) {
				$title = $val["name"];
				$id = $val["id"];
				if (empty($val["id"])) {
					$id = $val["name"];
				}
				if (!empty($val["is_del"])) {
					$del_class = "is_del";
				}else{
					$del_class = "";
				}
				if (isset($val['_child'])) {
					$html = $html . "<li>\r\n<a class=\"$del_class\" node=\"$id\" ><i class=\"fa fa-angle-right level$level\"></i><span>$title</span></a>\r\n";
					$html = $html . popup_tree_menu($val['_child'], $level);
					$html = $html . "</li>\r\n";
				} else {
					$html = $html . "<li>\r\n<a class=\"$del_class\" node=\"$id\" ><i class=\"fa fa-angle-right level$level\"></i><span>$title</span></a>\r\n</li>\r\n";
				}
			}
		}
		$html = $html . "</ul>\r\n";
	}
	return $html;
}

function sub_tree_menu($tree, $level = 0) {
	$level++;
	$html = "";
	if (is_array($tree)) {
		$html = "<ul class=\"tree_menu\">\r\n";
		foreach ($tree as $val) {
			if (isset($val["name"])) {
				$title = $val["name"];
				$id = $val["id"];
				if (empty($val["id"])) {
					$id = $val["name"];
				}
				if (isset($val['_child'])) {
					$html = $html . "<li>\r\n<a node=\"$id\"><i class=\"fa fa-angle-right level$level\"></i><span>$title</span></a>\r\n";
					$html = $html . sub_tree_menu($val['_child'], $level);
					$html = $html . "</li>\r\n";
				} else {
					$html = $html . "<li>\r\n<a  node=\"$id\" ><i class=\"fa fa-angle-right level$level\"></i><span>$title</span></a>\r\n</li>\r\n";
				}
			}
		}
		$html = $html . "</ul>\r\n";
	}
	return $html;
}

function dropdown_menu($tree, $level = 0) {
	$level++;
	$html = "";
	if (is_array($tree)) {
		foreach ($tree as $val) {
			if (isset($val["name"])) {
				$title = $val["name"];
				$id = $val["id"];
				if (empty($val["id"])) {
					$id = $val["name"];
				}
				if (isset($val['_child'])) {
					$html = $html . "<li id=\"$id\" class=\"level$level\"><a>$title</a>\r\n";
					$html = $html . dropdown_menu($val['_child'],$level);
					$html = $html . "</li>\r\n";
				} else {
					$html = $html . "<li  id=\"$id\"  class=\"level$level\">\r\n<a>$title</a>\r\n</li>\r\n";
				}
			}
		}
	}
	return $html;
}

function f_encode($str) {
	$str = base64_encode($str);
	$str = rand_string(10) . $str . rand_string(10);
	$str = str_replace("+", "-", $str);
	$str = str_replace("/", "_", $str);
	$str = str_replace("==", "*", $str);
	return $str;
}

function f_decode($str) {
	$str = str_replace("-", "+", $str);
	$str = str_replace("_", "/", $str);
	$str = str_replace("*", "==", $str);
	$str = substr($str, 10, strlen($str) - 20);
	$str = base64_decode($str);
	return $str;
}

function u_str_pad($cnt, $str) {
	$tmp = '';
	for ($i = 1; $i <= $cnt; $i++) {
		$tmp = $tmp . $str;
	}
	return $tmp;
}

function show_contact($str, $mode = "show"){
	$tmp = '';
	
	if (!empty($str)){
		$contacts = array_filter(explode(';', $str));
		if (count($contacts) > 1) {
			foreach ($contacts as $contact) {
				$arr = explode('|', $contact);
				$name = htmlspecialchars(rtrim($arr[0]));
				$email = htmlspecialchars(rtrim($arr[1]));
				if ($mode == "edit") {
					$tmp = $tmp . "<span data=\"$email\"><nobr><b  title=\"$email\">$name</b><a class=\"del\" title=\"删除\"><i class=\"icon-remove\"></i></a></nobr></span>";
				} else {
					$tmp = $tmp . "<a email=\"$email\" title=\"$email\" >$name;</a>&nbsp;";
				}
			}
		} else {
			$arr = explode('|', $contacts[0]);
			$name = htmlspecialchars(rtrim($arr[0]));
			$email = htmlspecialchars(rtrim($arr[1]));
			$tmp = "";
			if ($mode == "edit"){
				$tmp = $tmp . "<span data=\"$email\"><nobr><b  title=\"$email\">$name</b><a class=\"del\" title=\"删除\"><i class=\"icon-remove\"></i></a></nobr></span>";
			} else {
				$tmp = $tmp . "<a email=\"$email\" title=\"$email\" >$name</a>";
			}
		}
	}
	return $tmp;
}

function show_recent($str) {
	$contacts = explode(';', $str);
	if (count($contacts) > 2) {
		foreach ($contacts as $contact) {
			if (strlen($contact) > 6) {
				$arr = explode('|', $contact);
				$name = rtrim($arr[0]);
				$email = rtrim($arr[1]);
				$tmp = $tmp . "<li><span title=\"$email\">$name</span></li>";
			}
		}
	} else {
		$arr = explode('|', $contacts[0]);
		$name = rtrim($arr[0]);
		$email = rtrim($arr[1]);
		$tmp = "";
		$tmp = $tmp . "<li><span title=\"$email\">$name</span></li>";
	}
	return $tmp;
}

function not_dept($val) {
	if (strrchr($val, "dept@group")) {
		return false;
	} else {
		return true;
	}
}

// 自动转换字符集 支持数组转换
function auto_charset($fContents, $from, $to) {
	$from = strtoupper($from) == 'UTF8' ? 'utf-8' : $from;
	$to = strtoupper($to) == 'UTF8' ? 'utf-8' : $to;
	if (strtoupper($from) === strtoupper($to) || empty($fContents) || (is_scalar($fContents) && !is_string($fContents))) {
		//如果编码相同或者非字符串标量则不转换
		return $fContents;
	}
	if (is_string($fContents)) {
		if (function_exists('mb_convert_encoding')) {
			return mb_convert_encoding($fContents, $to, $from);
		} elseif (function_exists('iconv')) {
			return iconv($from, $to, $fContents);
		} else {
			return $fContents;
		}
	} elseif (is_array($fContents)) {
		foreach ($fContents as $key => $val) {
			$_key = auto_charset($key, $from, $to);
			$fContents[$_key] = auto_charset($val, $from, $to);
			if ($key != $_key)
				unset($fContents[$key]);
		}
		return $fContents;
	} else {
		return $fContents;
	}
}

function getExt($filename) {
	$pathinfo = pathinfo($filename);
	return $pathinfo['extension'];
}

function del_html($str) {
	$str = trim($str);
	$str = preg_replace("/<[^>]*>/i", "", $str);
	$str = ereg_replace("\t", "", $str);
	$str = ereg_replace("\r\n", "", $str);
	$str = ereg_replace("\r", "", $str);
	$str = ereg_replace("\n", "", $str);
	$str = ereg_replace("&nbsp;", "", $str);
	$str = ereg_replace(" ", "", $str);
	$str = ereg_replace("{br}", "<br/>", $str);
	$str = ereg_replace("{}", "&nbsp;", $str);
	return $str;
}

function getfilecounts($ff) {
	$dir = './' . $ff;
	$handle = opendir($dir);
	$i = 0;
	while (false !== $file = (readdir($handle))) {
		if ($file !== '.' && $file != '..') {
			$i++;
		}
	}
	closedir($handle);
	return $i;
}

function show_refer($emp_list) {
	$arr_emp_no = array_filter(explode('|', $emp_list));
	if (count($arr_emp_no) > 1) {
		$model = D("UserView");
		foreach ($arr_emp_no as $emp_no){
			$where['emp_no']=array('eq',substr($emp_no,4));
			$emp = $model ->where($where)->find();
			$emp_no=$emp['emp_no'];
			$user_name=$emp['name'];
			$position_name=$emp['position_name'];
			$str.="<span data=\"$emp_no\" id=\"$emp_no\"><nobr><b title=\"$user_name/$position_name\">$user_name/$position_name</b></nobr><b>;&nbsp;</b></span>";
		}
		return $str;
	} else {
		return "";
	}
}

function show_file($add_file) {
	$files = array_filter(explode(';', $add_file));
	foreach ($files as $file){
		if (strlen($file) > 1) {
			$model = M("File");
			$where['sid']=array('eq',$file);
			$File = $model -> where($where) -> field("id,name,size,extension") -> find();
			echo '<div class="attach_file" style="background-image:url(__PUBLIC__/ico/ico_' . strtolower($File['extension']) . '.jpg); background-repeat:no-repeat;"><a target="_blank" href="__URL__/down/attach_id/' . f_encode($File['id']) . '">' . $File['name'] . ' (' . reunit($File['size']) . ')' . '</a>';
			echo '</div>';
		}
	}
}

function reunit($size) {
	$unit=" B";
	if ($size > 1024) {
		$size = $size / 1024;
		$unit = " KB";
	}
	if ($size > 1024) {
		$size = $size / 1024;
		$unit = " MB";
	}
	if ($size > 1024) {
		$size = $size / 1024;
		$unit = " GB";
	}
	return round($size, 2) . $unit;
}


function rotate($a) {
	$b = array();
	if (is_array($a)) {
		foreach ($a as $val) {
			foreach ($val as $k => $v) {
				$b[$k][] = $v;
			}
		}
	}
	return $b;
}

function utf_strlen($string) {
	return count(mb_str_split($string));
}

function utf_str_sub($string, $cnt) {
	$charlist = mb_str_split($string);
	$new = array_chunk($charlist, $cnt);
	return implode($new[0]);
}

function get_letter($string) {
	$charlist = mb_str_split($string);
	return implode(array_map("getfirstchar", $charlist));
}

function mb_str_split($string) {
	// Split at all position not after the start: ^
	// and not before the end: $
	return preg_split('/(?<!^)(?!$)/u', $string);
}

function getfirstchar($s0) {
	$fchar = ord(substr($s0, 0, 1));
	if (($fchar >= ord("a") and $fchar <= ord("z")) or ($fchar >= ord("A") and $fchar <= ord("Z")))
		return strtoupper(chr($fchar));
	$s = iconv("UTF-8", "GBK", $s0);
	$asc = ord($s{0}) * 256 + ord($s{1}) - 65536;
	if ($asc >= -20319 and $asc <= -20284)
		return "A";
	if ($asc >= -20283 and $asc <= -19776)
		return "B";
	if ($asc >= -19775 and $asc <= -19219)
		return "C";
	if ($asc >= -19218 and $asc <= -18711)
		return "D";
	if ($asc >= -18710 and $asc <= -18527)
		return "E";
	if ($asc >= -18526 and $asc <= -18240)
		return "F";
	if ($asc >= -18239 and $asc <= -17923)
		return "G";
	if ($asc >= -17922 and $asc <= -17418)
		return "H";
	if ($asc >= -17417 and $asc <= -16475)
		return "J";
	if ($asc >= -16474 and $asc <= -16213)
		return "K";
	if ($asc >= -16212 and $asc <= -15641)
		return "L";
	if ($asc >= -15640 and $asc <= -15166)
		return "M";
	if ($asc >= -15165 and $asc <= -14923)
		return "N";
	if ($asc >= -14922 and $asc <= -14915)
		return "O";
	if ($asc >= -14914 and $asc <= -14631)
		return "P";
	if ($asc >= -14630 and $asc <= -14150)
		return "Q";
	if ($asc >= -14149 and $asc <= -14091)
		return "R";
	if ($asc >= -14090 and $asc <= -13319)
		return "S";
	if ($asc >= -13318 and $asc <= -12839)
		return "T";
	if ($asc >= -12838 and $asc <= -12557)
		return "W";
	if ($asc >= -12556 and $asc <= -11848)
		return "X";
	if ($asc >= -11847 and $asc <= -11056)
		return "Y";
	if ($asc >= -11055 and $asc <= -10247)
		return "Z";
	return null;
}

function get_folder_name($id) {

	if ($id == 1) {
		return "收件箱";
	}
	if ($id == 2) {
		return "已发送";
	}
	if ($id == 3) {
		return "草稿箱";
	}
	if ($id == 4) {
		return "已删除";
	}
	if ($id == 5) {
		return "垃圾邮件";
	}

	$model = D("UserFolder");
	$result = $model -> where("id=$id") -> getField("name");
	if ($result) {
		return $result;
	} else {
		return null;
	}
}

function mail_org_string($vo) {
	$count = 0;
	if (!empty($vo['sender_check']) && $count < 1) {
		$count++;
		if ($vo["sender_option"] == 1) {
			$str1 = "包含";
		} else {
			$str1 = "不包含";
		}
		$str2 = $vo['sender_key'];

		$str3 = get_folder_name($vo["to"]);

		$html = "发件人" . $str1 . " " . $str2 . " 则 : 移动到 " . $str3;
	};

	if (!empty($vo['domain_check']) && $count < 1) {
		$count++;
		if ($vo["domain_option"] == 1) {
			$str1 = "包含";
		} else {
			$str1 = "不包含";
		}
		$str2 = $vo['domain_key'];

		$str3 = get_folder_name($vo["to"]);

		$html = "发件域" . $str1 . " " . $str2 . " 则 : 移动到 " . $str3;
	};

	if (!empty($vo['recever_check']) && $count < 1) {
		$count++;
		if ($vo["recever_option"] == 1) {
			$str1 = "包含";
		} else {
			$str1 = "不包含";
		}
		$str2 = $vo['recever_key'];

		$str3 = get_folder_name($vo["to"]);

		$html = "收件人" . $str1 . " " . $str2 . " 则 : 移动到 " . $str3;
	};

	if (!empty($vo['title_check']) && $count < 1) {
		$count++;
		if ($vo["title_option"] == 1) {
			$str1 = "包含";
		} else {
			$str1 = "不包含";
		}
		$str2 = $vo['title_key'];

		$str3 = get_folder_name($vo["to"]);

		$html = "标题中" . $str1 . " " . $str2 . " 则 : 移动到 " . $str3;
	};
	if ($count > 1) {
		$html .= " 等";
	}
	return $html;
}

function status($status) {
	if ($status == 0) {
		return "启用";
	}
	if ($status == 1) {
		return "禁用";
	}
}

function crm_status($status) {
	if ($status == 0) {
		return "未审核";
	}
	if ($status == 1) {
		return "通过";
	}
	if ($status == 2) {
		return "拒绝";
	}
}

function todo_status($status) {
	if ($status == 1) {
		return "尚未进行";
	}
	if ($status == 2) {
		return "正在进行";
	}
	if ($status == 3) {
		return "完成";
	}
}

function mb_unserialize($serial_str) {
	$out = preg_replace('!s:(\d+):"(.*?)";!se', "'s:'.strlen('$2').':\"$2\";'", $serial_str);
	return unserialize($out);
}

function get_sid(){
	return md5(bin2hex(time()).rand_string());
}

function get_position_name($id){
	$data=D('UserView')->find($id);
	//dump($data);
	return $data['position_name'];
}
?>