<link href="<?php echo asset_url(); ?>css/home-style.css" rel="stylesheet">
<link href="<?php echo asset_url(); ?>css/login-style.css" rel="stylesheet">

<style>
body{
	height: 100% !important;
}
	#home{
		min-height: 650px !important;
	}
	
</style>
<section id="home" class="home-section home-parallax home-parallax-login home-fade bg-dark-30">
    <div class="map">
        <iv class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
 
                    <div class="row">

                        <div class="col-sm-6 col-sm-offset-3 form-box">
                            <div class="form-bottom" id="loginForm">
			                    <?php
		                    	$attributes = array('id' => 'logr', 'class' => 'login-form');
								echo form_open('users/login', $attributes);
								?>
			                    	<div class="form-group">
			                    		<label class="sr-only" for="form-username">Email</label>
			                        	
			                        	<?php 
				                        $undata = array(
				                          'name'        => 'email',
				                          'id'          => 'username',
				                          'placeholder' => 'Your email id',
				                          'class'       => 'form-control input',
				                          'required'    => true,
				                        );

				                        ?>
				                        <?php echo form_input($undata);?>
			                        </div>	
			                        <div class="form-group">
			                        	<label class="sr-only" for="form-password">Password</label>
			                        	<?php 
				                        $pwdata = array(
				                          'name'        => 'password',
				                          'id'          => 'password',
				                          'placeholder' => 'Password',
				                          'class'       => 'form-control input',
				                          'required'    => true,
				                          'type'		=> 'password',
				                        );

				                        ?>
				                        <?php echo form_input($pwdata);?>
			                        </div>
			                        <button type="submit" class="btn">Sign in!</button>
			                    <?php echo form_close(); ?>
			                    <div class="new-user-login">
			                    
			                    	New user create account <a href="#" id="showSignUpForm"> Register Here</a>
			                    	<div class="col-md-8" style="float:right">
				                 		Or Login With
				                    	<a href="auth_oa2/session/facebook" class="facebook-icon" role="button"><i class="fa fa-facebook-official"></i> Login</a>
				                    	<a href="auth_oa2/session/google" class="google-icon" role="button"><i class="fa fa-google-plus"></i> Login</a>
				                    </div>
			                    </div>

			                    
		                    </div>


		                    <div class="form-bottom" id="signupForm" style="display:none">
		                    	<?php
		                    	$attributes = array('id' => 'logf', 'class' => 'login-form');
								echo form_open('users/register', $attributes);
								?>
		                    		<div class="row">
		                    			<div class="col-md-6">
					                    	<div class="form-group">
					                    		<label class="sr-only" for="form-username">First Name</label>
					                        	<?php 
						                        $fndata = array(
						                          'name'        => 'first_name',
						                          'id'          => 'first_name',
						                          'placeholder' => 'Enter your first name',
						                          'class'       => 'form-control input',
						                        );

						                        ?>
						                        <?php echo form_input($fndata);?>
					                        </div>
					                    </div>

					                    <div class="col-md-6">
					                        <div class="form-group">
					                    		<label class="sr-only" for="form-username">Last Name</label>
					                        	<?php 
						                        $lndata = array(
						                          'name'        => 'last_name',
						                          'id'          => 'last_name',
						                          'placeholder' => 'Enter your last name',
						                          'class'       => 'form-control input',
						                          'required'    => true,
						                        );

						                        ?>
						                        <?php echo form_input($lndata);?>
					                        </div>
					                    </div>
					                    <div class="col-md-6">
					                        <div class="form-group">
					                    		<label class="sr-only" for="form-username">Mobile Number</label>
					                        	<input type="text" name="form-username" placeholder="Mobile Number" class="form-username form-control" id="form-username">
					                        </div>
				                        </div>
				                        <div class="col-md-6">
				                    	<div class="form-group">
				                    		<label class="sr-only" for="form-username">Email</label>
				                        	<?php 
					                        $edata = array(
					                          'name'        => 'email',
					                          'id'          => 'email',
					                          'type'        => 'email',
					                          'placeholder' => 'Enter your email id',
					                          'class'       => 'form-control input',
					                          'required'    => true,
					                        );

					                        ?>
					                        <?php echo form_input($edata);?>
				                        </div>
				                        </div>
				                        <div class="col-md-6">
					                        <div class="form-group">
					                        	<label class="sr-only" for="form-password">Password</label>
					                        	<?php 
						                        $pdata = array(
						                          'name'        => 'password',
						                          'id'          => 'password',
						                          'placeholder' => 'Choose a password',
						                          'class'       => 'form-control input',
						                          'type'        => 'password',
						                          'required'    => true,
						                        );

						                        ?>
						                        <?php echo form_input($pdata);?>
					                        </div>
				                        </div>

				                        <div class="col-md-6">
					                        <div class="form-group">
					                        	<label class="sr-only" for="form-password">Confirm Password</label>
					                        	<?php 
						                        $cpdata = array(
						                          'name'        => 'confirm_password',
						                          'id'          => 'confirm_password',
						                          'placeholder' => 'Type your password again',
						                          'class'       => 'form-control input',
						                          'type'        => 'password',
						                          'required'    => true,
						                        );

						                        ?>
						                        <?php echo form_input($cpdata);?>
					                        </div>
				                        </div>

				                        
				                    </div>
				                    <?php echo form_submit('loginSubmit', 'Register',"class='btn'"); ?>
			                        
			                    	<?php echo form_close(); ?>
			                    
			                    <div class="new-user-login">

			                    	Already have an account ?  <a href="#" id="showLoginForm">Login Here</a>
			                    </div>
		                    </div>

                        </div>
                    </div>
     
                </div>
            </div>
            
        </div>
</section>
<script src="<?php echo asset_url(); ?>js/login.js"></script>
<!-- Home end -->


<hr class="divider-w">
<!-- Divider -->

