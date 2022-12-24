<?php 
//API https://www.mailjet.com/ for message google
require '../mailjet-apiv3-php-no-composer/vendor/autoload.php';
use \Mailjet\Resources;
$mj = new \Mailjet\Client('920f0f3d1f1756b9b3036999fff5579c','a10fae7f03ba21e37d02afde2ef9d0a7',true,['version' => 'v3.1']);

include "function.php";
$username = $_GET['id'];



  //Mengambil Data User Public
  $sqlUser = mysqli_query($koneksi, "SELECT * FROM tabel_user WHERE username = '$username'");
  $datax = mysqli_fetch_assoc($sqlUser);
  $emailUser = $datax['email'];


$sql1 = mysqli_query($koneksi, "SELECT * FROM tabel_transaksi WHERE username='$username'");
$data = mysqli_fetch_assoc($sql1);
	# code...
	$gambar = $data['bukti_transfer'];
	//$datagambar = explode(",", $gambar);

$sql = mysqli_query($koneksi,"DELETE FROM tabel_transaksi WHERE username = '$username'");

	unlink("../gambar/transaksi/".$gambar);


 $body = [
    'Messages' => [
      [
        'From' => [
          'Email' => "miftakhulkirom@gmail.com",
          'Name' => "Admin SIP Kost"
        ],
        'To' => [
          [
            'Email' => $emailUser,
            'Name' => $username
          ]
        ],
        'Subject' => "Notifikasi Pembayaran.",
        'TextPart' => "SIP KOS",
        'HTMLPart' => "<h3>Dear,  $username </h3><br />Pembayaran Anda Ditolak, Dikarenakan Dalam 3 Hari Pengecekan Tidak Ada Uang Masuk Ke Rekening Admin Yang Sesuai Dengan Bukti Pembayaran Yang Anda Kirimkan.,<br /><br /> Terimakasih."
        //'CustomID' => "AppGettingStartedTest"
      ]
    ]
  ];


if ($sql) {
	# code...
	 echo "<script>alert('Data Berhasil Dihapus')</script>";
	 $response = $mj->post(Resources::$Email, ['body' => $body]);
              ?>
              <meta http-equiv="refresh" content ="0; url=index.php?page=data-transaksi"/>
              <?php
            }
