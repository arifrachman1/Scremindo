<?php
	
	require 'functions.php';

	// Check if form submitted, insert form data into customer table.
	if(isset($_POST['submit']))
	{
			// Show message when users added
		if(registrasi($_POST) > 0){
			echo "<script>
					alert('User berhasil ditambahkan!');
				</script>";
			echo"<script>location='login.php'; </script>";
		}else{
			echo mysqli_error($koneksi);
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Daftar</title>
	<link rel="stylesheet" type="text/css" href="bootstrap-3.3.7/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="form-margin">
	<div class="panel panel-success">
		<div class="panel-heading">
			<b>Daftar</b>
			<div style="margin-right: 0; margin-left: 750px; margin-top: -22px;">Sudah Mendaftar?</div>
			<div style="margin-right: 0; margin-left: 880px; margin-top: -22px;">
				<a href="login.php" class="btn btn-success" style="text-decoration: none; color: #fff;">Ke Halaman Login</a>
			</div>
		</div>
		<div class="panel-body">
			<div class="col-sm-10">
				<form action="daftar.php" method="post" class="form-horizontal" role="form" name="form">
					<div class="form-group">
						<label class="control-label col-sm-3" for="nama">Nama Lengkap : </label>
						<div class="col-sm-9">
							<input type="text" name="nama" class="form-control" placeholder="Masukkan nama lengkap">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-3" for="tempat_lahir">Tempat Lahir : </label>
						<div class="col-sm-9">
							<input type="text" name="tempat_lahir" class="form-control" placeholder="Masukkan tempat lahir">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-3" for="tgl_lahir">Tanggal Lahir : </label>
						<div class="col-sm-9">
							<select name="tahun">
								<option value="">--- Pilih Tahun ---</option>
								<?php
									for ($t=2018; $t>=1950  ; $t--) { 
										echo "<option value='$t'>$t</option>";
									}
								?>
							</select>
							<select name="bulan">
								<option value="">--- Pilih Bulan ---</option>
								<option value="01">Januari</option>
								<option value="02">Februari</option>
								<option value="03">Maret</option>
								<option value="04">April</option>
								<option value="05">Mei</option>
								<option value="06">Juni</option>
								<option value="07">Juli</option>
								<option value="08">Agustus</option>
								<option value="09">September</option>
								<option value="10">Oktober</option>
								<option value="11">November</option>
								<option value="12">Desember</option>
							</select>
							<select name="hari">
								<option value="">--- Pilih Hari ---</option>
								<?php
									for ($h=1; $h <= 31 ; $h++) { 
									 	echo "<option value='$h'>$h</option>";
									 } 
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-3" for="jenis_kelamin">Jenis Kelamin : </label>
						<div class="col-sm-9">
							<select name="jenis_kelamin">
								<option value="">--- Pilih Jenis Kelamin ---</option>
								<option value="Laki-laki">Laki-Laki</option>
								<option value="Perempuan">Perempuan</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-3" for="no_telepon">No. Telepon : </label>
						<div class="col-sm-9">
							<input type="text" name="no_telepon" class="form-control" placeholder="Masukkan nomor telepon">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-3" for="alamat">Alamat : </label>
						<div class="col-sm-9">
							<input type="text" name="alamat" class="form-control" placeholder="Masukkan alamat">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-3" for="email">E-mail : </label>
						<div class="col-sm-9">
							<input type="email" name="email" class="form-control" placeholder="Masukkan email">
						</div>
					</div>
					<div class="form-group" for="password">
						<label class="control-label col-sm-3">Password : </label>
						<div class="col-sm-9">
							<input type="password" name="password" class="form-control" placeholder="Masukkan password">
						</div>
					</div>
					<div class="form-group" for="konfirmasi_password">
						<label class="control-label col-sm-3">Konfirmasi Password : </label>
						<div class="col-sm-9">
							<input type="password" name="password2" class="form-control" placeholder="Konfirmasi password">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-10">
							<button type="submit" name="submit" class="btn btn-success">Submit</button>
								

						</div>
					</div>
				</form>
			</div>
			<div class="col-sm-2">
				<img src="images/Logo_Scremindo.png" width="100" height="100" style="margin-top: 100px; margin-left: 20px;"><br>
				<h4 align="center">Pakcoy Scremi</h4>
			</div>
		</div>
	</div>
</body>
</html>
<?php
	mysqli_close($koneksi);
	ob_end_flush(); // akhir pembacaan database
?>
