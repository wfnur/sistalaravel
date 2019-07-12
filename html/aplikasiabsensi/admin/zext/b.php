<!DOCTYPE html>
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
				<div id = "result"></div>
				<form enctype = "multipart/form-data">
					<div class = "form-group">
	<?php
	//proses input id wungkul
	$id='14';
	$mysqli=new mysqli('localhost','root','','test');
	$query = $mysqli->query("SELECT * FROM `sensor` WHERE `id` = '$id' limit 0,1");
	$row = $query->fetch_assoc();
	if(isset($_POST['update'])){
		$a1=$_POST['ab'];
		$ac=$_POST['ac'];
		$ad=$_POST['ad'];
		$ok=$mysqli->query("UPDATE sensor SET value='$ad' WHERE id='$a1'");
		if($ok){
	?>
	<div class="alert alert-success alert-dismissible"  role="alert">
<button type "button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
	<strong>SUCCES!</strong> OK masbro.
	</div>
	<?php
		}else{
	?>
	<div class="alert alert-danger alert-dismissible"  role="alert">
<button type "button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
	<strong>FAILED!</strong> SEDIH masbro.
	</div>
	<?php
		}
	}
	?>
<form method = "POST">
	<div class  = "modal-body">
		<div class = "form-group">
			<label for="ab">ID:</label>
			<input type = "text" id = "ab"  name = "ab" value = "<?php echo $row['id']?>" class = "form-control" readonly>
		</div>
		<div class = "form-group">
			<label for="ac">waktu:</label>
			<input type = "text" id = "ac" name = "ac" value = "<?php echo $row['time']?>" class = "form-control" readonly>
		</div>
		<div class = "form-group">
			<label for="ad">value:</label>
			<input type = "text" id = "ad" name = "ad" value = "<?php echo $row['value']?>" class = "form-control" />
		</div>
		<button type="submit" name="update" class="btn btn-primary"> OK</button>
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