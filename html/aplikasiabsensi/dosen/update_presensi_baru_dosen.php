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
	$time_id=$_GET['time_id'];
	$q_edit = $conn->query("SELECT * FROM `time` WHERE `time_id` = '$time_id'");
	$f_edit = $q_edit->fetch_assoc();
	if(isset($_POST['update'])){
		$time_id=$_POST['time_id'];
		$uid=$_POST['uid'];
		$student_no=$_POST['student_no'];
		$student_name=$_POST['student_name'];
		$kelas=$_POST['kelas'];
		$prodi=$_POST['prodi'];
		$time=$_POST['time'];
		$date=$_POST['date'];
		$pelaku=$_POST['pelaku'];
		$keterangan=$_POST['keterangan'];
		$result=$conn->query("UPDATE `time` SET `uid` = '$uid', `student_no` = '$student_no', `student_name` = '$student_name',`kelas` = '$kelas', `prodi` = '$prodi', `time` = '$time' , `date` = '$date', `pelaku` = '$pelaku' , `keterangan` = '$keterangan'WHERE `time_id` = '$time_id'");
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
			<label for="time_id">ID:</label>
			<input type = "text" id = "time_id"  name = "time_id" value = "<?php echo $f_edit['time_id']?>" class = "form-control" readonly>
		</div>
		<div class = "form-group">
			<label for="uid">UID:</label>
			<input readonly type = "text" id = "uid" name = "uid" value = "<?php echo $f_edit['uid']?>" class = "form-control" readonly />
		</div>
		<div class = "form-group">
			<label for="student_no">NIM:</label>
			<input type = "text" id = "student_no" name = "student_no" value = "<?php echo $f_edit['student_no']?>" class = "form-control" readonly />
		</div>
		<div class = "form-group">
			<label for="student_name">Nama Lengkap:</label>
			<input type = "text" id = "student_name"  name = "student_name" value = "<?php echo ($f_edit['student_name'])?>" class = "form-control" readonly />
		</div>
		<div class = "form-group">
			<label for="kelas">Kelas</label>
			<input type = "text" id = "kelas" name = "kelas" value = "<?php echo $f_edit['kelas']?>" class = "form-control" readonly />
		</div>
		<div class = "form-group">
			<label for="prodi">Prodi</label>
			<input type = "text" id = "prodi" name = "prodi" value = "<?php echo $f_edit['prodi']?>" class = "form-control" readonly />
		</div>
		<div class = "form-group">
			<label for="time">Waktu</label>
			<input type = "text" id = "time" name = "time" value = "<?php echo $f_edit['time']?>" class = "form-control" readonly />
		</div>
		<div class = "form-group">
			<label for="date">Tanggal</label>
			<input type = "text" id = "date" name = "date" value = "<?php echo $f_edit['date']?>" class = "form-control" readonly />
		</div>
		<div class = "form-group">
			<label for="pelaku">Oleh</label>
			<input type = "text" id = "pelaku" name = "pelaku" value = "<?php echo $f_edit['pelaku']?>" class = "form-control" readonly />
		</div>
		<div class = "form-group">
			<label>Keterangan</label>
			<div class = "form-group">
									<select name="keterangan" class = "form-control">
									<option value = "<?php echo $f_edit['keterangan']?>" selected>Sekarang :<?php echo $f_edit['keterangan']?> </option>
										<option value="Hadir">Hadir</option>
										<option value="Sakit">Sakit</option>
										<option value="Ijin">Ijin</option>
										<option value="Alfa">Alfa</option>
									</select>
								</div>
		</div>
	</div>
	<div class = "modal-footer">
		<button  type = "submit" class = "btn btn-primary"  name = "update" ><span class = "glyphicon glyphicon-edit"></span>Simpan</button>
		<a href = "presensi.php" type = "button" class = "btn btn-success" ><span class = "glyphicon glyphicon-success"></span>Kembali</a>
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