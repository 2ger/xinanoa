<?php if (!defined('THINK_PATH')) exit();?><textarea class="form-control flow_field_<?php echo ($id); ?>" id="flow_field_<?php echo ($id); ?>" name="flow_field_<?php echo ($id); ?>" rows="3" <?php if(!empty($validate)): ?>check="<?php echo ($validate); ?>" msg="<?php echo ($msg); ?>"<?php endif; ?>><?php echo ($val); ?></textarea>