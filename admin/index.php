<?php
error_reporting(0);
date_default_timezone_set("Asia/Jakarta");
session_start();

include "function.php";



  

if (!$_SESSION['nama'] && !$_SESSION['password']) {
  # code...
  header("Location:form_login.php");
}


$page = $_GET["page"];
if ($page == "") {
  # code...
  $title = "Dashboard";
} elseif ($page == "data-admin") {
  $title = "Data Admin";
} elseif ($page == "tambah-admin") {
  $title = "Tambah Admin";
} elseif ($page == "data-kost") {
  $title = "Data Kost";
} elseif ($page == "tambah-kost") {
  $title = "Tambah Kost";
} elseif ($page == "detail-kost") {
  $title = "Detail Kost";
} elseif ($page == "ubah-kost") {
  # code...
  $title = "Ubah Kost";
} elseif ($page == "data-users") {
  # code...
  $title = "Data Users";
} elseif ($page == "detail-user") {
  # code...
  $title = "Detail User";
} elseif ($page == "data-transaksi") {
  $title = "Data Transaksi";
}

$notifikasiCount1 = mysqli_query($koneksi, "SELECT count(id_user) AS notifikasiCount3 FROM tabel_user");
$notifikasiCount = mysqli_fetch_assoc($notifikasiCount1);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SIP-Kost | <?= $title ?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Ekko Lightbox -->
  <link rel="stylesheet" href="../plugins/ekko-lightbox/ekko-lightbox.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <style>
    #miniMap {
      height: 300px;
      /* The height is 400 pixels */
      width: 100%;
      /* The width is the width of the web page */
    }
  </style>
</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <!-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="../dist/img/AdminLTELogo.png" alt="" height="60" width="60">
  </div>
 -->
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-dark">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <!-- <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">
                </span>
        </a> -->
          <?php

          $tgl = date("d", time());
          $bln = date("m", time());

          //Looping tgl_mendaftar
          //Buat query berdasarkan tgl_mendaftar 

          if ($tgl == 1 || $tgl == 01) {
            # code...
            $zero = 0;
            echo $zero;
          } else {

            $zero = $notifikasiCount['notifikasiCount3'];
            #echo $zero;
          }

          ?>


          <!-- <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header"><?= $zero; ?> Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-user mr-2"></i> <?= $zero; ?> User Mendaftar
            <span class="float-right text-muted text-sm"><i></i></span>
          </a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li> -->
        <li class="nav-item">
          <a class="nav-link" href="logout.php" role="button">
            <span class="badge badge-danger">Logout</span>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="?page=" class="brand-link">
        <img src="../dist/img/AdminLTELogo.png" alt="SIP-Kost Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">SIP - KOST</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="Admin Image">
          </div>
          <div class="info">
            <a href="<?= $_SERVER['PHP_SELF'] . '?page=' . $page ?>" class="d-block"><?= $_SESSION['nama']; ?></a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="index.php?page=" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="index.php?page=data-admin" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>
                  Data Admin
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="index.php?page=data-kost" class="nav-link">
                <i class="nav-icon fas fa-home"></i>
                <p>
                  Data Kost
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="index.php?page=data-users" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Data Users
                  <span class="right badge badge-success"><?= $zero; ?> User</span>
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="index.php?page=data-transaksi" class="nav-link">
                <i class="nav-icon fas fa-donate"></i>
                <p>
                  Data Transaksi
                </p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <?php


    ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0"><?= $title; ?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active"><?= $title; ?></li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <?php
        include "isi.php";
        ?>
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
      <strong>Sistem Pemetaan Tempat Kost di Kabupaten Kendal</strong>
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 1.0
      </div>
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->
  <!-- jQuery -->
  <script src="../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- DataTables  & Plugins -->
  <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="../plugins/jszip/jszip.min.js"></script>
  <script src="../plugins/pdfmake/pdfmake.min.js"></script>
  <script src="../plugins/pdfmake/vfs_fonts.js"></script>
  <script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <!-- bs-custom-file-input -->
  <script src="../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../dist/js/adminlte.js"></script>

  <!-- PAGE PLUGINS -->
  <!-- jQuery Mapael -->
  <script src="../plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
  <script src="../plugins/raphael/raphael.min.js"></script>
  <script src="../plugins/jquery-mapael/jquery.mapael.min.js"></script>
  <script src="../plugins/jquery-mapael/maps/usa_states.min.js"></script>
  <!-- Ekko Lightbox -->
  <script src="../plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
  <!-- Filterizr-->
  <script src="../plugins/filterizr/jquery.filterizr.min.js"></script>
  <!-- ChartJS -->
  <script src="../plugins/chart.js/Chart.min.js"></script>
  <!-- FLOT CHARTS -->
  <script src="../plugins/flot/jquery.flot.js"></script>
  <!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
  <script src="../plugins/flot/plugins/jquery.flot.resize.js"></script>
  <!-- FLOT PIE PLUGIN - also used to draw donut charts -->
  <script src="../plugins/flot/plugins/jquery.flot.pie.js"></script>
  <!-- AdminLTE for demo purposes -->
  <!-- <script src="../dist/js/demo.js"></script> -->
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="../dist/js/pages/dashboard2.js"></script>
  <!-- Page specific script -->


  <script src="../dist/js/myJs.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB6zwgH33N03KdnAj0dcFUV6wa-3FsrtH8&libraries=places&callback=initMap" defer></script>


  <script>
    $(function() {
      $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        //"buttons": ["csv", "excel", "pdf"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

      $('#example2').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });


    //Chart JS
  </script>
  <script>
    /*
     * BAR CHART
     * ---------
     */

    var bar_data = {
      data: [
        [1, 10],
        [2, 8],
        [3, 4],
        [4, 13],
        [5, 17],
        [6, 9]
      ],
      bars: {
        show: true
      }
    }
    $.plot('#bar-chart', [bar_data], {
      grid: {
        borderWidth: 0,
        borderColor: '#f3f3f3',
        tickColor: ''
      },
      series: {
        bars: {
          show: true,
          barWidth: 0.5,
          align: 'center',
        },
      },
      colors: ['white'],
      xaxis: {
        ticks: [
          [1, 'January'],
          [2, 'February'],
          [3, 'March'],
          [4, 'April'],
          [5, 'May'],
          [6, 'June']
        ]
      }
    });
    /* END BAR CHART */

    //   $(document).ready(function(){
    //   $("#Simpan").on("click", function(){
    //     alert("XXXXX");

    //     //let id_admin = $("#id_admin").val();
    //     var nama     = $("#nama").val();
    //     var username = $("#username").val();
    //     var password = $("#password").val();
    //     //let time_stamp = $("#time_stamp").val();

    //   });
    //   $.ajax({
    //       url: '?page=tambah-admin',
    //       type: 'POST',
    //       dataType: 'json',
    //       data: {nama:nama,username:username,password:password},
    //       success: function(data){
    //         //alert("OK");
    //         alert(data);
    //       }
    //   });
    // });
  </script>
  <!-- Page specific script -->
  <script>
    $(function() {
      bsCustomFileInput.init();
    });
  </script>

  <script>
    $(function() {
      $(document).on('click', '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox({
          alwaysShowClose: true
        });
      });

      $('.filter-container').filterizr({
        gutterPixels: 3
      });
      $('.btn[data-filter]').on('click', function() {
        $('.btn[data-filter]').removeClass('active');
        $(this).addClass('active');
      });
    })
  </script>

</body>

</html>