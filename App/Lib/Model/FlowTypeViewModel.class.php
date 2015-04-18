<?php
/*---------------------------------------------------------------------------
          
 -------------------------------------------------------------------------*/

class FlowTypeViewModel extends ViewModel {
	public $viewFields=array(
		'FlowType'=>array('*'),
		'SystemTag'=>array('name'=>'tag_name','_on'=>'FlowType.tag=SystemTag.id')
		);
}
?>