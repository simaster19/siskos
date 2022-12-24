<!DOCTYPE html>
<!--
 @license
 Copyright 2019 Google LLC. All Rights Reserved.
 SPDX-License-Identifier: Apache-2.0
-->
<html>

<head>
  <title>Lihat Lokasi Kost</title>
  <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

  <style type="text/css">
    /* Set the size of the div element that contains the map */
    #map {
      height: 500px;
      /* The height is 400 pixels */
      width: 100%;
      /* The width is the width of the web page */
    }

    #allData {
      display: none;
    }
  </style>
  <link rel="stylesheet" href="dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="dist/css/font-awesome.min.css">
</head>

<body>
  <h4>
    <center>Lokasi Tempat Kost</center>
  </h4>
  <!--The div element for the map -->
  <?php
  //require "admin/function.php";
  $allData = allData();
  $allData = json_encode($allData);

  //print_r($allData);
  echo  "<div id='allData'>" . $allData . "</div>";


  //echo "<div id='dataById'>".$dataById."</div>";
  ?>
  <div class="container">
    <div id="map"></div>
  </div>


  <!-- 
     The `defer` attribute causes the callback to execute after the full HTML
     document has been parsed. For non-blocking uses, avoiding race conditions,
     and consistent behavior across browsers, consider loading using Promises
     with https://www.npmjs.com/package/@googlemaps/js-api-loader.
    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB6zwgH33N03KdnAj0dcFUV6wa-3FsrtH8&callback=initMap" defer></script>
  <script>
    // Initialize and add the map
    let map;
    let marker;
    let geocode;

    function initMap() {
      // The location of kendal

      let kendal = {
        lat: -6.9247481,
        lng: 110.1356907
      };
      let infoWindow = new google.maps.InfoWindow;
      let mapOptions = {
        zoom: 12,
        center: kendal,
        mapTypeId: google.maps.MapTypeId.ROADMAP
      };

      map = new google.maps.Map(document.getElementById('map'), mapOptions);


      let allData = JSON.parse(document.getElementById('allData').innerHTML);

      if (getUrlVars('id') == undefined) {
        tampilkanData(allData);
      } else {
        tampiDataID(allData);
      }

    }

    let statusKostInfo;

    function tampilkanData(allData) {
      let infoWindow = new google.maps.InfoWindow;


      for (let myData in allData) {
        lattitude = allData[myData].lattitude;
        longtitude = allData[myData].longtitude;
        nama_kost = allData[myData].nama_kost;
        alamat_kost = allData[myData].alamat_kost;
        kategori_kost = allData[myData].kategori_kost;
        nama_pemilik = allData[myData].nama_pemilik;

        gambar = allData[myData].gambar;
        gambarx = gambar.split(",");

        status_kost = allData[myData].status_kost;
        keterangan = allData[myData].keterangan;
        no_wa = allData[myData].no_wa;
        no_hp = allData[myData].no_hp;
        no_telegram = allData[myData].no_telegram;

        if (status_kost == "Penuh") {
          statusKostInfo = '<p class="text-danger">' + status_kost + '</p>';

        } else if (status_kost == "Tersedia") {
          statusKostInfo = '<p class="text-success">' + status_kost + '</p>';

        }

        let contentString =
          '<div id= "myPopup" class= "">' +
          '<table class="table table-hover">' +
          '<tr>' +
          '<td><center><img src=admin/gambar/' + gambarx[0] + ' width = 150px ></center></td>' +
          '<td><center><img src=admin/gambar/' + gambarx[1] + ' width = 150px ></center></td>' +
          '<td><center><img src=admin/gambar/' + gambarx[2] + ' width = 150px ></center></td>' +
          '</tr>' +
          '</table>' +
          '<table class="table table-hover text-nowrap">' +
          '<tr>' +
          '<td> Nama Kost :</td>' +
          '<td>' + nama_kost + '</td>' +
          '</tr>' +
          '<tr>' +
          '<td> Nama Pemilik Kost : </td>' +
          '<td>' + nama_pemilik + '</td>' +
          '</tr>' +
          '<tr>' +
          '<td> Status Kost : </td>' +
          '<td>' + statusKostInfo + '</td>' +
          '</tr>' +
          '<tr>' +
          '<td> Kategori : </td>' +
          '<td>' + kategori_kost + '</td>' +
          '</tr>' +
          '<tr>' +
          '<td> Alamat : </td>' +
          '<td>' + alamat_kost + '</td>' +
          '</tr>' +
          '<tr>' +
          '<td> Whatsapps : </td>' +
          '<td>' + no_wa + '</td>' +
          '</tr>' +
          '<tr>' +
          '<td> Telegram : </td>' +
          '<td>' + no_telegram + '</td>' +
          '</tr>' +
          '<tr>' +
          '<td> No Handphone : </td>' +
          '<td>' + no_hp + '</td>' +
          '</tr>' +
          '</table>' +
          '</div>';



        //console.log(name);
        marker = new google.maps.Marker({
          position: new google.maps.LatLng(lattitude, longtitude),
          name: nama_kost,
          map: map,
        });

        google.maps.event.addListener(marker, 'click', function(e) {
          infoWindow.setContent(contentString);
          infoWindow.open(map, this);
        }.bind(marker));
      }


    }


    function getUrlVars(param = null) {
      if (param !== null) {
        var vars = [],
          hash;
        var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
        for (var i = 0; i < hashes.length; i++) {
          hash = hashes[i].split('=');
          vars.push(hash[0]);
          vars[hash[0]] = hash[1];
        }
        return vars[param];
      } else {
        return null;
      }
    }


    function tampiDataID(allData) {
      let infoWindow = new google.maps.InfoWindow;

      let idUrl = getUrlVars('id');

      for (myDataId in allData) {
        idKos = allData[myDataId].id_kost;
        lattitude = allData[myDataId].lattitude;
        longtitude = allData[myDataId].longtitude;
        nama_kost = allData[myDataId].nama_kost;
        alamat_kost = allData[myDataId].alamat_kost;
        kategori_kost = allData[myDataId].kategori_kost;
        nama_pemilik = allData[myDataId].nama_pemilik;

        gambar = allData[myDataId].gambar;
        gambarx = gambar.split(",");

        status_kost = allData[myDataId].status_kost;
        keterangan = allData[myDataId].keterangan;
        no_wa = allData[myDataId].no_wa;
        no_hp = allData[myDataId].no_hp;
        no_telegram = allData[myDataId].no_telegram;

        if (status_kost == "Penuh") {
          statusKostInfo = '<p class="text-danger">' + status_kost + '</p>';

        } else if (status_kost == "Tersedia") {
          statusKostInfo = '<p class="text-success">' + status_kost + '</p>';

        }

        if (idUrl == idKos) {
          let contentString =
            '<div id= "myPopup">' +
            '<table class="table table-hover">' +
            '<tr>' +
            '<td><center><img src=admin/gambar/' + gambarx[0] + ' width = 150px ></center></td>' +
            '<td><center><img src=admin/gambar/' + gambarx[1] + ' width = 150px ></center></td>' +
            '<td><center><img src=admin/gambar/' + gambarx[2] + ' width = 150px ></center></td>' +
            '</tr>' +
            '</table>' +
            '<table class="table table-hover text-nowrap">' +
            '<tr>' +
            '<td> Nama Kost :</td>' +
            '<td>' + nama_kost + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td> Nama Pemilik Kost : </td>' +
            '<td>' + nama_pemilik + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td> Status Kost : </td>' +
            '<td>' + statusKostInfo + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td> Kategori : </td>' +
            '<td>' + kategori_kost + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td> Alamat : </td>' +
            '<td>' + alamat_kost + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td> Whatsapps : </td>' +
            '<td>' + no_wa + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td> Telegram : </td>' +
            '<td>' + no_telegram + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td> No Handphone : </td>' +
            '<td>' + no_hp + '</td>' +
            '</tr>' +
            '</table>' +
            '</div>';




          //console.log(name);
          marker = new google.maps.Marker({
            position: new google.maps.LatLng(lattitude, longtitude),
            name: nama_kost,
            map: map,
          });

          google.maps.event.addListener(marker, 'click', function(e) {
            infoWindow.setContent(contentString);
            infoWindow.open(map, this);
          }.bind(marker));
        }
      }
    }






    //window.initMap = initMap;
  </script>

</body>

</html>