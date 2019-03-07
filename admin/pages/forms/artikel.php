<?php 
session_start();
if (!isset($_SESSION["login"]) ) {
  header("Location: ../../login.php");
  exit;
}

require '../../function.php';
$jumlahDataPerHalaman = 2;
$jumlahData = count(query("SELECT * FROM tbl_artikel"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

$artikel = query("SELECT * FROM tbl_artikel LIMIT $awalData, $jumlahDataPerHalaman");

if(isset($_POST["cari_artikel"])){
  $artikel = cari_artikel($_POST["keyword_artikel"]);
}

 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Tambah_Artikel</title>
  <!-- Tell the browser to be responsive to screen width -->
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



  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>S</b>IN</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>SCREM</b>INDO</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
         
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../../img/admin/<?php echo $_SESSION["login_gambar"];?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $_SESSION["login_nama_admin"];?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../../img/admin/<?php echo $_SESSION["login_gambar"];?>" class="img-circle" alt="User Image">

                <p>
                 <?php echo $_SESSION["login_nama_admin"];?>
                </p>
                </p>
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="../../logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar ">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar ">
      <!-- Sidebar user panel -->
     
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>ADMIN SCREMINDO</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="../../index.php"><i class="fa fa-circle-o"></i> Admin</a></li>
          </ul>
        </li>

        <li class="treeview active">
          <a href="#">
            <i class="fa fa-edit"></i> <span>FROM TAMBAH DATA</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../../pages/forms/produk.php"><i class="fa fa-circle-o"></i> Tambah Produk</a></li>
            <li class="active"><a href="artikel.php"><i class="fa fa-circle"></i> Tambah Artikel</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>FROM TRANSAKSI</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../transaksi/transaksi.php"><i class="fa fa-circle-o"></i> Transaksi</a></li>
            <li><a href="../transaksi/report.php"><i class="fa fa-circle-o"></i> Laporan Hasil Penjualan</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i> <span>CUSTOMER</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li ><a href="../customer/customer.php"><i class="fa fa-circle-o"></i> Customer</a></li>
          </ul>
        </li>
       
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tambah Artikel
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="artikel.php"><i class="fa fa-edit"></i> Form</a></li>
        <li class="active">Tambah Artikel</li>
      </ol><br>

      <div class="container">
       <a href="tambah_artikel.php" class="btn btn-success btn-lg">Tambah Data</a> <br><br>
      </div>

      <div class="container col-md-12 ">
        <div class="table-responsive ">
        <table class="table table-hover" style="width: 100; background-color:   #eafffc " >
      
          <tr style="background-color: #5cb85c;">
            <th class="text-center">No.</th>
            <th style="width: 20%;" class="text-center">Judul Artikel</th>
            <th class="text-center">Isi Artikel</th>
            <th style="width: 20%;" class="text-center">Gambar Artikel</th>
            <th style="width: 15%;" class="text-center">Tanggal Artikel</th>
            <th style="width: 9%;" class="text-center">Aksi</th>

          </tr>
          <?php $i = 1; ?>
          <?php foreach ( $artikel as $row): ?>
          <tr>
            
            <td><?= $i ?></td>
            <td><?= $row["judul_artikel"]; ?></td>
            <td><?= $row["isi_artikel"]; ?></td> 
            <td><img src="../../img/artikel/<?= $row["gambar_artikel"]; ?>" width="100%"></td>
            <td><?= $row["tanggal_artikel"]; ?></td>
            <td><center>
              <a href="ubah_artikel.php?id=<?= $row["kode_artikel"]; ?>"><button class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button></a>
             <a href="hapus_artikel.php?id=<?= $row ["kode_artikel"] ?>" onclick="return confirm('yakin ?')"><button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button></a>
            </center></td>
          </tr>
          <?php $i++; ?>
          <?php endforeach; ?>
      </table>

            <?php if($halamanAktif > 1) : ?>
              <a href="?halaman=<?= $halamanAktif -1 ?>"> &lt;</a>
            <?php endif; ?>  
            <?php for($h = 1; $h <= $jumlahHalaman; $h++) : ?>
              <?php if($h == $halamanAktif) : ?>
                <a href="?halaman=<?= $h; ?>" style="font-weight: bold; color: black;"><?= $h; ?> </a>
              <?php else : ?>
                <a href="?halaman=<?= $h; ?>"><?= $h; ?></a>  
              <?php endif; ?>
            <?php endfor; ?>  
            <?php if($halamanAktif < $jumlahHalaman) : ?>
              <a href="?halaman=<?= $halamanAktif +1 ?>"> &gt;</a>
            <?php endif; ?> 
        </div>
      </div>
      </div>


       </section>
    <!-- /.content -->
  </div>



  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2018 <a href="https://adminlte.io">Scremindo</a>.</strong> KEEP HEALTHY WITH ORGANIC ICE CREAM
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
       
          
          </div>
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../../bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
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
