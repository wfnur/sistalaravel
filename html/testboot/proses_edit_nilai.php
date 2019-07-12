<?php 
$nip=$_SESSION['username'];
$kod=$_GET['mk'];	

require"config.php";

$ambildata=mysql_query("SELECT * FROM data_bobot where nip2='$nip' and kode_matkul='$kod'");

  while ($isi=mysql_fetch_array($ambildata)){
$harian2=$isi['harian'];
$uts2=$isi['uts'];
$uas2=$isi['uas'];
	$nim=$_POST['nim'];
	$harian=$_POST['harian'];
	$uts=$_POST['uts'];
	$uas=$_POST['uas'];
	$akhir=($harian*$harian2/100)+($uts*$uts2/100)+($uas*$uas2/100);
	if($akhir>=80){
		$indeks='A';
		$indeks2=4;
	}
	elseif ((75<=$akhir) and ($akhir>80)){
		$indeks='AB';
		$indeks2=3.5;
	}
	elseif ((70<=$akhir) and ($akhir>75)){
		$indeks='B';
		$indeks2=3;
	}
	elseif ((65<=$akhir) and ($akhir>70)){
		$indeks='BC';
		$indeks2=2.5;
	}
	elseif ((60<=$akhir) and ($akhir>65)){
		$indeks='C';
		$indeks2=2;
	}
	elseif ((55<=$akhir) and ($akhir>60)){
		$indeks='CD';
		$indeks2=1.5;
	}
	elseif ((40<$akhir) and ($akhir>55)){
		$indeks='D';
		$indeks2=1;
	}
	elseif ((0<=$akhir) and ($akhir<=40)){
		$indeks='E';
		$indeks2=0;
	}
$pilih_data=mysql_query("select * from data_matkul where kode_matkul='$kod'");
while ($isi=mysql_fetch_array($pilih_data)){;
$sms=$isi['semester'];
$nip2=$_SESSION['username'];
$kod2=$_GET['mk'];
if($uas<=100 or $uts<=100 or $harian<=100){	
	$simpan=mysql_query("UPDATE data_nilai SET harian='$harian',uts='$uts',uas='$uas',akhir='$akhir',indeks='$indeks',indeks2='$indeks2' Where (kode_matkul2='$kod2' and kode_dosen='$nip2) and nim2='$nim')");
	
	if ($simpan)  { ?>
		<div class="alert alert-info">Nilai Berhasil Diirubah <a href="javascript:history.go(-2)">kembali ke halaman nilai </a></div>
	<?php } else { ?>
		<div class="alert alert-danger">Terjadi Kesalahan, Silahkan hubungi Admin <?php echo mysql_error() ?></div>
<?php	}
}
else{ ?>
	<div class="alert alert-danger">Nilai yang anda masukan tidak valid! silahkan coba <a href="javascript:history.go(-1)"> lagi </a></div>
 <?php 
}
 }
  } ?>