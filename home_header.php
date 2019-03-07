<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Scremindo</title>

    <!-- Favicons -->
  <link href="img/logo.png" rel="icon">
  <link href="img/logo.png" rel="SCREMINDO">

  
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
    

      <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/magnific-popup/magnific-popup.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="css/style.css">

 

  </head>

  <body id="body">

      <section id="top">
    <div class="container">
      <div class="row">
        <div class="col-md-3 clearfix">
          
        </div>
        </div>
        </div>  <!-- End Of /.Container -->


    <div class="jumbotron text-center">
      <img src="img/logo.png" class="img-circle" >
      <h1>SCREMINDO</h1>
      <p>Eskrim Sehat || Kaya Nutrisi || Keep Happy || Keep Healthy</p>
    </div>


    <!-- Navigation -->
    <nav class="navbar sticky-top navbar-expand-sm nav-bg">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="index.php"> <img src="img/logo.png" style="width: 50px;"> Scremindo</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="produk.php">Produk Kami</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pesan.php">Pesan Sekarang</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="tentang.php">Tentang Kami</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="kontak.php">Kontak Kami</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="checkout.php"><span class="fa fa-shopping-cart"></span> Cart</a>
            </li>
            <?php 
            // Mengubah icon login menjadi logout bila user masuk ke halaman 
            if(isset($_SESSION['login'])){echo "
            <li class='nav-item'>
              <a class='nav-link' href='logout.php'>
                <span class='glyphicon glyphicon-log-out'></span>
                Logout
              </a>
            </li>";
              }
              else
              { echo "
            <li class='nav-item'>
              <a class='nav-link' href='login.php'>
              <span class='fa fa-user'></span>
                Login
              </a>
            </li>";
              } ?>
          </ul>
        </div>
      </div>
    </nav>