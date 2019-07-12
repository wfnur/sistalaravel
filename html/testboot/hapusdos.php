<?php
require 'config.php';
$nip=$_GET['nim'];
$hapus=mysql_query("delete from data_dosen where kode_dosen='$nip'");
if($hapus)
	{
		echo "<script> alert ('terhapus'); document.location.href='index.php?' </script>";
	}
	else
	{
		echo "<script> alert ('Gagal'); document.location.href='index.php?' </script>";
	}
?>