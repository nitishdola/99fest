<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="nitish d theme for 99 fest , built with bootstrap themes">
    <meta name="keywords" content="bootstrap, responsive">
    <meta name="author" content="@_NITISH_DolakasharIA">
    <title>Welcome to 99fest.</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,700,600" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href="<?php echo asset_url(); ?>css/animate.css" rel="stylesheet">
    <link href="<?php echo asset_url(); ?>css/magnific-popup.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo asset_url(); ?>event/event.style.min.css">

    <script src="https://maps.googleapis.com/maps/api/js"></script>
    



    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->

    <style>
      .btn-fest-native{
        background: #E95F00;
        color:#FFF;
      }
    </style>
  </head>
  <body id="page-home">

    <div class="main">
        <?php echo $this->load->view($subview); ?>
    </div>
    

    <input id="base_url" type="hidden" value="<?= base_url(); ?>" />
    <script src="<?php echo asset_url(); ?>js/validate_form.js"></script>
    <!-- end:demo-color-pallete -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script>
    <script src="<?php echo asset_url(); ?>event/jquery.nicescroll.min.js"></script>
    <script src="<?php echo asset_url(); ?>event/jquery.backstretch.min.js"></script>
    <script src="<?php echo asset_url(); ?>event/jquery.easing.js"></script>
    <script src="<?php echo asset_url(); ?>js/masonry.pkgd.min.js"></script>
    <script src="<?php echo asset_url(); ?>js/jquery.magnific-popup.min.js"></script>
    <script src="<?php echo asset_url(); ?>event/ind.event.custom.js"></script>


  </body>
</html>