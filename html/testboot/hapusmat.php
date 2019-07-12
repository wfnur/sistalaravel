<?php
require 'config.php';
$kod=$_GET['kod'];
$kod1=$_GET['kod1'];
$kod2=$_GET['kod2'];
$hapus=mysql_query("delete from data_matkul where kode_matkul='$kod' and prodi='$kod1' and semester='$kod2'");
if($hapus)
	{
		echo "<script> alert ('terhapus'); document.location.href='index.php?menu=outmatkul' </script>";
	}
	else
	{
		echo "<script> alert ('Gagal'); document.location.href='index.php?' </script>";
	}
?>