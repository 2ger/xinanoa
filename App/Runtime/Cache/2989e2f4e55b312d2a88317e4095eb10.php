<?php if (!defined('THINK_PATH')) exit();?>	<div class="form-inline flow_field_<?php echo ($id); ?>">
	<?php if(is_array($control_data)): foreach($control_data as $key=>$control_vo): ?><label>
			<input name="flow_field_<?php echo ($id); ?>[]" class="ace" type="checkbox" value="<?php echo ($key); ?>" <?php if(in_array(($key), explode(',',"1"))): ?>checked<?php endif; ?>>
			<span class="lbl"><?php echo ($control_vo); ?></span>
		</label><?php endforeach; endif; ?>
</div>