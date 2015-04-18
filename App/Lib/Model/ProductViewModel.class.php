<?php
/*---------------------------------------------------------------------------
  

                                               

  Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )  

                           

  Support: https://git.oschina.net/smeoa/smeoa               
 -------------------------------------------------------------------------*/

class ProductViewModel extends ViewModel {
	public $viewFields=array(
		'Product'=>array('*'),
		'ProductType'=>array('name'=>'type_name','_on'=>'ProductType.id=Product.type')
		);
}
?>