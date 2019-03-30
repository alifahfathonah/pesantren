<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Pondok Pesantren Al-Bahjah</title>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="icon" type="image/png" href="<?= base_url() ?>/assets/img/logo.png"/>
      <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/font-awesome/css/font-awesome.min.css">
      <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
      <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/css/util.css">
      <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/css/main.css">
   </head>
   <body>
      <div class="limiter">
         <div class="container-login100">
            <div class="wrap-login100">
               <div class="login100-form-title" style="background-image: url(<?= base_url() ?>/assets/img/h.png);">
                  <span class="login100-form-title-1">
                     Pondok Pesantren Al-bahja<br> <h4 style="font-size:16px">Sistem Informasi Pendaftaran Santri</h4>
                  </span>
               </div>
               <?= form_open('login',['role' => 'form' , 'class' =>'ogin100-form validate-form']); ?>
               <!-- <form class="login100-form validate-form" role="form" method="post" action=""> -->
               <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
                  <span class="label-input100">Username</span>
                  <input class="input100" type="text" name="username" placeholder="Enter username">
                  <span class="focus-input100"></span>
               </div>
               <div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
                  <span class="label-input100">Password</span>
                  <input class="input100" type="password" name="password" placeholder="Enter password">
                  <span class="focus-input100"></span>
               </div>
               <div class="flex-sb-m w-full p-b-30">
                  <div>
                     Belum Mempunyai akun? <b>
                     <a href="<?= base_url('register') ?>" class="txt1">
                        Daftar Disini
                     </a>
                  </div>
               </div>
               <div class="container-login100-form-btn">
                  <input type="submit" class="login100-form-btn" value="Log In" name="login">
               </div>
            </form>
         </div>
      </div>
   </div>
   
   <script src="<?= base_url() ?>/assets/js/jquery-3.2.1.min.js"></script>
   <script src="<?= base_url() ?>/assets/js/bootstrap.min.js"></script>
   <script src="<?= base_url() ?>/assets/js/main.js"></script>
</body>
</html>