<!DOCTYPE html>
<?php
	require_once 'validator.php';
	require_once 'account.php'; 
?>
<html lang = "eng">
	<head>
		<title>SIMPOLBAN - presensi</title>
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
				<li class = "active"><a href = "presensi.php"><span class = "glyphicon glyphicon-book"></span> Record</a></li>
				<li><a href = "rekap.php"><span class = "glyphicon glyphicon-book"></span> Rekap</a></li>
				<li class = "dropdown">
					<a class = "dropdown-toggle" data-toggle = "dropdown" href = "#"><span class = "glyphicon glyphicon-cog"></span> Accounts <span class = "caret"></span></a>
					<ul class = "dropdown-menu">
						<li><a href = "admin.php"><span class = "glyphicon glyphicon-user"></span> Admin</a></li>
						<li><a href = "dosen.php"><span class = "glyphicon glyphicon-user"></span> Dosen</a></li>
						<li><a href = "student.php"><span class = "glyphicon glyphicon-user"></span> Mahasiswa</a></li>
					</ul>
				</li>
			</ul>
			<br />
			<div class = "alert alert-info">Record</div>
			<div class = "modal fade" id = "add_presensi" tabindex = "-1" role = "dialog" aria-labelledby = "myModallabel">
				<div class = "modal-dialog" role = "document">
					<div class = "modal-content panel-primary">
						<div class = "modal-header panel-heading">
							<button type = "button" class = "close" data-dismiss = "modal" aria-label = "Close"><span aria-hidden = "true">&times;</span></button>
							<h4 class = "modal-title" id = "myModallabel">Absen Mahasiswa</h4>
						</div>
						<form method = "POST" action = "save_presensi_query.php" enctype = "multipart/form-data">
							<div class  = "modal-body">
								<div class = "form-group">
									<label>NIM:</label>
									<input type = "text" name = "student_no" placeholder = "(NIM sesuai Absen)" required = "required" class = "form-control" />
								</div>
								<div class = "form-group">
									<label>Nama Mahasiswa:</label>
									<input type = "text" name = "student_name" placeholder = "(Nama Lengkap)" required = "required" class = "form-control" />
								</div>
								<div class = "form-group">
									<label>Kelas:</label>
									<select name="kelas_id" class = "form-control">
										<option value="1A"selected>1A</option>
										<option value="1B">1B</option>
										<option value="1C">1C</option>
										<option value="2A">2A</option>
										<option value="2B">2B</option>
										<option value="2C">2C</option>
										<option value="3A">3A</option>
										<option value="3B">3B</option>
										<option value="3C">3C</option>
										<option value="4C">4C</option>
									</select>
								</div>
								<div class = "form-group">
									<label>Waktu:</label>
									<input type = "text" name = "time" placeholder = "(hh:mm:ss)" class = "form-control" />
								</div>
								<div class = "form-group">
									<label>Tanggal:</label>
									<input type = "date" name = "date" placeholder = "(yyyy-mm-dd)" class = "form-control" />
								</div>
								<div class = "form-group">
									<label>Keterangan</label>
									<select name="keterangan" class = "form-control">
										<option value="Hadir"selected>Hadir</option>
										<option value="Sakit">Sakit</option>
										<option value="Ijin">Ijin</option>
										<option value="Alpha">Alpha</option>
									</select>
								</div>
							</div>
							<div class = "modal-footer">
								<button  class = "btn btn-primary" name = "save"><span class = "glyphicon glyphicon-save"></span> Save</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class = "modal fade" id = "delete" tabindex = "-1" role = "dialog" aria-labelledby = "myModallabel">
				<div class = "modal-dialog" role = "document">
					<div class = "modal-content ">
						<div class = "modal-body">
							<center><label class = "text-danger">Are you sure you want to delete this record?</label></center>
							<br />
							<center><a class = "btn btn-danger remove_id" ><span class = "glyphicon glyphicon-trash"></span> Yes</a> <button type = "button" class = "btn btn-warning" data-dismiss = "modal" aria-label = "No"><span class = "glyphicon glyphicon-remove"></span> No</button></center>
						</div>
					</div>
				</div>
			</div>
			<div class = "modal fade" id = "edit_presensi" tabindex = "-1" role = "dialog" aria-labelledby = "myModallabel">
				<div class = "modal-dialog" role = "document">
					<div class = "modal-content panel-warning">
						<div class = "modal-header panel-heading">
							<button type = "button" class = "close" data-dismiss = "modal" aria-label = "Close"><span aria-hidden = "true">&times;</span></button>
							<h4 class = "modal-title" id = "myModallabel">Edit Absensi</h4>
						</div>
						<div id = "edit_query"></div>
					</div>
				</div>
			</div>
			<div class = "well col-lg-12">
				<button class = "btn btn-success" type = "button" href = "#" data-toggle = "modal" data-target = "#add_presensi"><span class = "glyphicon glyphicon-plus"></span> Add new </button>
				<br />
				<br />
				<table id = "table" class = "table table-bordered">
					<thead class = "alert-info">
						<tr>
							<th>No</th>
							<th>NIM</th>
							<th>Nama Mahasiswa</th>
							<th>Kelas</th>
							<th>Waktu</th>
							<th>Tanggal</th>
							<th>Keterangan</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$no=0;
							$q_presensi = $conn->query("SELECT * FROM `time`") or die(mysqli_error());
							while($f_presensi = $q_presensi->fetch_array()){
							// $no itu untuk numbering automatis
							$no++;
						?>
						<tr>
							<td><?php echo $no?></td>
							<td><?php echo $f_presensi['student_no']?></td>
							<td><?php echo $f_presensi['student_name']?></td>
							<td><?php echo $f_presensi['kelas']?></td>
							<td><?php echo $f_presensi['time']?></td>
							<td><?php echo $f_presensi['date']?></td>
							<td><?php echo $f_presensi['keterangan']?></td>
							<td><a class = "btn btn-danger rtime_id" name = "<?php echo $f_presensi['time_id']?>" href = "#" data-toggle = "modal" data-target = "#delete"><span class = "glyphicon glyphicon-remove">Hapus</span></a> <a class = "btn btn-warning  etime_id" name = "<?php echo $f_presensi['time_id']?>" href = "#" data-toggle = "modal" data-target = "#edit_presensi"><span class = "glyphicon glyphicon-edit">Edit</span></a></td>
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
			$('.rtime_id').click(function(){
				$time_id = $(this).attr('name');
				$('.remove_id').click(function(){
					window.location = 'delete_presensi.php?time_id=' + $time_id;
				});
			});
			$('.etime_id').click(function(){
				$time_id = $(this).attr('name');
				$('#edit_query').load('load_edit3.php?time_id=' + $time_id);
			});
		});
	</script>
</html>