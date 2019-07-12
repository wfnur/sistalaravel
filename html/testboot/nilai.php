<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/bootstrap-confirmation.js"></script>
<h1 class="page-header">
                    Data Mahasiswa
                    </h1>
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
</form>
<?php 

	  @session_start();
	  
	   if ((isset($_SESSION['username'])) and (($_SESSION['status']=='dosen')) )  { ?>
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
$ambildata=mysql_query("SELECT * FROM `data_mhsw` LEFT JOIN data_nilai ON data_mhsw.nim=data_nilai.nim2 where prodi='$asem' and kelas='$asem2'
UNION
SELECT * FROM `data_mhsw` RIGHT JOIN data_nilai ON data_mhsw.nim=data_nilai.nim2 where prodi='$asem' and kelas='$asem2'");

  while ($isi=mysql_fetch_array($ambildata)){
  $nim=$isi['nim'];
$nama=$isi['nama'];

$harian=$isi['harian'];
$uts=$isi['uts'];
$uas=$isi['uas'];
$akhir=$isi['akhir'];
$indeks=$isi['indeks'];
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
   <td><a class="btn btn-primary" href="?menu=edit&amp;nim=<?php echo $nim ?>" role="button">Edit</a></td>
	  
    </tr>
  

 
<?php
   

  }
  
  
  ?>

  </tbody>
</table>

  <center>


	  <?php } else {
	
		  echo"login dulu gan...";
		  
	  }
	  ?>
	  
		
</div>