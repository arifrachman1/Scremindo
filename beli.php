<?php
session_start(); 
//mendapat kode dari url
$kode_barang = $_GET['kode'];

if(isset ($_SESSION ['keranjang'] [$kode_barang]))
{
	$_SESSION['keranjang'][$kode_barang]+=1;
}
else
{
	$_SESSION['keranjang'][$kode_barang] =1;
}

echo"<script>alert ('produk telah ada dikeranjang'); </script>";
echo"<script>location='keranjang.php'; </script>";
?>