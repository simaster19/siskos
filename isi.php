<?php


$pagea = $_GET['pagea'];
if ($pagea == "") {
	# code...
	include "dashboard.php";
} elseif ($pagea == "data-profile") {
	# code...
	include "profile.php";
} elseif ($pagea == "list-kost") {
	# code...
	include "listkost.php";
} elseif ($pagea == "ubah-profile") {
	// code...
	include "ubah_profile.php";
} elseif ($pagea == "detail-kost2") {
	// code...
	include "detail_kost.php";
} elseif ($pagea == "donasi") {
	// code...
	include "form_donasi.php";
} elseif ($pagea == "lihat-lokasi") {
	include "viewLokasi.php";
}
