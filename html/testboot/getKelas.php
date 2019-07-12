<option>--Pilih Kelas--</option>
<?php
 
ini_set('display_errors',0);
require "config.php";
 
//ambil parameter
$prodi = $_POST['prodi3'];
 
if($prodi == ''){
     exit;
}else{
     $sql = "
          SELECT
               kelas
          FROM
               data_prodik
          WHERE
               prodi = '$prodi'
          
     ";
     $getKelas = mysql_query($sql) or die ('Query Gagal');
     
	 while($data = mysql_fetch_array($getKelas)){
		
          echo '<option value="'.$data['kelas'].'">'.$data['kelas'].'</option>';
     }
        
}
?>