<?php
	ob_start();
	session_start();

	/*cek cookie
	if(isset($_COOKIE['login'])) {
		$_SESSION['login'] = true;
	}*/

	include 'functions.php';

	//if(isset($_SESSION['login'])) header("location: pesan.php");

	if(isset($_SESSION['tbl_customer_email'])) header("location: pesan.php");

	/*proses login*/
	if(isset($_POST['submit_login'])){
		$email = $_POST['email'];
		$password = $_POST['password'];
		$sql_login = mysqli_query($koneksi, "SELECT * FROM tbl_customer WHERE email = '$email' AND password ='$password'"); // proses pengambilan data
		// cek username
		if(mysqli_num_rows($sql_login) > 0){
		
			// cek password
			$row_tbl_customer = mysqli_fetch_assoc($sql_login);
			$_SESSION['tbl_customer_id_customer'] = $row_tbl_customer['id_customer'];
			$_SESSION['tbl_customer_email'] = $row_tbl_customer['email'];
			$_SESSION['tbl_customer_nama'] = $row_tbl_customer['nama'];
			$_SESSION['login'] = true;

			/* cek remember me
			if (isset($_POST['remember'])) {
				// buat cookie
				setcookie('login', 'true', time()+60);
			}*/

			header("location: pesan.php");

			// jika password sudah dienkripsi, di-decrypt dengan function password_verify
			/*$hash = $row_tbl_customer['password'];
			if (password_verify($password, $hash)) {
				header("location: index.php");
				//exit;
			}*/
		}else{
			header("location: login.php?login-gagal");
		}

	}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login SCREMINDO</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form p-l-55 p-r-55 p-t-178" action="" method="post">
				
					<span class="login100-form-title" >
						LOGIN SCREMINDO
					</span>

					<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter email">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
					</div>
 
					<div class="wrap-input100 validate-input" data-validate = "Please enter password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
					</div>

					<!--<div style="margin-top: 7px;">
						<input type="checkbox" name="remember">
						<label for="remember">Remember me</label>
					</div>-->

					<?php
					
					if(isset($_GET['login-gagal'])){

					?>
						
					<div>
						<p>Maaf email atau password yang Anda masukkan salah</p>
					</div>
					<?php }?>
					<div class="text-right p-t-13 p-b-23">
						<a href="lupa_password.php" class="txt2">
							Forgot Email / Password?
						</a>
					</div>

					<div align="center">
						<input type="submit" class="login100-form-btn" value="kirim" name="submit_login">
					</div>

					<div class="flex-col-c p-t-170 p-b-40">
						<span class="txt1 p-b-9">
							Don’t have an account?
						</span>

						<a href="daftar.php" class="txt3">
							Sign up now
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>

<?php

mysqli_close($koneksi);
ob_end_flush();
?>