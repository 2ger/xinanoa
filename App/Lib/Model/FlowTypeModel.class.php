<?php
/*---------------------------------------------------------------------------
        
 -------------------------------------------------------------------------*/


class FlowTypeModel extends CommonModel {
	// 自动验证设置
	protected $_validate	 =	 array(
		array('name','require','名称必须',1),
		array('short','require','简称必须',1),
		array('doc_no_format','require','文档编码格式必须',1),		 
		array('content','require','表单必须'),
		);

	function _after_insert($data,$options){
		$tid=$data["tid"];
		M("Forum")->where("id=$tid")->setInc("reply",1);
	}
}
?>