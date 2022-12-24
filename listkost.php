<?php

$sqlDataKost = mysqli_query($koneksi, "SELECT * FROM tabel_kost ORDER BY id_kost DESC");


// $curl = curl_init(); 
//   curl_setopt_array($curl, array( 
//     CURLOPT_URL => 'https://api.binderbyte.com/wilayah/kecamatan?api_key=28b300e0e49c48f6af30b41220c33e6059396f426636bf7f02f6519c9eaabc37&id_provinsi=33&id_kabupaten=3324', 
//     CURLOPT_RETURNTRANSFER => true, 
//     CURLOPT_ENCODING => '', 
//     CURLOPT_MAXREDIRS => 10, 
//     CURLOPT_TIMEOUT => 0, 
//     CURLOPT_FOLLOWLOCATION => true, 
//     CURLOPT_HTTP_VERSION => 
//     CURL_HTTP_VERSION_1_1, 
//     CURLOPT_CUSTOMREQUEST => 'GET', )); 
// $response = curl_exec($curl); 
// $json = json_decode($response);
// $value = $json->value;






?>



<div class="container">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Data List Kost</h3>
          <!-- <div class="row">
            <div class="col-3">
                <select class="form-control" id="filterKecamatan">
                  <option>-- Pilih Kecamatan --</option>
                  // Foreach sebelah sini
                </select>
              </div>

              <div class="col-3">
                <select class="form-control" id="filterKelurahan">

                </select>
              </div>
        </div> -->


        </div>
        <!-- /.card-header -->
        <!-- /.card-header -->
        <div class="card-body" id="contentList">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Pemilik</th>
                <th>Status</th>
                <th>Kategori</th>
                <th>Alamat</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              while ($data = mysqli_fetch_assoc($sqlDataKost)) {
                # code...
              ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $data['nama_pemilik'] ?></td>
                  <td>
                    <?php
                    if ($data['status_kost'] == "Tersedia") {
                      # code...
                      echo "<label class='text-success'>" . $data['status_kost'] . "</label>";
                    } elseif ($data['status_kost'] == "Penuh") {
                      # code...
                      echo "<label class='text-danger'>" . $data['status_kost'] . "</label>";
                    }
                    ?>
                  </td>
                  <td><?= $data['kategori_kost'] ?></td>
                  <td><?= $data['alamat_kost']; ?></td>
                  <td>
                    <a href="?pagea=detail-kost2&id=<?= $data['id_kost']; ?>"><button type="button" id="btn_detail" class="btn btn-sm btn-warning"><i class="fas fa-book"></i></button></a>

                    <a href="https://www.google.com/maps/place/<?= $data['alamat_kost'] ?>" target="_blank"><button type="button" id="btn_lokasi" class="btn btn-sm btn-primary"><i class="fas fa-map"></i></button></a>
                    <?php
                    $myMessage = "Hallo%20Nama%20Saya%20" . $_SESSION['nama_user'] . "%0A%0ASaya%20Ingin%20Memesan%20Kos%0A%0AApakah%20Masih%20Tersedia";
                    $number = ltrim($data['no_wa'], "+");
                    ?>
                    <a href="https://api.whatsapp.com/send/?phone=<?= $number ?>&text=<?= $myMessage ?>" target="_blank"><button type="button" id="btn_wa" class="btn btn-sm btn-success"><i class="fa fa-phone"></i></button></a>
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
                <th>Status</th>
                <th>Kategori</th>
                <th>Alamat</th>
                <th>Action</th>
              </tr>
            </tfoot>

          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script type="text/javascript">
  // Ajak Untuk Filter Berdasarkan Kecamatan
  $(document).ready(function() {
    $("#filterKecamatan").on('change', function() {
      /* Act on the event */
      var dataKec = $(this).val();
      //console.log(dataKec);

      $.ajax({
        url: "myAjax/dataKelurahan.php",
        type: "Post",
        data: {
          data: dataKec
        },
        success: function(data) {

          $('#filterKelurahan').html(data);
        }
      })
    });


    $('#filterKelurahan').on('change', function() {
      var dataKel = $(this).val();

      $('input[type=search]').val(dataKel);
      $('input[type=search]').focus();

      // $.ajax({
      //   url : "myAjax/filter.php",
      //   type : "post",
      //   data : {data:dataKel},
      //   success : function(data){
      //     console.log(data);
      //   }
      // })

    })
  });
</script>