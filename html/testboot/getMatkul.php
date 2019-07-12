<?php
 
ini_set('display_errors',0);
require_once "config.php";
 
//ambil parameter
$prodi = $_POST['prodi'];
$kelas = $_POST['kelas'];

     $sql = "
          SELECT
               *
          FROM
               data_matkul 
		  INNER JOIN
		  		data_pengajar
		  ON
		  		data_matkul.kode_matkul=data_pengajar.kode_matkul
          WHERE
               data_matkul.prodi = '$prodi' and data_pengajar.kelas='$kelas'
          
     ";
     $getKelas = mysql_query($sql) or die ('Query Gagal');
     while($data = mysql_fetch_array($getKelas)){
          echo '<option value="'.$data['nama_matkul'].'">'.$data['nama_matkul'].'</option>';
     }
      

?>