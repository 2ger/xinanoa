<?php
/*---------------------------------------------------------------------------
  

                                               

  Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )  

                           

  Support: https://git.oschina.net/smeoa/smeoa               
 -------------------------------------------------------------------------*/

class ProductTypeViewModel extends ViewModel {
	public $viewFields=array(
		'ProductType'=>array('*'),
		'SystemTag'=>array('name'=>'tag_name','_on'=>'ProductType.tag=SystemTag.id')
		);
}
?>