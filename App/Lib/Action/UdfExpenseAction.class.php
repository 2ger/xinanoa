<?php
/*---------------------------------------------------------------------------


 

 Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )

 

 Support: https://git.oschina.net/smeoa/smeoa
 -------------------------------------------------------------------------*/

class UdfExpenseAction extends UdfAction {
	protected $config=array('app_type'=>'common','action_auth'=>array('mark'=>'admin'));	
	protected $first_row = 2; 
	protected $field_count =7; 
	//过滤查询字段
	function _search_filter(&$map){		
		if($this->config['auth']['admin']==false){
			$map['emp_no'] = array('eq',get_emp_no());
		}			
		if (!empty($_POST['keyword'])){
			$map['B|C'] = array('like', "%" . $_POST['keyword'] . "%");
		}
	}

	public function index(){
		$this -> assign('auth',$this -> config['auth']);
		$this->_index();
	}
}
?>