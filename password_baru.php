<?php require 'functions.php'; 
	// Jika user mengklik tombol "pulihkan", update password di dalam database
	if(isset($_POST['pulihkan']))
	{
		// Tampilkan pesan jika password berhasil dipulihkan
		if(pulihkan($_POST) > 0){
			echo "<script>
					alert('Password berhasil dipulihkan!');
				</script>";
			echo"<script>location='login.php'; </script>";
			
		}else{
			echo mysqli_error($koneksi);
		}
	}
?>