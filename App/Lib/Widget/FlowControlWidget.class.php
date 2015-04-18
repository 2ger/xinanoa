<?php
class FlowControlWidget extends Widget {
	public function render($data){
		$control_type=$data['control_type'];
		switch ($control_type){
			case 'text':
				$content = $this->renderFile('text',$data);	
				break;
			case 'date':
				$content = $this->renderFile('date',$data);	
				break;
			case 'datem':
				$content = $this->renderFile('datem',$data);	
				break;
			case 'dated':
				$content = $this->renderFile('dated',$data);	
				break;
			case 'file':
				$content = $this->renderFile('file',$data);	
				break;
			case 'select':
				$data['control_data']=$this->conv_control_data($data['control_data']);
				$content = $this->renderFile('select',$data);
				break;
			case 'radio':
				$data['control_data']=$this->conv_control_data($data['control_data']);
				$content = $this->renderFile('radio',$data);
				break;	
			case 'checkbox':
				$data['control_data']=$this->conv_control_data($data['control_data']);
				$val=$data['val'];
				$data['val']=explode(",",$val);
				$content = $this->renderFile('checkbox',$data);
				break;
			case 'textarea':
				$content = $this->renderFile('textarea',$data);
				break;
            case 'add':
    			$content = $this->renderFile('add',$data);
    				break;
			case 'editor':
				$content = $this->renderFile('editor',$data);
				break;
			case 'simple':
				$content = $this->renderFile('simple',$data);
				break;
			case 'help':
				$content = $this->renderFile('help',$data);
				break;
			case 'hr':
				$content = $this->renderFile('hr',$data);
				break;
			default:				
				break;
		}
		return $content;
	}

	function conv_control_data($val){
		$new=array();
		$arr_tmp=explode(",",$val);
		foreach($arr_tmp as $item){
			$tmp=explode("|",$item);
			$new[$tmp[0]]=$tmp[1];
		}
		return $new;
	}
}
?>