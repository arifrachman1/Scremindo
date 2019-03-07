<?php 
session_start();
if (!isset($_SESSION["login"]) ) {
  header("Location: ../../login.php");
  exit;
}
require '../../function.php';

$id = $_GET['id'];
$barang = query("SELECT * FROM tbl_produk WHERE kode_produk = " . $id)[0];
$gambar = $barang['foto_produk']; 

if (hapus_produk($id) > 0) {
  if ($gambar) {
    unlink('../../../img/' .$gambar);
  }
	echo "
    <script>
      alert('data berhasil dihapus!');
      document.location.href = 'produk.php';
    </script>
    ";
}else{
	echo "
    <script>
      alert('data gagal dihapus!');
      document.location.href = 'produk.php';
    </script>
    ";
}

 ?>