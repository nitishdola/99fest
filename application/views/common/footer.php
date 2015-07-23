<!-- page footer -->
    <div class="page-footer">
        
        <!-- page footer wrap -->
        <div class="page-footer-wrap bg-dark-gray">
            <!-- page footer holder -->
            <div class="page-footer-holder page-footer-holder-main">
                                        
                <div class="row">
                    
                    <!-- about -->
                    <div class="col-md-3">
                        <h3>About Template</h3>
                        <p>Lorem ipsum dolor natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec ullamcorper nulla non metus auctor fringilla. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</p>
                    </div>
                    <!-- ./about -->
                    
                    <!-- quick links -->
                    <div class="col-md-3">
                        <h3>Quick links</h3>
                        
                        <div class="list-links">
                            <a href="#">Home</a>                                    
                            <?php echo anchor('/contact', 'Vendors Contact Us', 'class="no-class"') ?>
                            <a href="#">Portfolio</a>
                            <a href="#">Shortcodes</a>
                        </div>                                
                    </div>
                    <!-- ./quick links -->
                    
                    <!-- recent tweets -->
                    <div class="col-md-3">
                        <h3>Recent Tweets</h3>
                        
                        <div class="list-with-icon small">
                            <div class="item">
                                <div class="icon">
                                    <span class="fa fa-twitter"></span>
                                </div>
                                <div class="text">
                                    <a href="#">@JohnDoe</a> Hello, here is my new front-end template. Check it out
                                </div>
                            </div>
                            <div class="item">
                                <div class="icon">
                                    <span class="fa fa-twitter"></span>
                                </div>
                                <div class="text">
                                    <a href="#">@Aqvatarius</a> Release of new update for Atlant is done and ready to use
                                </div>
                            </div>
                            <div class="item">
                                <div class="icon">
                                    <span class="fa fa-twitter"></span>
                                </div>
                                <div class="text">
                                    <a href="#">@Aqvatarius</a> Check out my new admin template Atlant, it's realy awesome template
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <!-- ./recent tweets -->
                    
                    <!-- contacts -->
                    <div class="col-md-3">
                        <h3>Contacts</h3>
                        
                        <div class="footer-contacts">
                            <div class="fc-row">
                                <span class="fa fa-home"></span>
                                000 StreetName, Suite 111,<br/> 
                                City Name, ST 01234
                            </div>
                            <div class="fc-row">
                                <span class="fa fa-phone"></span>
                                (123) 456-7890
                            </div>
                            <div class="fc-row">
                                <span class="fa fa-envelope"></span>
                                <strong>John Doe</strong><br>
                                <a href="mailto:#">johndoe@domain.com</a>
                            </div>                                    
                        </div>
                        
                        <h3>Subscribe</h3>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Your email"/>
                            <div class="input-group-btn">
                                <button class="btn btn-primary"><span class="fa fa-paper-plane"></span></button>
                            </div>
                        </div>
                        
                    </div>
                    <!-- ./contacts -->
                    
                </div>
                
            </div>
            <!-- ./page footer holder -->
        </div>
        <!-- ./page footer wrap -->
        
        <!-- page footer wrap -->
        <div class="page-footer-wrap bg-darken-gray">
            <!-- page footer holder -->
            <div class="page-footer-holder">
                
                <!-- copyright -->
                <div class="copyright">
                    &copy; 2014 Atlant Theme by <a href="#">Aqvatarius</a> - All Rights Reserved                            
                </div>
                <!-- ./copyright -->
                
                <!-- social links -->
                <div class="social-links">
                    <a href="#"><span class="fa fa-facebook"></span></a>
                    <a href="#"><span class="fa fa-twitter"></span></a>
                    <a href="#"><span class="fa fa-google-plus"></span></a>
                    <a href="#"><span class="fa fa-linkedin"></span></a>
                    <a href="#"><span class="fa fa-vimeo-square"></span></a>
                    <a href="#"><span class="fa fa-dribbble"></span></a>
                </div>                        
                <!-- ./social links -->
                
            </div>
            <!-- ./page footer holder -->
        </div>
        <!-- ./page footer wrap -->
        
    </div>
    <!-- ./page footer -->

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

                <?php echo form_open("auth/create_user");?>

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
                          'name'        => 'password_confirm',
                          'id'          => 'password_confirm',
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

            <?php echo form_open("auth/login");?>

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
                            <input type="text" name="identity" class="form-control" placeholder="Enter your email id abc@xyz.com"/>
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

</div>        
        <!-- ./page container -->
        <?php //echo asset_url(); ?>
        <!-- page scripts -->
        <script type="text/javascript" src="<?php echo asset_url(); ?>js/plugins/jquery/jquery.min.js"></script>
        
        <script type="text/javascript" src="<?php echo asset_url(); ?>js/plugins/bootstrap/bootstrap.min.js"></script>
        
        
        <script type="text/javascript" src="<?php echo asset_url(); ?>js/plugins/mixitup/jquery.mixitup.js"></script>
        <script type="text/javascript" src="<?php echo asset_url(); ?>js/plugins/appear/jquery.appear.js"></script>
        
        <script type="text/javascript" src="<?php echo asset_url(); ?>js/plugins/revolution-slider/jquery.themepunch.tools.min.js"></script>
        <script type="text/javascript" src="<?php echo asset_url(); ?>js/plugins/revolution-slider/jquery.themepunch.revolution.min.js"></script>
        
        <script type="text/javascript" src="<?php echo asset_url(); ?>js/actions.js"></script>
        <script type="text/javascript" src="<?php echo asset_url(); ?>js/slider.js"></script>
        <!-- ./page scripts -->
    </body>
</html>
