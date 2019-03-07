<?php
session_start();
if (isset($_SESSION["login"])) {
  header("Location: index.php");
  exit;
}
require "function.php";

if(isset($_POST["login"]) ){
$email = $_POST['email'];
$password = $_POST['password'];

$login = mysqli_query($conn, "SELECT * FROM tbl_admin WHERE email = '$email' AND password='$password'");
$row = mysqli_fetch_array($login);
if ($row['email'] == $email AND $row['password'] == $password){
  $_SESSION["login_nama_admin"]=$row['nama'];
  $_SESSION["login_gambar"]=$row['foto_admin'];
  $_SESSION["login"] = true;
  header("Location: index.php");
  exit;
}
    $error = true;
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Log in</title>
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
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition login-page">
<div class="col-sm-6 col-sm-offset-3">
<div class="login-box">
  <div class="login-logo">
    <a href="index.php"><b>Screm</b>Indo</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">LOGIN</p>
      
     <?php if(isset($error)): ?>
     <p style="color: red; font-style: italic;">Username / Password salah</p>
     <?php endif; ?>
      
    <form action="" method="POST">
      <div class="form-group has-feedback">
        <label for="email">EMAIL :</label>
        <input type="text" class="form-control" name="email" placeholder="Email" id="email">
      </div>
      <div class="form-group has-feedback">
        <label for="password">PASSWORD :</label>
        <input type="password" class="form-control" name="password" placeholder="Password" id="password">
      </div>
      <div class="row">
        
        <div class="col-xs-12">
          <button type="submit" name="login" class="btn btn-success btn-block btn-flat">LOGIN</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    <!-- /.social-auth-links -->
<br><br>
    <a href="#" class="text-center">I FORGOT THE PASSWORD</a><br><br>
    <!--<a href="register.php" class="text-center">REGISTER </a>-->

  </div>
  <!-- /.login-box-body -->
</div>

<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

</body>
</html>
