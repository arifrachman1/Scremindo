<?php 
session_start();
if (!isset($_SESSION["login"]) ) {
  header("Location: login.php");
  exit;
}
require 'function.php';

$id = $_GET['id'];
$data = query("SELECT * FROM tbl_admin WHERE kode_admin = " . $id)[0];
$foto_admin = $data['foto_admin'];


if (hapus_admin($id) > 0) {
  if ($foto_admin) {
    unlink('img/admin/' .$foto_admin);
  }
	echo "
    <script>
      alert('data berhasil dihapus!');
      document.location.href = 'index.php';
    </script>
    ";
}else{
	echo "
    <script>
      alert('data gagal dihapus!');
      document.location.href = 'index.php';
    </script>
    ";
}

 ?>