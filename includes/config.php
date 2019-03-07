<?php
	global $koneksi;
	
	$nameserver = "localhost";
	$username 	= "root";
	$password 	= "";
	$namadb 	= "db_scremindo";
	
	$koneksi = mysqli_connect($nameserver,$username,$password,$namadb);
	
	if(!$koneksi){
		die ("Koneksi Gagal".mysqli_connect_error());
	}

?>