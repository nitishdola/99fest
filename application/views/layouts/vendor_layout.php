<!DOCTYPE html>
<html lang="en">
    <head>        
        <!-- META SECTION -->
        <title>99Fest : Vendor Admin</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="<?php echo asset_url(); ?>admin/css/theme-default.css"/>
        <link href="<?php echo asset_url(); ?>css/bootstrap/multiselect/bootstrap-select.css" rel="stylesheet">
        <link href="<?php echo asset_url(); ?>css/style.css" rel="stylesheet">
        
        <!-- EOF CSS INCLUDE -->    

        <script type="text/javascript" src="<?php echo asset_url(); ?>admin/js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo asset_url(); ?>admin/js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="<?php echo asset_url(); ?>admin/js/plugins/bootstrap/bootstrap.min.js"></script> 

        <script type="text/javascript" src="<?php echo asset_url(); ?>js/plugins/bootstrap/multiselect/bootstrap-select.js"></script>       

        <script src="<?php echo asset_url(); ?>sweetalert/sweetalert.min.js"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo asset_url(); ?>sweetalert/sweetalert.css">
                                        
    </head>
    <body>
        <!-- START PAGE CONTAINER -->
        <div class="page-container">
            
            <!-- START PAGE SIDEBAR -->
            <div class="page-sidebar" style="background:#33414E">
                <?php echo $this->load->view('common/admin/vendor_x_navigation'); ?>
            </div>
            <!-- END PAGE SIDEBAR -->



            <div class="main">
                <?php echo $this->load->view($subview); ?>
            </div>

            <!-- MESSAGE BOX-->
            <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
                <div class="mb-container">
                    <div class="mb-middle">
                        <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
                        <div class="mb-content">
                            <p>Are you sure you want to log out?</p>                    
                            <p>Press No if youwant to continue work. Press Yes to logout current user.</p>
                        </div>
                        <div class="mb-footer">
                            <div class="pull-right">
                                <a href="<?= base_url(); ?>logout" class="btn btn-success btn-lg">Yes</a>
                                
                                <button class="btn btn-default btn-lg mb-control-close">No</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MESSAGE BOX-->


            <!-- START SCRIPTS -->
        <!-- START PLUGINS -->
        
        <!-- END PLUGINS -->

        <!-- START THIS PAGE PLUGINS-->   
        <input id="base_url" type="hidden" value="<?= base_url(); ?>" />
        <script src="<?php echo asset_url(); ?>js/validate_form.js"></script>


        <script type='text/javascript' src='<?php echo asset_url(); ?>admin/js/plugins/icheck/icheck.min.js'></script>        
        <script type="text/javascript" src="<?php echo asset_url(); ?>admin/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
        <script type="text/javascript" src="<?php echo asset_url(); ?>admin/js/plugins/scrolltotop/scrolltopcontrol.js"></script>
        
        <script type="text/javascript" src="<?php echo asset_url(); ?>admin/js/plugins/morris/raphael-min.js"></script>
        <script type="text/javascript" src="<?php echo asset_url(); ?>admin/js/plugins/morris/morris.min.js"></script>       
        <script type="text/javascript" src="<?php echo asset_url(); ?>admin/js/plugins/rickshaw/d3.v3.js"></script>
        <script type="text/javascript" src="<?php echo asset_url(); ?>admin/js/plugins/rickshaw/rickshaw.min.js"></script>
        <script type='text/javascript' src='<?php echo asset_url(); ?>admin/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'></script>
        <script type='text/javascript' src='<?php echo asset_url(); ?>admin/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'></script>                
        <script type='text/javascript' src='<?php echo asset_url(); ?>admin/js/plugins/bootstrap/bootstrap-datepicker.js'></script>                
        <script type="text/javascript" src="<?php echo asset_url(); ?>admin/js/plugins/owl/owl.carousel.min.js"></script>                 
        
        <script type="text/javascript" src="<?php echo asset_url(); ?>admin/js/plugins/moment.min.js"></script>
        <script type="text/javascript" src="<?php echo asset_url(); ?>admin/js/plugins/daterangepicker/daterangepicker.js"></script>
        <!-- END THIS PAGE PLUGINS-->        

        <!-- START TEMPLATE -->
        <script type="text/javascript" src="<?php echo asset_url(); ?>admin/js/settings.js"></script>
        
        <script type="text/javascript" src="<?php echo asset_url(); ?>admin/js/plugins.js"></script>        
        <script type="text/javascript" src="<?php echo asset_url(); ?>admin/js/actions.js"></script>
        
        <script type="text/javascript" src="<?php echo asset_url(); ?>admin/js/demo_dashboard.js"></script>
        <!-- END TEMPLATE -->
    <!-- END SCRIPTS -->         
    </body>
</html>
