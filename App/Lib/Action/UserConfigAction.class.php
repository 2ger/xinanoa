<?php
/*---------------------------------------------------------------------------
  

                                               

  Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )  

                           

  Support: https://git.oschina.net/smeoa/smeoa               
 -------------------------------------------------------------------------*/

class UserConfigAction extends CommonAction {
	protected $config=array('app_type'=>'personal');
	public function index(){
		$config=M("UserConfig")->find(get_user_id());
		$this->assign("config",$config);
		$this -> display();
	}

	function save(){
		$config = M("UserConfig") -> find(get_user_id());		
		if (count($config)) {
			$this -> _update();
		} else {
			$this ->_insert();
		}
	}

	function _insert() {
		$model = M('UserConfig');
		if (false === $model -> create()) {
			$this -> error($model -> getError());
		}

		$model->push_web=implode(",",$model->push_web);
		$model->push_wechat=implode(",",$model->push_wechat);

		//保存当前数据对象
		$list = $model -> add();
		if ($list !== false) {//保存成功		
			$this -> assign('jumpUrl', get_return_url());
			$this -> success('新增成功!');
		} else {
			//失败提示
			$this -> error('新增失败!');
		}
	}

	function _update() {
		//B('FilterString');
		$model = M('UserConfig');
		if (false === $model -> create()) {
			$this -> error($model -> getError());
		}
		$model->push_web=implode(",",$model->push_web);
		$model->push_wechat=implode(",",$model->push_wechat);

		$model -> id = get_user_id();
		// 更新数据
		$list = $model -> save();
		if (false !== $list) {
			//成功提示
			$this -> assign('jumpUrl', get_return_url());
			$this -> success('编辑成功!');
		} else {
			//错误提示
			$this -> error('编辑失败!');
		}
	}

}
?>