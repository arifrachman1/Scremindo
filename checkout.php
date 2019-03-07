<?php
session_start();

/*echo "<pre>";
print_r($_SESSION);
echo "</pre>";*/

//Jika customer tidak terdapat di dalam database, maka arahkan ke halaman login
if(!isset($_SESSION['tbl_customer_id_customer'])) header("location: login.php");

//Jika pelanggan belum melakukan checkout, tampilkan pesan lalu arahkan ke halaman pesan.php
if(empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"])) 
{
    echo "<script> alert('Keranjang kosong, Anda belum memesan produk!'); </script>";
    echo "<script>location='pesan.php';</script>";
}


//echo"<pre>";
//print_r($_SESSION['keranjang']);
//echo"</pre>";

//koneksi ke database
include 'functions.php';

 ?>
<?php include 'header.php';?>

    <!-- Page Content -->
    <div class="container" style="margin-bottom: 50px;" align="center">
      <form method="post" action="">
      <div class="row">
        <h2> Daftar Belanja </h2>
        <hr>
        <table class="table table-bordered" style="background-color: white;">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Sub Harga</th>                    
                </tr>
            </thead>
            <tbody>
                <?php $nomer=1;?>
                <?php $total=0;?>
                <?php foreach ($_SESSION["keranjang"] as $kode_produk=> $jumlah):?>
                <?php 
                $ambil = $koneksi->query ("SELECT * FROM tbl_produk WHERE kode_produk='$kode_produk'");
                $data_produk = $ambil -> fetch_assoc();

                //$jumlah = $_SESSION['check'][$kode_produk];
                    
                $subharga = $data_produk["harga"]*$jumlah;
                    
                ?>
                <tr>
                    <td><?php echo $nomer;?> </td>
                    <td> <?php echo $data_produk["nama_produk"];?></td>
                    <td> Rp.<?php echo $data_produk["harga"];?></td>
                    <td> <?php echo $jumlah; ?></td>
                    <td> Rp.<?php echo number_format ($subharga);?></td>
                    <!--<td> <a href="hapusproduk.php?kode=<?php// echo $kode_produk?>" class="btn btn-danger">Hapus</a></td>-->
                </tr>
                <?php $nomer++;?>
                <?php $total+= $subharga;?>
                <?php endforeach ?>
                <tr>
                    <td colspan="4" align="center"> Total</td>
                    <td align="right">Rp. <?php echo number_format($total, 2); ?></td>
                </tr>
            </tbody>
        </table>
        <a href="keranjang.php" class="btn btn-primary"> Kembali </a>
        <hr><a href="metode_pembayaran.php" class="btn btn-primary">Bayar</a>
        </form>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <?php include 'footer.php';?>

 <!-- /.container -->


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>