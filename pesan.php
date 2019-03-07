<?php
  // Membuat session
  session_start();	
  //Jika customer tidak terdapat di dalam database, maka arahkan ke halaman login
  if(!isset($_SESSION['tbl_customer_id_customer'])) header("location: login.php"); 
  // Memasukkan file function.php yang berisi koneksi database
  include 'functions.php'; 
?>
  <?php include 'header.php'; ?>
    <div class="container">
    	<h3 align="center">Produk Scremindo</h3>
    	<?php $ambil = $koneksi-> query ("SELECT * FROM tbl_produk ORDER BY kode_produk ASC"); ?>
    	<?php $i = 0;?>
		<?php while($perproduk = $ambil -> fetch_assoc()){
			$i++;
			?>	
		
			<div class="col-sm-3">
				<div class="panel panel-default">
					<div class="panel-body"> 
						<form method="post" action="pesan.php?action=add&kode=<?php echo $row ["kode_produk"];?>">
						<div>
							<img src="admin/img/produk/<?php echo $perproduk["foto_produk"];?>" class="img-product" alt="">
							<h4 class="product-name"><?php echo $perproduk["nama_produk"];?></h4>
							<h4 class="product-price">Rp.<?php echo number_format ($perproduk["harga"]);?></h4>
							<a href="beli.php?kode=<?php  echo $perproduk['kode_produk'];?>" class="btn btn-primary"> Beli </a>
							<!--<input type="checkbox" name="checkbox<?php// echo($perproduk['kode_produk'])?>" value="beli.php?kode=<?php //echo $perproduk['kode_produk'].'+';?>">-->
						</div>
						</form>
					</div>
				</div>
			</div>
		<?php 
			// Jika panel produk yang ditambahkan melebihi 4 kolom, maka panel akan berpindah pada baris selanjutnya.
			if ($i === 4) {
				echo "<br>";
			}
		} ?>
	</div>
    
    <!-- Footer -->
    <?php include 'footer.php'; ?>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
