<?php
session_start();
require 'functions.php';
$id_customer = $_SESSION['tbl_customer_id_customer'];
$ambil=$koneksi -> query("SELECT kode_barang, jumlah FROM tbl_keranjang WHERE id_customer = '1'");
while ($data = $ambil -> fetch_assoc()){
?>

<table>
	<tr>
		<th>Kode barang</th>
		<th>Jumlah</th>
	</tr>
	<tr>
		<td><?php echo $data['kode_barang'];?></td>
		<td><?php echo $data['jumlah'];?></td>
	</tr>
</table>

<?php } ?>