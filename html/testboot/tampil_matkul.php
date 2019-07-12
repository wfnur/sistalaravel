<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/bootstrap-confirmation.js"></script>
<h1 class="page-header">
                    Data Matakuliah Jurusan Elektro
                    </h1>

<?php 

	  @session_start();
	  
	   if ((isset($_SESSION['username'])) and ($_SESSION['status']=='admin'))   { ?>
<div class="col-lg-8">
<div class="table-responsive">
 <table class="table table-bordered table-hover table-striped">

  
    <thead>
    <tr>
      <td width="89" rowspan="2">Kode Matkul</td>
      <td width="161" rowspan="2">Nama Matkul</td>
	  <td width="161" rowspan="2">SKS</td>
	  <td width="161" rowspan="2">Prodi</td>
	  <td width="161" rowspan="2">Semester</td>
	  <td>Menu</td>
      
    </tr>
	
    </thead>
    <tbody>
<?php

require"config.php";
	
$ambildata=mysql_query("SELECT * FROM data_Matkul order by prodi ASC,semester ASC");

  while ($isi=mysql_fetch_array($ambildata)){
  $kod_mk=$isi['kode_matkul'];
  $nam_mk=$isi['nama_matkul'];
  $sks=$isi['sks'];
  $prodi=$isi['prodi'];
  $semester=$isi['semester'];



?>

    <tr>
      <td><?php echo $kod_mk ?></td>
	  
      <td><?php echo $nam_mk ?></td>
	  <td><?php echo $sks ?></td>
	  <td><?php echo $prodi ?></td>
	  <td><?php echo $semester ?></td>
      <td><button class="btn btn-danger" href="hapusmat.php?kod=<?php echo $kod_mk ?>&kod1=<?php echo $prodi ?>&kod2=<?php echo $semester ?>" value="<?php echo $nam_mk ?>">delete</button></td>
      
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
		
