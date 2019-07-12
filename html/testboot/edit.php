<h1 class="page-header">
                    Data Mahasiswa
                    </h1><h3>Edit Data Mahasiswa</h3>
<?php
require"config.php";
$nim=$_GET['nim'];
$pilih_data=mysql_query("select * from data_mhsw where nim='$nim'");
$isi=mysql_fetch_array($pilih_data);
$nim=$isi['nim'];
$nama=$isi['nama'];
$prodi=$isi['prodi'];
$sms=$isi['semester'];
$kelas=$isi['kelas'];

?>

<form action="proses_edit_mhsw.php" method="post" enctype="multipart/form-data" name="form1">
  <div align="center">
    <table width="624" height="172" border="0">
      <tr>
        <td width="61">NIM</td>
        <td width="3">:</td>
        <td width="452"><input name="nim" type="text" id="nim" value="<?php echo $nim ;?>"></td>
      </tr>
	  <tr><td>&nbsp;</td></tr>
	  <tr>
        <td width="61">Password</td>
        <td width="3">:</td>
        <td width="452"><input name="pass" type="password" id="pass" value=""></td>
      </tr>
	  <tr><td>&nbsp;</td></tr>
      <tr>
        <td>Nama</td>
        <td>:</td>
        <td><input name="nama" type="text" id="nama" value="<?php echo $nama ;?>">        </td>
      </tr>
	  <tr><td>&nbsp;</td></tr>
      <tr>
        <td>prodi</td>
        <td>:</td>
        <td><label>
          <input name="prodi" id="prodi" value="<?php echo  $prodi ;?>">
        </label></td>
      </tr>
	  <tr><td>&nbsp;</td></tr>
      <tr>
        <td>semester</td>
        <td>:</td>
        <td><input name="sms" type="text" id="sms" value="<?php echo $sms  ;?>"></td>
      </tr>
	  <tr><td>&nbsp;</td></tr>
      <tr>
        <td>kelas</td>
        <td>:</td>
        <td><input name="kelas" type="text" id="kelas" value="<?php echo $kelas  ;?>" /></td>
      </tr>
    </table>
  </div>
  <p>&nbsp;</p>
  <p align="center">
    <label>
	
    <input class="btn btn-primary" type="submit" name="sign" value="sign" />
    </label>
  </p>
</form>
