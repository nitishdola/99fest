<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">

    <div class="container">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#custom-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        
            <?php echo anchor('/','99fest',  'class="navbar-brand"') ?>
        </div>

        <style>
        .dropdown-menu {
            float: right;
            text-align: center;
        }
        .dropdown-menu a {
            font-size: 0.92em;
            font-family: "Roboto Condensed", sans-serif;
            text-transform: uppercase;
        }
        .dropdown-menu i {
            padding-right: 3%;
        }
        .link a:hover{
            background: none !important;
        }
  
        </style>

        <div class="collapse navbar-collapse" id="custom-collapse">

            <ul class="nav navbar-nav navbar-right">
                <?php if(!$login){ ?>
                <li class="">
                    <a href="#" data-toggle="modal" data-target="#loginModal">LOGIN</a>
                </li>
                <?php }else{ ?>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">HI  <?php echo ucfirst($display_name); ?> !</a>
                    <ul class="dropdown-menu">
                    <?php if(isset($is_customer)){

                        if($is_customer) { ?>
                        <li><?php echo anchor('/myprofile', '<i class="fa fa-user"></i> Profile'); 
                            ?>
                        </li>
                        <?php } 
                        }
                        ?>
                        <?php if(isset($is_admin) && $is_admin == TRUE) { ?>
                        <li><?php echo anchor('/admin', '<i class="fa fa-user"></i>Admin Profile'); 
                            ?>
                        </li>
                        <?php } ?>
                        <?php  if(isset($is_event_manager) && $is_event_manager == TRUE){ ?>
                        <li><?php echo anchor('/event_managers/profile/', '<i class="fa fa-user"></i> Profile'); 
                            ?>
                        </li>
                        <?php } ?>

                        <?php  if(isset($is_vendor) && $is_vendor == TRUE){ ?>
                        <li><?php echo anchor('/vendors/profile/', '<i class="fa fa-user"></i> Profile'); 
                            ?>
                        </li>
                        <?php } ?>


                        <li><?php echo anchor('logout', '<i class="fa fa-sign-out"></i>Sign Out'); 
                            ?>
                        </li>
                    </ul>
                </li>
                <?php } ?>

                <li class=""><a class="menu-icon" href="#"><i class="fa fa-bars"></i></a></li>
                <ul class="side-menu">
                  
                  <li class="link" style="margin-top:140px"><?php echo anchor('/', 'Home'); ?></li>
                  <li class="link" style="margin-top:140px"><?php echo anchor('/about', 'About Us'); ?></li>
                  <li class="link" style="margin-top:140px"><?php echo anchor('/team', 'Team'); ?></li>
                  <li class="link" style="margin-top:140px"><?php echo anchor('/contact', 'Contact'); ?></li>
                
                </ul>
                
            </ul>
        </div>

    </div>

</nav>

<style>
#loginModal a {
    color:#FFF;
}
.btn-facebook{
    background: #4862A3;
}
.btn-google {  
    background: #A52714
}
.fa-fa-google {
    color: #FFF;
}
.fa-facebook {
    color: #FFF;
}
a#regi{
    color:#222;
}
a#logi{
    color:#333;
}
.input {
    text-transform: none;
}
.mobilenav li:hover{
    background: #7A26E8;
}
</style>
<div class="mobilenav">
    <li><?php echo anchor('/', 'Home'); 
                            ?></li>
    <li><?php echo anchor('about', 'About Us'); 
                            ?></li>
    <li><?php echo anchor('team', 'Team'); 
                            ?></li>
    <li><?php echo anchor('contact', 'Contact'); 
                            ?></li>
</div>

<?php if(!$login){ ?>


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
                <div class="col-md-12">
                    
                    <div class="col-md-5 btn-facebook">
                        <a class="btn btn-block btn-social">
                            <i class="fa fa-facebook"></i> Sign up with Facebook
                        </a>
                    </div>

                    <div class="col-md-5 btn-google" style="margin-left:2%">
                        <a class="btn btn-block btn-social">
                            <i class="fa fa-google"></i> Sign up with G+
                        </a>
                    </div>`
                   
                </div>
                <div class="col-md-12" style="padding:2%; text-align:center">OR</div>
                <?php echo form_open("users/register");?>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>First Name <span class="text-hightlight">*</span></label>
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
                        <label>Last Name <span class="text-hightlight">*</span></label>
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
                <div class="col-md-7">
                    <div class="form-group">
                        <label>E-mail <span class="text-hightlight">*</span></label>
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
                        <label>Password <span class="text-hightlight">*</span></label>
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
                        <label>Confirm Password <span class="text-hightlight">*</span></label>
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
                <div class="col-md-6">
                    <?php echo form_submit('loginSubmit', 'Register',"class='btn btn-primary btn-lg pull-right'"); ?>
                </div>

                <?php echo form_close();?>
            </div>

            <div class="row" id="login">

            <?php echo form_open("users/login");?>

                <div class="col-md-6">
                    <div class="col-md-12 btn-facebook">
                        <a class="btn btn-block btn-social">
                            <i class="fa fa-facebook"></i> Sign in with Facebook
                        </a>
                    </div>

                    <div class="col-md-12 btn-google" style="margin-top:2%">
                        <a class="btn btn-block btn-social">
                            <i class="fa fa-google"></i> Sign in with G+
                        </a>
                    </div>`
                </div>


                <div class="col-md-6">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Email <span class="text-hightlight">*</span></label>
                            <input type="email" name="email" class="form-control input" placeholder="Enter your email id abc@xyz.com"/>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Passwod <span class="text-hightlight">*</span></label>
                            <input type="password" name="password" class="form-control input" placeholder="Enter password" />
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

    <script>
    $('#regi').click(function(e) {
        e.preventDefault();
        $('#login').hide();
        $('#registration').fadeIn();

        $('#regi_footer').hide();
        $('#login_footer').show();

        $('#loginModalLabel').text('Register');
    });

    $('#logi').click(function(e) {
        e.preventDefault();
        $('#registration').hide();
        $('#login').fadeIn();

        $('#login_footer').hide();
        $('#regi_footer').show();

        $('#loginModalLabel').text('Log In');

    });
    </script>

<?php } ?>