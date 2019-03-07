<?php
session_start();
if (!isset($_SESSION["login"]) ) {
  header("Location: login.php");
  exit;
}
require 'function.php';

// ambil data di URL
$id = $_GET["id"];

// query data admin berdasarkan id
$adm = query("SELECT * FROM tbl_admin WHERE kode_admin =$id")[0];

if(isset($_POST["submit"])){
if (ubah_admin($_POST)) {
  echo "
    <script>
      alert('data berhasil diubah!');
      document.location.href = 'index.php';
    </script>
    ";
  } else {
  echo "
    <script>
      alert('data gagal diubah!');
      document.location.href = 'index.php';
    </script>
     ";
  }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/style.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
	<title></title>
</head>
	<body class="hold-transition register-page">
	<div class="col-sm-8 col-sm-offset-2">
  		<div class="register-logo">
   		 <a href="../../index2.html"><b>Screm</b>Indo</a>
  	</div>

  	<div class="register-box-body">
    <p class="login-box-msg">UBAH ADMIN</p>

    <form action="" method="post" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?php echo $id;?>">
      <input type="hidden" name="gambarLama" value="<?php echo $adm["foto_admin"];?>">
    	<div class="form-group has-feedback">
    	<label for="nama">NAMA ADMIN :</label>
        <input type="text" name="nama" class="form-control" placeholder="Nama Admin" id="nama" required 
        value="<?= $adm["nama"]; ?>">
    </div>
    <div class="form-group has-feedback">
    	<label for="foto_admin">FOTO ADMIN :</label>
      <img src="img/admin/<?= $adm['foto_admin']; ?>" width="100">
        <input type="file" name="foto_admin" class="form-control" placeholder="Foto Admin" id="foto_admin" >
    </div>
    <div class="form-group has-feedback">
    	<label for="tempat_lahir">TEMPAT LAHIR :</label>
        <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir" id="tempat_lahir" required
        value="<?= $adm["tempat_lahir"]; ?>">
    </div>
    <div class="form-group has-feedback">
    	<label for="tanggal_lahir">TANGGAL LAHIR :</label>
        <input type="date" name="tanggal_lahir" class="form-control" placeholder="Tanggal Lahir" id="tanggal_lahir" required
        value="<?= $adm["tanggal_lahir"]; ?>">
    </div>
    <div class="form-group has-feedback">
      <label for="jenis_kelamin">JENIS KELAMIN :</label>
        <input type="text" name="jenis_kelamin" class="form-control" placeholder="Jenis Kelamin" id="jenis_kelamin" required
        value="<?= $adm["jenis_kelamin"]; ?>">
    </div>
    <div class="form-group has-feedback">
      <label for="no_telepon">NO. TELEPON :</label>
        <input type="text" name="no_telepon" class="form-control" placeholder="No Telepon" id="no_telepon" required
        value="<?= $adm["no_telepon"]; ?>">
    </div>
    <div class="form-group has-feedback">
      <label for="alamat">ALAMAT :</label>
        <input type="text" name="alamat" class="form-control" placeholder="Alamat" id="alamat" required
        value="<?= $adm["alamat"]; ?>">
    </div>
    <div class="form-group has-feedback">
      <label for="email">EMAIL :</label>
        <input type="text" name="email" class="form-control" placeholder="Email" id="email" required
        value="<?= $adm["email"]; ?>">
    </div>
    <div class="form-group has-feedback">
      <label for="password">PASSWORD :</label>
        <input type="password" name="password" class="form-control" placeholder="Password" id="password" required
        value="<?= $adm["password"]; ?>">
    </div>
    <div class="row">
      
        <!-- /.col -->
        <div class="col-xs-12">
          <button type="submit" name="submit" class="btn btn-success btn-block btn-flat">SUBMIT</button>
        </div>
        <!-- /.col -->
      </div>
    </form>


        <!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>