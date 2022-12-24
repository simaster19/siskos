<div class="col-10">
  <!-- general form elements -->
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Tambah Data</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="POST" action="" enctype="multipart/form-data">
      <div class="card-body">
        <div class="form-group">
          <label for="kost">Nama Kost</label>
          <input type="text" class="form-control" id="kost" placeholder="Masukkan Nama Kost" name="nama_kost" required>
        </div>
        <div class="form-group">
          <label for="pemilik">Nama Pemilik</label>
          <input type="text" class="form-control" id="pemilik" placeholder="Masukkan Nama Pemilik" name="nama_pemilik" required>
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-sm-4">
              <label for="no_hp">No Handphone</label>
              <input type="text" class="form-control" id="no_hp" placeholder="Example: +621xxxxxxx" name="no_hp" value="">
            </div>
            <div class="col-sm-4">
              <label for="no_wa">No Whatsapps</label>
              <input type="text" class="form-control" id="no_wa" placeholder="Example: +621xxxxxxx" name="no_wa" value="">
            </div>
            <div class="col-sm-4">
              <label for="no_telegram">No Telegram</label>
              <input type="text" class="form-control" id="no_telegram" placeholder="Example: +621xxxxxxx" name="no_telegram" value="">
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="kategori">Kategori Kost</label>
          <div class="row ml-3">
            <div class="col-sm-2">
              <input id="perempuan" class="form-check-input" type="radio" name="kategori_kost" value="Perempuan" checked>
              <label for="perempuan" class="form-check-label">Perempuan</label>
            </div>
            <div class="col-sm-2">
              <input id="laki_laki" class="form-check-input" type="radio" name="kategori_kost" value="Laki-Laki">
              <label for="laki_laki" class="form-check-label">Laki - Laki</label>
            </div>
            <div class="col-sm-3">
              <input id="lk_pr" class="form-check-input" type="radio" name="kategori_kost" value="Laki-Laki dan Perempuan">
              <label for="lk_pr" class="form-check-label">Laki-Laki dan Perempuan</label>
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
          <textarea class="form-control" id="alamat" rows="3" placeholder="Masukkan Alamat Detail ..." name="alamat_kost" value="" required></textarea>
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-sm-6">
              <label for="lattitude">Lattitude</label>
              <input type="text" class="form-control" id="lattitude" placeholder="Koordinat Lattitude" name="lattitude" value="" >
            </div>
            <div class="col-sm-6">
              <label for="longtitude">Longtitude</label>
              <input type="text" class="form-control" id="longtitude" placeholder="Koordinat Longtitude" name="longtitude" value="" >
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="gambar">Gambar</label>
          <div class="row">
            <div class="col-sm-4">
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="gambar" name="gambar_kost1" accept="image/*">
                  <label class="custom-file-label" for="gambar">Pilih Gambar</label>
                </div>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="gambar" name="gambar_kost2" accept="image/*">
                  <label class="custom-file-label" for="gambar">Pilih Gambar</label>
                </div>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="gambar" name="gambar_kost3" accept="image/*">
                  <label class="custom-file-label" for="gambar">Pilih Gambar</label>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="kategori">Status Kost</label>
          <div class="row ml-3">
            <div class="col-sm-2">
              <input class="form-check-input" type="radio" name="status_kost" value="Tersedia" checked>
              <label class="form-check-label">Tersedia</label>
            </div>
            <div class="col-sm-2">
              <input class="form-check-input" type="radio" name="status_kost" value="Penuh">
              <label class="form-check-label">Penuh</label>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="kete">Keterangan</label>
          <textarea class="form-control" id="kete" rows="3" placeholder="Keterangan Kost ..." name="keterangan"></textarea>
        </div>
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary" name="tb_simpan">Simpan</button>
        <button type="reset" class="btn btn-default float-right">Reset</button>
      </div>
    </form>
  </div>
</div>
<!-- /.card -->
<!-- For Google Maps -->
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



  // //Handler Event
  // let hp = document.getElementById('no_hp');
  // let wa = document.getElementById('no_wa');
  // let tele = document.getElementById('no_telegram');

  // hp.addEventListener("mouseover", function() {
  //   document.getElementById('no_hp').value = "+62";
  // });
  // wa.addEventListener("mouseover", function() {
  //   document.getElementById('no_wa').value = "+62";
  // });
  // tele.addEventListener("mouseover", function() {
  //   document.getElementById('no_telegram').value = "+62";
  // });
</script>


<?php
if (isset($_POST['tb_simpan'])) {
  # code...
  $idCount = mysqli_query($koneksi, "SELECT MAX(id_kost) AS id FROM tabel_kost");
  $data = mysqli_fetch_assoc($idCount);

  $number         = $data['id'] + 1;

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


  $sql        = mysqli_query($koneksi, "INSERT INTO tabel_kost VALUES('$number','$nama_kost','$alamat_kost','$kategori_kost','$nama_pemilik','$lattitude','$longtitude','$finalGambarx','$status_kost','$keterangan','$created_at','$no_hp','$no_wa','$no_telegram')");
  //var_dump($sql);

  if ($sql) {
    # code...
    move_uploaded_file($tmp1, 'gambar/' . date('H_i', time()) . '_' . $namaGambar1);
    move_uploaded_file($tmp2, 'gambar/' . date('H_i', time()) . '_' . $namaGambar2);
    move_uploaded_file($tmp3, 'gambar/' . date('H_i', time()) . '_' . $namaGambar3);

    echo "<script>alert('Data Berhasil Disimpan')</script>";
?>
    <meta http-equiv="refresh" content="0; url=index.php?page=data-kost" />
<?php
  }
}




?>