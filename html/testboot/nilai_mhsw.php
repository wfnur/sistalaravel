<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/bootstrap-confirmation.js"></script>

<?php



	  $kod=$_GET['sms'];
	  
	   if ((isset($_SESSION['username'])) and ($_SESSION['status']=='mahasiswa'))   {
	require "config.php";


	  
?><h1 class="page-header">
                    Data Nilai Mahasiswa
                    </h1>
 <h3>Semester <?php echo $kod;?></h3>

<?php 

	  @session_start();
	  
	   if ((isset($_SESSION['username'])) and ($_SESSION['status']=='mahasiswa'))   { ?>
<div class="row">
<div class="col-lg-12">
<div class="table-responsive">
 <table width="593" class="table table-bordered table-hover table-striped">

  
    <thead>
    <tr>
      <td width="85" >Kode</td>
      <td width="221">Mata Kuliah</td>
      <td width="55" >Harian</td>
      <td width="40" >UTS</td>
      <td width="43" >UAS</td>
      <td width="51">Hasil Akhir</td>
      <td width="34">Index</td>
      <td width="28">SKS</td>
    </tr>
    <tr>
     
    </tr>
    </thead>
    <tbody>
<?php

require"config.php";



$jumlah=0;
$jumlah2=0;
$jum=0;	
$nim=$_SESSION['username'];
$kod2=$_GET['sms'];	
$ambildata3=mysql_query("SELECT * FROM `data_mhsw` where nim='$nim'");
  while ($isi2=mysql_fetch_array($ambildata3)){
	  $prodi=$isi2['prodi'];
	

$ambildata=mysql_query("SELECT data_nilai.kode_matkul2,data_matkul.nama_matkul,data_matkul.sks,data_nilai.harian,data_nilai.uts,data_nilai.uas,data_nilai.akhir,data_nilai.indeks,data_nilai.indeks2 FROM `data_matkul` INNER JOIN data_nilai ON data_matkul.kode_matkul=data_nilai.kode_matkul2 where (data_nilai.nim2='$nim' and data_matkul.prodi='$prodi'and data_nilai.semester='$kod2') ")or die(mysql_error());

  while ($isi=mysql_fetch_array($ambildata)){
 
$nama=$isi['nama_matkul'];
$kod_mat=$isi['kode_matkul2'];
$sks=$isi['sks'];
$harian=$isi['harian'];
$uts=$isi['uts'];
$uas=$isi['uas'];
$akhir=$isi['akhir'];
$indeks=$isi['indeks'];
$indeks2=$isi['indeks2'];

?>

    <tr>
      <td><?php echo $kod_mat ?></td>
	  
      <td><?php echo $nama ?></td>
      <?php 
	  		
	   ?>
      <td><?php if (!empty($harian)){
	   echo $harian;
	  }
	  else {
		  echo "0"; }?></td>
      <td><?php if (!empty($uts)){
	   echo $uts;
	  }
	  else {
		  echo "0"; }?>
      <td><?php if (!empty($uas)){
	   echo $uas;
	  }
	  else {
		  echo "0"; }?></td>
      <td><?php if (!empty($akhir)){
	   echo $akhir;
	  }
	  else {
		  echo "0"; }?>
      <td><?php if (!empty($indeks)){
	   echo $indeks;
	  }
	  else {
		  echo "E"; }?></td>
   <td><?php echo $sks;?></td>
	  
    </tr>
  

 
<?php
$jumlah2=$jumlah2+$sks;
$jum=$jum+($indeks2*$sks);

  } 
  
  }
	   }
  
  ?>

  </tbody>
  
</table>

<?php 
$nim2=$_SESSION['username'];
$kodd=$_GET['sms'];
$ambildata5=mysql_query("SELECT * FROM `data_mhsw` where nim='$nim2'");
  while ($isi2=mysql_fetch_array($ambildata5)){
	  $prodi2=$isi2['prodi'];
$getdata=mysql_query("SELECT * FROM `data_matkul` where semester='$kod'and prodi='$prodi2'");
 while ($isi4=mysql_fetch_array($getdata)){
	 $sks4=$isi4['sks'];
	 $jumlah=$jumlah+$sks4;
	 									}
  }
  $juju=$jum/$jumlah;
  $fun=number_format($juju,2);
 ?>
<br>Jumlah SKS:<b> <?php echo $jumlah;?></b></br>

<br>IP Semester:<b> <?php if ($jum>0 and $jumlah==$jumlah2){ echo ($fun) ?></b></br>
<?php 
if($kodd>=2){
require'IPK_sms'.$kodd.'.php';
 ?>
<br>IPK:<b><?php echo $IPK; ?><b></br><?php } ?>

  <br><center><a href="dompdd.php?sms=<?php echo $kodd ?>"> Download dalam bentuk PDF </a></center>


<?php } } else { ?>
	
		  <div class="alert alert-danger">Anda tidak memiliki hak untuk mengakses halaman ini!</div>
	<?php	  
	  }
	  ?>
	 
		
