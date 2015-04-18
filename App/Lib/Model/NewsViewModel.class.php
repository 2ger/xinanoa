<?php
/*---------------------------------------------------------------------------
  

                                               

  Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )  

                           

  Support: https://git.oschina.net/smeoa/smeoa               
 -------------------------------------------------------------------------*/

class NewsViewModel extends ViewModel {
	public $viewFields=array(
		'News'=>array('*'),
		'SystemFolder'=>array('name'=>'folder_name','_on'=>'News.folder=SystemFolder.id')
		);
}
?>