<?php 
if (!empty ($_POST['sign'])) {
	$hari=$_POST['hari'];
	$prodi=$_POST['prodi3'];
	$kelas=$_POST['Kelas'];
	$dosen=$_POST['dosen'];
	$matkul=$_POST['Matkul'];
	$jam1=$_POST['jam1'];
	$jam2=$_POST['jam2'];
	$ruangan=$_POST['ruangan'];
require"config.php";
$ambil3=mysql_query("select * from data_jadwal where hari='$hari' and ruangan='$ruangan'");
  while ($data1 = mysql_fetch_array($ambil3)){
	$date1=$data1['jam1'];
	$date2=$data1['jam2'];
	
		echo $date1."~".$date2;
		echo $hari."-".$ruangan;
	}
}
	?>