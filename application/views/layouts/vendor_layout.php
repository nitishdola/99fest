<!DOCTYPE html>
<html lang="en">
    <head>        
        <!-- META SECTION -->
        <title>Atlant - Responsive Bootstrap Admin Template</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="<?php echo asset_url(); ?>admin/css/theme-default.css"/>
        <link href="<?php echo asset_url(); ?>css/bootstrap/multiselect/bootstrap-select.css" rel="stylesheet">
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
            <div class="page-sidebar">
                <!-- START X-NAVIGATION -->
                <ul class="x-navigation">
                    <li class="xn-logo">
                        <a href="index.html">ATLANT</a>
                        <a href="#" class="x-navigation-control"></a>
                    </li>
                    <li class="xn-profile">
                        <a href="#" class="profile-mini">
                            <img src="assets/images/users/avatar.jpg" alt="John Doe"/>
                        </a>
                        <div class="profile">
                            <div class="profile-image">
                                <img src="<?php echo asset_url(); ?>admin/assets/images/users/avatar.jpg" alt="John Doe"/>
                            </div>
                            <div class="profile-data">
                                <div class="profile-data-name"><?php echo $display_name; ?></div>
                                <div class="profile-data-title"><?php if($is_admin): echo 'Administrator'; endif; ?></div>
                            </div>
                            <div class="profile-controls">
                                <a href="pages-profile.html" class="profile-control-left"><span class="fa fa-info"></span></a>
                                <a href="pages-messages.html" class="profile-control-right"><span class="fa fa-envelope"></span></a>
                            </div>
                        </div>                                                                        
                    </li>
                    <li class="xn-title">Navigation</li>
                    <li class="active">
                        <a href="index.html"><span class="fa fa-desktop"></span> <span class="xn-text">Dashboard</span></a>                        
                    </li>                    
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">Profile</span></a>
                        <ul>
                            <li>
                                <?php echo anchor('#', '<span class="fa fa-files-o"></span> <span class="xn-text">View All Messages', 'class="no-class"') ?>
                            </li>
                            <li>
                                <?php echo anchor('vendors/profile', '<span class="fa fa-files-o"></span> <span class="xn-text">My Profile', 'class="no-class"') ?>
                            </li>
                            
                        </ul>
                    </li>

                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">Images</span></a>
                        <ul>
                            <li>
                                <?php echo anchor('vendors/view_images', '<span class="fa fa-files-o"></span> <span class="xn-text">View', 'class="no-class"') ?>
                            </li>
                            <li>
                                <?php echo anchor('vendors/upload_image', '<span class="fa fa-files-o"></span> <span class="xn-text">Upload Image', 'class="no-class"') ?>
                            </li>
                        </ul>
                    </li>
                                                        
                </ul>
                <!-- END X-NAVIGATION -->
            </div>
            <!-- END PAGE SIDEBAR -->



            <div class="main">
                <?php echo $this->load->view($subview); ?>
            </div>


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
