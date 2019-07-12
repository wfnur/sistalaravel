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
				<li><a href = "presensi.php"><span class = "glyphicon glyphicon-book"></span> Record</a></li>
				<li><a href = "rekap.php"><span class = "glyphicon glyphicon-book"></span> Rekap</a></li>
				<li class = "dropdown active">
					<a class = "dropdown-toggle" data-toggle = "dropdown" href = "#"><span class = "glyphicon glyphicon-cog"></span> Accounts <span class = "caret"></span></a>
					<ul class = "dropdown-menu">
						<li><a href = "admin.php"><span class = "glyphicon glyphicon-user"></span> Admin</a></li>
						<li><a href = "dosen.php"><span class = "glyphicon glyphicon-user"></span> Dosen</a></li>
						<li class="active"><a href = "student.php"><span class = "glyphicon glyphicon-user"></span> Mahasiswa</a></li>
					</ul>
				</li>
			</ul>
			<br />
			<div class = "alert alert-info">Accounts / Mahasiswa</div>
			<div class = "modal fade" id = "add_student" tabindex = "-1" role = "dialog" aria-labelledby = "myModallabel">
				<div class = "modal-dialog" role = "document">
					<div class = "modal-content panel-primary">
						<div class = "modal-header panel-heading">
							<button type = "button" class = "close" data-dismiss = "modal" aria-label = "Close"><span aria-hidden = "true">&times;</span></button>
							<h4 class = "modal-title" id = "myModallabel">Tambah mahasiswa baru</h4>
						</div>
						<form method = "POST" action = "save_student_query.php" enctype = "multipart/form-data">
							<div class  = "modal-body">
								<div class = "form-group">
									<label>UID:</label>
									<input type = "text" name = "uid" required = "required" class = "form-control" />
								</div>
								<div class = "form-group">
									<label>NIM:</label>
									<input type = "text" name = "nim" required = "required" class = "form-control" />
								</div>
								<div class = "form-group">
									<label>Nama Lengkap:</label>
									<input type = "text" name = "namalengkapmhs" required = "required" class = "form-control" />
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
									<label>Prodi:</label>
										<select name="prodi_id" class = "form-control">
										<option value="D3 Teknik Elektronika"selected>D3 Teknik Elektronika</option>
										<option value="D3 Teknik Listrik">D3 Teknik Listrik</option>
										<option value="D3 Teknik Telekomunikasi">D3 Teknik Telekomunikasi</option>
										<option value="D4 Teknik Telekomunikasi">D4 Teknik Telekomunikasi</option>
										<option value="D4 Teknik Elektronika">D4 Teknik Elektronika</option>
										<option value="D4 Teknik Otomasi Industri">D4 Teknik Otomasi Industri</option>
									</select>
								</div>
								<div class = "form-group">
									<label>NIP_Walikelas:</label>
									<input type = "text" name = "nip_walikelas" required = "required" class = "form-control" />
								</div>
								<div class = "form-group">
									<label>Username</label>
									<input type = "text" name = "username" required = "required" class = "form-control" />
								</div>
								<div class = "form-group">
									<label>Password</label>
									<input type = "text" name = "password" required = "required" class = "form-control" />
								</div>
							</div>
							<div class = "modal-footer">
								<button  class = "btn btn-primary" name = "save"><span class = "glyphicon glyphicon-save"></span> Save</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class = "well col-lg-12">
				<button class = "btn btn-success" type = "button" href = "#" data-toggle = "modal" data-target = "#add_student"><span class = "glyphicon glyphicon-plus"></span> Tambah Baru </button>
				<br />
				<br />
				<table id = "table" class = "table table-bordered">
					<thead class = "alert-info">
						<tr>
							<th>No</th>
							<th>UID</th>
							<th>NIM</th>
							<th>Nama Lengkap</th>
							<th>Kelas</th>
							<th>Prodi</th>
							<th>Walikelas</th>
							<th>Username</th>
							<th>Password</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$no=0;
							$q_student = $conn->query("SELECT * FROM `student`") or die(mysqli_error());
							while($f_student = $q_student->fetch_array()){
							$no++;
						?>
						<tr>
							<td><?php echo $no?></td>
							<td><?php echo $f_student['uid']?></td>
							<td><?php echo $f_student['nim']?></td>
							<td><?php echo $f_student['namalengkapmhs']?></td>
							<td><?php echo $f_student['kelas_id']?></td>
							<td><?php echo $f_student['prodi_id']?></td>
							<td><?php echo $f_student['nip_walikelas']?></td>
							<td><?php echo $f_student['username']?></td>
							<td><?php echo $f_student['password']?></td>
							<td>
							<a onclick = "return confirm('Anda yakin?')" class = "btn btn-danger" href = "?stdid=<?php echo $f_student['student_id']?>" ><span class = "glyphicon glyphicon-remove"></span></a> 
							<a class = "btn btn-warning" href = "update_mahasiswa_baru.php?student_id=<?php echo $f_student['student_id']?>" ><span class = "glyphicon glyphicon-edit"></span></a> 
							</td>
						</tr>
						<?php
							}
						if(isset($_GET['stdid'])){
							$stdid=$_GET['stdid'];
							$result = $conn->query("DELETE FROM `student` WHERE `student_id` = '$stdid'") or die(mysqli_error());
							if($result){
								?>
							<script>
								alert("Succes to delete data");
								window.location.href='student.php';
							</script>
							<?php
							}else{
								?>
							<script>
								alert("Fail to delete data");
								window.location.href='student.php';
							</script>
							<?php
							}
						}
						?>
					</tbody>
				</table>
			</div>
			<br />
			<br />	
			<br />	
		</div>
			<div class = "container-fluid">
				<label class = "pull-right">&copy; Fiqri Nurhadiansyah 2017</label></a>
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