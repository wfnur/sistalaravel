<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/bootstrap-confirmation.js"></script>
<h1 class="page-header">
                    Data Dosen Jurusan Elektro
                    </h1>

<?php 

	  @session_start();
	  
	   if ((isset($_SESSION['username'])) and ($_SESSION['status']=='admin'))   { ?>
<div class="col-lg-6">
<div class="table-responsive">
 <table class="table table-bordered table-hover table-striped">

  
    <thead>
    <tr>
      <td width="89" rowspan="2">NIP</td>
      <td width="161" rowspan="2">NAMA</td>
	  <td colspan="2">Menu</td>
      
    </tr>
	<tr>
      <td width="66">EDIT</td>
      <td width="55">HAPUS</td>
    </tr>
    </thead>
    <tbody>
<?php

require"config.php";
	
$ambildata=mysql_query("SELECT * FROM data_dosen");

  while ($isi=mysql_fetch_array($ambildata)){
  $nip=$isi['kode_dosen'];
$nama=$isi['nama'];


?>

    <tr>
      <td><?php echo $nip ?></td>
	  
      <td><?php echo $nama ?></td>
	  <td><a class="btn btn-primary" href="?menu=editdosen&amp;nip=<?php echo $nip ?>" role="button">Edit</a></td>
      <td><button class="btn btn-danger" href="hapusdos.php?nim=<?php echo $nip ?>" value="<?php echo $nama ?>">delete</button></td>
      
    </tr>
  

 
<?php
   

  }
  
  ?>

  </tbody>
</table>

  <center>
</div>
</div>

	  <?php } else {?>
	
		  <div class="alert alert-danger">Hanya<b> Admin </b>yang dapat mengakses halaman ini!</div>
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
		
