<!DOCTYPE html>
<!-- 
Template Name: inspinia - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.4
Version: 3.3.0
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/inspinia-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8" />
    <title>
        <?= $title . ' | ' . $global_title ?>
    </title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/inspinia') ?>/static_full_version/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/inspinia') ?>/static_full_version/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/inspinia') ?>/static_full_version/css/animate.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/inspinia') ?>/static_full_version/css/style.css" rel="stylesheet" type="text/css" />
    <!-- END THEME STYLES -->
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->


<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">LPD</h1>

            </div>
            <h3>Selamat Datang</h3>
            <p>LPD Al Bahjah Cirebon
            </p>
            <p>Silahkan Login</p>
            <form class="m-t" role="form" action="index.html">
                <div class="form-group">
                    <input type="email" class="form-control" placeholder="Username" required="">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" required="">
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Login</button>
<!-- 
                <a href="#"><small>Forgot password?</small></a> -->
                <p class="text-muted text-center"><small>Daftar Sekarang!</small></p>
                <a class="btn btn-sm btn-white btn-block" href="register.html">Daftar</a>
            </form>
            <p class="m-t"> <small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small> </p>
        </div>
    </div>

    <!-- END LOGIN -->
    <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
    <!-- BEGIN CORE PLUGINS -->
    <!--[if lt IE 9]>
<script src="<?= base_url('assets/inspinia') ?>/assets/global/plugins/respond.min.js"></script>
<script src="<?= base_url('assets/inspinia') ?>/assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
    <script src="<?= base_url('assets/inspinia') ?>/Static_full_version/js/jquery-3.1.1.min.js" type="text/javascript"></script>
    <script src="<?= base_url('assets/inspinia') ?>/Static_full_version/js/bootstrap.min.js" type="text/javascript"></script>

    <script>
        jQuery(document).ready(function() {
            inspinia.init(); // init inspinia core components
            Layout.init(); // init current layout
            Login.init();
            Demo.init();
        });
    </script>
    <!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->

</html>