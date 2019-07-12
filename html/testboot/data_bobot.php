<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/bootstrap-confirmation.js"></script>
<h1 class="page-header">
                    Data Bobot Nilai
                    </h1>
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
</form>
<?php 

	  @session_start();
	  
	   if ((isset($_SESSION['username'])) and ($_SESSION['status']=='dosen'))   { ?>

<div class="table-responsive">
 <table class="table table-bordered table-hover table-striped">

  
    <thead>
    <tr>
	<P align="center">
      <td width="89" >Kode Mata Kuliah</td>
  
      <td width="25">Harian</td>
      <td width="78">UTS</td>
      <td width="50">UAS</td>
	  <td width="50">menu</td>
      
    </tr>
    
    </thead>
    <tbody>
<?php
$asem=$_SESSION['username'];
require"config.php";
$ambildata=mysql_query("SELECT * FROM `data_bobot` where data_bobot.nip2='$asem'");

  while ($isi=mysql_fetch_array($ambildata)){
$kod_mk=$isi['kode_matkuls'];

$harian=$isi['harian'];
$uts=$isi['uts'];
$uas=$isi['uas'];


?>

    <tr>
	<P align="center">
      <td><?php echo $kod_mk ?></td>
	  
    
      <td><?php echo $harian."%" ?></td>
	  <td><?php echo $uts."%" ?></td>
      <td><?php echo $uas."%" ?></td>
	  <td><a class="btn btn-primary" href="?menu=editbobot&amp;mk=<?php echo $kod_mk ?>" role="button">Edit</a></td>
      
      </p>
   
	  
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
	 