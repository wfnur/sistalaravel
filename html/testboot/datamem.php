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
	  
	   if ((isset($_SESSION['username'])) and ($_SESSION['status']=='admin'))   { ?>

<div class="table-responsive">
 <table class="table table-bordered table-hover table-striped">

  
    <thead>
    <tr>
      <td width="89" rowspan="2">NIM</td>
      <td width="161" rowspan="2">NAMA</td>
      <td width="225" rowspan="2">PRODI</td>
      <td width="78" rowspan="2">SEMESTER</td>
      <td width="50" rowspan="2">KELAS</td>
      <td colspan="2"><P align="center">MENU</P></td>
    </tr>
    <tr>
      <td width="66">EDIT</td>
      <td width="55">HAPUS</td>
    </tr>
    </thead>
    <tbody>
<?php

require"config.php";

	
$asem=$_GET['prodi'];
$asem2=$_GET['kelas'];	
$ambildata=mysql_query("SELECT * FROM data_mhsw where prodi='$asem' and kelas='$asem2'");

  while ($isi=mysql_fetch_array($ambildata)){
  $nim=$isi['nim'];
$nama=$isi['nama'];
$prodi=$isi['prodi'];
$sms=$isi['semester'];
$kelas=$isi['kelas'];

?>

    <tr>
      <td><?php echo $nim ?></td>
	  
      <td><?php echo $nama ?></td>
      <td><?php echo $prodi ?></td>
      <td><?php echo $sms ?></td>
      <td><?php echo $kelas ?></td>
      <td><a class="btn btn-primary" href="?menu=edit&amp;nim=<?php echo $nim ?>" role="button">Edit</a></td>
      <td><button class="btn btn-danger" href="hapus.php?nim=<?php echo $nim ?>" value="<?php echo $nama ?>">delete</button></td>
   
	  
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
	  <script src="js/bootbox.min.js"></script>
    <script>
         $(document).on("click", ".btn-danger", function(e) {
            var link = $(this).attr("href"); // "get" the intended link in a var
			var nama = $(this).attr("value"); 
            e.preventDefault();    
            bootbox.confirm("Are you sure to delete "+nama+"?", function(result) {    
                if (result) {
                    document.location.href = link;  // if result, "set" the document location       
                }    
            });
        });
		
    </script>
		
