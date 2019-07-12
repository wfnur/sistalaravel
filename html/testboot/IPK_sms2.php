<?php

require"config.php";


//Semester 1
$jumlah=0;
$jumlah2=0;
$jum=0;	

$nim=$_SESSION['username'];
$ambildata3=mysql_query("SELECT * FROM `data_mhsw` where nim='$nim'");
  while ($isi2=mysql_fetch_array($ambildata3)){
	  $prodi=$isi2['prodi'];
	

$ambilsms1=mysql_query("SELECT * FROM `data_matkul` INNER JOIN data_nilai ON data_matkul.kode_matkul=data_nilai.kode_matkul2 where data_nilai.nim2='$nim' and data_matkul.semester='1'")or die(mysql_error());

  while ($isi1=mysql_fetch_array($ambilsms1)){
$sks=$isi1['sks'];
$index1=$isi1['indeks2'];
$jumlah2=$jumlah2+$sks;
$jum=$jum+($index1*$sks);
  }
  }
$IP1=number_format(($jum/$jumlah2),2);
//Semester 2
$jumlah=0;
$jumlah2=0;
$jum=0;	

$nim=$_SESSION['username'];
$ambildata3=mysql_query("SELECT * FROM `data_mhsw` where nim='$nim'");
  while ($isi2=mysql_fetch_array($ambildata3)){
	  $prodi=$isi2['prodi'];
	

$ambilsms2=mysql_query("SELECT * FROM `data_matkul` INNER JOIN data_nilai ON data_matkul.kode_matkul=data_nilai.kode_matkul2 where data_nilai.nim2='$nim' and data_matkul.semester='2'")or die(mysql_error());

  while ($isi2=mysql_fetch_array($ambilsms2)){
$sks=$isi2['sks'];
$index1=$isi2['indeks2'];
$jumlah2=$jumlah2+$sks;
$jum=$jum+($index1*$sks);
  }
  }
  $IP2=number_format(($jum/$jumlah2),2);
  $IPK=($IP1+$IP2)/2;
?>