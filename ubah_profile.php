<?php
$id = $_SESSION['id_user'];





$user = $_SESSION['username'];


$sqlx = mysqli_query($koneksi, "SELECT * FROM tabel_user WHERE id_user = '$id'");
$data = mysqli_fetch_assoc($sqlx);

$sqlPembayaran = mysqli_query($koneksi, "SELECT * FROM tabel_transaksi WHERE id_transaksi = '$id'");
$dataPembayaran = mysqli_fetch_assoc($sqlPembayaran);

//var_dump($dataPembayaran);



?>

<div class="container">

  <div class="col-12">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Ubah Data</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form method="POST" action="" enctype="multipart/form-data">
        <div class="card-body">
          <div class="form-group">
            <label for="foto">Gambar</label>
            <?php
            $dataGambar = $data['foto'];

            ?>
            <input type="hidden" name="id" value="<?= $data['id_user']; ?>">
            <div class="row">
              <div class="col-sm-4">
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="foto" name="foto" accept="image/*">
                    <label class="custom-file-label" for="foto"><?= $dataGambar; ?></label>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="nama_lengkap">Nama Lengkap</label>
            <input type="text" class="form-control" id="nama_lengkap" placeholder="Masukkan Nama Lengkap" name="nama_lengkap" value="<?= $data['nama'] ?>">
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" placeholder="Masukkan Email" name="email" value="<?= $data['email'] ?>">
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-sm-4">
                <label for="no_hp">No Handphone</label>
                <input type="text" class="form-control" id="no_hp" placeholder="Example: 081xxxxxxx" name="no_hp" value="<?= $data['no_hp'] ?>">
              </div>
              <div class="col-sm-4">
                <label for="no_wa">No Whatsapps</label>
                <input type="text" class="form-control" id="no_wa" placeholder="Example: 081xxxxxxx" name="no_wa" value="<?= $data['no_wa'] ?>">
              </div>
              <div class="col-sm-4">
                <label for="no_telegram">No Telegram</label>
                <input type="text" class="form-control" id="no_telegram" placeholder="Example: 081xxxxxxx" name="no_telegram" value="<?= $data['no_telegram'] ?>">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" placeholder="Masukkan Username" name="username" value="<?= $data['username'] ?>">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" placeholder="Masukkan Password" name="password" value="<?= $data['password'] ?>">
          </div>
          <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea class="form-control" id="alamat" rows="3" placeholder="Masukkan Alamat Detail ..." name="alamat"><?= $data['alamat']; ?></textarea>
          </div>



        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary" name="tb_ubah">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- /.card -->

<?php

if (isset($_POST['tb_ubah'])) {
  # code...

  $nama_lengkap      = $_POST['nama_lengkap'];
  $email    = $_POST['email'];
  $alamat  = $_POST['alamat'];
  $no_hp   = $_POST['no_hp'];
  $no_wa      = $_POST['no_wa'];
  $no_telegram     = $_POST['no_telegram'];
  $username      = $_POST['username'];
  $password     = $_POST['password'];

  $tgl_mendaftar     = $data['tgl_mendaftar'];



  //Untuk Gambar
  $ektensi        = ["jpg", "JPG", "jpeg", "JPEG", "png", "PNG"];

  $namaFoto = $_FILES['foto']['name'];
  $sizefoto = $_FILES['foto']['size'];
  $tmp      = $_FILES['foto']['tmp_name'];

  $final = date('H_i', time()) . '_' . $namaFoto;

  //End Untuk Gambar

  $created_at     = date("Y-m-d", time()) . " " . date("H:i:s", time());



  $idx = $dataPembayaran['id_transaksi'];
  $user = $username;
  $metodePembayaran = $dataPembayaran['metode_pemb'];
  $buktiTransfer = $dataPembayaran['bukti_transfer'];
  $status = $dataPembayaran['status'];




  //Kondisi Gambar
  if (!$namaFoto) {
    // code...

    $sql        = mysqli_query($koneksi, "UPDATE tabel_user SET 
                nama = '$nama_lengkap',
                email = '$email',
                alamat='$alamat',
                no_hp = '$no_hp',
                no_wa = '$no_wa',
                no_telegram = '$no_telegram', 
                foto = '$dataGambar',
                tgl_mendaftar = '$tgl_mendaftar',
                username = '$username',
                password = '$password',
                created_at = '$created_at'

                WHERE id_user='$id'");
    $sql1 = mysqli_query($koneksi, "UPDATE tabel_transaksi SET 
    username = '$username', 
    metode_pemb = '$metodePembayaran', 
    bukti_transfer = '$buktiTransfer', 
    status = '$status', 
    created_at = '$created_at'
    WHERE id_transaksi = '$id' ");


    if ($sql && $sql1) {
      # code...

      echo "<script>alert('Data Berhasil Diubah')</script>";
      /*var_dump($sql);
                       die();*/
?>
      <meta http-equiv="refresh" content="0; url=dashboard_user.php?pagea=data-profile" />
    <?php
    }
  } else {
    $sql        = mysqli_query($koneksi, "UPDATE tabel_user SET 
                  nama = '$nama_lengkap',
                  email = '$email',
                  alamat='$alamat',
                  no_hp = '$no_hp',
                  no_wa = '$no_wa',
                  no_telegram = '$no_telegram', 
                  foto = '$final',
                  tgl_mendaftar = '$tgl_mendaftar',
                  username = '$username',
                  password = '$password',
                  created_at = '$created_at'

                  WHERE id_user='$id'");
    $sql1 = mysqli_query($koneksi, "UPDATE tabel_transaksi SET 
    username = '$username', 
    metode_pemb = '$metodePembayaran', 
    bukti_transfer = '$buktiTransfer', 
    status = '$status', 
    created_at = '$created_at'
    WHERE id_transaksi = '$id' ");

    if ($sql && $sql1) {
      # code...
      unlink("gambar/" . $dataGambar);

      move_uploaded_file($tmp, 'gambar/' . $final);

      echo "<script>alert('Data Berhasil Diubah')</script>";
      /* var_dump($sql);
                       die();*/
    ?>
      <meta http-equiv="refresh" content="0; url=dashboard_user.php?pagea=data-profile" />
<?php
    }
  }
}




?>