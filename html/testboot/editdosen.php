<?php 

	  @session_start();
	  
	   if ((isset($_SESSION['username'])) and ($_SESSION['status']=='admin'))   { ?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tambah Dosen</title>


</head>
<?php require"config.php";
$nip=$_GET['nip'];
$ambildata=mysql_query("SELECT * FROM data_dosen where kode_dosen='$nip'");

  while ($isi=mysql_fetch_array($ambildata)){
  $nip=$isi['kode_dosen'];
$nama=$isi['nama']; ?>
<body>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <h1 align="center">Edit Dosen</h1>
  <table width="662" border="0" align="center" >
    <tr>
      <td width="165">Kode Dosen</td>
      <td width="8">:</td>
      <td width="489"><label for="NIM"></label>
        <input type="text" value="<?php echo $nip ?>" name="nim" id="nim" PlaceHolder="Username" /></td>
    </tr>
    <tr>
      <td>password</td>
      <td width="8">:</td>
      <td width="489"><input  name="pass" type="password" id="pass" PlaceHolder="Password" maxlength="16"/></td>
    </tr>
    <tr>
      <td>Nama</td>
      <td>:</td>
      <td><label>
        <input value="<?php echo $nama ?>" name="nama" type="text" id="nama" />
      </label>        <label for="nama"></label></td>
    </tr>
    
    <tr>
      <td colspan="3" align="center"><input type="submit" name="sign" id="sign" value="Submit" />
        <label>
        <input name="batal" type="submit" id="batal" value="batal" />
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
	
	
	$simpan=mysql_query("update data_dosen set kode_dosen='$nim',nama='$nama',pass='$pass' where kode_dosen='$nim'");
	
	if ($simpan)  {
		echo "<script> alert ('Perubahan Berhasil');</script>";
	} else {
		echo "<script> alert ('Gagal'); </script>";
	}
}
  }
	   }
	   }
	   
?>
</p>

 <?php  if((isset($_SESSION['username'])) and (($_SESSION['status']=='dosen') or ($_SESSION['status']=='mahasiswa'))) {?> <div class="alert alert-danger">Hanya<b> Admin </b>yang dapat mengakses halaman ini!</div><?php } ?>
</body>
</html>
	  