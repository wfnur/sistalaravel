<h1 class="page-header">
                    Jadwal Matakuliah
                    </h1>
<select name="hari" id="hari">
          <option value="Senin">Senin</option>
          <option value="Selasa">Selasa</option>
          <option value="Rabu">Rabu</option>
          <option value="Kamis">Kamis</option>
          <option value="Jum'at">Jum'at</option>
      </select></td>
	  <td colspan="3" align="center"><input class="btn btn-primary" type="submit" name="sign" id="submit" value="Daftar" />
<div class="table-responsive">
 <table class="table table-bordered table-hover table-striped">	  

  <tbody>
    <tr>
    <th>Hari</th>
      <th >Jam</th>
      <th>Matkul</th>
      <th>dosen</th>
      <th>Ruangan</th>
      <th >Kelas</th>
      </tr>
<?php
  if (isset($_POST['submit'])) {
   $search = $_POST['hari'];

   
   $senin = mysql_query("select hari,dosen,kelas,jam1,jam2,ruangan,pelajaran from (Select * from data_jadwal Where hari='$search' ORDER by hari DESC) Order by kelas DSC,jam1 ASC");
    
   if (mysql_num_rows($senin) == 0) {
    echo '<p></p><p>Pencarian tidak ditemukan</p>';
   } else {

while ($data = mysql_fetch_array($senin)){
	$hari=$data['hari'];
	$dosen=$data['dosen'];
	$kelas=$data['kelas'];
	$jam1=$data['jam1'];
	$jam2=$data['jam2'];
	$ruangan=$data['ruangan'];
	$matkul=$data['pelajaran'];?>

<tr>
      <td><?php echo$hari?></td>
      <td><?php echo$jam1.'-'.$jam2?></td>
      <td><?php echo$dosen?></td>
      <td><?php echo$matkul?></td>
      <td><?php echo$ruangan?></td>
	  <td><?php echo$kelas?></td>
    </tr>
<?php
}

   }
  }
?>
</tbody>
</table>
</div>