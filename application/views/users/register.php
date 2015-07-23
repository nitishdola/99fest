<section>
	<h3>Please Register</h3>
	<?php echo validation_errors('<div class="errors">', '</div>'); ?>
	<?php if(!empty($error)): echo $error; endif;?> 
	<?php echo form_open(); ?>
	
	<p>
	<?php echo form_label('First Name :'); ?>
	<?php echo form_input('first_name'); ?>
	</p>
	
	<p>
	<?php echo form_label('Last name :'); ?>
	<?php echo form_input('last_name'); ?>
	</p>

	<p>
	<?php echo form_label('Mobile Number :'); ?>
	<?php echo form_input('mobile_number'); ?>
	</p>
	
	<p>
	<?php echo form_label('Email :'); ?>
	<?php echo form_input('email'); ?>
	</p>

	<p>
	<?php echo form_label('Address :'); ?>
	<?php echo form_textarea('address'); ?>
	</p>

	<p>
	<?php echo form_label('Choose a password :'); ?>
	<?php echo form_password('password'); ?>
	</p>

	<p>
	<?php echo form_label('Confirm Password :'); ?>
	<?php echo form_password('confirm_password'); ?>
	</p>
	
	<p>
	<?php echo form_submit('submit', 'Register'); ?>
	</p>
	<?php echo form_close(); ?>
</section>
	