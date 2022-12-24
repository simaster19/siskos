<?php

$host = "localhost";
$user = "root";
$pass = "";
$dbase = "skripsi";

#membuat Koneksi
$koneksi = mysqli_connect($host, $user, $pass, $dbase);
if (!$koneksi) {
	# code...
	echo "Error Mysqli" . mysqli_connect_error();
}


//Function User Admin
function loginAdmin($username, $password)
{
	global $koneksi;
	$sql = mysqli_query($koneksi, "SELECT * FROM tabel_admin WHERE username = '$username' AND password = '$password'");
	$query = mysqli_num_rows($sql);
	//Cek Data
	if ($query === 1) {
		#query
		foreach ($sql as $value) {
			# code...
			$_SESSION['username'] = $value['username'];
			$_SESSION['password'] = $value['password'];
			$_SESSION['nama']     = $value['nama'];
			header("Location:index.php");
		}
	} else {
		echo "<script>alert('Login Gagal')</script>";
	}
}
function totalDataAdmin()
{
	global $koneksi;
	$adminCount1 = mysqli_query($koneksi, "SELECT count(id_admin) AS adminCount2 FROM tabel_admin");
	$adminCount = mysqli_fetch_assoc($adminCount1);
	return $adminCount['adminCount2'];
}
function totalKost()
{
	global $koneksi;
	$kostCount1 = mysqli_query($koneksi, "SELECT count(id_kost) AS kostCount2 FROM tabel_kost");
	$kostCount = mysqli_fetch_assoc($kostCount1);
	return $kostCount['kostCount2'];
}
function totalUserPublic()
{
	global $koneksi;
	$userCount1 = mysqli_query($koneksi, "SELECT count(id_user) AS userCount3 FROM tabel_user");
	$userCount = mysqli_fetch_assoc($userCount1);
	return $userCount['userCount3'];
}
function totalMember()
{
	global $koneksi;
	$userCount1 = mysqli_query($koneksi, "SELECT count(id_transaksi) AS userCount3 FROM tabel_transaksi");
	$userCount = mysqli_fetch_assoc($userCount1);
	return $userCount['userCount3'];
}
function fetchDataAdmin()
{
	global $koneksi;
	$sql = mysqli_query($koneksi, "SELECT * FROM tabel_admin ORDER BY id_admin DESC");
	$rows = [];
	while ($data = mysqli_fetch_assoc($sql)) {
		$rows[] = $data;
	}
	return $rows;
}
function fetchDataTransaksi()
{
	global $koneksi;
	$sql = mysqli_query($koneksi, "SELECT * FROM tabel_transaksi ORDER BY id_transaksi DESC , status = 'TerKonfirmasi' DESC");
	$rows = [];
	while ($data = mysqli_fetch_assoc($sql)) {
		$rows[] = $data;
	}
	return $rows;
}
function fetchDataKost()
{
	global $koneksi;
	$sql = mysqli_query($koneksi, "SELECT * FROM tabel_kost ORDER BY id_kost DESC");
	$rows = [];
	while ($data = mysqli_fetch_assoc($sql)) {
		$rows[] = $data;
	}
	return $rows;
}
function fetchDataUserPublic()
{
	global $koneksi;
	$sql = mysqli_query($koneksi, "SELECT * FROM tabel_user ORDER BY id_user DESC");
	$rows = [];
	while ($data = mysqli_fetch_assoc($sql)) {
		$rows[] = $data;
	}
	return $rows;
}
function detailKost($id)
{
	global $koneksi;
	$sql = mysqli_query($koneksi, "SELECT * FROM tabel_kost WHERE id_kost = '$id'");
	$data = mysqli_fetch_assoc($sql);
	return $data;
}
function detailUserPublic($id)
{
	global $koneksi;
	$sql = mysqli_query($koneksi, "SELECT * FROM tabel_user WHERE id_user = '$id'");
	$data = mysqli_fetch_assoc($sql);
	return $data;
}

//Function Untuk User Public
function allData()
{
	global $koneksi;

	$sql = "SELECT * FROM tabel_kost";
	$query = mysqli_query($koneksi, $sql);
	$rows = [];

	while ($data = mysqli_fetch_assoc($query)) {
		$rows[] = $data;
	}
	return $rows;
}

function dataById($dataById)
{
	global $koneksi;
	/*$dataById = $dataById;*/


	$sql = mysqli_query($koneksi, "SELECT * FROM tabel_kost WHERE id_kost = '$dataById'");
	$data = mysqli_fetch_assoc($sql);
	return $data;
}
