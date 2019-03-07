<?php
session_start();
if (!isset($_SESSION["login"]) ) {
  header("Location: login.php");
  exit;
}
require 'function.php';

if( isset($_POST["register"]) ) {

  if(registrasi($_POST) > 0){
    echo "
    <script>
      alert('user baru berhasil ditambahkan!');
      document.location.href = 'login.php';
    </script>";
  }else{
    echo mysqli_error($conn);
  }

}

?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Registrasi</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition register-page">
<div class="col-sm-8 col-sm-offset-2">
  <div class="register-logo">
    <a href="index.php"><b>Screm</b>Indo</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">REGISTER</p>

    <form action="" method="post" enctype="multipart/form-data">
      <div class="form-group has-feedback">
        <label for="nama">NAMA LENGKAP :</label>
        <input type="text" name="nama" class="form-control" placeholder="Full name" id="nama">
      </div>
       <div class="form-group has-feedback">
        <label for="gambar">FOTO PROFIL :</label>
        <input type="file" name="gambar" class="form-control" placeholder="Foto Profil" id="gambar">
      </div>
      <div class="form-group has-feedback">
        <label for="tempat_lahir">TEMPAT LAHIR :</label>
        <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir" id="tempat_lahir">
      </div>
       <div class="form-group has-feedback">
        <label for="tanggal_lahir">TANGGAL LAHIR :</label>
        <input type="date" name="tanggal_lahir" class="form-control" placeholder="Tanggal Lahir" id="tanggal_lahir">
         </div>
      <div class="form-group has-feedback" >
        <label for="jenis_kelamin">JENIS KELAMIN :</label>
        <input type="text" name="jenis_kelamin" class="form-control" placeholder="Jenis Kelamin" id="jenis_kelamin">
        
      </div>
      <div class="form-group has-feedback">
        <label for="no_telepon">NO. TELEPON :</label>
        <input type="text" name="no_telepon" class="form-control" placeholder="No.Telepon" id="no_telepon">
      </div>      
      <div class="form-group has-feedback">
        <label for="alamat">ALAMAT :</label>
        <input type="text" name="alamat" class="form-control" placeholder="Alamat" id="alamat">
      </div>
      <div class="form-group has-feedback">
        <label for="email">EMAIL :</label>
        <input type="text" name="email" class="form-control" placeholder="Email" id="email">
      </div>
      <div class="form-group has-feedback">
        <label for="password">PASSWORD :</label>
        <input type="password" name="password" class="form-control" placeholder="Password" id="password">
      </div>

      <div class="row">
      
        <!-- /.col -->
        <div class="col-xs-12">
          <button type="submit" name="register" class="btn btn-success btn-block btn-flat">REGISTER</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
<br><br>

    <a href="login.php" class="text-center">I ALREADY HAVE A MEMBERSHIP</a>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>

</body>
</html>
