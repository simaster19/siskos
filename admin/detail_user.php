<?php
  $id = $_GET['id'];
  $data = detailUserPublic($id);


?>
<div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="../dist/img/user4-128x128.jpg"
                       alt="User profile picture">
                </div>
                <h3 class="profile-username text-center"><?= $data['nama']; ?></h3>
                <p class="text-muted text-center">Register <?= $data['tgl_mendaftar']; ?></p>
                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b><?= $data['email']; ?></b>
                  </li>
                </ul>

                <a href="./hapus_user.php?id=<?= $data['id_user']; ?>" onclick = "return confirm('Apakah Anda Yakin Ingin Menghapus <?= $data["nama"] ?> ?');"  class="btn btn-danger btn-block"><b>Delete User</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
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
                    </table>
                    

                
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
          </div>
        </div>
      </div>