<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/bootstrap-confirmation.js"></script>
<h1 class="page-header">
                    Data Mata Kuliah
                    </h1>
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
</form>
<?php 

	  @session_start();
	  
	   if ((isset($_SESSION['username'])) and ($_SESSION['status']=='admin'))   { ?>

<div class="table">
 <table class="table table-bordered table-hover table-striped">

  
    <thead>
    <tr>
	<P align="center">
	  <td width="89" >NIP</td>
      <td width="200">Nama</td>
	  <td width="200">Prodi</td>
      <td width="100" >Kode Matakuliah</td>
      <td width="43">Kelas</td>
	  <td width="43">Menu</td></p>
    </tr>
    
    </thead>
    <tbody>
<?php

require"config.php";

	


$ambildata=mysql_query("SELECT data_pengajar.kode_dosen,data_dosen.nama,data_pengajar.kode_matkul, data_pengajar.prodi,data_pengajar.kelas FROM `data_pengajar` inner JOIN data_dosen ON data_dosen.kode_dosen=data_pengajar.kode_dosen order by kode_dosen ASC ");

  while ($isi=mysql_fetch_array($ambildata)){
$nip=$isi['kode_dosen'];
$nama=$isi['nama'];
$kod_mk=$isi['kode_matkul'];
$kelas=$isi['kelas'];
$prodi=$isi['prodi'];

?>

    <tr>
	<P align="center">
      <td><?php echo $nip ?></td>
	  
      <td><?php echo $nama ?></a></td>
	  <td><?php echo $prodi ?></td>
      <td><?php echo $kod_mk ?></td>
      <td><?php echo $kelas ?></td>
	  <td>
	 
	  
 <a href="hapusajar.php?&kod=<?php echo $kod_mk ?>&kod1=<?php echo $nip ?>&kod2=<?php echo $kelas ?>">Delete</a></td>
      </p>
   
	  
    </tr>
  

 
<?php
   

  }
	   
  ?>

  </tbody>
</table>

  <center>


	  <?php  } else { ?>
	
		  <div class="alert alert-danger">Anda tidak memiliki hak untuk mengakses halaman ini!</div>
	<?php	  
	  }
	  ?>
	 