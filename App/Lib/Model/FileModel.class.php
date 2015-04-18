<?php
/*---------------------------------------------------------------------------
  С΢OAϵͳ - �ù��������ɿ��� 

                                               

  Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )  

                           

  Support: https://git.oschina.net/smeoa/smeoa               
 -------------------------------------------------------------------------*/

class FileModel extends CommonModel {

	function get_list($sid){
		if (is_array($sid)) {
			$where['sid'] = array("in", array_filter($sid));
		} else {
			$where['sid'] = array('in', array_filter(explode(';', $sid)));
		}
		$list=M("File")->where($where)->getFiled('id','save_name');
		return $list;
	}
}
?>