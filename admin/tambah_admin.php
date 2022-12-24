 

          <div class="col-8">
            <!-- Horizontal Form -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Tambah Data</h3>
                <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                      </button>
                    </div>

              </div>
              <div id="alert"></div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" method="POST" action="">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama" name="nama" required>
                      <input type="hidden" name="time_stamp" id="time_stamp" value="<?= date('Y-m-d', time()).' '.date('H:i:s', time()) ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="username" class="col-sm-2 col-form-label">username</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="username" placeholder="Masukkan Username" name="username" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="password" placeholder="Masukkan Password" name="password" required>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info" name="tb_simpan" id="Simpan">Simpan</button>
                  <button type="reset" class="btn btn-default float-right">Reset</button>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
          </div>
            <!-- /.card -->

       <?php 

          if (isset($_POST['tb_simpan'])) {
            # code...
            $idCount = mysqli_query($koneksi, "SELECT max(id_admin) AS id FROM tabel_admin");
            $data = mysqli_fetch_assoc($idCount);

            $number = $data['id'] + 1;

            //var_dump($number);
            $nama     = $_POST['nama'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $time_stamp = $_POST['time_stamp'];

            if ($nama == "" || $username == "" || $password == "") {
              // code...
               echo "<script>alert('Data Gagal Disimpan')</script>";
                ?>
              <meta http-equiv="refresh" content ="0; url=index.php?page=tambah-admin"/>
              <?php
            }else{
              $sql = mysqli_query($koneksi, "INSERT INTO tabel_admin VALUES('$number','$nama','$username','$password','$time_stamp')");
            //var_dump($sql);
            if ($sql) {
              # code...
              echo "<script>alert('Data Berhasil Disimpan')</script>";
              ?>
              <meta http-equiv="refresh" content ="0; url=index.php?page=data-admin"/>
              <?php
            }

          }
            }

            
            




            
          



        ?>