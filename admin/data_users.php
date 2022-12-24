<?php
$fetchDataUserPublic = fetchDataUserPublic();


?>


<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Data Users Member</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example2" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Foto</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Tgl. Mendaftar</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>

              <?php
              $i = 1;
              foreach ($fetchDataUserPublic as $value) {


              ?>
                <tr>
                  <td><?= $i++; ?></td>
                  <td><img src="../gambar/<?= $value['foto'] ?>" width="100px" height="100px"></td>
                  <td><?= $value['nama'] ?></td>
                  <td><?= $value['email'] ?></td>
                  <td><?= $value['tgl_mendaftar'] ?></td>

                  <td>
                    <a href="?page=detail-user&id=<?= $value['id_user']; ?>"><button type="button" id="btn_detail" class="btn btn-sm btn-warning"><i class="fas fa-book"></i></button></a>
                    <a href="./hapus_user.php?id=<?= $value['id_user']; ?>" id="konfirmasi" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini?');"><button type="button" id="btn_hapus" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button></a>

                  </td>

                </tr>

              <?php
              }
              ?>
            </tbody>
            <tfoot>
              <tr>
                <th>No</th>
                <th>Foto</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Tgl. Mendaftar</th>
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