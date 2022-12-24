<?php

session_start();
include "admin/function.php";






//Fungsi Untuk Login
if (isset($_POST['tbLogin'])) {
  # code...
  $txt_email = $_POST['txt_email'];
  $txt_password = $_POST['txt_password'];

  $sqlLogin = mysqli_query($koneksi, "SELECT * FROM tabel_user WHERE username= '$txt_email' OR email = '$txt_email' AND password = '$txt_password'");
  $queryLogin = mysqli_num_rows($sqlLogin);

  if ($queryLogin === 1) {
    # code...
    foreach ($sqlLogin as $valueLogin) {
      # code...
      $_SESSION['email'] = $valueLogin['email'];
      $_SESSION['username'] = $valueLogin['username'];
      $_SESSION['id_user'] = $valueLogin['id_user'];
      $_SESSION['nama_user'] = $valueLogin['nama'];

      header("Location: dashboard_user.php");
    }
  } else {
    echo "<script>alert('Login Gagal')</script>";
    //header("Location: index.php");


  }
}

//Fungsi Untuk Daftar
if (isset($_POST['tbDaftar'])) {
  # code...
  $idUser = mysqli_query($koneksi, "SELECT MAX(id_user) AS id FROM tabel_user");
  $dataUser = mysqli_fetch_assoc($idUser);
  $number = $dataUser['id'] + 1;

  $txtNama = $_POST['txtNama'];
  $txtEmail = $_POST['txtEmail'];
  $txtAlamat = $_POST['txtAlamat'];
  $txtNohp = $_POST['txtNohp'];
  $txtNowa = $_POST['txtNowa'];
  $txtNotelegram = $_POST['txtNotelegram'];

  $fotoNama = $_FILES['foto']['name'];
  $fotoTmp = $_FILES['foto']['tmp_name'];
  $tipeFoto = pathinfo($fotoNama, PATHINFO_EXTENSION);
  $finalFoto = date("i", time()) . $fotoNama;




  $tglMendaftar   = date("Y-m-d", time()) . " " . date("H:i:s", time());
  $created_at     = date("Y-m-d", time()) . " " . date("H:i:s", time());

  $txtUsername = $_POST['txtUsername'];
  $txtPassword = $_POST['txtPassword'];


  $sqlDaftar = mysqli_query($koneksi, "INSERT INTO tabel_user VALUES
		('$number','$txtNama','$txtEmail','$txtAlamat','$txtNohp','$txtNowa','$txtNotelegram','$finalFoto','$tglMendaftar','$txtUsername','$txtPassword','$created_at')");


  //Cek Dahulu Keseluruhan Data yang di Input
  if ($sqlDaftar) {
    # code...
    move_uploaded_file($fotoTmp, 'gambar/' . $finalFoto);
    echo "<script>alert('Anda Berhasil Mendaftar')</script>";
    //var_dump($sqlDaftar);
?>
    <meta http-equiv="refresh" content="0; url=index.php" />
<?php
  }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>






  <title>Sistem Pemetaan Tempat Kost</title>
  <!--

DIGITAL TREND

https://templatemo.com/tm-538-digital-trend

-->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <link rel="stylesheet" href="dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="dist/css/font-awesome.min.css">
  <link rel="stylesheet" href="dist/css/aos.css">
  <link rel="stylesheet" href="dist/css/owl.carousel.min.css">
  <link rel="stylesheet" href="dist/css/owl.theme.default.min.css">
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">

  <!-- MAIN CSS -->
  <link rel="stylesheet" href="dist/css/templatemo-digital-trend.css">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Ekko Lightbox -->
  <link rel="stylesheet" href="plugins/ekko-lightbox/ekko-lightbox.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">

</head>

<body>

  <!-- MENU BAR -->
  <nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">
      <a class="navbar-brand" href="index.html">
        <i class="fa fa-map"></i>
        SIP - KOST
      </a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <!-- <li class="nav-item">
                        <a href="#profile" class="nav-link smoothScroll">Profile</a>
                    </li> -->
          <li class="nav-item">
            <a href="#about" class="nav-link smoothScroll">About</a>
          </li>
          <li class="nav-item">
            <a href="#daftarLogin" class="nav-link contact smoothscroll">Daftar / Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>


  <!-- HERO -->
  <section class="hero hero-bg d-flex justify-content-center align-items-center">
    <div class="container">
      <div class="row">

        <div class="col-lg-6 col-md-10 col-12 d-flex flex-column justify-content-center align-items-center">
          <div class="hero-text">

            <h1 class="text-white" data-aos="fade-up">Melihat Lokasi Tempat Kost Dengan Sekali Klik</h1>

            <a href="#daftarLogin" class="custom-btn btn-bg btn mt-3" data-aos="fade-up" data-aos-delay="100">Kunjungi!</a>

          </div>
        </div>

        <div class="col-lg-6 col-12">
          <div class="hero-image" data-aos="fade-up" data-aos-delay="300">

            <img style="border-radius: 50%" src="dist/img/map.jpg" class="img-fluid" alt="working girl">
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- Profile -->
  <section class="about section-padding pb-0" id="about">
    <div class="container">
      <div class="row">

        <div class="col-lg-7 mx-auto col-md-10 col-12">
          <div class="about-info">

            <h2 class="mb-4" data-aos="fade-up"><strong>Sistem Pemetaan Tempat Kost</strong> Di Kabupaten Kendal</h2>

            <p class="mb-0" data-aos="fade-up">Sistem ini di rancang untuk mempermudah pengguna untuk mencari Tempat Kost di Sekitaran Kabupaten Kendal. Dengan berisikan data Kost yang ada di Kabupaten Kendal.</p>
            <p class="mb-0" data-aos="fade-up">Di rancangnya aplikasi ini didasari karena banyaknya orang yang bertanya area Kost terdekat di Area Sekitaran Kendal</p>
          </div>

          <div class="about-image" data-aos="fade-up" data-aos-delay="200">

            <img src="dist/img/office.png" class="img-fluid" alt="office">
          </div>
        </div>

      </div>
    </div>
  </section>


  <!-- Login -->
  <section class="about section-padding pb-0" id="daftarLogin">
    <div class="container">
      <div class="row">

        <div class="col-md-6 col-12">
          <div class="about-info">

            <h2 class="mb-4" data-aos="fade-up"><strong>Daftar</strong></h2>

            <p class="mb-0" data-aos="fade-up">
            <form action="" method="POST" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <label for="inputFoto">Foto <span style="color: red;"> *</span></label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="inputFoto" name="foto" accept="image/*">
                      <label class="custom-file-label" for="inputFoto">Pilih Gambar</label>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="txtNama">Nama<span style="color: red;"> *</span></label>
                  <input type="text" class="form-control form-control-sm" id="txtNama" placeholder="Nama Lengkap" name="txtNama">
                </div>
                <div class="form-group">
                  <label for="txtEmail">Email<span style="color: red;"> *</span></label>
                  <input type="email" class="form-control form-control-sm" id="txtEmail" placeholder="Email" name="txtEmail">
                </div>
                <div class="form-group">
                  <label for="noHp">No Handphone</label>
                  <input type="text" class="form-control form-control-sm" id="noHp" placeholder="No Handphone" name="txtNohp">
                </div>
                <div class="form-group">
                  <label for="noWa">No Whatsapps</label>
                  <input type="text" class="form-control form-control-sm" id="noWa" placeholder="No Whatsapps" name="txtNowa">
                </div>
                <div class="form-group">
                  <label for="noTelegram">No Telegram</label>
                  <input type="text" class="form-control form-control-sm" id="noTelegram" placeholder="No Telegram" name="txtNotelegram">
                </div>
                <div class="form-group">
                  <label for="txtAlamat">Alamat<span style="color: red;"> *</span></label>
                  <textarea class="form-control form-control-sm" name="txtAlamat" placeholder="Alamat Lengkap"></textarea>

                </div>
                <div class="form-group">
                  <label for="txtUsername">Username<span style="color: red;"> *</span></label>
                  <input type="text" class="form-control form-control-sm" id="txtUsername" placeholder="Username" name="txtUsername">
                </div>
                <div class="form-group">
                  <label for="txtPassword">Password<span style="color: red;"> *</span></label>
                  <input type="password" class="form-control form-control-sm" id="txtPassword" placeholder="Password" name="txtPassword">
                </div>
                <!-- <div class="form-check">
					                    <input type="checkbox" class="form-check-input" name="snk" id="snk">
					                    <label class="form-check-label" for="snk" >Saya Menyetujui Syarat dan Ketentuan</label>
					                  </div> -->
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" name="tbDaftar" class="btn btn-primary" onclick="return confirm('Apakah Anda Yakin dengan Data ini ?')" style="float: right;">Daftar</button>
              </div>
            </form>
            </p>
          </div>


        </div>
        <div class="col-md-6 col-12">
          <div class="about-info">

            <h2 class="mb-4" data-aos="fade-up"><strong>Login</strong></h2>

            <p class="mb-0" data-aos="fade-up">
            <form action="" method="POST">
              <div class="card-body">
                <div class="form-group">
                  <label for="txt_email">Email / Username</label>
                  <input type="text" class="form-control form-control-sm" id="txt_email" name="txt_email" placeholder="Email /  Username">
                </div>
                <div class="form-group">
                  <label for="txt_password">Password</label>
                  <input type="password" class="form-control form-control-sm" id="txt_password" name="txt_password" placeholder="Password">
                </div>

              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" name="tbLogin" class="btn btn-primary" style="float: right;">Login</button>
              </div>
            </form>
            </p>
          </div>


        </div>

      </div>
    </div>
  </section>

  <!-- /Modal Daftar -->
  <footer class="site-footer">
    <div class="container">
      <div class="row">


        <div class="col-lg-4 mx-lg-auto text-center col-12" data-aos="" data-aos-delay="400">
          <p class="copyright-text">Copyright &copy; 2021 <br> Sistem Pemetaan Tempat Kost
            <br>
            Kabupaten Kendal
          </p>
        </div>

      </div>
    </div>
  </footer>


  <!-- SCRIPTS -->
  <script src="dist/js/jquery.min.js"></script>
  <script src="dist/js/bootstrap.min.js"></script>
  <script src="dist/js/aos.js"></script>
  <script src="dist/js/owl.carousel.min.js"></script>
  <script src="dist/js/smoothscroll.js"></script>
  <script src="dist/js/custom.js"></script>

  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- DataTables  & Plugins -->
  <script src="plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="plugins/jszip/jszip.min.js"></script>
  <script src="plugins/pdfmake/pdfmake.min.js"></script>
  <script src="plugins/pdfmake/vfs_fonts.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <!-- bs-custom-file-input -->
  <script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.js"></script>

  <!-- PAGE PLUGINS -->
  <!-- jQuery Mapael -->
  <script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
  <script src="plugins/raphael/raphael.min.js"></script>
  <script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
  <script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
  <!-- Ekko Lightbox -->
  <script src="plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
  <!-- Filterizr-->
  <script src="plugins/filterizr/jquery.filterizr.min.js"></script>
  <!-- ChartJS -->
  <script src="plugins/chart.js/Chart.min.js"></script>
  <!-- FLOT CHARTS -->
  <script src="plugins/flot/jquery.flot.js"></script>
  <!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
  <script src="plugins/flot/plugins/jquery.flot.resize.js"></script>
  <!-- FLOT PIE PLUGIN - also used to draw donut charts -->
  <script src="plugins/flot/plugins/jquery.flot.pie.js"></script>
  <!-- AdminLTE for demo purposes -->
  <!-- <script src="dist/js/demo.js"></script> -->
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="dist/js/pages/dashboard2.js"></script>
  <script>
    $(function() {
      bsCustomFileInput.init();
    });
  </script>

</body>

</html>