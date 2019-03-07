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
    <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7/dist/css/bootstrap.min.css">

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

  <body>
      
    <!-- Navigation -->
    <nav class="navbar sticky-top navbar-expand-sm nav-bg">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand logo" href="index.php"><img src="img/logo.png" style="width: 50px; "></a>
          <a class="navbar-brand" href="index.php"> Scremindo</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="navbar-nav" style="margin-left: 407px;">
            <li>
              <a class="nav-link" href="index.php">Home
                <span class="sr-only">(current)</span>
              </a>
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
            if(isset($_SESSION['tbl_customer_id_customer'])){echo "
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