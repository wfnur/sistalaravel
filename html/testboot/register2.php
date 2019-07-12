<?php 

	  @session_start();
	  
	   if ((isset($_SESSION['username'])) and ($_SESSION['status']=='admin'))   { ?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tambah Dosen</title>


</head>

<body>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <h1 align="center">Tambah Dosen</h1>
  <p>&nbsp;</p>
  <table class="table table-bordered table-hover table-striped" width="662" border="0" align="center" cellpadding="0" cellspacing="0">
 
    <tr>
      <td >NIP</td>
      <td width="8">:</td>
      
      <td width="489">
        <input type="text" name="nim" id="nim" PlaceHolder="NIP"></td>
    </tr>
	
    <tr>
      <td>password</td>
      <td width="8">:</td>
      <td width="489"><input type="password" name="pass" id="pass" PlaceHolder="Password"/></td>
    </tr>
	
    <tr>
      <td>Nama</td>
      <td>:</td>
      <td><label>
        <input name="nama" type="text" id="nama" />
      </label>        <label for="nama"></label></td>
    </tr>
	
    
    
    <tr>
      <td colspan="3" align="center"><input class="btn btn-primary" type="submit" name="sign" id="sign" value="Daftar" />
        <label>
        <input class="btn btn-danger" name="batal" type="submit" id="batal" value="batal" />
      </label></td>
    </tr>
  </table>

</form>
<p>
  <?php
 if(!isset($_POST['sign'])) exit();
 $value= array('sign','nim','pass','nama');
 
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
	$nim=$_POST['nim'];
	$pass=md5($_POST['pass']);
	$nama=$_POST['nama'];
	
	
	$simpan=mysql_query("insert into data_dosen values ('$nim','$nama','dosen','$pass')");
	
	if ($simpan)  {
		echo "<script> alert ('Pendaftaran Berhasil');</script>";
	} else {
		echo "<script> alert ('Gagal'); </script>";
	}
}
 }
?>
</p>

<?php } else {?> <div class="alert alert-danger">Hanya<b> Admin </b>yang dapat mengakses halaman ini!</div><?php } ?>
</body>
</html>
 