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
                                <div class="profile-data-name">Vendor</div>
                                <div class="profile-data-title">Web Developer/Designer</div>
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
                        <a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">Vendor</span></a>
                        <ul>
                            <li>
                                <?php echo anchor('/vendors/', '<span class="fa fa-files-o"></span> <span class="xn-text">View Vendor', 'class="no-class"') ?>
                            </li>
                            <li>
                                <?php echo anchor('vendors/', '<span class="fa fa-files-o"></span> <span class="xn-text">Upload Image', 'class="no-class"') ?>
                            </li>
                            <li><a href="pages-address-book.html"><span class="fa fa-users"></span>Add vendor category</a></li>
                            
                        </ul>
                    </li>

                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">Options</span></a>
                        <ul>
                            <li><a href="pages-gallery.html"><span class="fa fa-image"></span> demo1</a></li>
                            <li><a href="#"><span class="fa fa-user"></span> demo1</a></li>
                            <li><a href="pages-address-book.html"><span class="fa fa-users"></span>Demo2</a></li>
                        </ul>
                    </li>
                   
                                                        
                </ul>
                <!-- END X-NAVIGATION -->
            </div>
            <!-- END PAGE SIDEBAR -->