<html>
<?php 

	  
	   if ((isset($_SESSION['username'])) and ($_SESSION['status']=='mahasiswa'))   { ?>
<h1 class="page-header">
                    Jadwal Kuliah
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
      <th>Dosen</th>
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
$ambildata=mysql_query("SELECT * FROM data_mhsw where nim='$nip'");

  while ($isi=mysql_fetch_array($ambildata)){
$kelas=$isi['kelas'];


  
   $senin = mysql_query("select * from (Select * from data_jadwal where hari='$search' and kelas='$kelas' ORDER by hari DESC)as sub Order by kelas DESC,jam1 ASC");
   
  }
  $jum=0;
  $jum=mysql_num_rows($senin);
   if ($jum == 0) {
    echo '<p></p><p>Belum ada jadwal untuk hari tersebut</p>';
	exit;
	
   } else {

			require "kelas_3A.php";



   }
  }
?>
</tbody>
</table>
</form>
</div>
	   <?php } else {?> <div class="alert alert-danger">Hanya<b> Mahasiswa </b>yang dapat mengakses halaman ini!</div><?php } ?>
</html>