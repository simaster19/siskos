<?php 

include "function.php";






$id_user = $_GET['id'];





$sql1 = mysqli_query($koneksi, "SELECT * FROM tabel_user WHERE id_user='$id_user'");
$data = mysqli_fetch_assoc($sql1);
	# code...
	$foto = $data['foto'];

$sql = mysqli_query($koneksi,"DELETE FROM tabel_user WHERE id_user = '$id_user'");


	unlink("../foto/".$foto);


if ($sql) {
	# code...
	 echo "<script>alert('Data Berhasil Dihapus')</script>";
              ?>
              <meta http-equiv="refresh" content ="0; url=index.php?page=data-users"/>
              <?php
            }
