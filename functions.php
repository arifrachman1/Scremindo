<?php
	global $koneksi;

	$koneksi = NEW MySQLi("localhost", "root", "", "db_scremindo");
	if(!$koneksi){
		die("Koneksi Gagal".mysqli_connect_error());
	}

	function registrasi($data)
	{
		global $koneksi;

		// ambil data dari parameter yang telah diisi variabel $_POST dari halaman daftar.php
		$nama = $data["nama"];
		$tempat_lahir = $data["tempat_lahir"];
		$tahun = $data["tahun"]; $bulan = $data["bulan"]; $hari = $data["hari"];
		$tanggal_lahir = $tahun . "-" . $bulan . "-" . $hari;
		$jenis_kelamin = $data["jenis_kelamin"];
		$no_telepon = $data["no_telepon"];
		$alamat = $data["alamat"];
		$email = strtolower(stripslashes($data["email"]));
		$password = mysqli_real_escape_string($koneksi, $data["password"]);
		$password2 = mysqli_real_escape_string($koneksi, $data["password2"]);

		// cek email sudah ada atau belum
		$result = mysqli_query($koneksi, "SELECT email FROM tbl_customer WHERE email = '$email'");

		if(mysqli_fetch_assoc($result))
		{
			echo "<script>
			    	alert('Email sudah terdaftar!');
				  </script>";
				  
			return false;
		}

		// cek konfirmasi password
		if($password !== $password2)
		{
			echo "<script>
					alert('Konfirmasi password tidak sesuai!');
				</script>";

			return false;
		}


		// enkripsi password
		//$password = password_hash($password, PASSWORD_DEFAULT);

		// tambahkan user baru ke database
		mysqli_query($koneksi, "INSERT INTO tbl_customer VALUES('', '$nama', '$tempat_lahir', '$tanggal_lahir', '$jenis_kelamin', '$no_telepon', '$alamat', '$email', '$password')");

		return mysqli_affected_rows($koneksi);
	}

	function pulihkan($data) 
	{
		global $koneksi;
		// ambil data dari parameter yang telah diisi variabel $_POST dari file password_baru.php
		$emailno = $data['emailno'];
		$password = mysqli_real_escape_string($koneksi, $data["password"]);
		$password2 = mysqli_real_escape_string($koneksi, $data["password2"]);

		// cek konfirmasi password
		if($password !== $password2)
		{
			echo "<script>
					alert('Konfirmasi password tidak sesuai!');
				</script>";

			return false;
		}

		// Update password
		mysqli_query($koneksi, "UPDATE tbl_customer SET password='$password' WHERE email='$emailno' OR no_telepon='$emailno'");

		return mysqli_affected_rows($koneksi);
	}

	function cek_stok() // keranjang
	{
		global $koneksi;

		// memeriksa setiap baris yang berisi produk yang dipesan apakah masih ada atau tidak
		foreach ($_SESSION["keranjang"] as $kode_produk => $jumlah):
                        $ambil = $koneksi->query ("SELECT * FROM tbl_produk WHERE kode_produk='$kode_produk'");
                        $data_produk = $ambil -> fetch_assoc();
                        if($jumlah > $data_produk["stok"]){
                            echo "<script> alert('Jumlah produk ".$data_produk['nama_produk']." yang Anda pesan melebihi stok yang tersedia, silakan pilih produk lainnya.'); </script>";

                            return false;
                        }
                    endforeach;

		return mysqli_affected_rows($koneksi);
	}

	function simpan_transaksi_cod($data) // prosesbayar
	{
		global $koneksi;

		$id_customer = $_SESSION["tbl_customer_id_customer"];

		$tanggal = date("Y/m/d");

		// memasukkan metode pembayaran
		$metode_pembayaran = $data["metode_pembayaran"];

		mysqli_query($koneksi, "INSERT INTO tbl_transaksi SET id_customer = '$id_customer', tanggal = '$tanggal', metode_pembayaran = '$metode_pembayaran', keterangan = 'Belum Bayar'");

        return mysqli_affected_rows($koneksi);
	}

	function simpan_transaksi_transfer($data) // prosesbayar
	{
		global $koneksi;

		$id_customer = $_SESSION["tbl_customer_id_customer"];

		$tanggal = date("Y/m/d");

		// memasukkan metode pembayaran
		$metode_pembayaran = $data["metode_pembayaran"];

		// memasukkan bukti pembayaran
		$foto_bukti_pembayaran = upload_bukti_pembayaran();
		if (!$foto_bukti_pembayaran) {
		    return false;
		}

		mysqli_query($koneksi, "INSERT INTO tbl_transaksi SET id_customer = '$id_customer', tanggal = '$tanggal', metode_pembayaran = '$metode_pembayaran', foto_bukti_pembayaran = '$foto_bukti_pembayaran', keterangan = 'Sudah Bayar'");

        return mysqli_affected_rows($koneksi);
	}

	function simpan_detailtransaksi() {
		global $koneksi;

		$tanggal = date("Y/m/d");

		$total_jumlah_produk = 0;
		$total_harga = 0;

		foreach ($_SESSION["keranjang"] as $kode_produk=> $jumlah):

		    $ambil_tbl_produk = $koneksi -> query("SELECT * FROM tbl_produk WHERE kode_produk='$kode_produk'");
		    $data_produk = $ambil_tbl_produk -> fetch_assoc();

		    $kode_produk = $data_produk["kode_produk"];

		    $subharga = $data_produk["harga"]*$jumlah;
		   
		    // mengurangi stok
		    $stok = $data_produk["stok"] - $jumlah;

		    // meng-update jumlah stok
	        mysqli_query($koneksi, "UPDATE tbl_produk SET stok = '$stok' WHERE kode_produk = '$kode_produk'"); 

	        $ambil_tbl_transaksi = $koneksi -> query("SELECT * FROM tbl_transaksi WHERE tanggal = '$tanggal'");
	        $data_transaksi = $ambil_tbl_transaksi -> fetch_assoc();

	        $kode_transaksi = $data_transaksi["kode_transaksi"];

	        $total_jumlah_produk += $jumlah;

		    $total_harga += $subharga;

		    // input data produk menurut kode produk
		    mysqli_query($koneksi, "INSERT INTO tbl_detailtransaksi SET kode_transaksi = '$kode_transaksi', kode_produk = '$kode_produk', jumlah_produk = '$jumlah', subtotal_harga = '$subharga'");

        endforeach;

        mysqli_query($koneksi, "INSERT INTO tbl_transaksi SET total_jumlah_produk = '$total_jumlah_produk', total_harga = '$total_harga'");

        return mysqli_affected_rows($koneksi);

	}

	function upload_bukti_pembayaran(){
	  $namaFile = $_FILES['foto_bukti_pembayaran']['name'];
	  $ukuranFile = $_FILES['foto_bukti_pembayaran']['size'];
	  $error = $_FILES['foto_bukti_pembayaran']['error'];
	  $tmpName = $_FILES['foto_bukti_pembayaran']['tmp_name'];


	  if ($error === 4 ) {
	    echo "<script>
	          alert('pilih gambar terlebih dahulu!');
	          </script>";
	    return false;
	  }

	  $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	  $ekstensiGambar = explode('.', $namaFile);
	  $ekstensiGambar = strtolower(end($ekstensiGambar));
	  if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
	    echo "<script>
	          alert('yang anda upload bukan gambar!');
	          </script>";
	    return false;
	  }

	  if ($ukuranFile > 1000000) {
	    echo "<script>
	          alert('gambar terlalu besar!');
	          </script>";
	    return false;
	  }

	  $namaFileBaru = uniqid();
	  $namaFileBaru .= '.';
	  $namaFileBaru .= $ekstensiGambar;

	  move_uploaded_file($tmpName, 'D:/xampp/htdocs/scremindo.com/admin/img/bukti_bayar/'. $namaFileBaru);
	  return $namaFileBaru;
	}

?>