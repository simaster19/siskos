<?php

include "function.php";
$id_admin = $_GET['id'];


$sql = mysqli_query($koneksi, "DELETE FROM tabel_admin WHERE id_admin = '$id_admin'");
if ($sql) {
  # code...
  echo "<script>alert('Data Berhasil Dihapus')</script>";
?>
  <meta http-equiv="refresh" content="0; url=index.php?page=data-admin" />
<?php
}
