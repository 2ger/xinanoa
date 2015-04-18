<?php
/*---------------------------------------------------------------------------
  

                                               

  Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )  

                           

  Support: https://git.oschina.net/smeoa/smeoa               
 -------------------------------------------------------------------------*/


class NoticeViewModel extends ViewModel {
	public $viewFields=array(
		'Notice'=>array('*'),
		'SystemFolder'=>array('name'=>'folder_name','_on'=>'Notice.folder=SystemFolder.id')
		);
}
?>