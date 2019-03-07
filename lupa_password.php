<?php include 'header.php'; ?>
<body>
	<div class="container">
		<div class="col-sm-4"></div>
		<div class="panel panel-default col-sm-4">
			<form role="form" method="post" action="password_baru.php" style="padding: 10px 0 10px 0;">
				<h4>Lupa Password</h4>
		  		<div class="form-group">
					<label for="email">Email/No. Telepon :</label>
					<input type="text" class="form-control" name="emailno">
		  		</div>
				<div class="form-group">
		    		<label for="password">Password Baru :</label>
		    		<input type="password" class="form-control" id="pwd" name="password">
				</div>
		  		<div class="form-group">
		    		<label for="password2">Konfirmasi Password :</label>
	  				<input type="password" class="form-control" id="pwd" name="password2">
		  		</div>
		  		<button type="submit" class="btn btn-success" name="pulihkan">Pulihkan</button>
		  		<h4 align="center" style="margin: 10px 0 10px 0;">Atau</h4>
		  		<a class="btn btn-success" href="daftar.php" style="padding-right: 138px; padding-left: 138px;">Buat akun</a>
			</form>
		</div>
		<div class="col-sm-4"></div>
	</div>
</body>
<?php include 'footer.php';?>