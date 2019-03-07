<?php 
 //koneksi ke database
 $conn = mysqli_connect("localhost", "root", "", "db_scremindo");

 // ambil data dari tabel admin / query data admin
function query($query) {

		global $conn;
		$result = mysqli_query($conn, $query);
		$rows = [];
		while( $row = mysqli_fetch_assoc($result) )  {
			$rows[] = $row;
		}
		return $rows;

}

function hapus_artikel($id){
	global $conn;
	mysqli_query( $conn, "DELETE FROM tbl_artikel WHERE kode_artikel = $id");
	return mysqli_affected_rows($conn);
}

function hapus_produk($id){
	global $conn;
	mysqli_query( $conn, "DELETE FROM tbl_produk WHERE kode_produk = $id");
	return mysqli_affected_rows($conn);
}

function hapus_admin($id){
  global $conn;
  mysqli_query( $conn, "DELETE FROM tbl_admin WHERE kode_admin = $id");
  return mysqli_affected_rows($conn);
}

function hapus_customer($id){
  global $conn;
  mysqli_query( $conn, "DELETE FROM tbl_customer WHERE id_customer = $id");
  return mysqli_affected_rows($conn);
}

function hapus_transaksi($id)
{
  global $conn;
  mysqli_query($conn, "DELETE FROM tbl_detailtransaksi WHERE kode_transaksi = $id");
  mysqli_query($conn, "DELETE FROM tbl_transaksi WHERE kode_transaksi = $id");
  return mysqli_affected_rows($conn);
}

function tambah_artikel($data){
  global $conn;

  $judul_artikel = htmlspecialchars($data['judul_artikel']);
  $isi_artikel = htmlspecialchars($data['isi_artikel']);
  $gambar_artikel = upload_artikel();
    if (!$gambar_artikel) {
        return false;
        }
  $tanggal_artikel = htmlspecialchars($data['tanggal_artikel']);

  $query = "INSERT INTO tbl_artikel 
      VALUES ('','$judul_artikel','$isi_artikel','$gambar_artikel','$tanggal_artikel')";

      mysqli_query($conn, $query);

      return mysqli_affected_rows($conn);
  
} 

function upload_artikel(){
  $namaFile = $_FILES['gambar_artikel']['name'];
  $ukuranFile = $_FILES['gambar_artikel']['size'];
  $error = $_FILES['gambar_artikel']['error'];
  $tmpName = $_FILES['gambar_artikel']['tmp_name'];


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

  move_uploaded_file($tmpName, '../../img/artikel/'. $namaFileBaru);
  return $namaFileBaru;
}


function tambah_produk($data){
  global $conn;

  $nama_produk = htmlspecialchars($data['nama_produk']);
  $foto_produk = upload_produk();
    if (!$foto_produk) {
        return false;
    }
  $stok = htmlspecialchars($data['stok']);
  $harga = htmlspecialchars($data['harga']);
  $tgl_pembuatan = htmlspecialchars($data['tgl_pembuatan']);
  $tgl_kadaluarsa = htmlspecialchars($data['tgl_kadaluarsa']);
  $detail_produk = htmlspecialchars($data['detail_produk']);

  $query = "INSERT INTO tbl_produk 
      VALUES ('','$nama_produk','$foto_produk','$stok','$harga','$tgl_pembuatan','$tgl_kadaluarsa','$detail_produk')";

      mysqli_query($conn, $query);

      return mysqli_affected_rows($conn);
} 

function upload_produk(){
  $namaFile = $_FILES['foto_produk']['name'];
  $ukuranFile = $_FILES['foto_produk']['size'];
  $error = $_FILES['foto_produk']['error'];
  $tmpName = $_FILES['foto_produk']['tmp_name'];


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

  move_uploaded_file($tmpName, '../../img/produk/'. $namaFileBaru);
  return $namaFileBaru;
}

function ubah_admin($data){
   global $conn;

  $no = $data["id"]; 
  $nama = htmlspecialchars($data["nama"]);
  $gambarLama = htmlspecialchars($data["gambarLama"]);

  if ($_FILES['foto_admin']['error'] === 4) {
    $gambar = $gambarLama;
  }else{
    $gambar = upload_admin();
  }

  $tempat_lahir = htmlspecialchars($data["tempat_lahir"]);
  $tanggal_lahir = htmlspecialchars($data["tanggal_lahir"]);
  $jenis_kelamin = htmlspecialchars($data["jenis_kelamin"]);
  $no_telepon = htmlspecialchars($data["no_telepon"]);
  $alamat = htmlspecialchars($data["alamat"]);
  $email = htmlspecialchars($data["email"]);
  $password = htmlspecialchars($data["password"]);

  $query = "UPDATE tbl_admin SET
              nama = '$nama',
              foto_admin = '$gambar',
              tempat_lahir = '$tempat_lahir',
              tanggal_lahir = '$tanggal_lahir',
              jenis_kelamin = '$jenis_kelamin',
              no_telepon = '$no_telepon',
              alamat = '$alamat',
              email = '$email',
              password = '$password'
              WHERE kode_admin = $no
            ";
       
      mysqli_query($conn, $query);

      return mysqli_affected_rows($conn);

}

