<?php
 
ini_set('display_errors',0);
require_once "config.php";
 
//ambil parameter
$prodi = $_POST['prodi'];
$kelas= $_POST['kelas'];

     $sql = "
          SELECT
               *
          FROM
               data_matkul 
		
          WHERE
               data_matkul.prodi = '$prodi' and semester='$kelas'
          
     ";
     $getKelas = mysql_query($sql) or die ('Query Gagal');
     while($data = mysql_fetch_array($getKelas)){
          echo '<option value="'.$data['kode_matkul'].'">'.$data['nama_matkul'].'</option>';
     }
      

?>