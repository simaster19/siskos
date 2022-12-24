<?php



$fetchDataTransaksi = fetchDataTransaksi();

//API https://www.mailjet.com/ for message google
require '../mailjet-apiv3-php-no-composer/vendor/autoload.php';
  
use \Mailjet\Resources;
$mj = new \Mailjet\Client('920f0f3d1f1756b9b3036999fff5579c','a10fae7f03ba21e37d02afde2ef9d0a7',true,['version' => 'v3.1']);
  
?>


<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Data Transaksi</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>No</th>
                <th>Username</th>
                <th>Metode Pembayaran</th>
                <th>Bukti Pembayaran</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>

              <?php
              $i = 1;
              foreach ($fetchDataTransaksi as $value) {



              ?>
                <tr>
                  <td><?= $i++; ?></td>
                  <td><?= $value['username'] ?></td>
                  <td><?= $value['metode_pemb'] ?></td>
                  <td><img src="../gambar/transaksi/<?= $value['bukti_transfer'] ?>" alt="Bukti Transfer" width="200px" heigh="200px"></td>
                  <td><label class="text-warning" for=""><?= $value['status'] ?></label></td>
                  <td>
                    <form action="" method="POST">

                      <button name="tb_transaksi" type="submit" id="tb_transaksi" class="btn btn-sm btn-success" <?php if ($value['status'] == 'TerKonfirmasi') {
                                                                                                                    # code...
                                                                                                                    echo "disabled";
                                                                                                                  } else {
                                                                                                                    echo "";
                                                                                                                  } ?>><i class="fas fa-check"> Konfirmasi</i></button>
                      <a href="./hapus_transaksi.php?id=<?= $value['username']; ?>" id="konfirmasi" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Transaksi Ini?');"><button type="button" id="btn_hapus" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button></a>


                      <input type="hidden" value="<?= $value['id_transaksi'] ?>" name="id">
                      <input type="hidden" value="<?= $value['username'] ?>" name="user">
                      <input type="hidden" value="<?= $value['metode_pemb'] ?>" name="metode_pemb">
                      <input type="hidden" value="<?= $value['bukti_transfer'] ?>" name="bukti_transfer">
                    </form>
                  </td>

                </tr>

              <?php
              }
              ?>
            </tbody>
            <tfoot>
              <tr>
                <th>No</th>
                <th>Username</th>
                <th>Metode Pembayaran</th>
                <th>Bukti Pembayaran</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>


<?php

if (isset($_POST['tb_transaksi'])) {
  # code...

  $idTransaksi = $_POST['id'];
  $username = $_POST['user'];
  $metodePemb = $_POST['metode_pemb'];
  $buktiTransfer = $_POST['bukti_transfer'];


  //Mengambil Data User Public
  $sqlUser = mysqli_query($koneksi, "SELECT * FROM tabel_user WHERE username = '$username'");
  $data = mysqli_fetch_assoc($sqlUser);
  $emailUser = $data['email'];



  $created_at     = date("Y-m-d", time()) . " " . date("H:i:s", time());

  $sql = mysqli_query($koneksi, "UPDATE tabel_transaksi SET                                        
                                        username = '$username',
                                        metode_pemb = '$metodePemb',
                                        bukti_transfer = '$buktiTransfer',
                                        status = 'TerKonfirmasi',
                                        created_at = '$created_at'
                                        WHERE id_transaksi = '$idTransaksi'");

  
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
        'HTMLPart' => "<h3>Dear, $username </h3><br />Pembayaran Anda Sudah Di Konfirmasi. <br /><br />Terimakasih."
        //'CustomID' => "AppGettingStartedTest"
      ]
    ]
  ];
  
  //$response->success() && var_dump($response->getData());

  if ($sql) {
    $response = $mj->post(Resources::$Email, ['body' => $body]);

    echo '<meta http-equiv="refresh" content="0; url=index.php?page=data-transaksi" />';
  }
}


?>