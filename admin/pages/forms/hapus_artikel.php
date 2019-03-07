<?php 
 session_start();
if (!isset($_SESSION["login"]) ) {
  header("Location: ../../login.php");
  exit;
}
require '../../function.php';

$id = $_GET['id'];
$barang = query("SELECT * FROM tbl_artikel WHERE kode_artikel = " . $id)[0];
$gambar = $barang['gambar_artikel'];


if (hapus_artikel($id) > 0) {
  if ($gambar) {
    unlink('../../img/artikel/' .$gambar);
  }
	echo "
    <script>
      alert('data berhasil dihapus!');
      document.location.href = 'artikel.php';
    </script>
    ";
}else{
	echo "
    <script>
      alert('data gagal dihapus!');
      document.location.href = 'artikel.php';
    </script>
    ";
}

 ?>