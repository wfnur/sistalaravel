<?php
@session_start();
 if(!isset($_POST['sign'])) exit();
 $value= array('sign','pass');
 
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
	$nim=$_SESSION['username'];
	$pass=md5($_POST['pass']);
	
	
	$simpan=mysql_query("UPDATE data_mhsw SET password='$pass' WHERE nim='$nim'");
	
	if ($simpan)  {
		echo "<script> alert ('Password Berhasil dirubah');document.location.href='index.php?';</script>";
		exit;
		
	} else {
		echo "<script> alert ('Gagal');document.location.href='index.php?'; </script>";
	}
}
 }
?>
