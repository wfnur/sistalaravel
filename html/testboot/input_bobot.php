<?php 
require"config.php";
$nip=$_SESSION['username'];
$kod=$_GET['mk'];
$query=mysql_query("select * from data_pengajar where kode_dosen='$nip' and kode_matkul='$kod'")or die("Error: ". mysql_error());
$row=mysql_num_rows($query);
if($row>0){
?>


<form action="" method="post" enctype="multipart/form-data" name="form1">
  <div align="center">
    <table width="624" height="172" border="0">
      <tr>
        <td width="61">Kode Matkul</td>
        <td width="3">:</td>
        <td width="452"><input name="nim" type="hidden" value="<?php echo $kod ;?>"><?php echo $kod ;?></td>
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
	
    <input class="btn btn-primary" type="submit" name="sign" value="Submit" />
    </label>
  </p>
</form>
<?php 

 if(!isset($_POST['sign'])) exit();
 $value= array('sign','nim','harian','uts','uas');
 
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
	
	
	$harian=$_POST['harian'];
	$uts=$_POST['uts'];
	$uas=$_POST['uas'];
	$total=$harian+$uts+$uas;
	
	if($total==100){
	$simpan=mysql_query("insert into data_bobot values ('$kod','$nip','$harian','$uts','$uas')");
	if ($simpan)  {
		echo "<script> alert ('Bobot Nilai Berhasil Disimpan');</script>";
	} else {
		echo "<script> alert ('Gagal'); </script>";
	}
	}
	elseif ($total<100 or $total>100) {
		echo"<script>alert('Total bobot nilai harus 100!')</script>";
	}
	
}


}
}
else {?> <div class="alert alert-danger">anda tidak memiliki akses halaman ini!</div><?php } ?>
