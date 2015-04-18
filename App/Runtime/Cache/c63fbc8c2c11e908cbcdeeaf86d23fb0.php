<?php if (!defined('THINK_PATH')) exit();?><select class="flow_field_<?php echo ($id); ?>" id="flow_field_<?php echo ($id); ?>" name="flow_field_<?php echo ($id); ?>" <?php if(!empty($validate)): ?>check="<?php echo ($validate); ?>" msg="<?php echo ($msg); ?>"<?php endif; ?>>	
	<?php echo fill_option($control_data,$val);?>;
</select>