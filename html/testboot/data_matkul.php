<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/bootstrap-confirmation.js"></script>
<h1 class="page-header">
                    Data Mata Kuliah Jurusan Elektro
                    </h1>

<?php 

	  @session_start();
	  
	   if ((isset($_SESSION['username'])) and ($_SESSION['status']=='admin'))   { ?>
<div class="col-lg-8 col-lg-offset-2">
<div class="table-responsive">
 <table class="table table-bordered table-hover table-striped">

  
    <thead>
    <tr>
      <td width="89" rowspan="2">Kode MataKuliah</td>
      <td width="161" rowspan="2">Nama Mata Kuliah</td>
	  <td width="161" rowspan="2">SKS</td>
	  <td width="161" rowspan="2">Prodi</td>
	  <td width="161" rowspan="2">Semester</td>
      
    </tr>
    </thead>
    <tbody>
<?php

require"config.php";
$dataPerPage = 15;
  
  // apabila $_GET['page'] sudah didefinisikan, gunakan nomor halaman tersebut, 
// sedangkan apabila belum, nomor halamannya 1.

if(isset($_GET['page']))
{
    $noPage = $_GET['page'];
} 
else $noPage = 1;

// perhitungan offset

$offset = ($noPage - 1) * $dataPerPage;
$sql="SELECT * FROM data_matkul Order by prodi DESC,semester ASC LIMIT $offset,$dataPerPage";	
$ambildata=mysql_query($sql);

  while ($isi=mysql_fetch_array($ambildata)){
  $kode=$isi['kode_matkul'];
$nama=$isi['nama_matkul'];
$prodi=$isi['prodi'];
$sks=$isi['sks'];
$sms=$isi['semester'];


?>

    <tr>
      <td><?php echo $kode ?></td>
	  
      <td><?php echo $nama ?></td>
	  <td><?php echo $sks ?></td>
	  <td><?php echo $prodi ?></td>
	  <td><?php echo $sms ?></td>
      
    </tr>
  

 
<?php
   

  }
  
  ?>

  </tbody>
</table>
<div class="col-lg-8 col-lg-offset-2">
<?php
$query   = "SELECT COUNT(*) AS jumData FROM data_matkul";
$hasil  = mysql_query($query);
$data     = mysql_fetch_array($hasil);

$jumData = $data['jumData'];

// menentukan jumlah halaman yang muncul berdasarkan jumlah semua data

$jumPage = ceil($jumData/$dataPerPage);

// menampilkan link previous

if ($noPage > 1) echo  "<a href='".$_SERVER['PHP_SELF']."?menu=data_matkul&page=".($noPage-1)."'>&lt;&lt; Prev</a>";

// memunculkan nomor halaman dan linknya

for($page = 1; $page <= $jumPage; $page++)
{
         if ((($page >= $noPage - 3) && ($page <= $noPage + 3)) || ($page == 1) || ($page == $jumPage)) 
         {   
            if ((@$showPage == 1) && (@$page != 2))  echo "..."; 
            if ((@$showPage != ($jumPage - 1)) && (@$page == $jumPage))  echo "...";
            if ($page == $noPage) echo " <b>".$page."</b> ";
            else echo " <a href='".$_SERVER['PHP_SELF']."?menu=data_matkul&page=".$page."'>".$page."</a> ";
            $showPage = $page;          
         }
}

// menampilkan link next

if ($noPage < $jumPage) echo "<a href='".$_SERVER['PHP_SELF']."?menu=data_matkul&page=".($noPage+1)."'>Next &gt;&gt;</a>";
?>

 </div>
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
		
