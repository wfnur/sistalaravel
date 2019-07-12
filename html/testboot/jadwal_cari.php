<?php 

	  @session_start();
	  
	   if ((isset($_SESSION['username'])) and ($_SESSION['status']=='admin'))   { ?>
<html>
<head>	
<script type="text/javascript" src="js/jquery.min.js"></script>
 
<!-- Script Ajax untuk Mengontrol Dropdown List Bertingkat -->
<script type="text/javascript">
$(function() {
     $("#prodi3").change(function(){
          $("img#imgLoad").show();
          var prodi3 = $(this).val();
 		  
          $.ajax({
             type: "POST",
             dataType: "html",
             url: "getKelas.php",
             data: "prodi3="+prodi3,
             success: function(msg){
                 if(msg == ''){
                         $("select#Kelas").html('<option value="">--Pilih Kelas--</option>');
                         $("select#Matkul").html('<option value="">--Pilih Matkul--</option>');
                 }else{
                           $("select#Kelas").html(msg);                                                       
                 }
                 $("img#imgLoad").hide();
 
                 getAjaxAlamat();                                                        
             }
          });                    
     });
 
     $("#Kelas").change(getAjaxAlamat);
     function getAjaxAlamat(){
          $("img#imgLoadMerk").show();
          var prodi = $("#prodi3").val();
 		  var kelas = $(this).val();
          $.ajax({
             type: "POST",
             dataType: "html",
             url: "getMatkul.php",
             data: "kelas="+kelas+"&prodi="+prodi,
             success: function(msg){
                 
                           $("select#Matkul").html(msg);                              
                 
                 $("img#imgLoadMerk").hide();                                                        
             }
          });
     }    
});
</script>
</head>
<h1 class="page-header">
                    Jadwal Matakuliah
                    </h1>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" name="form1" id="form1">
<td>Hari:</td>
<select name="hari" id="hari">
          <option value="Senin">Senin</option>
          <option value="Selasa">Selasa</option>
          <option value="Rabu">Rabu</option>
          <option value="Kamis">Kamis</option>
          <option value="Jumat">Jum'at</option>
      </select>
<tr>
      <td>Prodi</td>
      <td width="8">:</td>
      <td width="489"><select name="prodi3" id="prodi3">
      	<option>--Pilih Prodi--</option>
        <option value="D3-Teknik Telekomunikasi">D3-Teknik Telekomunikasi</option>
        <option value="D4-Teknik Telekomunikasi">D4-Teknik Telekomunikasi</option>
        <option value="D3-Teknik Listrik">D3-Teknik Listrik</option>
        <option value="D4-Teknik Otomasi Industri">D4-Teknik Otomasi Industri</option>
        <option value="D3-Teknik Elektro">D3-Teknik Elektro</option>
        <option value="D4-Teknik Elektro">D4-Teknik Elektro</option>
      </select></td>
    </tr>
	<td>Kelas:</td>
<td><select name="Kelas" id="Kelas" width="300">
<option value="">--Pilih Kelas--</option>
</select></td>
    </tr>	  
	<input class="btn btn-primary" type="submit" name="sign" id="sign" value="submit" />
	  
<div class="table-responsive">
 <table class="table table-bordered table-hover table-striped">
  <tbody>
    <tr>
    <th>Hari</th>
      <th>Jam</th>
      <th>Dosen</th>
      <th>Matkul</th>
      <th>Ruangan</th>
      <th>Kelas</th>
	  <th>Menu</th>
      </tr>
<?php

  if (isset($_POST['sign'])) {
   $search = $_POST['hari'];
   $kelas = $_POST['Kelas'];
	$prodi=$_POST['prodi3'];
   require "config.php";
   $senin = mysql_query("select hari,dosen,kelas,jam1,jam2,ruangan,pelajaran from (Select * from data_jadwal where hari='$search' and kelas='$kelas' and prodi='$prodi' ORDER by hari DESC)as sub Order by kelas DESC,jam1 ASC");
   $jum=mysql_num_rows($senin);
   if ($jum == 0) {
    echo '<p></p><p>Pencarian tidak ditemukan</p>';
	exit;
	
   } else {

			require "kelas_3A.php";



   }
  }
?>
</tbody>
</table>
</form>
</div>

		

</html>
<?php  } else { ?>
	
		  <div class="alert alert-danger">Anda tidak memiliki hak untuk mengakses halaman ini!</div>
	<?php	  
	  }
	  ?>