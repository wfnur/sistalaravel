<!DOCTYPE html>
<?php include "conn_rekap.php";?>
<?php
	require_once 'validator.php';
	require_once 'account.php'; 
	
?>
<html lang = "eng">
	<head>
		<title>SIMPOLBAN - Record Data</title>
		<meta charset = "utf-8" />
		<meta name = "viewport" content = "width=device-width, initial-scale=1" />
		<link rel = "stylesheet" href = "css/bootstrap.css" />
		<link rel = "stylesheet" href = "css/jquery.dataTables.css" />
	</head>
	<body>
		<nav class = "navbar navbar-inverse navbar-fixed-top">
			<div class = "container-fluid">
				<div class = "navbar-header">
					<img src = "images/logo.png" width = "200px" height = "auto"/>
					<p class = "navbar-text pull-right">Politeknik Negeri Bandung</p>
				</div>
				<ul class = "nav navbar-nav navbar-right">
					<li class = "dropdown">
						<a href = "#" class = "dropdown-toggle" data-toggle = "dropdown"><i class = "glyphicon glyphicon-user"></i> <?php echo htmlentities($admin_name)?> <b class = "caret"></b></a>
						<ul class = "dropdown-menu">
							<li><a href = "logout.php"><i class = "glyphicon glyphicon-off"></i> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</nav>
		<div class = "container-fluid" style = "margin-top:70px;">
			<ul class = "nav nav-pills">
				<li><a href = "home.php"><span class = "glyphicon glyphicon-home"></span> Home</a></li>
				<li><a href = "record.php"><span class = "glyphicon glyphicon-book"></span> Record</a></li>
				<li class = "active"><a href = "rekap.php"><span class = "glyphicon glyphicon-book"></span> Rekap</a></li>
				<li class = "dropdown">
					<a class = "dropdown-toggle" data-toggle = "dropdown" href = "#"><span class = "glyphicon glyphicon-cog"></span> Setting <span class = "caret"></span></a>
					<ul class = "dropdown-menu">
						<li><a href = "pengaturanakun.php"><span class = "glyphicon glyphicon-user"></span> Accounts </a></li>
					</ul>
				</li>
			</ul>
			<br />
			<div class = "alert alert-info">Rekap</div>
			<div class = "well col-lg-12">
			<center>Rekap Data Absensi <?php echo htmlentities($admin_name)?></center></br>
			<form action="?page=rekap_absensi" method="post" name="postform">
		<table width="99%" border="0" class="datatable">
		<tr>
			<td align= "center"width="24%">
			<select name="nama_dipilih">
			<?php 
			
			$query=mysql_query("SELECT * FROM `student` WHERE `student_id` = '$_SESSION[student_id]'",$koneksi);
			
			while($row=mysql_fetch_array($query))
			{
				?><option value="<?php  echo $row['namalengkapmhs']; ?>" selected="selected"><?php  echo $row['namalengkapmhs']; ?></option><?php 
			}
			?>
			</select>	
		  </td>
		</tr>
		<tr><td colspan="5" align="center"><input type="submit" value="Tampilkan"></td></tr>
		</table>	
		</form>	
		<br />
				<table id = "table" class = "table table-bordered">
					<thead class = "alert-info">
						<tr>
							<th>No</th>
							<th>NIM</th>
							<th>Nama Mahasiswa</th>
							<th>Hadir</th>
							<th>Sakit</th>
							<th>Ijin</th>
							<th>Alfa</th>
							<th>Kompensasi</th>
							<th>Keterangan</th>
							<th>Jumlah Jam</th>
						</tr>
					</thead>
					<tbody>
					<?php
		//untuk option
		$lock=0;
		$kelas=$_POST['nama_dipilih'];
		
		$query=mysql_query("select student_no from time where student_name='$kelas'",$koneksi);
	
		
		while($row=mysql_fetch_array($query)){
			$siswa=mysql_fetch_array(mysql_query("select * from time where student_no='$query[student_no]'",$koneksi));
			$keterangan=$row['keterangan'];
			?>
			<tr>
				<td><?php echo $c=$c+1;?></td>
				<td><?php echo $siswa['student_no'];?></td>
				<td><?php echo $siswa['student_name'];?></td>
				<td align="center">
				<?php
					$hadir=mysql_query("select * from time where student_no='$row[student_no]' and keterangan='Hadir'",$koneksi);
					
					$jumlah_hadir=mysql_num_rows($hadir);
					echo $jumlah_hadir;
				?>
				</td>
				<td align="center">
				<?php
					$sakit=mysql_query("select * from time where student_no='$row[student_no]' and keterangan='Sakit'",$koneksi);
					
					$jumlah_sakit=mysql_num_rows($sakit);
					echo $jumlah_sakit;
				?>
				</td>
				
				<td align="center">
				<?php
					$ijin=mysql_query("select * from time where student_no='$row[student_no]' and keterangan='Ijin'",$koneksi);
					
					$jumlah_ijin=mysql_num_rows($ijin);
					echo $jumlah_ijin;
				?>
				</td>
				
				<td align="center">
				<?php
					$alfa=mysql_query("select * from time where student_no='$row[student_no]' and keterangan='Alfa'",$koneksi);
					
					$jumlah_alfa=mysql_num_rows($alfa);
					echo $jumlah_alfa;
				?>
				</td>
				<td align="center">
				<?php
					
					$jumlah_kompensasi=$jumlah_alfa*5;
					echo $jumlah_kompensasi;
				?>
				</td>
				<td align="center">
				<?php
					
					$keterangansp=$jumlah_alfa;
					if ($keterangansp<10){
						$sp='-';
					}
					elseif($keterangansp>=10){
						$sp='SP1';
					}
					elseif ($keterangansp>=20){
						$sp='SP2';
					}
					elseif($keterangansp>=30){
						$sp='SP3';
					}
					echo $sp;
				?>
				</td>
				<td align="center">
				<?php
					
					$jumlah_jam=$jumlah_hadir+$jumlah_sakit+$jumlah_ijin+$jumlah_alfa;
					echo $jumlah_jam;
				?>
				</td>
			</tr>
			<?php
			
		}
		?>
					</tbody>
				</table>
				<?php
					
					$kirimgmail=$jumlah_alfa*1;
					if ($kirimgmail==7){
					$lock=$lock+1;
					mail("fiqriflow@gmail.com","Peringatan Mahasiswa", 'Diberitahukan bahwa sebentar lagi'.$siswa.'mendapatkan surat peringatan 1. Mohon tegurannya', "From: sippolban@gmail.com");
					}
				?>
			<br />
			<br />	
			<br />	
			</div>
		</div>
		<div class = "navbar navbar-fixed-bottom alert-warning">
			<div class = "container-fluid">
				<label class = "pull-right">&copy; Fiqri Nurhadiansyah 2017</label>
			</div>	
		</div>	
	</body>
	<script src = "js/jquery.js"></script>
	<script src = "js/bootstrap.js"></script>
	<script src = "js/jquery.dataTables.js"></script>
	<script type = "text/javascript">
		$(document).ready(function(){
			$('#table').DataTable();
		});
	</script>
</html>