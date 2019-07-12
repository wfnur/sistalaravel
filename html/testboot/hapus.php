<?php
require 'config.php';
$nim=$_GET['nim'];
$hapus=mysql_query("delete from data_mhsw where nim='$nim'");
if($hapus)
	{
		echo "<script> alert ('terhapus'); document.location.href='index.php?' </script>";
	}
	else
	{
		echo "<script> alert ('Gagal'); document.location.href='index.php?' </script>";
	}
?>