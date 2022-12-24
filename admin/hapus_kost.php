<?php 

include "function.php";
$id_kost = $_GET['id'];





$sql1 = mysqli_query($koneksi, "SELECT * FROM tabel_kost WHERE id_kost='$id_kost'");
$data = mysqli_fetch_assoc($sql1);
	# code...
	$gambar = $data['gambar'];
	$datagambar = explode(",", $gambar);

$sql = mysqli_query($koneksi,"DELETE FROM tabel_kost WHERE id_kost = '$id_kost'");


	unlink("gambar/".$datagambar[0]);
	unlink("gambar/".$datagambar[1]);
	unlink("gambar/".$datagambar[2]);


if ($sql) {
	# code...
	 echo "<script>alert('Data Berhasil Dihapus')</script>";
              ?>
              <meta http-equiv="refresh" content ="0; url=index.php?page=data-kost"/>
              <?php
            }
