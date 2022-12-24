<?php

$fetchDataAdmin = fetchDataAdmin();

?>


<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><a href="index.php?page=tambah-admin"><button type="button" class="btn btn-sm btn-primary">Tambah Admin <i class="fas fa-user-plus"></i></button></a></h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Password</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>

              <?php
              $i = 1;
              foreach ($fetchDataAdmin as $value) {
                # code...

              ?>
                <tr>
                  <td><?= $i++; ?></td>
                  <td><?= $value['nama'] ?></td>
                  <td><?= $value['username'] ?></td>
                  <td><?= $value['password'] ?></td>
                  <td><a href="./hapus_admin.php?id=<?= $value['id_admin']; ?>" id="konfirmasi" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini?');"><button type="button" id="btn_hapus" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button></a></td>
                </tr>

              <?php
              }
              ?>
            </tbody>
            <tfoot>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Password</th>
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