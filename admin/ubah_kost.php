<?php
$id = $_GET['id'];

$sqlx = mysqli_query($koneksi, "SELECT * FROM tabel_kost WHERE id_kost = '$id'");
$data = mysqli_fetch_assoc($sqlx);

$myDataId = json_encode($data);
//echo "<div id='dataId'>" . $myDataId . "</div>";



?>


<div class="col-10">
  <!-- general form elements -->
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Ubah Data</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="POST" action="" enctype="multipart/form-data">
      <div class="card-body">
        <div class="form-group">
          <label for="kost">Nama Kost</label>
          <input type="text" class="form-control" id="kost" placeholder="Masukkan Nama Kost" name="nama_kost" value="<?= $data['nama_kost'] ?>">
        </div>
        <div class="form-group">
          <label for="pemilik">Nama Pemilik</label>
          <input type="text" class="form-control" id="pemilik" placeholder="Masukkan Nama Pemilik" name="nama_pemilik" value="<?= $data['nama_pemilik'] ?>">
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-sm-4">
              <label for="no_hp">No Handphone</label>
              <input type="text" class="form-control" id="no_hp" placeholder="Example: +6281xxxxxxx" name="no_hp" value="<?= $data['no_hp'] ?>">
            </div>
            <div class="col-sm-4">
              <label for="no_wa">No Whatsapps</label>
              <input type="text" class="form-control" id="no_wa" placeholder="Example: +6281xxxxxxx" name="no_wa" value="<?= $data['no_wa'] ?>">
            </div>
            <div class="col-sm-4">
              <label for="no_telegram">No Telegram</label>
              <input type="text" class="form-control" id="no_telegram" placeholder="Example: +6281xxxxxxx" name="no_telegram" value="<?= $data['no_telegram'] ?>">
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="kategori">Kategori Kost</label>
          <div class="row ml-3">
            <div class="col-sm-2">
              <?php $data['kategori_kost'] == "Perempuan" ? $checked = "checked" : $checked = ""; ?>
              <input class="form-check-input" type="radio" name="kategori_kost" value="Perempuan" <?= $checked ?>>
              <label class="form-check-label">Perempuan</label>
            </div>
            <div class="col-sm-2">
              <?php $data['kategori_kost'] == "Laki-Laki" ? $checked = "checked" : $checked = ""; ?>
              <input class="form-check-input" type="radio" name="kategori_kost" value="Laki-Laki">
              <label class="form-check-label">Laki - Laki</label>
            </div>
            <div class="col-sm-3">
              <?php $data['kategori_kost'] == "Laki-Laki dan Perempuan" ? $checked = "checked" : $checked = ""; ?>
              <input class="form-check-input" type="radio" name="kategori_kost" value="Laki-Laki dan Perempuan" <?= $checked ?>>
              <label class="form-check-label">Laki-Laki dan Perempuan</label>
            </div>
          </div>
        </div>
        <!-- For MAP -->
        <div class="form-group">
          <div class="row">
            <div class="col-sm-12">

              <div id="miniMap"></div>

            </div>
          </div>
        </div>
        <!-- End For Map -->
        <div class="form-group">
          <label for="alamat">Alamat Kost</label>
          <textarea class="form-control" id="alamat" rows="3" placeholder="Masukkan Alamat Detail ..." name="alamat_kost"><?= $data['alamat_kost']; ?></textarea>
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-sm-6">
              <label for="lattitude">Lattitude</label>
              <input type="text" class="form-control" id="lattitude" placeholder="Koordinat Lattitude" name="lattitude" value="<?= $data['lattitude'] ?>" >
            </div>
            <div class="col-sm-6">
              <label for="longtitude">Longtitude</label>
              <input type="text" class="form-control" id="longtitude" placeholder="Koordinat Longtitude" name="longtitude" value="<?= $data['longtitude'] ?>" >
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="gambar">Gambar</label>
          <?php
          $dataGambar = $data['gambar'];
          $pecah      = explode(",", $dataGambar);

          ?>
          <div class="row">
            <div class="col-sm-4">
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="gambar" name="gambar_kost1" accept="image/*">
                  <label class="custom-file-label" for="gambar"><?= $pecah[0] ?></label>
                </div>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="gambar" name="gambar_kost2" accept="image/*">
                  <label class="custom-file-label" for="gambar"><?= $pecah[1] ?></label>
                </div>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="gambar" name="gambar_kost3" accept="image/*">
                  <label class="custom-file-label" for="gambar"><?= $pecah[2] ?></label>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="kategori">Status Kost</label>
          <div class="row ml-3">
            <div class="col-sm-2">
              <?php $data['status_kost'] == "Tersedia" ? $checked = "checked" : $checked = ""; ?>
              <input class="form-check-input" type="radio" name="status_kost" value="Tersedia" <?= $checked ?>>
              <label class="form-check-label">Tersedia</label>
            </div>
            <div class="col-sm-2">
              <?php $data['status_kost'] == "Penuh" ? $checked = "checked" : $checked = ""; ?>
              <input class="form-check-input" type="radio" name="status_kost" value="Penuh" <?= $checked ?>>
              <label class="form-check-label">Penuh</label>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="kete">Keterangan</label>
          <textarea class="form-control" id="kete" rows="3" placeholder="Keterangan Kost ..." name="keterangan"><?= $data['keterangan']; ?></textarea>
        </div>
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary" name="tb_ubah">Simpan</button>
      </div>
    </form>
  </div>
