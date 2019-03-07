<?php 
session_start();
$kode_barang = $_GET["kode"];
unset($_SESSION["keranjang"][$kode_barang]);

echo"<script>alert('produk dihapus');</script>";
//echo"<script>Location='keranjang.php';</script>";
header("location: keranjang.php");
?>