function ubah_produk($data){
  global $conn;

  $no = $data["id"]; 
  $nama_produk = htmlspecialchars($data["nama_produk"]);
  $gambarLama = htmlspecialchars($data["gambarLama"]);

  if ($_FILES['foto_produk']['error'] === 4) {
    $foto_produk = $gambarLama;
  }else{
    $foto_produk = upload_produk();
  }

  $stok = htmlspecialchars($data["stok"]);
  $harga = htmlspecialchars($data["harga"]);
  $tgl_pembuatan = htmlspecialchars($data["tgl_pembuatan"]);
  $tgl_kadaluarsa = htmlspecialchars($data["tgl_kadaluarsa"]);
  $detail_produk = htmlspecialchars($data["detail_produk"]);

  if($stok < 0) {
    echo "<script>alert('Jumlah stok tidak valid'); </script>";
  }

  $query = "UPDATE tbl_produk SET
              nama_produk = '$nama_produk',
              foto_produk = '$foto_produk',
              stok = '$stok',
              harga = '$harga',
              tgl_pembuatan = '$tgl_pembuatan',
              tgl_kadaluarsa = '$tgl_kadaluarsa',
              detail_produk = '$detail_produk'
              WHERE kode_produk = $no
            ";

      mysqli_query($conn, $query);

      return mysqli_affected_rows($conn);
} 

function ubah_transaksi($data){
  global $conn;

  $no = $data['id'];
  $id_customer = $data["id_customer"]; 
  $tgl_transaksi = htmlspecialchars($data["tgl_transaksi"]);
  $metode_pembayaran = htmlspecialchars($data["metode_pembayaran"]);
  $gambarLama = htmlspecialchars($data["gambarLama"]);

  if ($_FILES['foto_bukti_pembayaran']['error'] === 4) {
    $foto_bukti_pembayaran = $gambarLama;
  }else{
    $foto_bukti_pembayaran = upload_produk();
  }

  $keterangan = htmlspecialchars($data["keterangan"]);

 $query = "UPDATE tbl_transaksi SET
              id_customer = '$id_customer',
              tanggal = '$tgl_transaksi',
              metode_pembayaran = '$metode_pembayaran',
              foto_bukti_pembayaran = '$gambarLama',
              keterangan = '$keterangan'
              WHERE kode_transaksi = $no
            ";

      mysqli_query($conn, $query);

      return mysqli_affected_rows($conn);
}

function ubah_artikel($data){
  global $conn;

  $no = $data["id"]; 
  $judul_artikel = htmlspecialchars($data['judul_artikel']);
  $isi_artikel = htmlspecialchars($data['isi_artikel']);
  $gambarLama = htmlspecialchars($data["gambarLama"]);

  if ($_FILES['gambar_artikel']['error'] === 4) {
    $gambar_artikel = $gambarLama;
  }else{
    $gambar_artikel = upload_artikel();
  }

  $tanggal_artikel = htmlspecialchars($data['tanggal_artikel']);

  $query = "UPDATE tbl_artikel SET
              judul_artikel = '$judul_artikel',
              isi_artikel = '$isi_artikel',
              gambar_artikel = '$gambar_artikel',
              tanggal_artikel = '$tanggal_artikel'
              WHERE kode_artikel = $no
            ";

      mysqli_query($conn, $query);

      return mysqli_affected_rows($conn);
} 
function cari_admin($keyword_admin){
  $query = "SELECT * FROM tbl_admin WHERE
        nama LIKE '%$keyword_admin%' OR
        tempat_lahir LIKE '%$keyword_admin%' OR
        tanggal_lahir LIKE '%$keyword_admin%' OR
        jenis_kelamin LIKE '%$keyword_admin%' OR
        alamat LIKE '%$keyword_admin%'
          ";
        return query($query); 
}

function cari_produk($keyword_produk){
  $query = "SELECT * FROM tbl_produk WHERE
        nama_produk LIKE '%$keyword_produk%' OR
        stok LIKE '%$keyword_produk%' OR
        harga LIKE '%$keyword_produk%' OR
        tgl_pembuatan LIKE '%$keyword_produk%' OR
        tgl_kadaluarsa LIKE '%$keyword_produk%' 
        ";
        return query($query);
}

function cari_artikel($keyword_artikel){
  $query = "SELECT * FROM tbl_artikel WHERE
          judul_artikel LIKE '%$keyword_artikel%'OR
          isi_artikel LIKE '%$keyword_artikel%' OR
          tanggal_artikel LIKE '%$keyword_artikel%'
          ";
         return query($query); 
}

function registrasi($data){
  global $conn;

  $nama = htmlspecialchars($data["nama"]);
  $gambar = upload_admin();
    if (!$gambar) {
        return false;
        }
  
  $tempat_lahir = htmlspecialchars($data["tempat_lahir"]);
  $tanggal_lahir = htmlspecialchars($data["tanggal_lahir"]);
  $jenis_kelamin = htmlspecialchars($data["jenis_kelamin"]);
  $no_telepon = htmlspecialchars($data["no_telepon"]);
  $alamat = htmlspecialchars($data["alamat"]);
  $email = strtolower(stripcslashes($data["email"]));
  $password = mysqli_real_escape_string($conn, $data["password"]);

  $result = mysqli_query($conn, "SELECT email FROM tbl_admin WHERE email = '$email'");
  if (mysqli_fetch_assoc($result)) {
    echo "<script>
        alert('email sudah terdaftar!')
          </script>  ";
    return false;
  }
 
  mysqli_query($conn, "INSERT INTO tbl_admin VALUES('','$nama','$gambar','$tempat_lahir','$tanggal_lahir','$jenis_kelamin','$no_telepon','$alamat','$email','$password')");

  return mysqli_affected_rows($conn);
}

function upload_admin(){
  $namaFile = $_FILES['foto_admin']['name'];
  $ukuranFile = $_FILES['foto_admin']['size'];
  $error = $_FILES['foto_admin']['error'];
  $tmpName = $_FILES['foto_admin']['tmp_name'];


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

  move_uploaded_file($tmpName, 'img/admin/'. $namaFileBaru);
  return $namaFileBaru;
}

?>


