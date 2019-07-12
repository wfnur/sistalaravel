<?php include "conn_rekap.php";?>
<div class="post">
	<div class="entry">
		<form action="?page=rekap_absensi" method="post" name="postform">
		<table width="99%" border="0" class="datatable">
		<tr>
			<td width="24%">
			<select name="kelas_dipilih">
			<option value="0" selected="selected">Pilih Kelas</option>
			<?php 
			
			$query=mysql_query("select * from kelas order by nama_kelas asc",$koneksi);
			
			while($row=mysql_fetch_array($query))
			{
				?><option value="<?php  echo $row['kelas_id']; ?>"><?php  echo $row['nama_kelas']; ?></option><?php 
			}
			?>
			</select>	
		  </td>
		</tr>
		<tr><td colspan="5" align="left"><input type="submit" value="Tampilkan"></td></tr>
		</table>	
		</form>	
		<br /><br />
		<table class="datatable">
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Hadir (H)</th>
			<th>Sakit (S)</th>
			<th>Ijin (I)</th>
			<th>Alfa (A)</th>
		</tr>
		<?php
		//untuk option
		$kelas=$_POST['kelas_dipilih'];
		
		$query=mysql_query("select distinct student_no from time where kelas='$kelas'order by student_name asc",$koneksi);
	
		
		while($row=mysql_fetch_array($query)){
			$siswa=mysql_fetch_array(mysql_query("select * from time where student_no='$row[student_no]'",$koneksi));
			$keterangan=$row['keterangan'];
			?>
			<tr>
				<td><?php echo $c=$c+1;?></td>
				<td><?php echo $siswa['student_name'];?></td>
				<td align="center">
				<?php
					$hadir=mysql_query("select * from time where student_no='$row[student_no]' and keterangan='Hadir'",$koneksi);
					
					$jumlah=mysql_num_rows($hadir);
					echo $jumlah;
				?>
				</td>
				<td align="center">
				<?php
					$hadir=mysql_query("select * from time where student_no='$row[student_no]' and keterangan='Sakit'",$koneksi);
					
					$jumlah=mysql_num_rows($hadir);
					echo $jumlah;
				?>
				</td>
				
				<td align="center">
				<?php
					$hadir=mysql_query("select * from time where student_no='$row[student_no]' and keterangan='Ijin'",$koneksi);
					
					$jumlah=mysql_num_rows($hadir);
					echo $jumlah;
				?>
				</td>
				
				<td align="center">
				<?php
					$hadir=mysql_query("select * from time where student_no='$row[student_no]' and keterangan='Alfa'",$koneksi);
					
					$jumlah=mysql_num_rows($hadir);
					echo $jumlah;
				?>
				</td>
				
				
			</tr>
			<?php
			
		}
		?>
		</table>
  </div>
</div>
