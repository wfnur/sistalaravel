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
	$dosen_id=$_GET['dosen_id'];
	$q_edit = $conn->query("SELECT * FROM `dosen` WHERE `dosen_id` = '$dosen_id' limit 0,1");
	$f_edit = $q_edit->fetch_assoc();
	if(isset($_POST['update'])){
		$dosen_id=$_POST['dosen_id'];
		$nip=$_POST['nip'];
		$namalengkapdsn=$_POST['namalengkapdsn'];
		$kelas_id=$_POST['kelas_id'];
		$prodi_id=$_POST['prodi_id'];
		$gmail=$_POST['gmail'];
		$username=$_POST['username'];
		$password=$_POST['password'];
		$result=$conn->query("UPDATE `dosen` SET `nip` = '$nip', `namalengkapdsn` = '$namalengkapdsn', `kelas_id` = '$kelas_id', `prodi_id` = '$prodi_id', `gmail` = '$gmail',`username` = '$username', `password` = '$password' WHERE `dosen_id` = '$dosen_id'");
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
			<label for="dosen_id">ID:</label>
			<input type = "text" id = "dosen_id"  name = "dosen_id" value = "<?php echo $f_edit['dosen_id']?>" class = "form-control" readonly>
		</div>
		<div class = "form-group">
			<label for="nip">NIP:</label>
			<input type = "text" id = "nip" name = "nip" value = "<?php echo $f_edit['nip']?>" class = "form-control" />
		</div>
		<div class = "form-group">
			<label for="namalengkapdsn">Nama Lengkap:</label>
			<input type = "text" id = "namalengkapdsn" name = "namalengkapdsn" value = "<?php echo $f_edit['namalengkapdsn']?>" class = "form-control" />
		</div>
		<div class = "form-group">
			<label for="kelas_id">Walikelas:</label>
			<input type = "text" id = "kelas_id" name = "kelas_id" value = "<?php echo $f_edit['kelas_id']?>" class = "form-control" />
		</div>
		<div class = "form-group">
			<label for="prodi_id">Prodi:</label>
			<input type = "text" id = "prodi_id" name = "prodi_id" value = "<?php echo ($f_edit['prodi_id'])?>" class = "form-control" />
		</div>
		<div class = "form-group">
			<label for="gmail">Gmail:</label>
			<input type = "text" id = "gmail"  name = "gmail" value = "<?php echo ($f_edit['gmail'])?>" class = "form-control" />
		</div>
		<div class = "form-group">
			<label for="username">Username</label>
			<input type = "text" id = "username" name = "username" value = "<?php echo $f_edit['username']?>" class = "form-control" />
		</div>
		<div class = "form-group">
			<label for="password">Password</label>
			<input type = "text" id = "password" name = "password" value = "<?php echo $f_edit['password']?>" class = "form-control" />
		</div>
	</div>
	<div class = "modal-footer">
		<button  type = "submit" class = "btn btn-primary"  name = "update" ><span class = "glyphicon glyphicon-edit"></span>Simpan</button>
		<a href = "dosen.php" type = "button" class = "btn btn-success" ><span class = "glyphicon glyphicon-success"></span>Kembali</a>
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