</div>
<!-- /.card -->
<script>
  //for Map Tambah kost
  let map;
  let geocoder;
  let marker;

  function initMap() {
    // The location of kendal
    let kendal = {
      lat: -6.9247481,
      lng: 110.1356907
    };
    let infoWindow = new google.maps.InfoWindow;

    let mapOptions = {
      zoom: 15,
      center: kendal,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    map = new google.maps.Map(document.getElementById('miniMap'), mapOptions);

    let myData = JSON.parse(document.getElementById('dataId').innerHTML);
    //console.log(myData)
    let a = document.getElementById('lattitude').value;
    let b = document.getElementById('longtitude').value;

    marker = new google.maps.Marker({
      position: new google.maps.LatLng(a, b),
      map: map,
    });



    let addMarker = new google.maps.event.addListener(map, 'click', function(e) {
      let lat = e.latLng.lat(); // lat of clicked point
      let lng = e.latLng.lng(); // lng of clicked point   

      geocode(lat, lng);

      document.getElementById('lattitude').value = lat;
      document.getElementById('longtitude').value = lng;

      moveMarker(this, e.latLng);

    });
    //Function Pindah Marker
    function moveMarker(miniMap, koordinat) {
      if (marker) {
        marker.setPosition(koordinat)
      } else {
        marker = new google.maps.Marker({
          position: koordinat,
          map: map,
          animation: google.maps.Animation.DROP,
          draggable: true
        });
        google.maps.event.addListener(marker, 'dragend', function(e) {
          let geoLat = e.latLng.lat();
          let geoLng = e.latLng.lng();
          geocode(geoLat, geoLng);

          document.getElementById('lattitude').value = geoLat;
          document.getElementById('longtitude').value = geoLng;

          //let x = geoLat,geoLng;


        });
      }
    }

    //Function Geocoder AJAX
    function geocode(lat, lng) {
      //Panggil Geolocation API
      $.ajax({
          url: 'https://us1.locationiq.com/v1/reverse?key=pk.efbcf7286f7586708871f924cc8fd76c&lat=' + lat + '&lon=' + lng + '&format=json',
          async: true,
          crossDomain: true,
          method: 'GET'
        })
        .done(function(data) {
          let result = data.display_name;
          let address = data.address;

          document.getElementById("alamat").value = result;
        })
    }

  }
</script>

<?php

if (isset($_POST['tb_ubah'])) {
  # code...

  $nama_kost      = $_POST['nama_kost'];
  $alamat_kost    = $_POST['alamat_kost'];
  $kategori_kost  = $_POST['kategori_kost'];
  $nama_pemilik   = $_POST['nama_pemilik'];
  $lattitude      = $_POST['lattitude'];
  $longtitude     = $_POST['longtitude'];

  //Untuk Gambar
  $ektensi        = ["jpg", "JPG", "jpeg", "JPEG", "png", "PNG"];
  #gambar1
  $namaGambar1     = $_FILES['gambar_kost1']['name'];
  $tmp1            = $_FILES['gambar_kost1']['tmp_name'];
  $tipeGambar1     = pathinfo($namaGambar1, PATHINFO_EXTENSION);
  $ukuran1         = $_FILES['gambar_kost1']['size'];
  #gambar2
  $namaGambar2     = $_FILES['gambar_kost2']['name'];
  $tmp2            = $_FILES['gambar_kost2']['tmp_name'];
  $tipeGambar2     = pathinfo($namaGambar2, PATHINFO_EXTENSION);
  $ukuran2         = $_FILES['gambar_kost2']['size'];
  #gambar3
  $namaGambar3     = $_FILES['gambar_kost3']['name'];
  $tmp3            = $_FILES['gambar_kost3']['tmp_name'];
  $tipeGambar3     = pathinfo($namaGambar3, PATHINFO_EXTENSION);
  $ukuran3         = $_FILES['gambar_kost3']['size'];

  $finalGambar     = [];
  $finalGambar     = [date("H_i", time()) . "_" . $namaGambar1, date("H_i", time()) . "_" . $namaGambar2, date("H_i", time()) . "_" . $namaGambar3];

  $finalGambarx    = implode(",", $finalGambar);
  //End Untuk Gambar

  $status_kost    = $_POST['status_kost'];
  $keterangan     = $_POST['keterangan'];
  $created_at     = date("Y-m-d", time()) . " " . date("H:i:s", time());
  $no_hp          = $_POST['no_hp'];
  $no_wa          = $_POST['no_wa'];
  $no_telegram    = $_POST['no_telegram'];




  //Kondisi Gambar
  if (!$tmp1 && !$tmp2 && !$tmp3) {
    # code...
    $finalGambar2    = [];
    $finalGambar2    = [$pecah[0], $pecah[1], $pecah[2]];

    $finalGambarx2   = implode(",", $finalGambar2);

    $sql        = mysqli_query($koneksi, "UPDATE tabel_kost SET 
              nama_kost = '$nama_kost',
              alamat_kost = '$alamat_kost',
              kategori_kost='$kategori_kost',
              nama_pemilik = '$nama_pemilik',
              lattitude = '$lattitude',
              longtitude = '$longtitude', 
              gambar = '$finalGambarx2',
              status_kost = '$status_kost',
              keterangan = '$keterangan',
              created_at = '$created_at',
              no_hp = '$no_hp',
              no_wa = '$no_wa',
              no_telegram = '$no_telegram' 
              WHERE id_kost='$id'");

    if ($sql) {

      echo "<script>alert('Data Berhasil Diubah')</script>";
?>
      <meta http-equiv="refresh" content="0; url=index.php?page=data-kost" />
    <?php
    }
  } elseif (!$tmp1 && !$tmp2) {
    # code...
    $finalGambar2    = [];
    $finalGambar2    = [$pecah[0], $pecah[1], date("H_i", time()) . "_" . $namaGambar3];

    $finalGambarx2   = implode(",", $finalGambar2);

    $sql        = mysqli_query($koneksi, "UPDATE tabel_kost SET 
              nama_kost = '$nama_kost',
              alamat_kost = '$alamat_kost',
              kategori_kost='$kategori_kost',
              nama_pemilik = '$nama_pemilik',
              lattitude = '$lattitude',
              longtitude = '$longtitude', 
              gambar = '$finalGambarx2',
              status_kost = '$status_kost',
              keterangan = '$keterangan',
              created_at = '$created_at',
              no_hp = '$no_hp',
              no_wa = '$no_wa',
              no_telegram = '$no_telegram' 
              WHERE id_kost='$id'");

    if ($sql) {
      # code...
      unlink("gambar/" . $pecah[2]);
      move_uploaded_file($tmp3, 'gambar/' . date('H_i', time()) . '_' . $namaGambar3);

      echo "<script>alert('Data Berhasil Diubah')</script>";
    ?>
      <meta http-equiv="refresh" content="0; url=index.php?page=data-kost" />
    <?php
    }
  } elseif (!$tmp2 && !$tmp3) {
    $finalGambar2    = [];
    $finalGambar2    = [date("H_i", time()) . "_" . $namaGambar1, $pecah[1], $pecah[2]];

    $finalGambarx2   = implode(",", $finalGambar2);

    $sql        = mysqli_query($koneksi, "UPDATE tabel_kost SET 
              nama_kost = '$nama_kost',
              alamat_kost = '$alamat_kost',
              kategori_kost='$kategori_kost',
              nama_pemilik = '$nama_pemilik',
              lattitude = '$lattitude',
              longtitude = '$longtitude', 
              gambar = '$finalGambarx2',
              status_kost = '$status_kost',
              keterangan = '$keterangan',
              created_at = '$created_at',
              no_hp = '$no_hp',
              no_wa = '$no_wa',
              no_telegram = '$no_telegram' 
              WHERE id_kost='$id'");
    # code...
    if ($sql) {
      # code...
      unlink("gambar/" . $pecah[0]);
      move_uploaded_file($tmp1, 'gambar/' . date('H_i', time()) . '_' . $namaGambar1);


      echo "<script>alert('Data Berhasil Diubah')</script>";
    ?>
      <meta http-equiv="refresh" content="0; url=index.php?page=data-kost" />
    <?php
    }
  } elseif (!$tmp1 && !$tmp3) {
    $finalGambar2    = [];
    $finalGambar2    = [$pecah[0], date("H_i", time()) . "_" . $namaGambar2, $pecah[2]];

    $finalGambarx2   = implode(",", $finalGambar2);

    $sql        = mysqli_query($koneksi, "UPDATE tabel_kost SET 
              nama_kost = '$nama_kost',
              alamat_kost = '$alamat_kost',
              kategori_kost='$kategori_kost',
              nama_pemilik = '$nama_pemilik',
              lattitude = '$lattitude',
              longtitude = '$longtitude', 
              gambar = '$finalGambarx2',
              status_kost = '$status_kost',
              keterangan = '$keterangan',
              created_at = '$created_at',
              no_hp = '$no_hp',
              no_wa = '$no_wa',
              no_telegram = '$no_telegram' 
              WHERE id_kost='$id'");
    # code...
    if ($sql) {
      # code...

      unlink("gambar/" . $pecah[1]);
      move_uploaded_file($tmp2, 'gambar/' . date('H_i', time()) . '_' . $namaGambar2);


      echo "<script>alert('Data Berhasil Diubah')</script>";
    ?>
      <meta http-equiv="refresh" content="0; url=index.php?page=data-kost" />
    <?php
    }
  } elseif (!$tmp1) {
    $finalGambar2    = [];
    $finalGambar2    = [$pecah[0], date("H_i", time()) . "_" . $namaGambar2, date("H_i", time()) . "_" . $namaGambar3];

    $finalGambarx2   = implode(",", $finalGambar2);

    $sql        = mysqli_query($koneksi, "UPDATE tabel_kost SET 
              nama_kost = '$nama_kost',
              alamat_kost = '$alamat_kost',
              kategori_kost='$kategori_kost',
              nama_pemilik = '$nama_pemilik',
              lattitude = '$lattitude',
              longtitude = '$longtitude', 
              gambar = '$finalGambarx2',
              status_kost = '$status_kost',
              keterangan = '$keterangan',
              created_at = '$created_at',
              no_hp = '$no_hp',
              no_wa = '$no_wa',
              no_telegram = '$no_telegram' 
              WHERE id_kost='$id'");

    if ($sql) {
      # code...
      unlink("gambar/" . $pecah[1]);
      unlink("gambar/" . $pecah[2]);
      move_uploaded_file($tmp2, 'gambar/' . date('H_i', time()) . '_' . $namaGambar2);
      move_uploaded_file($tmp3, 'gambar/' . date('H_i', time()) . '_' . $namaGambar3);

      echo "<script>alert('Data Berhasil Diubah')</script>";
    ?>
      <meta http-equiv="refresh" content="0; url=index.php?page=data-kost" />
    <?php
    }
    # code...
  } elseif (!$tmp2) {
    $finalGambar2    = [];
    $finalGambar2    = [date("H_i", time()) . "_" . $namaGambar1, $pecah[1], date("H_i", time()) . "_" . $namaGambar3];

    $finalGambarx2   = implode(",", $finalGambar2);

    $sql        = mysqli_query($koneksi, "UPDATE tabel_kost SET 
              nama_kost = '$nama_kost',
              alamat_kost = '$alamat_kost',
              kategori_kost='$kategori_kost',
              nama_pemilik = '$nama_pemilik',
              lattitude = '$lattitude',
              longtitude = '$longtitude', 
              gambar = '$finalGambarx2',
              status_kost = '$status_kost',
              keterangan = '$keterangan',
              created_at = '$created_at',
              no_hp = '$no_hp',
              no_wa = '$no_wa',
              no_telegram = '$no_telegram' 
              WHERE id_kost='$id'");

    if ($sql) {
      # code...
      unlink("gambar/" . $pecah[0]);
      unlink("gambar/" . $pecah[2]);
      move_uploaded_file($tmp1, 'gambar/' . date('H_i', time()) . '_' . $namaGambar1);

      move_uploaded_file($tmp3, 'gambar/' . date('H_i', time()) . '_' . $namaGambar3);

      echo "<script>alert('Data Berhasil Diubah')</script>";
    ?>
      <meta http-equiv="refresh" content="0; url=index.php?page=data-kost" />
    <?php
    }
    # code...
  } elseif (!$tmp3) {
    $finalGambar2    = [];
    $finalGambar2    = [date("H_i", time()) . "_" . $namaGambar1, date("H_i", time()) . "_" . $namaGambar2, $pecah[2]];

    $finalGambarx2   = implode(",", $finalGambar2);

    $sql        = mysqli_query($koneksi, "UPDATE tabel_kost SET 
              nama_kost = '$nama_kost',
              alamat_kost = '$alamat_kost',
              kategori_kost='$kategori_kost',
              nama_pemilik = '$nama_pemilik',
              lattitude = '$lattitude',
              longtitude = '$longtitude', 
              gambar = '$finalGambarx2',
              status_kost = '$status_kost',
              keterangan = '$keterangan',
              created_at = '$created_at',
              no_hp = '$no_hp',
              no_wa = '$no_wa',
              no_telegram = '$no_telegram' 
              WHERE id_kost='$id'");

    if ($sql) {
      # code...
      unlink("gambar/" . $pecah[1]);
      move_uploaded_file($tmp1, 'gambar/' . date('H_i', time()) . '_' . $namaGambar1);
      move_uploaded_file($tmp2, 'gambar/' . date('H_i', time()) . '_' . $namaGambar2);


      echo "<script>alert('Data Berhasil Diubah')</script>";
    ?>
      <meta http-equiv="refresh" content="0; url=index.php?page=data-kost" />
    <?php
    }
    # code...


  } else {

    $sql        = mysqli_query($koneksi, "UPDATE tabel_kost SET 
              nama_kost = '$nama_kost',
              alamat_kost = '$alamat_kost',
              kategori_kost='$kategori_kost',
              nama_pemilik = '$nama_pemilik',
              lattitude = '$lattitude',
              longtitude = '$longtitude', 
              gambar = '$finalGambarx',
              status_kost = '$status_kost',
              keterangan = '$keterangan',
              created_at = '$created_at',
              no_hp = '$no_hp',
              no_wa = '$no_wa',
              no_telegram = '$no_telegram' 
              WHERE id_kost='$id'");

    if ($sql) {
      # code...
      unlink("gambar/" . $pecah[0]);
      unlink("gambar/" . $pecah[1]);
      unlink("gambar/" . $pecah[2]);
      move_uploaded_file($tmp1, 'gambar/' . date('H_i', time()) . '_' . $namaGambar1);
      move_uploaded_file($tmp2, 'gambar/' . date('H_i', time()) . '_' . $namaGambar2);
      move_uploaded_file($tmp3, 'gambar/' . date('H_i', time()) . '_' . $namaGambar3);

      echo "<script>alert('Data Berhasil Diubah')</script>";
    ?>
      <meta http-equiv="refresh" content="0; url=index.php?page=data-kost" />
<?php
    }
  }
}




?>