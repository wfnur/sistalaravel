<!DOCTYPE html>
<?php include "conn_rekap.php";?>
<?php
	require_once 'validator.php';
	require_once 'account.php'; 
?>
<html lang = "eng">
	<head>
		<title>SIMPOLBAN - Dosen</title>
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
						<li class="active"><a href = "dosen.php"><span class = "glyphicon glyphicon-user"></span> Dosen</a></li>
						<li><a href = "student.php"><span class = "glyphicon glyphicon-user"></span> Mahasiswa</a></li>
					</ul>
				</li>
			</ul>
			<br />
			<div class = "alert alert-info">Accounts / Dosen</div>
			<div class = "modal fade" id = "add_dosen" tabindex = "-1" role = "dialog" aria-labelledby = "myModallabel">
				<div class = "modal-dialog" role = "document">
					<div class = "modal-content panel-primary">
						<div class = "modal-header panel-heading">
							<button type = "button" class = "close" data-dismiss = "modal" aria-label = "Close"><span aria-hidden = "true">&times;</span></button>
							<h4 class = "modal-title" id = "myModallabel">Tambah dosen baru</h4>
						</div>
						<form method = "POST" action = "save_dosen_query.php" enctype = "multipart/form-data">
							<div class  = "modal-body">
								<div class = "form-group">
									<label>NIP:</label>
									<input type = "text" name = "nip" required = "required" class = "form-control" />
								</div>
								<div class = "form-group">
									<label>Nama Lengkap:</label>
									<input type = "text" name = "namalengkapdsn" required = "required" class = "form-control" />
								</div>
								<div class = "form-group">
									<label>Walikelas:</label>
									<select name="kelas_id" class= "form-control">
									<option value=" " selected="selected">Pilih Kelas</option>
									<?php 
			
									$query=mysql_query("select * from kelas order by nama_kelas asc",$koneksi);
			
									while($row=mysql_fetch_array($query))
									{
									?><option value="<?php  echo $row['kelas_id']; ?>"><?php  echo $row['nama_kelas']; ?></option><?php 
									}
									?>
									</select>
								</div>
								<div class = "form-group">
									<label>Prodi:</label>
										<select name="prodi_id" class= "form-control">
										<option value=" " selected="selected">Pilih Prodi</option>
										<?php 
			
										$query=mysql_query("select * from prodi order by prodi asc",$koneksi);
			
										while($row=mysql_fetch_array($query))
										{
											?><option value="<?php  echo $row['kode_prodi']; ?>"><?php  echo $row['prodi']; ?></option><?php 
										}
										?>
										</select>	
								</div>
								<div class = "form-group">
									<label>Gmail :</label>
									<input type = "text" name = "gmail" placeholder = "(Optional)" class = "form-control" />
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
				<button class = "btn btn-success" type = "button" href = "#" data-toggle = "modal" data-target = "#add_dosen"><span class = "glyphicon glyphicon-plus"></span> Tambah baru </button>
				<br />
				<br />
				<table id = "table" class = "table table-bordered">
					<thead class = "alert-info">
						<tr>
							<th>No</th>
							<th>NIP</th>
							<th>Nama Lengkap</th>
							<th>Walikelas</th>
							<th>Prodi</th>
							<th>Gmail</th>
							<th>Username</th>
							<th>Password</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$no=0;
							$q_dosen = $conn->query("SELECT * FROM `dosen`") or die(mysqli_error());
							while($f_dosen = $q_dosen->fetch_array()){
							$no++;
						?>
						<tr>
							<td><?php echo $no?></td>
							<td><?php echo $f_dosen['nip']?></td>
							<td><?php echo $f_dosen['namalengkapdsn']?></td>
							<td><?php echo $f_dosen['kelas_id']?></td>
							<td><?php echo $f_dosen['prodi_id']?></td>
							<td><?php echo $f_dosen['gmail']?></td>
							<td><?php echo $f_dosen['username']?></td>
							<td><?php echo $f_dosen['password']?></td>
							<td>
							<a onclick = "return confirm('Anda yakin?')" class = "btn btn-danger" href = "?stdid=<?php echo $f_dosen['dosen_id']?>" ><span class = "glyphicon glyphicon-remove"></span></a> 
							<a class = "btn btn-warning" href = "update_dosen_baru.php?dosen_id=<?php echo $f_dosen['dosen_id']?>" ><span class = "glyphicon glyphicon-edit"></span></a> 
							</td>
						</tr>
						<?php
							}
						if(isset($_GET['stdid'])){
							$stdid=$_GET['stdid'];
							$result = $conn->query("DELETE FROM `dosen` WHERE `dosen_id` = '$stdid'") or die(mysqli_error());
							if($result){
								?>
							<script>
								alert("Succes to delete data");
								window.location.href='dosen.php';
							</script>
							<?php
							}else{
								?>
							<script>
								alert("Fail to delete data");
								window.location.href='dosen.php';
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