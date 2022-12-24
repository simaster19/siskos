<?php

$id = $_GET['id'];


$sql = mysqli_query($koneksi, "SELECT * FROM tabel_kost WHERE id_kost = '$id'");
$data = mysqli_fetch_assoc($sql);

$gambar = explode(",", $data['gambar']);



?>
<div class="container">
  <div class="row">
    <div class="col-12">
      <!-- Custom Tabs -->
      <div class="card">
        <div class="card-header d-flex p-0">
          <h3 class="card-title p-3"><a href="?pagea=lihat-lokasi&id=<?= $data['id_kost']; ?>"><button type="button" id="btn_lokasi" class="btn btn-sm btn-success"><i class="fas fa-map-marker-alt"></i></button></a> Detail Kost <?= $data['nama_kost']; ?>

          </h3>

          <ul class="nav nav-pills ml-auto p-2">
            <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Detail user</a></li>
            <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Detail kost</a></li>

          </ul>
        </div><!-- /.card-header -->
        <div class="card-body">
          <div class="tab-content">
            <div class="tab-pane active" id="tab_1">
              <table border="0" class="table table-hover">
                <tr>
                  <td>Nama Kost</td>
                  <td>: <?= $data['nama_kost']; ?></td>
                </tr>
                <tr>
                  <td>Nama Pemilik</td>
                  <td>: <?= $data['nama_pemilik'] ?></td>
                </tr>
                <tr>
                  <td>Alamat Kost</td>
                  <td>: <?= $data['alamat_kost'] ?></td>
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
              </table>
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="tab_2">
              <div class="row">
                <div class="col-sm-3">
                  <a href="https://localhost/skripsi2/admin/gambar/<?= $gambar[0]; ?>" data-toggle="lightbox" data-title="Gambar Kost" data-gallery="gallery">
                    <img src="admin/gambar/<?= $gambar[0]; ?>" class="img-fluid mb-2" alt="Gambar Kost 1" />
                  </a>
                </div>
                <div class="col-sm-3">
                  <a href="https://localhost/skripsi2/admin/gambar/<?= $gambar[1]; ?>" data-toggle="lightbox" data-title="Gambar Kost" data-gallery="gallery">
                    <img src="admin/gambar/<?= $gambar[1]; ?>" class="img-fluid mb-2" alt="Gambar Kost 2" />
                  </a>
                </div>
                <div class="col-sm-3">
                  <a href="https://localhost/skripsi2/admin/gambar/<?= $gambar[2]; ?>" data-toggle="lightbox" data-title="Gambar Kost" data-gallery="gallery">
                    <img src="admin/gambar/<?= $gambar[2]; ?>" class="img-fluid mb-2" alt="Gambar Kost 3" />
                  </a>
                </div>
              </div>
              <table border="0" class="table table-hover">
                <tr>
                  <td>Kategori Kost</td>

                  <td>:
                    <?php
                    if ($data['kategori_kost'] == 'Laki-Laki') {
                      // code...
                      echo "<label class='text-success'>" . $data['kategori_kost'] . "</label>" . "<i class='fas fa-male' style='float:right'></i>";
                    } elseif ($data['kategori_kost'] == 'Perempuan') {
                      // code...
                      echo "<label class='text-primary'>" . $data['kategori_kost'] . "</label>" . "<i class='fas fa-female' style='float:right'></i>";
                    } else {
                      echo "<label class='text-warning'>" . $data['kategori_kost'] . "</label>" . "<i class='fas fa-male' style='float:right'></i>" . "<i class='fas fa-female' style='float:right'></i>";
                    }
                    ?>

                  </td>
                </tr>
                <tr>
                  <td>Status Kost</td>
                  <td>:
                    <?php
                    if ($data['status_kost'] == 'Aktif') {
                      // code...
                      echo "<label class='text-success'>" . $data['status_kost'] . "</label>";
                    } elseif ($data['status_kost'] == 'Non Aktif') {
                      // code...
                      echo "<label class='text-danger'>" . $data['status_kost'] . "</label>";
                    }
                    ?>
                  </td>
                </tr>

                <tr>
                  <td>Keterangan</td>
                  <td>: <?= $data['keterangan']; ?></td>
                </tr>

              </table>
            </div>
            <!-- /.tab-pane -->
          </div>
          <!-- /.tab-content -->
        </div><!-- /.card-body -->
      </div>
      <!-- ./card -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</div>
<!-- END CUSTOM TABS -->