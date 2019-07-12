<?php include "config.php";
if (!empty ($_POST['sign'])) {
	$hari=$_POST['hari'];
	$prodi=$_POST['prodi3'];
	$kelas=$_POST['Kelas'];
	$dosen=$_POST['dosen'];
	$matkul=$_POST['Matkul'];
	$jam1=$_POST['jam1'];
	$jam2=$_POST['jam2'];
	$ruangan=$_POST['ruangan'];
	
//Cek Jam Kelas diantara jam1 dan jam2	
	$ambil4=mysql_query("select * from data_jadwal where hari='$hari' and kelas='$kelas'");
  while ($data2 = mysql_fetch_array($ambil4)){
	$date3=$data2['jam1'];
	$date4=$data2['jam2'];
	
	if($date3<=$jam1 and $jam1<=$date4){
	echo "<script> alert ('di jam tersebut Kelas sudah memiliki jadwal, silahkan ulangi'); </script>";
		exit;
		}
	} 
//Cek Jam Dosen diantara jam1 dan jam2	
	$ambil5=mysql_query("select * from data_jadwal where hari='$hari' and dosen='$dosen'");
  while ($data3 = mysql_fetch_array($ambil4)){
	$date5=$data3['jam1'];
	$date6=$data3['jam2'];
	
	if($date3<=$jam1 and $jam1<=$date4){
	echo "<script> alert ('di jam tersebut dosen sudah memiliki jadwal, silahkan ulangi'); </script>";
		exit;
		}
	} 
//Cek Jam Ruangan diantara jam1 dan jam2	
	$ambil3=mysql_query("select * from data_jadwal where hari='$hari' and ruangan='$ruangan'");
  while ($data1 = mysql_fetch_array($ambil3)){
	$date1=$data1['jam1'];
	$date2=$data1['jam2'];
	
	if($date1<=$jam1 and $jam1<=$date2){
	echo "<script> alert ('Ruangan sudah dipakai, silahkan ulangi'); </script>";
		exit;
		}
	} 
//Cek Ruangan di Jam1	
	$ambil=mysql_query("select * from data_jadwal where hari='$hari'and jam1='$jam1' and ruangan='$ruangan'");
	$jumlah=mysql_num_rows($ambil);
	 
if ($jumlah ==0) {
	

//cek Dosen	di jam 1
		$ambil2=mysql_query("select * from data_jadwal where hari='$hari'and jam1='$jam1' and dosen='$dosen'");
		$jumlah2=mysql_num_rows($ambil2);
			if ($jumlah2==0) {
					$simpan=mysql_query("insert into data_jadwal values ('$hari','$prodi','$kelas','$dosen','$matkul','$jam1','$jam2','$ruangan')");
	
					if ($simpan)  {
							echo "<script> alert ('Jadwal Berhasil Ditambahkan');</script>";
							  } 
					else {
							echo "<script> alert ('Gagal'); </script>";
						}
				}
			else {
					echo "<script> alert ('Dosen sudah mempunyai jadwal pada waktu ini, silahkan ulangi') </script>";
					exit;
				}
		
		
  
  }  
}
else {
	echo "<script> alert ('Ruangan sudah dipakai, silahkan ulangi'); </script>";
	exit;
	}
  

?>