<?php 
// koneksi ke DBMS
require 'functions.php';

// cek apakah tombol submit sudah di pencet atau belum
if (isset($_POST["submit"])) {


	//cek apakah berhasil 
	if (tambah($_POST) > 0) {
	 	echo "
	 	<script>
	 	alert('Data berhasil Ditambah');
	 	document.location.href = 'index.php';
	 	</script>
	 	";
	 } else{
	 	echo "
 		<script>
	 	alert('Data gagal Ditambah');
	 	document.location.href = 'index.php';
	 	</script>
	 	";
	 }

}


 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tambah Data Mahasiswa</title>
</head>
<body>
	<h1>Tambah Data Mahasiswa</h1>
	<form action="" method="POST" enctype="multipart/form-data">
		<ul>
			<li>
				<label for="stb">STB :</label>
				<input type="text" name="stb" id="stb" required> 
			</li>
			<li>
				<label for="nama">Nama :</label>
				<input type="text" name="nama" id="nama" required> 
			</li>
			<li>
				<label for="email">Email :</label>
				<input type="text" name="email" id="email" required> 
			</li>
			<li>
				<label for="jurusan">Jurusan :</label>
				<input type="text" name="jurusan" id="jurusan" required> 
			</li>
			<li>
				<label for="gambar">Gambar :</label>
				<input type="file" name="gambar" id="gambar" > 
			</li>
			<li>
				<button type="submit" name="submit">Tambah Data</button>	
			</li>
		
		</ul>


	</form>




</body>
</html>