<!DOCTYPE html>
<?php
	require_once 'validator.php';
	require_once 'account.php'; 
	require_once 'connect.php';
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
		</nav>
		<div class = "container-fluid">
			<br />
			<br />
			<br />
			<br />
			<div class = "col-lg-3"></div>
			<div class = "col-lg-6 well">
				<h2>Edit Baru</h2>
				<br />
					<div class = "form-group">
	<?php
	//proses input id wungkul
	$student_id=$_GET['student_id'];
	$q_edit_student = $conn->query("SELECT * FROM `student` WHERE `student_id` = '$student_id' limit 0,1");
	$f_edit_student = $q_edit_student->fetch_assoc();
	if(isset($_POST['update'])){
		$student_id=$_POST['student_id'];
		$uid=$_POST['uid'];
		$nim=$_POST['nim'];
		$namalengkapmhs=$_POST['namalengkapmhs'];
		$kelas_id=$_POST['kelas_id'];
		$prodi_id=$_POST['prodi_id'];
		$nip_walikelas=$_POST['nip_walikelas'];
		$username=$_POST['username'];
		$password=$_POST['password'];
		$result=$conn->query("UPDATE `student` SET `uid` = '$uid',`nim` = '$nim', `namalengkapmhs` = '$namalengkapmhs', `kelas_id` = '$kelas_id', `prodi_id` = '$prodi_id', `nip_walikelas` = '$nip_walikelas',`username` = '$username', `password` = '$password' WHERE `student_id` = '$student_id'");
		if($result){
	?>
	<div class="alert alert-success alert-dismissible"  role="alert">
<button type "button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
	<strong>SUCCESS!</strong> Update data, silahkan kembali.
	</div>
	<?php
		}else{
	?>
	<div class="alert alert-danger alert-dismissible"  role="alert">
<button type "button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
	<strong>FAILED!</strong> Update data, silahkan kembali.
	</div>
	<?php
		}
	}
	?>
<div>
<form method = "POST">
	<div class  = "modal-body">
		<div class = "form-group">
			<label for="student_id">ID:</label>
			<input type = "text" id = "studen_id"  name = "student_id" value = "<?php echo $f_edit_student['student_id']?>" class = "form-control" readonly>
		</div>
		<div class = "form-group">
			<label for="uid">UID:</label>
			<input type = "text" id = "uid" name = "uid" value = "<?php echo $f_edit_student['uid']?>" class = "form-control">
		</div>
		<div class = "form-group">
			<label for="nim">NIM:</label>
			<input type = "text" id = "nim" name = "nim" value = "<?php echo $f_edit_student['nim']?>" class = "form-control" />
		</div>
		<div class = "form-group">
			<label for="namalengkapmhs">Nama Lengkap:</label>
			<input type = "text" id = "namalengkapmhs" name = "namalengkapmhs" value = "<?php echo $f_edit_student['namalengkapmhs']?>" class = "form-control" />
		</div>
		<div class = "form-group">
			<label for="kelas_id">Kelas:</label>
			<input type = "text" id = "kelas_id" name = "kelas_id" value = "<?php echo $f_edit_student['kelas_id']?>" class = "form-control" />
		</div>
		<div class = "form-group">
			<label for="prodi_id">Prodi:</label>
			<input type = "text" id = "prodi_id" name = "prodi_id" value = "<?php echo ($f_edit_student['prodi_id'])?>" class = "form-control" />
		</div>
		<div class = "form-group">
			<label for="nip_walikelas">NIP Walikelas:</label>
			<input type = "text" id = "nip_walikelas"  name = "nip_walikelas" value = "<?php echo ($f_edit_student['nip_walikelas'])?>" class = "form-control" />
		</div>
		<div class = "form-group">
			<label for="username">Username</label>
			<input type = "text" id = "username" name = "username" value = "<?php echo $f_edit_student['username']?>" class = "form-control" />
		</div>
		<div class = "form-group">
			<label for="password">Password</label>
			<input type = "text" id = "password" name = "password" value = "<?php echo $f_edit_student['password']?>" class = "form-control" />
		</div>
	</div>
	<div class = "modal-footer">
		<button  type = "submit" class = "btn btn-primary"  name = "update" ><span class = "glyphicon glyphicon-edit"></span>Simpan</button>
		<a href = "student.php" type = "button" class = "btn btn-success" ><span class = "glyphicon glyphicon-success"></span>Kembali</a>
	</div>
</form>	
					</div>
				</form>
			</div>
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
</html>