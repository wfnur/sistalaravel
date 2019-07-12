<!DOCTYPE html>
<?php
	require_once 'validator.php';
	require_once 'account.php'; 
?>
<html lang = "eng">
	<head>
		<title>Record Data</title>
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
				<li class = "active"><a href = "record.php"><span class = "glyphicon glyphicon-book"></span> Record</a></li>
				<li><a href = "rekap.php"><span class = "glyphicon glyphicon-book"></span> Rekap</a></li>
			<li class = "dropdown">
					<a class = "dropdown-toggle" data-toggle = "dropdown" href = "#"><span class = "glyphicon glyphicon-cog"></span> Setting <span class = "caret"></span></a>
					<ul class = "dropdown-menu">
						<li><a href = "pengaturanakun.php"><span class = "glyphicon glyphicon-user"></span> Accounts</a></li>
					</ul>
				</li>
			</ul>
			<br />
			<div class = "alert alert-info">Record</div>
			<center><h2>Record Data Presensi Mahasiswa</h2></center></br>
			<div class = "well col-lg-12">
				<table id = "table" class = "table table-bordered">
					<thead class = "alert-info">
						<tr>
							<th>No</th>
							<th>NIM</th>
							<th>Nama Mahasiswa</th>
							<th>Kelas</th>
							<th>Prodi</th>
							<th>Waktu</th>
							<th>Tanggal</th>
							<th>Oleh</th>
							<th>Keterangan</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$no=0;
						$q_time = $conn->query("SELECT * FROM `time`") or die(mysqli_error());
						while($f_time = $q_time->fetch_array()){
						// $no itu untuk numbering automatis
						$no++;
							
					?>	
						<tr>
							<td><?php echo $no?></td>
							<td><?php echo $f_time['student_no']?></td>
							<td><?php echo $f_time['student_name']?></td>
							<td><?php echo $f_time['kelas']?></td>
							<td><?php echo $f_time['prodi']?></td>
							<td><?php echo date("G:i", strtotime($f_time['time']))?></td>
							<td><?php echo date("d-m-Y", strtotime($f_time['date']))?></td>
							<td><?php echo $f_time['pelaku']?></td>
							<td><?php echo $f_time['keterangan']?></td>
						</tr>
					<?php
						}
					?>	
					</tbody>
				</table>
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
	<script type = "text/javascript">
		$(document).ready(function(){
			$('.rtime_id').click(function(){
				$time_id = $(this).attr('name');
				$('.remove_id').click(function(){
					window.location = 'delete_time.php?time_id=' + $time_id;
				});
			});
		});
	</script>
</html>