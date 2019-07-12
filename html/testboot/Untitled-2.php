
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tambah Dosen</title>


</head>

<body>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <h1 align="center">Daftar !!!</h1>
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
      <td>Prodi</td>
      <td>:</td>
      <td><p>
        <label for="prodi"></label>
        <select name="prodi" id="prodi">
          <option value="D3-Teknik Telekomunikasi">D3-Teknik Telekomunikasi</option>
          <option value="D4-Teknik Telekomunikasi">D4-Teknik Telekomunikasi</option>
          <option value="D3-Teknik Listrik">D3-Teknik Listrik</option>
          <option value="D4-Teknik Listrik">D4-Teknik Listrik</option>
          <option value="D3-Teknik Elektro">D3-Teknik Elektro</option>
          <option value="D4-Teknik Elektro">D4-Teknik Elektro</option>
        </select>
        <br />
      </p></td>
    </tr>
    <tr>
      <td>Semester</td>
      <td>:</td>
      <td><label for="bulan"></label>
      <input name="semester" type="text" id="status" /></td>
    </tr>
    <tr>
      
    </tr>
    
    <tr>
      <td>Kelas</td>
      <td>:</td>
      <td><label for="kelas">
        <input name="kelas" type="text" id="kelas" />
      </label></td>
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
	$prodi=$_POST['prodi'];
	$semester=$_POST['semester'];
	$kelas=$_POST['kelas'];
	
	$simpan=mysql_query("insert into data_mhsw values ('$nim','$nama','$prodi','$semester','$kelas','$pass','mahasiswa')");
	
	if ($simpan)  {
		echo "<script> alert ('Pendaftaran Berhasil,Selamat Datang!');</script>";
	} else {
		echo "<script> alert ('Gagal'); </script>";
	}
}
?>
</p>


</body>
</html>
