<?php
session_start(); 
//mendapat kode dari url
$kode_barang = $_GET['kode'];

if(isset ($_SESSION ['bayar'] [$kode_bayar]))
{
	$_SESSION['bayar'][$kode_bayar]+=1;
}
else
{
	$_SESSION['bayar'][$kode_bayar] =1;
}

echo"<script>alert ('cetak struk!!!'); </script>";
echo"<script>location='final.php'; </script>";
?>