<?php 

	  @session_start();
	  
	   if ((isset($_SESSION['username'])) and ($_SESSION['status']=='admin'))   { ?>
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
             url: "getMatkulCode.php",
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
  <h1 align="center">Dosen Pengajar</h1>
  <p>&nbsp;</p>
  <div class=row>
  <div class="col-lg-6 col-lg-offset-3" >
  <table class="table table-bordered table-hover table-striped" width="662" border="0" align="center" cellpadding="0" cellspacing="0">
 
    
	
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
          echo '<option value="'.$data['kode_dosen'].'">'.$data['nama'].'</option>';
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
 $value= array('sign','prodi3','Kelas','dosen','Matkul');
 
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

include "config.php";
if (!empty ($_POST['sign'])) {
	$prodi=$_POST['prodi3'];
	$kelas=$_POST['Kelas'];
	$dosen=$_POST['dosen'];
	$matkul=$_POST['Matkul'];
	
	$simpan=mysql_query("insert into data_pengajar values ('$matkul','$dosen','$kelas','$prodi')");
	
	if ($simpan)  {
		echo "<script> alert ('Pendaftaran Berhasil');</script>";
	} else {
		echo "<script> alert ('Gagal'); </script>";
	}
}
 }
 
?>
</p>


</body>
<?php } else { ?>
	
		  <div class="alert alert-danger">Anda tidak memiliki hak untuk mengakses halaman ini!</div>
	<?php	  
	  }
	  ?>
</html>
