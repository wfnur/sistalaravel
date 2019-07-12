<!DOCTYPE html>
<?php
	require_once 'validator.php';
	require_once 'account.php'; 
?>
<html lang = "eng">
	<head>
		<title>SIMPOLBAN - Mahasiswa</title>
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
				<li><a href = "absensi.php"><span class = "glyphicon glyphicon-book"></span> Absensi</a></li>
				<li><a href = "presensi.php"><span class = "glyphicon glyphicon-book"></span> Record</a></li>
				<li><a href = "rekap.php"><span class = "glyphicon glyphicon-book"></span> Rekap</a></li>
				<li class = "active" class = "dropdown">
					<a class = "dropdown-toggle" data-toggle = "dropdown" href = "#"><span class = "glyphicon glyphicon-cog"></span> Setting <span class = "caret"></span></a>
					<ul class = "dropdown-menu">
						<li class = "active"><a href = "pengaturanakun.php"><span class = "glyphicon glyphicon-user"></span> Accounts </a></li>
					</ul>
				</li>
			</ul>
			<br />
			<div class = "alert alert-info">Setting/Accounts</div>
			<center><h2>Profil Dosen</h2></center></br>
			<div class = "modal fade" id = "edit_dosen" tabindex = "-1" role = "dialog" aria-labelledby = "myModallabel">
				<div class = "modal-dialog" role = "document">
					<div class = "modal-content panel-warning">
						<div class = "modal-header panel-heading">
							<button type = "button" class = "close" data-dismiss = "modal" aria-label = "Close"><span aria-hidden = "true">&times;</span></button>
							<h4 class = "modal-title" id = "myModallabel">Edit dosen</h4>
						</div>
						<div id = "edit_query"></div>
					</div>
				</div>
			</div>
			<div class = "well col-lg-12">
				<table id = "table" class = "table table-bordered">
					<thead class = "alert-info">
						<tr>
							<th>No</th>
							<th>NIP</th>
							<th>Nama Lengkap</th>
							<th>Walikelas</th>
							<th>Prodi</th>
							<th>Username</th>
							<th>Password</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$no=0;
							//Agar yang terlihat Session saja
							$q_dosen = $conn->query("SELECT * FROM `dosen` WHERE `dosen_id` = '$_SESSION[dosen_id]'") or die(mysqli_error());
							//Agar yang terlihat Session saja tutup
							while($f_dosen = $q_dosen->fetch_array()){
							$no++;
						?>
						<tr>
							<td><?php echo $no?></td>
							<td><?php echo $f_dosen['nip']?></td>
							<td><?php echo $f_dosen['namalengkapdsn']?></td>
							<td><?php echo $f_dosen['kelas_id']?></td>
							<td><?php echo $f_dosen['prodi_id']?></td>
							<td><?php echo $f_dosen['username']?></td>
							<td><?php echo $f_dosen['password']?></td>
							<td><a class = "btn btn-warning  edosen_id" name = "<?php echo $f_dosen['dosen_id']?>" href = "#" data-toggle = "modal" data-target = "#edit_dosen"><span class = "glyphicon glyphicon-edit">Edit</span></a></td>
						</tr>
						<?php
							}
						?>
					</tbody>
				</table>
			</div>
			<br />
			<br />	
			<br />	
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
			$('.rdosen_id').click(function(){
				$dosen_id = $(this).attr('name');
				$('.remove_id').click(function(){
					window.location = 'delete_dosen.php?dosen_id=' + $dosen_id;
				});
			});
			$('.edosen_id').click(function(){
				$dosen_id = $(this).attr('name');
				$('#edit_query').load('pengaturanakun_edit.php?dosen_id=' + $dosen_id);
			});
		});
	</script>
</html>