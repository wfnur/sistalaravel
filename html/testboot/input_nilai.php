<?php 
require"config.php";
$nip=$_SESSION['username'];
$kod=$_GET['mk'];
$query=mysql_query("select * from data_pengajar where kode_dosen='$nip' and kode_matkul='$kod'")or die("Error: ". mysql_error());
$jumlah=mysql_num_rows($query);

if ($jumlah>0){
?>
<?php
require"config.php";
$nim=$_GET['nim'];
$prodi=$_GET['prodi'];
$pilih_data=mysql_query("select * from data_mhsw where nim='$nim'");
while ($isi=mysql_fetch_array($pilih_data)){;
$nim=$isi['nim'];
$nama=$isi['nama'];
$prodi=$isi['prodi'];
$sms=$isi['semester'];
$kelas=$isi['kelas'];

?>
<div class="page-header"><h3>Tambah Nilai Mahasiswa</h3></div>
<form action="?menu=prosesinputnilai&mk=<?PHP echo $kod ?>&prodi=<?php echo $prodi ?>" method="post" enctype="multipart/form-data" name="form1">
  <div align="center">
    <table width="624" height="172" border="0">
      <tr>
        <td width="61">NIM</td>
        <td width="3">:</td>
        <td width="452"><input name="nim" type="hidden" value="<?php echo $nim ;?>"><?php echo $nim ;?></td>
      </tr>
	  <tr><td>&nbsp;</td></tr>
	  <tr>
        <td width="61">Harian</td>
        <td width="3">:</td>
        <td width="452"><input name="harian" type="text"  value=""></td>
      </tr>
	  <tr><td>&nbsp;</td></tr>
      <tr>
        <td>UTS</td>
        <td>:</td>
        <td><input name="uts" type="text" id="uts" value="">        </td>
      </tr>
	  <tr><td>&nbsp;</td></tr>
      <tr>
        <td>UAS</td>
        <td>:</td>
        <td><label>
          <input name="uas" type="text" id="prodi" value="">
        
      </tr>
	  <tr><td>&nbsp;</td></tr>
    </table>
  </div>
  <p>&nbsp;</p>
  <p align="center">
    <label>
	
    <input class="btn btn-primary" type="submit" name="Submit" value="Submit" />
    </label>
  </p>
</form>
<?php
}
}

else { ?>
	
           <div class= "col-lg-4">
		  <div class="alert alert-danger"><h4>Anda tidak punya hak untuk mengakses halaman ini</h4></div></div><?php }?>