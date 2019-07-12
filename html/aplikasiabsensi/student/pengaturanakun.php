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
				<li><a href = "record.php"><span class = "glyphicon glyphicon-book"></span> Record</a></li>
				<li><a href = "rekap.php"><span class = "glyphicon glyphicon-book"></span> Rekap</a></li>
				<li class = "dropdown active">
					<a class = "dropdown-toggle" data-toggle = "dropdown" href = "#"><span class = "glyphicon glyphicon-cog"></span> Setting <span class = "caret"></span></a>
					<ul class = "dropdown-menu">
						<li class = "active"><a href = "pengaturanakun.php"><span class = "glyphicon glyphicon-user"></span> Accounts</a></li>
					</ul>
				</li>
			</ul>
			<br />
			<div class = "alert alert-info">Accounts / Student</div>
						<center><h2>Profil Mahasiswa</h2></center></br>
			<div class = "modal fade" id = "edit_student" tabindex = "-1" role = "dialog" aria-labelledby = "myModallabel">
				<div class = "modal-dialog" role = "document">
					<div class = "modal-content panel-warning">
						<div class = "modal-header panel-heading">
							<button type = "button" class = "close" data-dismiss = "modal" aria-label = "Close"><span aria-hidden = "true">&times;</span></button>
							<h4 class = "modal-title" id = "myModallabel">Edit mahasiswa</h4>
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
							<th>NIM</th>
							<th>Nama Lengkap</th>
							<th>Kelas</th>
							<th>Prodi</th>
							<th>Username</th>
							<th>Password</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$no=0;
							$q_student = $conn->query("SELECT * FROM `student` WHERE `student_id` = '$_SESSION[student_id]'") or die(mysqli_error());
							while($f_student = $q_student->fetch_array()){
							$no++;
						?>
						<tr>
							<td><?php echo $no?></td>
							<td><?php echo $f_student['nim']?></td>
							<td><?php echo $f_student['namalengkapmhs']?></td>
							<td><?php echo $f_student['kelas_id']?></td>
							<td><?php echo $f_student['prodi_id']?></td>
							<td><?php echo $f_student['username']?></td>
							<td><?php echo $f_student['password']?></td>
							<td><a class = "btn btn-warning  estudent_id" name = "<?php echo $f_student['student_id']?>" href = "#" data-toggle = "modal" data-target = "#edit_student"><span class = "glyphicon glyphicon-edit">Edit</span></a></td>
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
			$('.rstudent_id').click(function(){
				$student_id = $(this).attr('name');
				$('.remove_id').click(function(){
					window.location = 'delete_student.php?student_id=' + $student_id;
				});
			});
			$('.estudent_id').click(function(){
				$student_id = $(this).attr('name');
				$('#edit_query').load('pengaturanakun_edit.php?student_id=' + $student_id);
			});
		});
	</script>
</html>