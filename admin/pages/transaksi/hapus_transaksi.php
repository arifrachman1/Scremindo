<?php 
session_start();
if (!isset($_SESSION["login"]) ) {
  header("Location: ../../login.php");
  exit;
}
require '../../function.php';

$id = $_GET['id'];
$transaksi = query("SELECT * FROM tbl_transaksi WHERE kode_transaksi = " . $id)[0];
$gambar = $transaksi['foto_bukti_pembayaran']; 

$detailtransaksi = query("SELECT * FROM tbl_detailtransaksi WHERE kode_transaksi = " . $id)[0];

if (hapus_transaksi($id) > 0) {
  if ($gambar) {
    unlink('../../../img/bukti_bayar/' .$gambar);
  }
	echo "
    <script>
      alert('data berhasil dihapus!');
      document.location.href = 'transaksi.php';
    </script>
    ";
}else{
	echo "
    <script>
      alert('data gagal dihapus!');
      document.location.href = 'transaksi.php';
    </script>
    ";
}

 ?>