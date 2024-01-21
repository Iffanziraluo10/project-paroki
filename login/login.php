<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login | SIPDM</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<link rel="icon" type="image/png" href="images/logo_keuskupan.ico"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bglogin.png');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form action="login_act.php" method="POST" class="login100-form validate-form">
					<span class="login100-form-title p-b-49">
						Login
					</span>
					<?php
					if(isset($_GET['pesan'])){
						if($_GET['pesan']=="gagal"){
							echo "<div class='alert'>Username dan Password tidak sesuai !</div>";
						} else if($_GET['pesan']=="tidak_valid"){
							echo "<div class='alert'>Hak Akses tidak Valid</div>";
						} elseif ($_GET['pesan']=="belum_login"){
							echo "<div class='alert'>Anda harus Login !!!</div>";
						}
					}
					?>
					<div class="wrap-input100 validate-input m-b-23" data-validate = "Username wajib diisi">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="username" placeholder="Masukkan username">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password wajib diisi">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="password" id="password" placeholder="Masukkan password">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>

					<div class="wrap-input100 ">
						<select class="input100" name="hak_akses" aria-label="Default select example">
							<option selected>--Silahkan Pilih--</option>
							<option value="admin">Admin</option>
							<option value="dpp">DPP</option>
							<option value="pastor">Pastor</option>
							<option value="stasi">DPS (Stasi)</option>
						</select>
						
					</div>
					
					<div class="text-right p-t-8 p-b-2">
						<a href="lupa_password.php">
							Ganti password?
						</a>
					</div>

					<div class="text-right p-b-20">
						<div class="form-check">
							<input type="checkbox" id="show-checkbox" class="form-check-input" onchange="showPassword()">
							<label class="form-control-label fs-14" for="">Tampilkan Password</label>
						</div>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								Login
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/select2/select2.min.js"></script>
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<script src="vendor/countdowntime/countdowntime.js"></script>
	<script src="js/main.js"></script>
	<script>
        function showPassword() {
            var passwordInput = document.getElementById("password");
            var showCheckbox = document.getElementById("show-checkbox");

            if (showCheckbox.checked) {
                passwordInput.type = "text";
            } else {
                passwordInput.type = "password";
            }
        }
    </script>

</body>
</html>