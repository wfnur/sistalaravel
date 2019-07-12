<?php
 if(!isset($_POST['sign'])) exit();
 $value= array('sign','nim','pass','nama','prodi','kelas','sms');
 
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
	$prodi=$_POST['prodi'];
	$semester=$_POST['sms'];
	$kelas=$_POST['kelas'];
	
	$simpan=mysql_query("UPDATE data_mhsw SET nim='$nim',nama='$nama',prodi='$prodi',semester='$semester',kelas='$kelas',password='$pass' WHERE nim='$nim'");
	
	if ($simpan)  {
		echo "<script> alert ('Perubahan Berhasil');document.location.href='index.php?';</script>";
	} else {
		echo "<script> alert ('Gagal'); </script>";
	}
}
 }
?>
