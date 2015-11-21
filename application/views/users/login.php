<style>
li,ul,body,input{margin:0; padding:0; list-style:none}
#login-form{width:350px; background:#FFF; margin:0 auto; background:#f8f8f8; overflow:hidden; border-radius:7px}
.form-header{display:table; clear:both}
.form-header label{display:block; cursor:pointer; z-index:999}
.form-header li{margin:0; line-height:60px; width:175px; text-align:center; background:#eee; font-size:18px; float:left; transition:all 600ms ease}

/*sectiop*/
.section-out{width:700px; float:left; transition:all 600ms ease}
.section-out:after{content:''; clear:both; display:table}
.section-out section{width:350px; float:left}

.login{padding:20px}
.ul-list{clear:both; display:table; width:100%}
.ul-list:after{content:''; clear:both; display:table}
.ul-list li{ margin:0 auto; margin-bottom:12px}
.input{background:#fff; transition:all 800ms; width:247px; border-radius:3px 0 0 3px; font-family: 'Ropa Sans', sans-serif; border:solid 1px #ccc; border-right:none; outline:none; color:#999; height:40px; line-height:40px; display:inline-block; padding-left:10px; font-size:16px}
.input,.login span.icon{vertical-align:top}
.login span.icon{width:50px; transition:all 800ms; text-align:center; color:#999; height:40px; border-radius:0 3px 3px 0; background:#e8e8e8; height:40px; line-height:40px; display:inline-block; border:solid 1px #ccc; border-left:none; font-size:16px}
.input:focus:invalid{border-color:red}
.input:focus:invalid+.icon{border-color:red}
.input:focus:valid{border-color:green}
.input:focus:valid+.icon{border-color:green}
#check,#check1{top:1px; position:relative}
.btn{border:none; outline:none; background:#0099CC; border-bottom:solid 4px #006699; font-family: 'Ropa Sans', sans-serif; margin:0 auto; display:block; height:40px; width:100%; padding:0 10px; border-radius:3px; font-size:16px; color:#FFF}

.social-login{padding:15px 20px; background:#f1f1f1; border-top:solid 2px #e8e8e8; text-align:right}
.social-login a{display:inline-block; height:35px; text-align:center; line-height:35px; width:35px; margin:0 3px; text-decoration:none; color:#FFFFFF}
.form a i.fa{line-height:35px}
.fb{background:#305891} .tw{background:#2ca8d2} .gp{background:#ce4d39} .in{background:#006699}
.remember{width:50%; display:inline-block; clear:both; font-size:14px}
.remember:nth-child(2){text-align:right}
.remember a{text-decoration:none; color:#666}

.hide{display:none}

/*swich form*/
#signup:checked~.section-out{margin-left:-350px}
#login:checked~.section-out{margin-left:0px}
#login:checked~div .form-header li:nth-child(1),#signup:checked~div .form-header li:nth-child(2){background:#e8e8e8}
.add1{margin:0 auto; width:720px}

</style>
<!-- Wrapper start -->

<div class="main">

	<!-- Event list start -->
	<section class="first-module">
		<div class="container">
			<div class="row">
				<?php if($this->session->flashdata('error_message') != '') { ?>
                    
                    <div class="alert alert-danger fade in">

                        <a href="#" class="close" data-dismiss="alert">&times;</a>

                        <strong>Error!</strong> <?= $this->session->flashdata('error_message'); ?>

                    </div>

                    <?php } ?>

                    <?php if($this->session->flashdata('success_message') != '') { ?>
                    
                    <div class="alert alert-success fade in">

                        <a href="#" class="close" data-dismiss="alert">&times;</a>

                        <strong>Success !</strong> <?= $this->session->flashdata('success_message'); ?>

                    </div>

                    <?php } ?>
			</div>

			
			<div class="row">
				<div id="login-form">
					

					<div class="section-out">
						<section class="login-section">
						<div class="login">
						<?php echo form_open('users/login');?>
						<ul class="ul-list">
							<li>
								
								<?php 
								$email_attributes = array(
									'name'	=> 'email',
									'required' => 'required',
									'placeholder' => 'Your email',
									'class'	=> 'input',
								);
								echo form_input($email_attributes); ?><span class="icon"><i class="fa fa-user"></i></span>
							</li>
							<li>
							<?php 
								$password_attributes = array(
									'name'	=> 'password',
									'required' => 'required',
									'placeholder' => 'Password',
									'class'	=> 'input',
									'type' 	=> 'password',
								);
								echo form_input($password_attributes); ?><span class="icon"><i class="fa fa-lock"></i></span>
							</li>
							
							<li>
								<?php 
								$sub_attributes = array(
									'name'	=> 'submit',
									'value' => 'SIGN IN',
									'class'	=> 'btn',
								);
								echo form_submit($sub_attributes); ?>
							</li>
						</ul>
						<?php echo form_close(); ?>
					</div>

					<div class="social-login">Or sign in with &nbsp;
					<a href="" class="fb"><i class="fa fa-facebook"></i></a>
					<a href="" class="tw"><i class="fa fa-twitter"></i></a>
					<a href="" class="gp"><i class="fa fa-google-plus"></i></a>
					<a href="" class="in"><i class="fa fa-linkedin"></i></a>
					</div>
					</section>

					<section class="signup-section">
					<div class="login">
					<form action="">
					<ul class="ul-list">
					<li><input type="email" required class="input" placeholder="Your Email"/><span class="icon"><i class="fa fa-user"></i></span></li>
					<li><input type="password" required class="input" placeholder="Password"/><span class="icon"><i class="fa fa-lock"></i></span></li>
					<li><input type="checkbox" id="check1"> <label for="check1">I accept terms and conditions</label></li>
					<li><input type="submit" value="SIGN UP" class="btn"></li>
					</ul>
					</form>
					</div>

					<form class="form-signin" role="form">
            <?php if (@$user_profile):  // call var_dump($user_profile) to view all data ?>
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <img class="img-thumbnail" data-src="holder.js/140x140" alt="140x140" src="https://graph.facebook.com/<?=$user_profile['id']?>/picture?type=large" style="width: 140px; height: 140px;">
                        <h2><?=$user_profile['name']?></h2>
                        <a href="<?=$user_profile['link']?>" class="btn btn-lg btn-default btn-block" role="button">View Profile</a>
                        <a href="<?= $logout_url ?>" class="btn btn-lg btn-primary btn-block" role="button">Logout</a>
                    </div>
                </div>
            <?php else: ?>


            	


                <h2 class="form-signin-heading">Login with Facebook</h2>
                <a href="<?= $login_url ?>" class="btn btn-lg btn-primary btn-block" role="button">Login</a>
            <?php endif; ?>
            <a href="https://github.com/puneetkay/Facebook-PHP-CodeIgniter" class="btn btn-lg btn-success btn-block" target="_blank" role="button">View Source on Github</a>

            <div class="footer">
                <p>With <i class="fa fa-heart"></i> by <a href='http://puneetk.com/' target="_blank" title="Puneet Kalra">Puneet Kalra</a>.</p>
            </div>
        </form>
					</section>
					</div>

					</div>
			</div>
		</div>
	</section>
</div>



	