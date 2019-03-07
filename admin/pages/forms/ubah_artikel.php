<?php
session_start();
if (!isset($_SESSION["login"]) ) {
  header("Location: ../../login.php");
  exit;
}
require '../../function.php';

$id = $_GET["id"];

$art = query("SELECT * FROM tbl_artikel WHERE kode_artikel =$id")[0];

if(isset($_POST["submit"])){
  
if (ubah_artikel($_POST)) {
  echo "
    <script>
      alert('data berhasil diubah!');
      document.location.href = 'artikel.php';
    </script>
    ";
  } else {
  echo "
    <script>
      alert('data gagal diubah!');
      document.location.href = 'artikel.php';
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
  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../../dist/css/style.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="../../bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="../../bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="../../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../../bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
	<title></title>
</head>
	<body class="hold-transition register-page">
	<div class="col-sm-8 col-sm-offset-2">
  		<div class="register-logo">
   		 <a href="../../index2.html"><b>Screm</b>Indo</a>
  	</div>

  	<div class="register-box-body">
    <h2 class="login-box-msg" >EDIT ARTIKEL</h2>

    <form action="" method="post" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?php echo $id;?>">
      <input type="hidden" name="gambarLama" value="<?php echo $art["gambar_artikel"];?>">
    	<div class="form-group has-feedback">
    	<label for="judul_artikel">JUDUL ARTIKEL :</label>
        <input type="text" name="judul_artikel" class="form-control" placeholder="Judul Artikel" id="judul_artikel" required
        value="<?= $art["judul_artikel"]; ?>">
    </div>
    <div class="form-group has-feedback">
    	<label for="isi_artikel">ISI ARTIKEL :</label>
        <input type="text" name="isi_artikel" class="form-control" style="padding-bottom: 500px;" placeholder="Isi Artikel" id="isi_artikel" required
        value="<?= $art["isi_artikel"]; ?>">
    </div>
    <div class="form-group has-feedback">
    	  <label for="gambar_artikel">GAMBAR ARTIKEL :</label>
        <img src="../../img/artikel/<?= $art['gambar_artikel']; ?>" width="100">
        <input type="file" name="gambar_artikel" class="form-control" placeholder="Gambar Artikel" id="gambar_artikel" >
    </div>
    <div class="form-group has-feedback">
    	<label for="tanggal_artikel">TANGGAL ARTIKEL :</label>
        <input type="date" name="tanggal_artikel" class="form-control" placeholder="Tanggal Artikel" id="tanggal_artikel" required
        value="<?= $art["tanggal_artikel"]; ?>">
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
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../../bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="../../bower_components/raphael/raphael.min.js"></script>
<script src="../../bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="../../bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="../../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="../../bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../../bower_components/moment/min/moment.min.js"></script>
<script src="../../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="../../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../../dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
</body>
</html>