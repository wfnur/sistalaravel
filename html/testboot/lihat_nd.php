<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/bootstrap-confirmation.js"></script>

<?php
if ((isset($_SESSION['username'])) and ($_SESSION['status']=='dosen'))   { 

require"config.php";
$kod='';
$kel='';
$as=$_GET['prodi'];	
$nip=$_SESSION['username'];
$kod=$_GET['mk'];
$kel=$_GET['kelas'];
$ambildata2=mysql_query("SELECT * FROM `data_matkul`where kode_matkul='$kod' and prodi='$as'");

  while ($isi2=mysql_fetch_array($ambildata2)){
$kod_mk=$isi2['kode_matkul'];
$nam_mk=$isi2['nama_matkul'];
$sms=$isi2['semester'];
$kelas=$isi2['kelas'];
$sks=$isi2['sks'];
$prodi=$isi2['prodi'];

?><h1 class="page-header">
                    Data Nilai Mahasiswa
                    </h1>
  <h3> <?php echo $nam_mk; }?></h3>



<div class="col-lg-12">
<div class="table-responsive">
 <table width="593" class="table table-bordered table-hover table-striped">

  
    <thead>
    <tr>
      <td width="85" rowspan="2">NIM</td>
      <td width="221" rowspan="2">NAMA</td>
      <td width="55" rowspan="2">Harian</td>
      <td width="40" rowspan="2">UTS</td>
      <td width="43" rowspan="2">UAS</td>
      <td width="51">Hasil Akhir</td>
      <td width="34">Index</td>
      <td width="28">menu</td>
    </tr>
    <tr>
     
    </tr>
    </thead>
    <tbody>
<?php

require"config.php";

	
$asem=$_GET['prodi'];
$asem2=$_GET['kelas'];
$kod2=$_GET['mk'];	
$ambildata=mysql_query("SELECT * FROM `data_mhsw` left JOIN data_nilai ON data_mhsw.nim=data_nilai.nim2 where data_mhsw.prodi='$asem' and data_mhsw.kelas='$asem2' and kode_matkul2='$kod2'
")or die(mysql_error());

  while ($isi=mysql_fetch_array($ambildata)){
  $nim=$isi['nim'];
$nama=$isi['nama'];

$harian=$isi['harian'];
$uts=$isi['uts'];
$uas=$isi['uas'];
$akhir=$isi['akhir'];
$indeks=$isi['indeks'];
$kodd=$isi['kode_matkul2'];

?>

    <tr>
      <td><?php echo $nim ?></td>
	  
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
   <td><a class="btn btn-primary" href="?menu=editnilai&amp;nim=<?php echo $nim ?>&mk=<?php echo $kod?>&prodi=<?php echo $asem ?>" role="button">Edit</a></td>
	  
    </tr>
  

 
<?php
   
	
  }
  
  
  ?>

  </tbody>
</table>


  <center>


	  <?php } else { ?>
	
		  <div class="alert alert-danger">Anda tidak memiliki hak untuk mengakses halaman ini!</div>
	<?php	  
	  }
	  ?>
	 
		
