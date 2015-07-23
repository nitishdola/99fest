<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- META SECTION -->
        <title>Atlant - Front-End Template</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!-- END META SECTION -->
		
		<link href="<?php echo asset_url(); ?>css/revolution-slider/extralayers.css" rel="stylesheet">
		<link href="<?php echo asset_url(); ?>css/revolution-slider/settings.css" rel="stylesheet">
		<link href="<?php echo asset_url(); ?>css/styles.css" rel="stylesheet">
    </head>
    <body>
        <!-- page container -->
        <div class="page-container">
            <!-- page header -->
            <div class="page-header">
                
                <!-- page header holder -->
                <div class="page-header-holder">
                    
                    <!-- page logo -->
                    <div class="logo">
                        <a href="index.html">Atlant - Front-end Template</a>
                    </div>
                    <!-- ./page logo -->
                    

                    <!-- search -->
                    <div class="search">
                        <div class="search-button"><span class="fa fa-search"></span></div>
                        <div class="search-container animated fadeInDown">
                            <form action="#" method="post">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search..."/>
                                    <div class="input-group-btn">
                                        <button class="btn btn-primary"><span class="fa fa-search"></span></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- ./search -->
                    <!--top-navigation-->
                    <?php $this->load->view('nav/top_nav'); ?>
                    <!--/top-navigation-->                      

                    
                </div>
                <!-- ./page header holder -->
                
            </div>
            <!-- ./page header -->
