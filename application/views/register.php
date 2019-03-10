<!DOCTYPE html>
<html lang="en">
	<head>
		<title>SINORA | Login</title>
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
    				<?= $this->session->flashdata('msg') ?>
					<?= form_open('register', ['class' => 'login100-form validate-form' , 'role' => 'form']); ?>
						<div class="wrap-input100 validate-input m-b-26" data-validate="nama is required">
							<span class="label-input100">Nama Lengkap</span>
							<input class="input100" type="text" name="nama" placeholder="Masukan Nama lengkap">
							<span class="focus-input100"></span>
						</div>
						<div class="wrap-input100 validate-input m-b-26" data-validate="tempat lahir is required">
							<span class="label-input100">Tempat Lahir</span>
							<input class="input100" type="text" name="tempat_lahir" >
							<span class="focus-input100"></span>
						</div>
						<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
							<span class="label-input100">Tanggal Lahir</span>
							<input class="input100" type="date" name="tanggal_lahir" >
							<span class="focus-input100"></span>
						</div>
						<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
							<span class="label-input100">Jenis Kelamin</span>
							<select name="jenis_kelamin" class="input100">
								<option value="L">Laki - Laki</option>
								<option value="P">Perempuan</option>
							</select>
							<span class="focus-input100"></span>
						</div>
						<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
							<span class="label-input100">Kontak</span>
							<input class="input100" type="text" name="kontak" >
							<span class="focus-input100"></span>
						</div>
						<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
							<span class="label-input100">Alamat</span>
							<textarea class="input100" name="alamat" rows="4"></textarea>
							<span class="focus-input100"></span>
						</div>
						<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
							<span class="label-input100">Username</span>
							<input class="input100" type="text" name="username" >
							<span class="focus-input100"></span>
						</div>
						<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
							<span class="label-input100">Password</span>
							<input class="input100" type="password" name="password" >
							<span class="focus-input100"></span>
						</div>
						<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
							<span class="label-input100">Ulangi Password</span>
							<input class="input100" type="password" name="repassword" >
							<span class="focus-input100"></span>
						</div>
						<div class="container-login100-form-btn">
							<input type="submit" class="login100-form-btn" value="Daftar" name="register">
						</div>
					<?= form_close(); ?>
				</div>
			</div>
		</div>
		
		<script src="<?= base_url() ?>/assets/js/jquery-3.2.1.min.js"></script>
		<script src="<?= base_url() ?>/assets/js/bootstrap.min.js"></script>
		<script src="<?= base_url() ?>/assets/js/main.js"></script>
	</body>
</html>