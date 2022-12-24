<?php









//Tangkap Session
$email = $_SESSION['email'];
$username = $_SESSION['username'];

$sqlUser = mysqli_query($koneksi, "SELECT * FROM tabel_user WHERE email = '$email'");
$data = mysqli_fetch_assoc($sqlUser);

?>






<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form id="myForm" method="POST" action="" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Pembayaran</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="card">
            <div class="container">


              <div class="card-body">
                <div class="form-group">
                  <label for="pilihan" class="">Metode Pembayaran</label>
                  <select class="form-control" name="metode_pembayaran" id="metode_pembayaran" onchange="getValue()">
                    <option value="Mandiri">Mandiri</option>
                    <option value="Gopay">Gopay</option>
                    <option value="Dana">Dana</option>
                  </select>
                  <label for="" id="informasi"></label>
                </div>
                <div class="form-group">
                  <label for="kost">Nama Akun</label>
                  <input type="text" class="form-control" id="kost" name="nama_akun" value="<?= $data['username'] ?>" readonly>
                </div>
                <div class="form-group">
                  <label for="gambar">Bukti Pembayaran</label>
                  <div class="row">
                    <div class="col-sm-8">
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="gambar" name="bukti_transaksi" accept="image/*">
                          <label class="custom-file-label" for="gambar">Pilih Gambar</label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>

            </div>

          </div>




        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="tb_kirim" class="btn btn-primary">Kirim</button>
        </div>
      </div>
    </form>
  </div>

</div>


<div class="container">
  <div class="row">
    <div class="col-md-3">

      <!-- Profile Image -->
      <div class="card card-primary card-outline">
        <div class="card-body box-profile">
          <div class="text-center">
            <img class="profile-user-img img-fluid img-circle" src="gambar/<?= $data['foto'] ?>" alt="User profile picture">
          </div>

          <h3 class="profile-username text-center"><?= $data['nama']; ?></h3>

          <p class="text-muted text-center">Register <?= $data['tgl_mendaftar']; ?></p>

          <ul class="list-group list-group-unbordered mb-3">
            <li class="list-group-item">
              <b>
                <center><?= $data['email']; ?></center>
              </b>
            </li>
          </ul>

          <a href="logout.php" onclick="return confirm('Apakah Anda Yakin Ingin Keluar?');" class="btn btn-danger btn-block"><b>Keluar</b></a>
          <a href="?pagea=ubah-profile" class="btn btn-success btn-block"><b>Ubah</b></a>
          <button data-toggle="modal" data-target="#staticBackdrop" class="btn btn-warning btn-block text-light" id="bayar"><b>Bayar</b></button>


        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
    <div id="profileData" class="col-md-9">
      <div class="card card-primary card-outline">
        <div class="card-body">
          <div class="tab-content">
            <table border="0" class="table table-hover">
              <tr>
                <td>Username</td>
                <td>: <?= $data['username']; ?></td>
              </tr>
              <tr>
                <td>Password</td>
                <td>: <?= $data['password']; ?></td>
              </tr>
              <tr>
                <td>No Handphone</td>
                <td>: <?= $data['no_hp']; ?></td>
              </tr>
              <tr>
                <td>No Whatsapps</td>
                <td>: <?= $data['no_wa']; ?></td>
              </tr>
              <tr>
                <td>No Telegram</td>
                <td>: <?= $data['no_telegram']; ?></td>
              </tr>
              <tr>
                <td>Alamat</td>
                <td>: <?= $data['alamat'] ?></td>
              </tr>
              <tr>
                <td colspan="2">
                  <?php
                  $u = $_SESSION['username'];
                  $sql  = mysqli_query($koneksi, "SELECT * FROM tabel_transaksi WHERE username = '$u'");
                  $dataMember = mysqli_fetch_assoc($sql);
                  if ($_SESSION['username'] == $dataMember['username'] && $dataMember['status'] == 'TerKonfirmasi') {
                    echo "Anda adalah seorang member, nikmati fitur Update selanjutnya...!";
                    echo "<script>document.querySelector('#bayar').disabled = true</script>";
                  } elseif ($_SESSION['username'] == $dataMember['username'] && $dataMember['status'] == 'Menunggu Konfirmasi') {
                    echo "Bukti Pembayaran Sedang Di Tinjau.";
                    echo "<script>document.querySelector('#bayar').disabled = true</script>";
                  } else {
                    echo "";
                  }
                  ?>
                </td>
              </tr>
            </table>



          </div>
          <!-- /.tab-content -->
        </div><!-- /.card-body -->
      </div>
    </div>
  </div>
</div>

<script>
  function getValue() {
    let metode_pembayaran = document.getElementById('metode_pembayaran');
    metode_pembayaran.addEventListener("change", function(e) {
      let list = e.target.value;
      let message = document.getElementById('informasi');
      if (list == 'Mandiri') {
        message.innerHTML = "<p> Silahkan Anda Lakukan Pembayaran Sebesar Rp.100.000,0 Ke No Rekening Dibawah Ini: </br> No. Rekening : 9798798798 </p>";
      }
      if (list == 'Gopay') {
        message.innerHTML = "<p> Silahkan Anda Lakukan Pembayaran Sebesar Rp.100.000,0 Ke No Gopay Dibawah Ini: </br> No Hp : 089635032061 </p> ";
      }
      if (list == 'Dana') {
        message.innerHTML = "<p> Silahkan Anda Lakukan Pembayaran Sebesar Rp.100.000,0 Ke No Dana Dibawah Ini: </br> No Hp : 089635032061 </p> ";
      }
    });
  }
</script>


<?php
if (isset($_POST['tb_kirim'])) {
  $idCount = mysqli_query($koneksi, "SELECT max(id_transaksi) AS id FROM tabel_transaksi");
  $data = mysqli_fetch_assoc($idCount);

  $number = $data['id'] + 1;

  $user = $_SESSION['username'];
  $id = $_SESSION['id_user'];
  $metode_pembayaran = $_POST['metode_pembayaran'];

  $gambar = $_FILES['bukti_transaksi']['name'];
  $tmp = $_FILES['bukti_transaksi']['tmp_name'];
  $tipeGambar     = pathinfo($gambar, PATHINFO_EXTENSION);

  $bukti_transfer = date("H_i", time()) . "_" . $gambar;
  $status = "Menunggu Konfirmasi";

  $created_at     = date("Y-m-d", time()) . " " . date("H:i:s", time());

  $sql = mysqli_query($koneksi, "INSERT INTO tabel_transaksi VALUES(
    '$id','$user','$metode_pembayaran','$bukti_transfer','$status','$created_at'
  )");

  if ($sql) {
    # code...
    move_uploaded_file($tmp, 'gambar/transaksi/' . date('H_i', time()) . '_' . $gambar);
  }
}




?>