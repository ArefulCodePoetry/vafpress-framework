<?php echo VP_View::get_instance()->load('control/template_control_head', $head_info); ?>

<label>
	<input <?php if( $value ) echo 'checked'; ?> type="checkbox" name="<?php echo $name; ?>" value="1" />
	<span></span>
</label>

<?php echo VP_View::get_instance()->load('control/template_control_foot'); ?>