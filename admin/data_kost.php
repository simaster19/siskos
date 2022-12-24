
        
<?php 
  $fetchDataKost = fetchDataKost();


?>


<div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><a href="index.php?page=tambah-kost"><button type="button" class="btn btn-sm btn-primary">Tambah Kost <i class="fas fa-home"></i></button></a></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Pemilik</th>
                    <th>Nama Kost</th>
                    <th>Kategori Kost</th>
                    <th>Status Kost</th>
                    <th>Alamat</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>

                    <?php
                     $i = 1;
                     foreach ($fetchDataKost as $value) {
                                        

                    ?>
                  <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $value['nama_pemilik'] ?></td>
                    <td><?= $value['nama_kost'] ?></td>
                    <td><?= $value['kategori_kost'] ?></td>
                    <td><?= $value['status_kost'] ?></td>
                    <td><?= $value['alamat_kost'] ?></td>
                    <td>
                      <a href="./hapus_kost.php?id=<?= $value['id_kost']; ?>" id="konfirmasi" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini?');"><button type="button" id="btn_hapus" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button></a> 
                      <a href="?page=detail-kost&id=<?= $value['id_kost']; ?>" ><button type="button" id="btn_detail" class="btn btn-sm btn-warning"><i class="fas fa-book"></i></button></a> 
                      <a href="?page=ubah-kost&id=<?= $value['id_kost']; ?>"><button type="button" id="btn_ubah" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></button></a>
                    </td>

                  </tr>

                  <?php 
                }
                ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Nama Pemilik</th>
                    <th>Nama Kost</th>
                    <th>Kategori Kost</th>
                    <th>Status Kost</th>
                    <th>Alamat</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>


<script type="text/javascript">

</script>