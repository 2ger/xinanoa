<?php
/*---------------------------------------------------------------------------
  

                                               

  Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )  

                           

  Support: https://git.oschina.net/smeoa/smeoa               
 -------------------------------------------------------------------------*/

class PushViewModel extends ViewModel {
	public $viewFields=array(
		'Push'=>array('*'),
		'User'=>array('name','openid','_on'=>'Push.user_id=User.id')
		);
}
?>