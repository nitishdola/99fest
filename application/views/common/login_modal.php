<!---SignIn/SignUp Modal-->
<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="loginModalLabel">Sign In</h4>
      </div>
      <div class="modal-body">
        <div class="row" id="registration" style="display:none">

            <?php echo form_open("users/register");?>

            <div class="col-md-6">
                <div class="form-group">
                    <label>First Name <span class="text-hightlight">*</span></label>
                    <?php 
                    $fndata = array(
                      'name'        => 'first_name',
                      'id'          => 'first_name',
                      'placeholder' => 'Enter your first name',
                      'class'       => 'form-control',
                    );

                    ?>
                    <?php echo form_input($fndata);?>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Last Name <span class="text-hightlight">*</span></label>
                    <?php 
                    $lndata = array(
                      'name'        => 'last_name',
                      'id'          => 'last_name',
                      'placeholder' => 'Enter your last name',
                      'class'       => 'form-control',
                      'required'    => true,
                    );

                    ?>
                    <?php echo form_input($lndata);?>
                </div>
            </div>
            <div class="col-md-7">
                <div class="form-group">
                    <label>E-mail <span class="text-hightlight">*</span></label>
                    <?php 
                    $edata = array(
                      'name'        => 'email',
                      'id'          => 'email',
                      'placeholder' => 'Enter your email id',
                      'class'       => 'form-control',
                      'required'    => true,
                    );

                    ?>
                    <?php echo form_input($edata);?>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Password <span class="text-hightlight">*</span></label>
                    <?php 
                    $pdata = array(
                      'name'        => 'password',
                      'id'          => 'password',
                      'placeholder' => 'Choose a password',
                      'class'       => 'form-control',
                      'type'        => 'password',
                      'required'    => true,
                    );

                    ?>
                    <?php echo form_input($pdata);?>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Confirm Password <span class="text-hightlight">*</span></label>
                    <?php 
                    $cpdata = array(
                      'name'        => 'confirm_password',
                      'id'          => 'confirm_password',
                      'placeholder' => 'Type your password again',
                      'class'       => 'form-control',
                      'type'        => 'password',
                      'required'    => true,
                    );

                    ?>
                    <?php echo form_input($cpdata);?>
                </div>
            </div>
            <div class="col-md-6">
                <?php echo form_submit('loginSubmit', 'Register',"class='btn btn-primary btn-lg pull-right'"); ?>
            </div>

            <?php echo form_close();?>
        </div>

        <div class="row" id="login">

        <?php echo form_open("users/login");?>

            <div class="col-md-6">
                <div class="col-md-8">
                    <a class="btn btn-block btn-social btn-facebook">
                        <i class="fa fa-facebook"></i> Sign in with Facebook
                    </a>

                    <a class="btn btn-block btn-social btn-google">
                        <i class="fa fa-google"></i> Sign in with G+
                    </a>
                </div>
            </div>


            <div class="col-md-6">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Email <span class="text-hightlight">*</span></label>
                        <input type="email" name="email" class="form-control" placeholder="Enter your email id abc@xyz.com"/>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Passwod <span class="text-hightlight">*</span></label>
                        <input type="password" name="password" class="form-control" placeholder="Enter password" />
                    </div>
                </div>
                <div class="col-md-12">
                    <?php echo form_submit('loginSubmit', 'Login',"class='btn btn-primary btn-lg pull-right'"); ?>
                </div>
                <?php echo form_close();?>

            </div>

            
        </div>

      </div>
      <div class="modal-footer">
        <p id="regi_footer">Don't have an account yet? <a href="#" id="regi">Register Here</a></p>
        <p id="login_footer" style="display:none;">Already have an account ? <a href="#" id="logi">Login Here</a></p>
      </div>
    </div>
  </div>
</div>