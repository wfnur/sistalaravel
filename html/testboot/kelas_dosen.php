<?php

while ($data = mysql_fetch_array($senin)){
	$hari=$data['hari'];
	
	$kelas=$data['kelas'];
	$jam1=$data['jam1'];
	$jam2=$data['jam2'];
	$ruangan=$data['ruangan'];
	$matkul=$data['pelajaran'];?>

<tr>
      <td><?php echo$hari?></td>
      <td><?php echo$jam1.'-'.$jam2 ;?></td>
    
      <td><?php echo$matkul?></td>
      <td><?php echo$ruangan?></td>
	  <td><?php echo$kelas?></td>
    </tr>
<?php
}
?>