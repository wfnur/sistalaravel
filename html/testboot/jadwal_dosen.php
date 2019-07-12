<html>
<?php 

	  
	   if ((isset($_SESSION['username'])) and ($_SESSION['status']=='dosen'))   { ?>
<h1 class="page-header">
                    Jadwal Matakuliah
                    </h1>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" name="form1" id="form1">
<td>Hari:</td>
<select name="hari" id="hari">
          <option value="Senin">Senin</option>
          <option value="Selasa">Selasa</option>
          <option value="Rabu">Rabu</option>
          <option value="Kamis">Kamis</option>
          <option value="Jumat">Jum'at</option>
      </select>

	
	<input class="btn btn-primary" type="submit" name="sign" id="sign" value="submit" />
	  
<div class="table-responsive">
 <table class="table table-bordered table-hover table-striped">
  <tbody>
    <tr>
    <th>Hari</th>
      <th>Jam</th>
      
      <th>Matkul</th>
      <th>Ruangan</th>
      <th>Kelas</th>
      </tr>
<?php
@session_start();
  if (isset($_POST['sign'])) {
   $search = $_POST['hari'];
$nip=$_SESSION['username'];
 require "config.php";
$ambildata=mysql_query("SELECT * FROM data_dosen where kode_dosen='$nip'");

  while ($isi=mysql_fetch_array($ambildata)){
$nama=$isi['nama'];


  
   $senin = mysql_query("select hari,kelas,jam1,jam2,ruangan,pelajaran from (Select * from data_jadwal where hari='$search' and dosen='$nama' ORDER by hari DESC)as sub Order by kelas DESC,jam1 ASC");
   
  }
  $jum=0;
  $jum=mysql_num_rows($senin);
   if ($jum == 0) {
    echo '<p></p><p>Pencarian tidak ditemukan</p>';
	exit;
	
   } else {

			require "kelas_dosen.php";



   }
  }
?>
</tbody>
</table>
</form>
</div>
	   <?php } else {?> <div class="alert alert-danger">Hanya<b> Dosen </b>yang dapat mengakses halaman ini!</div><?php } ?>
</html>