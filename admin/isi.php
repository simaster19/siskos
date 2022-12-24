<?php











#memanggil get
$page = $_GET['page'];

if ($page == "") {
	# code...
	include "dashboard.php";
} elseif ($page == "data-admin") {
	include "data_admin.php";
} elseif ($page == "tambah-admin") {
	include "tambah_admin.php";
} elseif ($page == "data-kost") {
	include "data_kost.php";
} elseif ($page == "tambah-kost") {
	include "tambah_kost.php";
} elseif ($page == "data-transaksi") {
	include "data_transaksi.php";
} elseif ($page == "detail-kost") {
	include "detail_kost.php";
} elseif ($page == "detail-user") {
	include "detail_user.php";
} elseif ($page == "ubah-kost") {
	include "ubah_kost.php";
} elseif ($page == "data-users") {
	# code...
	include "data_users.php";
}
