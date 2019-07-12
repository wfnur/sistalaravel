<!DOCTYPE html>
<?php
	require_once 'validator.php';
	require_once 'account.php'; 
?>
<html lang = "eng">
	<head>
		<title>SIMPOLBAN - Admin</title>
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
						<li class = "active" ><a href = "admin.php"><span class = "glyphicon glyphicon-user"></span> Admin</a></li>
						<li><a href = "dosen.php"><span class = "glyphicon glyphicon-user"></span> Dosen</a></li>
						<li><a href = "student.php"><span class = "glyphicon glyphicon-user"></span> Mahasiswa</a></li>
					</ul>
				</li>
			</ul>
			<br />
			<div class = "modal fade" id = "myModal" tabindex = "-1" role = "dialog" aria-labelledby = "myModallabel">
				<div class = "modal-dialog" role = "document">
					<div class = "modal-content panel-primary">
						<div class = "modal-header panel-heading">
							<button type = "button" class = "close" data-dismiss = "modal" aria-label = "Close"><span aria-hidden = "true">&times;</span></button>
							<h4 class = "modal-title" id = "myModallabel">Tambah admin baru</h4>
						</div>
						<form method = "POST" action = "save_admin_query.php" enctype = "multipart/form-data">
							<div class  = "modal-body">
								<div class = "form-group">
									<label>NIP:</label>
									<input type = "text" name = "nip" required = "required" placeholder = "(Nomor Induk Pekerja)" class = "form-control" />
								</div>
								<div class = "form-group">
									<label>Nama Lengkap:</label>
									<input type = "text"  name = "namalengkap" placeholder = "(Nama Lengkap)" class = "form-control" />
								</div>
								<div class = "form-group">
									<label>Email:</label>
									<input type = "text" name = "email" required = "required" placeholder = "(Email)" class = "form-control" />
								</div>
								<div class = "form-group">
									<label>Username:</label>
									<input type = "text" required = "required" name = "username" class = "form-control" />
								</div>
								<div class = "form-group">
									<label>Password:</label>
									<input type = "password" maxlength = "12" required = "required" name = "password" class = "form-control" />
								</div>
							</div>
							<div class = "modal-footer">
								<button  class = "btn btn-primary" name = "save"><span class = "glyphicon glyphicon-save"></span> Save</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class = "alert alert-info">Accounts / Admin</div>
			<div class = "well col-lg-12">
				<button type = "button" class = "btn btn-success" data-target = "#myModal" data-toggle = "modal"><span class = "glyphicon glyphicon-plus"></span> Tambah baru</button>
				<br />
				<br />
				<table id = "table" class = "table table-bordered">
					<thead>
						<tr class = "alert-info">
							<th>No</th>
							<th>NIP</th>
							<th>Nama Lengkap</th>
							<th>Email</th>
							<th>Username</th>
							<th>Password</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$no=0;
						$q_admin = $conn->query("SELECT * FROM `admin`") or die(mysqli_error());
						while($f_admin = $q_admin->fetch_array()){
						$no++;
					?>	
						<tr>
							<td><?php echo $no?></td>
							<td><?php echo $f_admin['nip']?></td>
							<td><?php echo $f_admin['namalengkap']?></td>
							<td><?php echo $f_admin['email']?></td>
							<td><?php echo $f_admin['username']?></td>
							<td><?php echo md5($f_admin['password'])?></td>
							<td>
							<a onclick = "return confirm('Anda yakin?')" class = "btn btn-danger" href = "?stdid=<?php echo $f_admin['admin_id']?>" ><span class = "glyphicon glyphicon-remove"></span></a> 
							<a class = "btn btn-warning" href = "update_admin_baru.php?admin_id=<?php echo $f_admin['admin_id']?>" ><span class = "glyphicon glyphicon-edit"></span></a> 
							</td>
						</tr>
					<?php
							}
						if(isset($_GET['stdid'])){
							$stdid=$_GET['stdid'];
							$result = $conn->query("DELETE FROM `admin` WHERE `admin_id` = '$stdid'") or die(mysqli_error());
							if($result){
								?>
							<script>
								alert("Succes to delete data");
								window.location.href='admin.php';
							</script>
							<?php
							}else{
								?>
							<script>
								alert("Fail to delete data");
								window.location.href='admin.php';
							</script>
							<?php
							}
						}
						?>
					</tbody>
				</table>
			<br />
			<br />	
			<br />		
			</div>
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