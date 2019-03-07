<?php
session_start();

//echo"<pre>";
//print_r($_SESSION['keranjang']);
//echo"</pre>";

//koneksi ke database
include 'functions.php';;

if(empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"]))
{
    echo "<script>alert('keranjang kosong, beli produk!!');</script>";
    echo "<script>location='pesan.php';</script>";
}
 ?>
<?php include 'header.php';?>

    <!-- Page Content -->
    <div class="container" style="margin-bottom: 50px;" align="center">
      <form method="post" action="">
      <div class="row">
        <h2> Keranjang Belanja </h2>
        <hr>
        <table class="table table-bordered" style="background-color: white;">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Jumlah Pesanan</th>
                    <th> Keterangan</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php $nomer=1;?>
                <?php $total=0;?>
                <?php foreach ($_SESSION["keranjang"] as $kode_produk => $jumlah):?>
                <?php 
                $ambil = $koneksi->query ("SELECT * FROM tbl_produk WHERE kode_produk='$kode_produk'");
                $data_produk = $ambil -> fetch_assoc();
                    
                ?>
                <tr>
                    <td><?php echo $nomer;?> </td>
                    <td> <?php echo $data_produk["nama_produk"]; ?></td>
                    <td> Rp.<?php echo $data_produk["harga"]; ?></td>
                    <td><input type="hidden" name="jumlah" min="1" class="form-control" value="<?php echo $jumlah; ?>"><?php echo $jumlah; ?></td>
                    <td> <a href="hapusproduk.php?kode=<?php echo $kode_produk?>" class="btn btn-danger">Hapus</a></td>
                </tr>
                <?php $nomer++;?>
                <?php endforeach; ?>
                
            </tbody>
        </table>
        <a href="pesan.php" class="btn btn-primary"> Lanjut Belanja </a>
        <hr><button class="btn btn-primary" name="masuk">Checkout</button>
        </form>
            <?php
                if(isset($_POST['masuk']))
                {
                    

                    //print_r($_SESSION['keranjang']);

                    if (cek_stok()) {
                        echo "<script>location='checkout.php';</script>";

                    }

                }

            ?>
        

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