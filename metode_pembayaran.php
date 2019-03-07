<?php
  ob_start(); // Awal pembacaan database
  session_start();	// Membuat session
  //if(!isset($_SESSION['tbl_customer_id_customer'])) header("location: login.php"); 
  //Jika customer tidak terdapat di dalam database, maka arahkan ke halaman login
  require 'functions.php'; // Memasukkan file function.php yang berisi koneksi database

  if (isset($_POST["cash_on_delivery"])) {
        if (simpan_transaksi_cod($_POST)) {

          simpan_detailtransaksi();

          echo "<script>
            alert('Data tersimpan!');
            location='final.php';
          </script>";
        }
      }

   if (isset($_POST["transfer_via_bank"])) {

        if (simpan_transaksi_transfer($_POST)) {

          simpan_detailtransaksi();

          echo "<script>
            alert('Data tersimpan!');
            location='final.php';
          </script>";
        }
      }  
  ?>
  <?php include 'header.php'; ?>
  <div class="container">
	  <h3 align="center">Pembayaran</h3><br>
	  <div class="col-sm-6">
      <form method="post" action="">
	  		<div class="panel panel-default" style="padding-bottom: 80px;">
	  			<div class="panel-body">
	  				<div class="col-sm-12">
	  					<h4 class="text-info">Cash On Delivery</h4>
	  					<p>Data pesanan Anda akan terkirim ke administrasi</p>
              <p>Pesanan akan segera sampai ke alamat Anda</p>
	  				</div>
            <input type="hidden" name="metode_pembayaran" value="cash on delivery">
            <div class="col-sm-12" style="margin: 60px 200px -85px 200px;">
              <input type="submit" name="cash_on_delivery" class="btn btn-primary" value="Pilih">
            </div>
	  			</div>
	  		</div>
      </form>
      <?php
      
      ?>
	  </div>
	  <div class="col-sm-6">
      <form method="post" action="" enctype="multipart/form-data">
	  		<div class="panel panel-default">
	  			<div class="panel-body">
	  				<div class="col-sm-12">
	  					<h4 class="text-info">Transfer</h4>
	  					<p>Pembayaran dapat dilakukan dengan mengirimkan transfer pada nomor rekening berikut ini</p>
	  					<p>No. Rekening : 0021-01-9999-9999</p>
              <p>Upload bukti pembayaran</p>
              <input type="hidden" name="metode_pembayaran" value="transfer via bank">
	  					<p><input type="file" name="foto_bukti_pembayaran" class="form-control" placeholder="Upload bukti pembayaran" id="foto_bukti_pembayaran" required></p>
	  				</div>
	  				<div class="col-sm-12" style="margin: -10px 200px 0px 200px;">
	  					<input type="submit" name="transfer_via_bank" class="btn btn-primary" value="Pilih">
	  				</div>
	  			</div>
	  		</div>
      </form>
      <?php
     
      ?>
	  </div>
	  <a href="checkout.php" class="btn btn-primary" style="margin-top: 40px; margin-bottom: 60px;"> Kembali </a>
  	
  </div>

  	<!-- Footer -->
  	<?php include 'footer.php'; ?>

  	<!-- Bootstrap core JavaScript -->
  	<script src="vendor/jquery/jquery.min.js"></script>
  	<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

  </html>
  <?php
  mysqli_close($koneksi);
  ob_end_flush();
  ?>