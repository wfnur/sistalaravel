<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/bootstrap-confirmation.js"></script>
<?php 

	  @session_start();
	  
	   if ((isset($_SESSION['username'])) and ($_SESSION['status']=='dosen'))   { ?>
<h1 class="page-header">
                    Data Nilai Mahasiswa
                    </h1>
  <h3> Matakuliah 
  <?php
  
require"config.php";

	
$nip=$_SESSION['username'];
$kod=$_GET['mk'];
$pro=$_GET['prodi'];
$asem2=$_GET['kelas'];
  $ambildata2=mysql_query("SELECT * FROM `data_matkul` where kode_matkul='$kod' and prodi='$pro'");

  while ($isi2=mysql_fetch_array($ambildata2)){
$kod_mk=$isi2['kode_matkul'];
$nam_mk=$isi2['nama_matkul'];
 echo $nam_mk; }?></h3>



<h4><p>Kelas: <?php echo $asem2 ?> </p></h4>

<div class="col-lg-8">
<div class="table-responsive">
 <table width="400" class="table table-bordered table-hover table-striped">

  
    <thead>
    <tr>
      <td width="10%" ><center>NIM</center></td>
      <td width="80%" ><center>NAMA</center></td>
      <td width="10%"><center>Menu</center></td>
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
$ambildata=mysql_query("SELECT * FROM `data_mhsw` where prodi='$asem' and kelas='$asem2'")or die(mysql_error());

  while ($isi=mysql_fetch_array($ambildata)){
  $nim=$isi['nim'];
$nama=$isi['nama'];

?>

    <tr>
      <td><?php echo $nim ?></td>
	  
      <td><?php echo $nama ?></td>
      <?php 

$nip=$_SESSION['username'];

$query=mysql_query("select * from data_bobot where nip2='$nip' and kode_matkuls='$kod_mk'");
$jumlah=mysql_num_rows($query);

if ($jumlah==0){?>
	  <td><a href="?menu=inbobot&mk=<?php echo $kod_mk ?>">Tambahkan Bobot</a></td>
	  
  <?php } else {
	  $ambildatas=mysql_query("SELECT * FROM `data_nilai` where kode_matkul2='$kod2' and nim2='$nim'")or die(mysql_error());
	  $rows=mysql_num_rows($ambildatas);
	  if($rows==0){?>
   <td height="15" ><a class="btn btn-primary" href="?menu=inputn&amp;nim=<?php echo $nim ?>&mk=<?php echo $kod?>&prodi=<?php echo $pro ?>" role="button"><font size="2">Masukan</font></a></td>
	  <?php } else { ?>
  <td></td> <?php } }?>
    </tr>
  

 
<?php
   
	
  }
  
  
  ?>

  </tbody>
</table>
<?php
$nip=$_SESSION['username'];

$query=mysql_query("select * from data_bobot where nip2='$nip' and kode_matkuls='$kod_mk'");
$jumlah=mysql_num_rows($query);

if ($jumlah==0){?>
	  <td><a href="?menu=inbobot&mk=<?php echo $kod_mk ?>">Tambahkan Bobot</a></td>
	  
  <?php } else {?>
<h5>Masukan Nilai Menggunakan Excel.</h5>
	   <?php require "import.php"; ?>
	 <br>Note:</br>
	 <br>1. Unduh template Nilai <a href="files/Template_nilai.xls"> disini</a></br>
	 <br>2. pastikan file di simpan dalam format .xls (93-2003)</br>
	 <br>3. pastikan data yang akan dimasukan belum pernah dimasukan sebelumnya</br>
	 <br>4. pastikan bobot nilai sudah dimasukan</br>	
  <?php } ?>

  <center>


  <?php }  else    { 
	
		 echo '<div class="alert alert-danger">Anda tidak memiliki hak untuk mengakses halaman ini!</div>';
		  
	  }
	  ?>
	 
		
