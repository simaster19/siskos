<?php









$kostCount1 = mysqli_query($koneksi, "SELECT count(id_kost) AS kostCount2 FROM tabel_kost");
$kostCount = mysqli_fetch_assoc($kostCount1);

$statusKostA1 = mysqli_query($koneksi, "SELECT count(id_kost) AS status FROM tabel_kost WHERE status_kost = 'Tersedia'");
$statusKostA = mysqli_fetch_assoc($statusKostA1);

$statusKostA2 = mysqli_query($koneksi, "SELECT count(id_kost) AS status1 FROM tabel_kost WHERE status_kost = 'Penuh'");
$statusKostN = mysqli_fetch_assoc($statusKostA2);


?>


<div class="container">
  <div class="row">
    <div class="col-md-4 col-sm-6 col-12">
      <div class="info-box bg-gradient-info">
        <span class="info-box-icon"><i class="fas fa-home"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Total Kost</span>
          <span class="info-box-number"><?= $kostCount['kostCount2'] ?></span>

          <div class="progress">
            <div class="progress-bar" style="width: 100%"></div>
          </div>
          <span class="progress-description">
            Total Keseluruhan Pemilik Kost <br>Yang Terdaftar
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-4 col-sm-6 col-12">
      <div class="info-box bg-gradient-success">
        <span class="info-box-icon"><i class="fas fa-home"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Status Kost Tersedia</span>
          <span class="info-box-number"><?= $statusKostA['status']; ?></span>

          <div class="progress">
            <div class="progress-bar" style="width: 100%"></div>
          </div>
          <span class="progress-description">
            Status Kost Yang Masih Aktif Atau Masih <br>Ada Kamar Yang Masih Kosong.
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-4 col-sm-6 col-12">
      <div class="info-box bg-gradient-danger">
        <span class="info-box-icon"><i class="fas fa-home"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Status Kost Penuh</span>
          <span class="info-box-number"><?= $statusKostN['status1']; ?></span>

          <div class="progress">
            <div class="progress-bar" style="width: 100%"></div>
          </div>
          <span class="progress-description">
            Status Kost Yang Kemungkinan <br>Kamar Sudah Penuh.
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <!-- /.col -->
  </div>
  <!-- /.row -->
</div>
<hr>