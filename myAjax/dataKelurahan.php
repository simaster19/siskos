<?php 









$id_kecamatan = $_POST['data'];
//var_dump($id_kecamatan);


$curl = curl_init(); 
  curl_setopt_array($curl, array( 
    CURLOPT_URL => 'https://api.binderbyte.com/wilayah/kelurahan?api_key=28b300e0e49c48f6af30b41220c33e6059396f426636bf7f02f6519c9eaabc37&id_provinsi=33&id_kabupaten=3324&id_kecamatan='.$id_kecamatan, 
    CURLOPT_RETURNTRANSFER => true, 
    CURLOPT_ENCODING => '', 
    CURLOPT_MAXREDIRS => 10, 
    CURLOPT_TIMEOUT => 0, 
    CURLOPT_FOLLOWLOCATION => true, 
    CURLOPT_HTTP_VERSION => 
    CURL_HTTP_VERSION_1_1, 
    CURLOPT_CUSTOMREQUEST => 'GET', )); 
$response = curl_exec($curl); 
$json = json_decode($response);
$value = $json->value;

//var_dump($value);
echo "<option>-- Pilih Kelurahan --</option>";

foreach($value as $dataKelurahan){
        $dataKelurahan->name;
        echo '<option value="'.$dataKelurahan->name.'">'.$dataKelurahan->name.'</option>';
}