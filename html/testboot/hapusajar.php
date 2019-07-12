<?php
require 'config.php';
$kod=$_GET['kod'];
$kod1=$_GET['kod1'];
$kod2=$_GET['kod2'];
$hapus=mysql_query("delete from data_pengajar where kode_matkul='$kod' and kode_dosen='$kod1' and kelas='$kod2'");
if($hapus)
	{
		echo "<script> alert ('terhapus'); document.location.href='index.php?menu=datngajar' </script>";
	}
	else
	{
		echo "<script> alert ('Gagal'); document.location.href='index.php?menu=datngajar' </script>";
	}
?>