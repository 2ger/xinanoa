<?php
/*---------------------------------------------------------------------------
          
 -------------------------------------------------------------------------*/

class FinanceViewModel extends ViewModel {
	public $viewFields=array(
		'Finance'=>array('*'),
		'FinanceAccount'=>array('name'=>'account_name','_on'=>'Finance.account_id=FinanceAccount.id')
		);
}
?>