
<?php 
$id = $_GET['id'];
$data = detailKost($id);
$gambar = explode(",", $data['gambar']);

?>

<div class="row">
          <div class="col-12">
            <!-- Custom Tabs -->
            <div class="card">
              <div class="card-header d-flex p-0">
                <h3 class="card-title p-3">Detail Kost <?= $data['nama_kost']; ?></h3>
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
                          <img src="gambar/<?= $gambar[0]; ?>" class="img-fluid mb-2" alt="Gambar Kost 1"/>
                        </a>
                      </div>
                      <div class="col-sm-3">
                        <a href="https://localhost/skripsi2/admin/gambar/<?= $gambar[1]; ?>" data-toggle="lightbox" data-title="Gambar Kost" data-gallery="gallery">
                          <img src="gambar/<?= $gambar[1]; ?>" class="img-fluid mb-2" alt="Gambar Kost 2" />
                        </a>
                      </div>
                      <div class="col-sm-3">
                        <a href="https://localhost/skripsi2/admin/gambar/<?= $gambar[2]; ?>" data-toggle="lightbox" data-title="Gambar Kost" data-gallery="gallery">
                          <img src="gambar/<?= $gambar[2]; ?>" class="img-fluid mb-2" alt="Gambar Kost 3" />
                        </a>
                      </div>
                    </div>
                    <table border="0" class="table table-hover">
                      <tr>
                        <td>Kategori Kost</td>
                        <td>: <?= $data['kategori_kost']; ?></td>
                      </tr>
                      <tr>
                        <td>Status Kost</td>
                        <td>: <?= $data['status_kost']; ?></td>
                      </tr>
                      <tr>
                        <td>Koordinat Lattitude</td>
                        <td>: <?= $data['lattitude']; ?></td>
                      </tr>
                      <tr>
                        <td>Koordinat Longtitude</td>
                        <td>: <?= $data['longtitude']; ?></td>
                      </tr>
                      <tr>
                        <td>Keterangan</td>
                        <td>: <?= $data['keterangan']; ?></td>
                      </tr>
                      <tr>
                        <td>Terakhir di Update</td>
                        <td>: <?= $data['created_at']; ?></td>
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
        <!-- END CUSTOM TABS -->