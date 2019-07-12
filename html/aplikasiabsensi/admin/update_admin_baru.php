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
	$admin_id=$_GET['admin_id'];
	$q_edit = $conn->query("SELECT * FROM `admin` WHERE `admin_id` = '$admin_id' limit 0,1");
	$f_edit = $q_edit->fetch_assoc();
	if(isset($_POST['update'])){
		$admin_id=$_POST['admin_id'];
		$nip=$_POST['nip'];
		$namalengkap=$_POST['namalengkap'];
		$email=$_POST['email'];
		$username=$_POST['username'];
		$password=$_POST['password'];
		$result=$conn->query("UPDATE `admin` SET `nip` = '$nip', `namalengkap` = '$namalengkap', `email` = '$email',`username` = '$username', `password` = '$password' WHERE `admin_id` = '$admin_id'");
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
			<label for="admin_id">ID:</label>
			<input type = "text" id = "admin_id"  name = "admin_id" value = "<?php echo $f_edit['admin_id']?>" class = "form-control" readonly>
		</div>
		<div class = "form-group">
			<label for="nip">NIP:</label>
			<input type = "text" id = "nip" name = "nip" value = "<?php echo $f_edit['nip']?>" class = "form-control" />
		</div>
		<div class = "form-group">
			<label for="namalengkap">Nama Lengkap:</label>
			<input type = "text" id = "namalengkapdsn" name = "namalengkap" value = "<?php echo $f_edit['namalengkap']?>" class = "form-control" />
		</div>
		<div class = "form-group">
			<label for="email">Email:</label>
			<input type = "text" id = "email"  name = "email" value = "<?php echo ($f_edit['email'])?>" class = "form-control" />
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
		<a href = "admin.php" type = "button" class = "btn btn-success" ><span class = "glyphicon glyphicon-success"></span>Kembali</a>
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