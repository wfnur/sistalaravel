<?php
require 'config.php';
$kelas=$_GET['kelas'];
$jam1=$_GET['jam1'];
$jam2=$_GET['jam2'];
$ruangan=$_GET['ruangan'];
$hari=$_GET['hari'];
	
$hapus=mysql_query("delete from data_jadwal where hari='$hari' and jam1='$jam1' and jam2='$jam2' and ruangan='$ruangan' and kelas='$kelas'");
if($hapus)
	{
		echo "<script> alert ('terhapus'); document.location.href='index.php?' </script>";
	}
	else
	{
		echo "<script> alert ('Gagal'); document.location.href='index.php?' </script>";
	}
?>