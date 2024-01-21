<?php
include "../koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Ganti Password | SIPDM</title>
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
				<form action="" method="POST" class="login100-form validate-form">
					<span class="login100-form-title p-b-49">
						Ganti Password
					</span>
                    <div class="mt-0 mb-2 text-right">
                        <a href="login.php" class="btn btn-success">
                            <i class="fa fa-arrow-circle-left"></i> Kembali
                        </a>
                    </div>

					<div class="wrap-input100 ">
						<select class="input100" name="hak_akses" aria-label="Default select example">
							<option selected>--Silahkan Pilih--</option>
							<option value="1">Admin</option>
							<option value="2">DPP</option>
							<option value="3">Pastor</option>
							<option value="4">Stasi</option>
						</select>
					</div>
					
					<div class="wrap-input100 validate-input m-b-23" data-validate = "Password lama wajib diisi">
						<span class="label-input100">Password Lama</span>
						<input class="input100" type="text" name="pwlama" placeholder="Masukkan password lama">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password Baru wajib diisi">
						<span class="label-input100">Password Baru</span>
						<input class="input100" type="text" name="pwbaru" placeholder="Masukkan password baru">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>

					<div class="wrap-input100 mt-4 validate-input" data-validate="Konfirmasi password wajib diisi">
						<span class="label-input100">Konfirmasi Password</span>
						<input class="input100" type="text" name="konfirpw" placeholder="Masukkan Konfirmasi password ">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>
					
                    <div class="text-right p-t-8 p-b-31">
                        
					</div>
                    <button type="submit" name="ubah" class="btn btn-primary"><i class="fa fa-save"></i> Proses</button>
                    <button type="Reset" class="btn btn-danger"><i class="fa fa-undo"></i> Batal</button>
					
				</form>
			</div>
		</div>
	</div>
	
	<?php
	
	if(isset($_POST['ubah'])){
		$pwlama = md5($_POST['pwlama']);
		$hakakses = $_POST['hak_akses'];

		$tampil = mysqli_query($koneksi, "SELECT * FROM user WHERE hak_akses = '$hakakses' and password = '$pwlama'");
		$data = mysqli_fetch_array($tampil);
		
		//jika data ditemukan, maka password sesuai
		if ($data) {
			//uji jika password baru dan konfirmasi password sama
			$password_baru = $_POST['pwbaru'];
			$konfirmasi_password = $_POST['konfirpw'];

			if ($password_baru == $konfirmasi_password) {
				//proses ganti password
				//enkripsi password baru
				$pass_ok = md5($konfirmasi_password);
				$ubah = mysqli_query($koneksi, "UPDATE user set password = '$pass_ok' WHERE id_user = '$data[id_user]' ");
				
				if ($ubah) {
					echo "<script>alert('Password anda berhasil diubah, silahkan logout untuk menguji password baru anda.!');document.location='login.php'</script>";
				}
			} else {
				echo "<script>alert('Maaf, Password Baru & Konfirmasi password yang anda inputkan tidak sama!');document.location='login.php'</script>";
			}
		} else {
			echo "<script>alert('Maaf, Password lama anda tidak sesuai/tidak terdaftar!');document.location='login.php'</script>";
		}
	}
	
	?>
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

</body>
</html>