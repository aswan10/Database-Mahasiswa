<?php 
// koneksi ke DBMS
require 'functions.php';

// ambil data url
$id = $_GET["id"];
// query data mhs berdasarkan id
$mhs = query("SELECT * FROM mahasiswa WHERE id=$id")[0];


// cek apakah tombol submit sudah di pencet atau belum
if (isset($_POST["submit"])) {

	//cek apakah berhasil diubah
	if (ubah($_POST) > 0) {
	 	echo "
	 	<script>
	 	alert('Data berhasil Diubah');
	 	document.location.href = 'index.php';
	 	</script>
	 	";
	 } else{
	 	echo "
 		<script>
	 	alert('Data gagal Diubah');
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
	<title>Ubah Data Mahasiswa</title>
</head>
<body>
	<h1>Ubah Data Mahasiswa</h1>
	<form action="" method="POST">
		<input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
		<ul>
			<li>
				<label for="stb">STB :</label>
				<input type="text" name="stb" id="stb" required value="<?= $mhs["stb"]; ?>"> 
			</li>
			<li>
				<label for="nama">Nama :</label>
				<input type="text" name="nama" id="nama" required value="<?= $mhs["nama"]; ?>"> 
			</li>
			<li>
				<label for="email">Email :</label>
				<input type="text" name="email" id="email" required value="<?= $mhs["email"]; ?>"> 
			</li>
			<li>
				<label for="jurusan">Jurusan :</label>
				<input type="text" name="jurusan" id="jurusan" required value="<?= $mhs["jurusan"]; ?>"> 
			</li>
			<li>
				<label for="gambar">Gambar :</label>
				<input type="text" name="gambar" id="gambar" required value="<?= $mhs["gambar"]; ?>"> 
			</li>
			<li>
				<button type="submit" name="submit">Ubah Data</button>	
			</li>
		
		</ul>
	</form>
</body>
</html>