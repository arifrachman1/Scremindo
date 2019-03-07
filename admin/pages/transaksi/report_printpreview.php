<?php
	require '../../function.php';

	if(isset($_POST['submit'])):
		$bulan = $_POST['bulan'];
		$tahun = $_POST['tahun'];
		$transaksi = query("SELECT * FROM tbl_transaksi WHERE MONTH(tanggal) = '$bulan' AND YEAR(tanggal) = '$tahun'");
		?>
		<!DOCTYPE html>
		<html>
		<head>
		  <meta charset="utf-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
		  <title>Admin | Laporan Transaksi Penjualan Per Bulan</title>
		<!-- Tell the browser to be responsive to screen width -->
		  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		  <!-- Bootstrap 3.3.7 -->
		  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		  <!-- Bootstrap 3.3.7 -->
		  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
		  <!-- Font Awesome -->
		  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
		  <!-- Ionicons -->
		  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
		  <!-- Theme style -->
		  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
		  <link rel="stylesheet" href="../../dist/css/style.css">
		  <!-- AdminLTE Skins. Choose a skin from the css/skins
		       folder instead of downloading all of them to reduce the load. -->
		  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
		  <!-- Morris chart -->
		  <link rel="stylesheet" href="../../bower_components/morris.js/morris.css">
		  <!-- jvectormap -->
		  <link rel="stylesheet" href="../../bower_components/jvectormap/jquery-jvectormap.css">
		  <!-- Date Picker -->
		  <link rel="stylesheet" href="../../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
		  <!-- Daterange picker -->
		  <link rel="stylesheet" href="../../bower_components/bootstrap-daterangepicker/daterangepicker.css">
		  <!-- bootstrap wysihtml5 - text editor -->
		  <link rel="stylesheet" href="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">



		  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		  <!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		  <![endif]-->

		  <!-- Google Font -->
		  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
		</head>
		<body>
			<div class="container">
				<div class="row">
					<h3 align="center">Laporan Transaksi Penjualan Bulan <?php
					// menampilkan nama bulan secara otomatis menurut query
					switch ($bulan) {
						case '1': echo "Januari"; break;

						case '2': echo "Februari"; break;

						case '3': echo "Maret"; break;

						case '4': echo "April"; break;

						case '5': echo "Mei"; break;

						case '6': echo "Juni";break;

						case '7': echo "Juli"; break;

						case '8': echo "Agustus"; break;

						case '9': echo "September"; break;

						case '10': echo "Oktober"; break;

						case '11': echo "November"; break;

						case '12': echo "Desember"; break;
						
						default: echo ""; break;
					}
					echo " ".$tahun;?></h3>
					<h3 align="center">CV. Scremindo Cita Aneka</h3>
					<button id="printbutton" name="cetak" onclick="window.print();">Print</button>
					<div class="table-responsive">
						<table class="table" style="width: 100; background-color: #eafffc">
							<tr style="background-color: #5cb85c;">
								<th class="text-center">No.</th>
								<th class="text-center">Kode Transaksi</th>
					            <th class="text-center">ID Customer</th>
					            <th class="text-center">Tanggal</th>
					            <th class="text-center">Metode Pembayaran</th>
					            
					            <th class="text-center">Keterangan</th>
							</tr>
							<?php $i = 1; ?>
            				<?php foreach ( $transaksi as $row): ?>
            				<tr>
            					<td class="text-center"><?= $i; ?></td>
            					<td class="text-center"><?= $row['kode_transaksi']; ?></td>
            					<td class="text-center"><?= $row['id_customer']; ?></td>
            					<td class="text-center"><?= $row['tanggal']; ?></td>
            					<td class="text-center"><?= $row['metode_pembayaran']; ?></td>
            					<td class="text-center"><?= $row['keterangan']; ?></td>
            				</tr>
            				<?php $i++; ?>
            				<?php endforeach; ?>
						</table>
					</div>
				</div>
			</div>
		</body>
		</html>
		<?php
	endif;
?>