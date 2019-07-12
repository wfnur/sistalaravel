<!DOCTYPE html>
<html lang = "eng">
	<head>
		<meta charset = "utf-8" />
		<title>SIMPOLBAN - Presensi Mahasiswa Jurusan Elektro POLBAN</title>
		<meta name = "viewport" content = "width=device-width, initial-scale=1" />
		<link rel = "stylesheet" type = "text/css" href = "css/bootstrap.css"/>
	</head>
	<body class = "alert-info">
		<nav class = "navbar navbar-inverse navbar-fixed-top">
			<div class = "container-fluid">
				<div class = "navbar-header">
					<img src = "admin/images/logo.png" width = "200px" height = "auto"/>
					<p class = "navbar-text pull-right">Politeknik Negeri Bandung</p>
				</div>
				<ul class = "nav navbar-nav navbar-right">
					<li class = "dropdown">
						<a href = "#" class = "dropdown-toggle" data-toggle = "dropdown"><i class = "glyphicon glyphicon-user"></i>Login<b class = "caret"></b></a>
						<ul class = "dropdown-menu">
							<li><a href = "../aplikasiabsensi/admin/"><i class = "glyphicon glyphicon-user"></i>Admin</a></li>
							<li><a href = "../aplikasiabsensi/dosen/"><i class = "glyphicon glyphicon-user"></i>Dosen</a></li>
							<li><a href = "../aplikasiabsensi/student/"><i class = "glyphicon glyphicon-user"></i>Mahasiswa</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</nav>
		<div class = "container-fluid">
			<br />
			<br />
			<br />
			<br />
			<div class = "col-lg-3"></div>
			<div class = "col-lg-6 well">
				<center><h2>Selamat Datang Di Website</h2></center>
				<br />
				<div id = "result"></div>
				<form enctype = "multipart/form-data">
					<div class = "form-group">
				<center><a href = "index_absen.php"><img src = "images/logohome.png"/></center></a>
					</div>
				</form>
			</div>
		</div>
		<div class = "col-lg-3"></div>
					<div>
					<center>Pilihan login ada disebelah pojok kanan atas</center>
					</div>
	</body>
	<script src = "js/jquery.js"></script>
	<script src = "js/bootstrap.js"></script>
	<script src = "js/login.js"></script>
</html>