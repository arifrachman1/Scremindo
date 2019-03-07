<?php
	// Membuat session
	session_start();
	//koneksi ke database
	include 'functions.php';
?>
	<?php include 'header.php'; ?>
  	<!-- Page Content -->
  	<div class="container" align="center">
    	<div class="row">
				<div class="col-sm-3"></div>
				<div class="col-sm-6">
					<!-- Row Produk -->
					<div class="row row-product">
						<?php $ambil = $koneksi -> query("SELECT * FROM tbl_produk ORDER BY kode_produk ASC");?>
						<?php while($data_produk = $ambil -> fetch_assoc()){ ?>
						<!-- Item 1 -->
						<div class="col-sm-12 col-sm-8 mb-4">
							<div class="card h-100" >
								<a href="#"><img class="card-img-top" src="admin/img/produk/<?php echo $data_produk['foto_produk'];?>" alt=""></a>
								<div class="card-body">
									<h4 class="card-title">
										<a href="#"><b><?php echo $data_produk['nama_produk'];?></b></a>
									</h4>
									<h5>Rp. <?php echo number_format($data_produk['harga']); ?></h5>
									<p class="card-text"><?php echo $data_produk['detail_produk'];?></p>
								</div>
								<div class="card-footer">
									<small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
								</div>
							</div>
						</div>
						<?php } ?>
						
					</div>
				</div>
				<div class="col-sm-3"></div>
			<!-- /.row -->
    	</div>
		<!-- /.container -->
		</div>

    <!-- Footer -->
    <?php include 'footer.php' ?>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
