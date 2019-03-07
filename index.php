<!-- Koneksi database -->
<?php include 'functions.php'; ?>

<!-- Header (Jumbotron + Navbar) -->
<?php include 'home_header.php'; ?>
    <!-- Page Content -->
    <div class="container">
      <!-- Carousel dan Produk -->
      <div class="row">
        <div class="col-lg-3">
        </div>
        <!-- Carousel Wrapper -->
        <div class="col-lg-6">
          <!-- Carousel -->
          <div id="foto" class="carousel slide my-4" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#foto" data-slide-to="0" class="active"></li>
              <li data-target="#foto" data-slide-to="1"></li>
              <li data-target="#foto" data-slide-to="2"></li>
              <li data-target="#foto" data-slide-to="3"></li>
              <li data-target="#foto" data-slide-to="4"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
              <div class="carousel-item active">
                <img class="d-block img-fluid" src="img/a.jpg" style="width: 1100px; height: 400px;" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="img/b.jpg" style="width: 1100px; height: 400px;" alt="Second slide">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="img/c.jpg" style="width: 1100px; height: 400px;" alt="Third slide">
              </div>          
              <div class="carousel-item">
                <img class="d-block img-fluid" src="img/4.jpg" style="width: 1100px; height: 400px;" alt="Forth slide">
              </div>          
              <div class="carousel-item">
                <img class="d-block img-fluid" src="img/5.jpg" style="width: 1100px; height: 400px;" alt="Fifth slide">
              </div>
            </div>
            <a class="carousel-control-prev" href="#foto" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#foto" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
          <!-- End Carousel -->
        </div>
        <!-- End Carousel Wrapper -->
          
        </div>
        <!-- Akhir Row Produk -->
      </div>

      <!-- Entries Columns -->
      <div class="container">
        <div class="row">

          <div class="col-md-2"></div>
    <div class="col-md-8">
      <!-- Carousel-->
      <?php $ambil=$koneksi->query("SELECT * FROM tbl_produk");?>

      <!--artikel cuy-->
      <h1 class="my-4" align="center">Artikel</h1>

      <?php  $ambil=$koneksi->query("SELECT * FROM tbl_artikel");?>
      <?php while ($pecah = $ambil->fetch_assoc()){ ?>
      <div class="card mb-6">
        <img class="card-img-top" src="admin/img/artikel/<?php echo $pecah ['gambar_artikel'];?>" alt="Card image cap">
        <div class="card-body">
          <h2 class="card-title"><?php echo $pecah ['judul_artikel'];?></h2>
          <p class="card-text"><?php echo $pecah ['isi_artikel'];?></p>
        </div>
        <div class="card-footer text-muted">
            <?php echo $pecah['tanggal_artikel']; ?>
        </div>
      </div>
      <br><br><br>
      <?php } ?>
    </div>
    <div class="col-md-2"></div>
    </div>
    </div>
    <!-- Akhir Page Content -->

    <!-- Footer -->
    <?php include 'footer.php' ?>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  
  </body>

</html>
