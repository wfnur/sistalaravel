<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/bootstrap-confirmation.js"></script>
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/imagehover.min.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/sb-admin.css" rel="stylesheet">
    <link href="css/plugins/morris.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<?php
 // INCLUDE THE phpToPDF.php FILE
require("phpToPDF.php"); 

// PUT YOUR HTML IN A VARIABLE
$my_html="<HTML>

<h1 class="page-header">
                    Data Mata Kuliah
                    </h1>
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
</form>
<?php 

	  @session_start();
	  $asem=$_SESSION['username'];
	   if ((isset($_SESSION['username'])) and ($_SESSION['status']=='dosen'))   { ?>

<div class="table-responsive">
 <table class="table table-bordered table-hover table-striped">

  
    <thead>
    <tr>
	<P align="center">
      <td width="89" >Kode Mata Kuliah</td>
      <td width="200">Mata Kuliah</td>
      <td width="25">SKS</td>
      <td width="78">Prodi</td>
      <td width="50">Semester</td>
      <td width="43">Kelas</td>
	  <td width="43">Menu</td></p>
    </tr>
    
    </thead>
    <tbody>
<?php

require"config.php";

	


$ambildata=mysql_query("SELECT * FROM `data_matkul` INNER JOIN data_pengajar ON data_matkul.kode_matkul=data_pengajar.kode_matkul where data_pengajar.kode_dosen='$asem'");

  while ($isi=mysql_fetch_array($ambildata)){
$kod_mk=$isi['kode_matkul'];
$nam_mk=$isi['nama_matkul'];
$sms=$isi['semester'];
$kelas=$isi['kelas'];
$sks=$isi['sks'];
$prodi=$isi['prodi'];

?>

    <tr>
	<P align="center">
      <td><?php echo $kod_mk ?></td>
	  
      <td><a href="?menu=nilai&mk=<?php echo $kod_mk ?>&prodi=<?php echo $prodi ?>&kelas=<?php echo $kelas ?>"><?php echo $nam_mk ?></a></td>
      <td><?php echo $sks ?></td>
	  <td><?php echo $prodi ?></td>
      <td><?php echo $sms ?></td>
      <td><?php echo $kelas ?></td>
	  <?php 
require"config.php";
$nip=$_SESSION['username'];

$query=mysql_query("select * from data_bobot where nip2='$nip' and kode_matkul='$kod_mk'");
$jumlah=mysql_num_rows($query);

if ($jumlah==0){?>
	  <td><a href="?menu=inbobot&mk=<?php echo $kod_mk ?>">Tambahkan Bobot <?php echo $jumlah ?></a>
<?php }
else{ }?>
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
	  ?></center>
</HTML>";

// SET YOUR PDF OPTIONS
// FOR ALL AVAILABLE OPTIONS, VISIT HERE:  http://phptopdf.com/documentation/
$pdf_options = array(
  "source_type" => 'html',
  "source" => $my_html,
  "action" => 'save',
  "save_directory" => '',
  "file_name" => 'html_01.pdf');

// CALL THE phpToPDF FUNCTION WITH THE OPTIONS SET ABOVE
phptopdf($pdf_options);

// OPTIONAL - PUT A LINK TO DOWNLOAD THE PDF YOU JUST CREATED
echo ("<a href='html_01.pdf'>Download Your PDF</a>");
?>