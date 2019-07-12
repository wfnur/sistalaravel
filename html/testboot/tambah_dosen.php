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
  <table width="662" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td width="165">Kode Dosen</td>
      <td width="8">:</td>
      <td width="489"><label for="NIM"></label>
        <input type="text" name="nim" id="nim" PlaceHolder="Username"/></td>
    </tr>
    <tr>
      <td>password</td>
      <td width="8">:</td>
      <td width="489"><input name="pass" type="password" id="pass" PlaceHolder="Password" maxlength="16"/></td>
    </tr>
    <tr>
      <td>Nama</td>
      <td>:</td>
      <td><label>
        <input name="nama" type="text" id="nama" />
      </label>        <label for="nama"></label></td>
    </tr>
    
    <tr>
      <td colspan="3" align="center"><input type="submit" name="sign" id="sign" value="Daftar" />
        <label>
        <input name="batal" type="submit" id="batal" value="batal" />
      </label></td>
    </tr>
  </table>

</form>
<p>
  <?php
include "config.php";
if (!empty ($_POST['sign'])) {
	$nim=$_POST['nim'];
	$pass=md5($_POST['pass']);
	$nama=$_POST['nama'];
	
	
	$simpan=mysql_query("insert into data_dosen values ('$nim','$nama','$pass','dosen')");
	
	if ($simpan)  {
		echo "<script> alert ('Penambahan Berhasil,Selamat Datang!');</script>";
	} else {
		echo "<script> alert ('Gagal'); </script>";
	}
}
?>
</p>


</body>
</html>
	   <?php } else {?> <div class="alert alert-danger">Hanya<b> Admin </b>yang dapat mengakses halaman ini!</div><?php } ?>