<?php if (!defined('THINK_PATH')) exit();?><div id="uploader">
	<a id="pickfiles" href="javascript:;" class="btn btn-sm btn-default">添加附件</a>
		<ul id="file_list" new_upload="" >
		</ul>	
</div>

<input class="form-control flow_field_<?php echo ($id); ?> hidden" type="text" name="flow_field_<?php echo ($id); ?>" id="flow_field_<?php echo ($id); ?>" value="<?php echo ($val); ?>" <?php if(!empty($validate)): ?>check="<?php echo ($validate); ?>" msg="<?php echo ($msg); ?>"<?php endif; ?>>