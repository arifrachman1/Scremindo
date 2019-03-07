<?php
session_start();

//echo"<pre>";
//print_r($_SESSION['keranjang']);
//echo"</pre>";

//koneksi ke database
require 'functions.php';

?>
<?php include 'header.php';?>

    <!-- Page Content -->
    <div class="container" style="margin-bottom: 50px;" align="center">
        <div><h2> Struk Belanja</h2></div><br>
        <?php 

                if (isset($_SESSION['tbl_customer_id_customer'])) {
                    $id = $_SESSION['tbl_customer_id_customer'];
                    $ambil = mysqli_query($koneksi, "SELECT * FROM tbl_customer WHERE id_customer = '$id'");

                    if (mysqli_num_rows($ambil) === 1) {
                        $coba = mysqli_fetch_assoc($ambil);?>
                        <ul style="list-style-type:none;">
                            <li style="text-align: left;">Nama : <?php echo $coba['nama']; ?></li>
                            <li style="text-align: left;">Alamat : <?php echo $coba['alamat'];?></li>
                        </ul>
                    <?php
                }

            }

        ?>
        <form method="post" action="">
            <div class="row">

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
                <hr><button id="printbutton" name="simpan" class="btn btn-default" onclick="window.print();">Print Struk</button>
        </form>
            </div>
      </div>
      </form>
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