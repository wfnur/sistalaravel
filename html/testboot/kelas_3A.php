<?php

while ($data = mysql_fetch_array($senin)){
	$hari=$data['hari'];
	$prodi=$data['prodi'];
	$kelas=$data['kelas'];
	$jam1=$data['jam1'];
	$jam2=$data['jam2'];
	$dosen=$data['dosen'];
	$ruangan=$data['ruangan'];
	$matkul=$data['pelajaran'];?>

<tr>
      <td><?php echo$hari?></td>
      <td><?php echo$jam1.'-'.$jam2 ;?></td>
      <td><?php echo$dosen?></td>
      <td><?php echo$matkul?></td>
      <td><?php echo$ruangan?></td>
	  <td><?php echo$kelas?></td>
	  <?php  @session_start();
	  
	   if ((isset($_SESSION['username'])) and ($_SESSION['status']=='admin'))   { 
	   echo
	  '<td><a href="hapusjad.php?hari='.$hari.'&jam1='.$jam1.'&'.'jam2='.$jam2.'&ruangan='.$ruangan.'&kelas='.$kelas.'&prodi='.$prodi.'">delete</a></td>
    </tr>';
	  
}
}
?>