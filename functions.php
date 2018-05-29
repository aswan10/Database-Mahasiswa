<?php 
// koneksi ke database
$conn = mysqli_connect("127.0.0.1", "root", "", "phpdasar");

function query($query)
{
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}


function tambah($data){
	global $conn;
	// ambil data dari tiap elemen dari tiap elemen dalam form
	$stb = htmlspecialchars($data["stb"]);
	$nama = htmlspecialchars($data["nama"]);
	$email = htmlspecialchars($data["email"]);
	$jurusan = htmlspecialchars($data["jurusan"]);

	// upload gambar dlu
	$gambar = upload();
	if (!$gambar) {
		return false;
	}

	// query insert data
	$query = "INSERT INTO mahasiswa VALUES ('', '$stb', '$nama', '$email', '$jurusan', '$gambar')";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}


function upload(){
	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];


	// cek apakah tidak ada gambar yang diupload
	if ($error === 4) {
		echo "<script>
				alert('pilih gambar dlu dong!')
			  </script>";
		return false;
	}

	// cek apakah yang diupload adalah gambar
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if (!in_array($ekstensiGambar, $ekstensiGambarValid)){
			echo "<script>
				alert('anda salah upload')
			  </script>";
		return false;	
	}

	// cek jika ukuran besar
	if ($ukuranFile > 1000000) {
		echo "<script>
				alert('ukuran gambar terlalu besar')
			  </script>";
		return false;
	}


}



function hapus($id)
{
	global $conn;
	mysqli_query($conn, "DELETE FROM mahasiswa WHERE id=$id");

	return mysqli_affected_rows($conn);
}

function ubah($data)
{
	global $conn;
	$id = $data["id"];
	$stb = htmlspecialchars($data["stb"]);
	$nama = htmlspecialchars($data["nama"]);
	$email = htmlspecialchars($data["email"]);
	$jurusan = htmlspecialchars($data["jurusan"]);
	$gambar = htmlspecialchars($data["gambar"]);

	// query insert data
	$query = "UPDATE mahasiswa SET stb = '$stb', nama = '$nama',  email = '$email', jurusan = '$jurusan', gambar = '$gambar' WHERE id=$id";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}



function cari($keyword)
{
	$query = "SELECT * FROM mahasiswa WHERE nama LIKE '%$keyword%' OR stb LIKE '%$keyword%' OR email LIKE'%$keyword%' OR jurusan LIKE'%$keyword%' ";

	return query($query);
}






 ?>