<?php
/*---------------------------------------------------------------------------
  

                                               

  Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )  

                           

  Support: https://git.oschina.net/smeoa/smeoa               
 -------------------------------------------------------------------------*/

class XmkReportModel extends CommonModel {
	// 自动验证设置
	protected $_validate	 =	 array(
		//array('name','require','文件名必须',1),
		array('content','require','内容必须'),
		);
 
	function _after_insert($data,$options){
		$xid=$data["xid"];
		M("Xmk")->where("id=$xid")->setField("update_time",time());
	}
}	
?>