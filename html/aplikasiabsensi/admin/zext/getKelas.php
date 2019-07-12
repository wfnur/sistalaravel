<option>--Pilih Kelas--</option>
<?php
 
ini_set('display_errors',0);
require "connect.php";
 
//ambil parameter
$prodi_dipilih = $_POST['prodi_dipilih'];
 
if($prodi_dipilih == ''){
     exit;
}else{
     $sql = "
          SELECT
               kelas
          FROM
               prodi_kelas
          WHERE
               prodi = '$prodi_dipilih'
          
     ";
     $getKelas = mysql_query($sql) or die ('Query Gagal');
     
	 while($data = mysql_fetch_array($getKelas)){
		
          echo '<option value="'.$data['kelas'].'">'.$data['kelas'].'</option>';
     }
        
}
?>