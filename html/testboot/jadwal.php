<html>
<?php 
if (isset($_SESSION['username']) and ($_SESSION['status']=='admin')){?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Jadwal Pelajaran</title>

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

<body>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <h1 align="center">Jadwal Pelajaran</h1>
  <p>&nbsp;</p>
  <div class=row>
  <div class="col-lg-6 col-lg-offset-3" >
  <table class="table table-bordered table-hover table-striped" width="662" border="0" align="center" cellpadding="0" cellspacing="0">
 
    <tr>
      <td >Hari</td>
      <td width="8">:</td>
      <td width="489"><label for="NIM"></label>
        <select name="hari" id="hari">
          <option value="Senin">Senin</option>
          <option value="Selasa">Selasa</option>
          <option value="Rabu">Rabu</option>
          <option value="Kamis">Kamis</option>
          <option value="Jum'at">Jum'at</option>
      </select></td>
    </tr>
	
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
	
    <tr>
      <td>Kelas</td>
      <td>:</td>
      <td><select name="Kelas" id="Kelas" width="300">
<option value="">--Pilih Kelas--</option>
</select></td>
    </tr>
	
    <tr>
      <td>Dosen</td>
      <td>:</td>
      <td><p>
        <select name="dosen" id="dosen">
		<option>----Pilih Dosen-----</option>
		<?php
		require"config.php";
		 $sql23 = "
          SELECT
               *
          FROM
               data_dosen
     ";
     $getKelas = mysql_query($sql23) or die ('Query Gagal');
     while($data = mysql_fetch_array($getKelas)){
          echo '<option value="'.$data['nama'].'">'.$data['nama'].'</option>';
     }
      
	 ?>
        </select>
        
      </p></td>
    </tr>
	
    <tr>
      <td>Matkul</td>
      <td>:</td>
      <td>
        <select name="Matkul" id="Matkul" width="300">
          <option value="">--Pilih Matkul--</option>
        </select>
        
	</td>
    <tr>
      <td>Waktu</td>
      <td>:</td>
      <td>
        <select name="jam1" id="jam2" width="300">
          <option value="07:00:00">07:00:00</option>
          <option value="07:50:00">07:50:00</option>
          <option value="08:40:00">08:40:00</option>
          <option value="09:50:00">09:50:00</option>
          <option value="10:40:00">10:40:00</option>
          <option value="11:30:00">11:30:00</option>
          <option value="13:00:00">13:00:00</option>
          <option value="13:50:00">13:50:00</option>
          <option value="14:40:00">14:40:00</option>
          <option value="15:50:00">15:50:00</option>
          <option value="16:40:00">16:40:00</option>
          <option value="17:30:00">17:30:00</option>
        </select>
        ~
            <select name="jam2" id="jam2" width="300">
          <option value="07:50:00">07:50:00</option>
          <option value="08:40:00">08:40:00</option>
          <option value="09:30:00">09:30:00</option>
          <option value="10:40:00">10:40:00</option>
          <option value="11:30:00">11:30:00</option>
          <option value="12:20:00">12:20:00</option>
          <option value="13:50:00">13:50:00</option>
          <option value="14:40:00">14:40:00</option>
          <option value="15:30:00">15:30:00</option>
          <option value="16:40:00">16:40:00</option>
          <option value="18:20:00">18:20:00</option>
        </select>
	</td>
    
    </tr>
    <tr>
      <td>Ruangan</td>
      <td>:</td>
      <td>
        <input type="text" name="ruangan" id="ruangan">
        
        
	  </td>
    <tr>
    <tr>
      <td colspan="3" align="center"><input class="btn btn-primary" type="submit" name="sign" id="sign" value="Daftar" />
        <label>
        <input class="btn btn-danger" name="batal" type="submit" id="batal" value="batal" />
      </label></td>
    </tr>
  </table>
  </div>
</div>
</form>
<p>
  <?php
 if(!isset($_POST['sign'])) exit();
 $value= array('sign','hari','prodi3','Kelas','dosen','Matkul','jam1','jam2','ruangan');
 
 $error= false;
 foreach($value as $post){
	 if(empty($_POST[$post])){
		 $error = true;
	 }
 }
 if ($error){
	 echo "<script> alert ('Semua form harus diisi'); </script>";
 }
 else {

require "proses_jadwal.php";
 }
 
?>
</p>


</body>
<?php  } else { ?>
	
		  <div class="alert alert-danger">Anda tidak memiliki hak untuk mengakses halaman ini!</div>
	<?php	  
	  }
	  ?>
</html>

