<?php if (!defined('THINK_PATH')) exit();?><div class="form-inline flow_field_<?php echo ($id); ?>">
	<?php if(is_array($control_data)): foreach($control_data as $key=>$control_vo): ?><label>
			<input name="flow_field_<?php echo ($id); ?>" class="ace" type="radio" value="<?php echo ($key); ?>"  <?php if(in_array(($key), is_array($val)?$val:explode(',',$val))): ?>checked<?php endif; ?>>
			<span class="lbl"><?php echo ($control_vo); ?></span>
		</label><?php endforeach; endif; ?>
</div>