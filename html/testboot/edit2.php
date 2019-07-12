
<?php
@session_start();
require"config.php";
$nim=$_SESSION['username'];
$pilih_data=mysql_query("select * from data_mhsw where nim='$nim'");
$isi=mysql_fetch_array($pilih_data);
$nim=$isi['nim'];
$nama=$isi['nama'];
$prodi=$isi['prodi'];
$sms=$isi['semester'];
$kelas=$isi['kelas'];
?>

<form action="?menu=edit2" method="post" enctype="multipart/form-data" name="form1">
  <div align="center">
    <table width="624" height="172" border="1">
      <tr>
        <td width="61">NIM</td>
        <td width="3">:</td>
        <td width="452"><?php echo $nim ;?><input type="hidden"></td>
      </tr>
      <tr>
        <td>Nama</td>
        <td>:</td>
        <td><?php echo $nama ;?></td>
      </tr>
      <tr>
        <td>prodi</td>
        <td>:</td>
        <td><label>
          <input name="prodi" id="prodi" value="<?php echo  $prodi ;?>">
        </label></td>
      </tr>
      <tr>
        <td>semester</td>
        <td>:</td>
        <td><input name="sms" type="text" id="sms" value="<?php echo $sms  ;?>"></td>
      </tr>
      <tr>
        <td>kelas</td>
        <td>:</td>
        <td><input name="kelas" type="text" id="kelas" value="<?php echo $kelas  ;?>" /></td>
      </tr>
    </table>
  </div>
  <p align="center">
    <label>
    <input type="submit" name="Submit" value="Submit" />
    </label>
  </p>
</form>
