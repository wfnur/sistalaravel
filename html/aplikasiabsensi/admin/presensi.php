<!DOCTYPE html>
<?php include "conn_rekap.php";?>
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
			<center><h2>Record Data Presensi Mahasiswa</h2></center></br>
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
									<label>UID:</label>
									<input type = "text" name = "uid" placeholder = "(UID mahasiswa)" required = "required" class = "form-control" />
								</div>
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
										<select name="prodi_id" class = "form-control">
										<option value=" " selected="selected">Pilih Prodi</option>
			<?php 
			
			$query=mysql_query("select * from prodi order by prodi asc",$koneksi);
			
			while($row=mysql_fetch_array($query))
			{
				?><option value="<?php  echo $row['prodi_id']; ?>"><?php  echo $row['prodi']; ?></option><?php 
			}
			?>
			</select>	
								</div>
								<div class = "form-group">
									<label>Waktu:</label>
									<input type = "text" name = "time" placeholder = "(Jam:Menit)" class = "form-control" />
								</div>
								<div class = "form-group">
									<label>Tanggal:</label>
									<input type = "date" name = "date" placeholder = "(yyyy-mm-dd)" class = "form-control" />
								</div>
								<div class = "form-group">
									<label>Oleh:</label>
									<input type = "text" name = "oleh"  placeholder = "(Sesuai yang melakukan)" class = "form-control" />
								</div>
								<div class = "form-group">
									<label>Keterangan</label>
									<select name="keterangan" class = "form-control">
										<option value="Hadir"selected>Hadir</option>
										<option value="Sakit">Sakit</option>
										<option value="Ijin">Ijin</option>
										<option value="Alpha">Alfa</option>
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
			<div class = "well col-lg-12">
				<button class = "btn btn-success" type = "button" href = "#" data-toggle = "modal" data-target = "#add_presensi"><span class = "glyphicon glyphicon-plus"></span> Tambah Manual </button>
				<br />
				<br />
				<table id = "table" class = "table table-bordered">
					<thead class = "alert-info">
						<tr>
							<th>No</th>
							<th>NIM</th>
							<th>Nama Mahasiswa</th>
							<th>Kelas</th>
							<th>Prodi</th>
							<th>Waktu</th>
							<th>Tanggal</th>
							<th>Oleh</th>
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
							<td><?php echo $f_presensi['prodi']?></td>
							<td><?php echo date("G:i", strtotime($f_presensi['time']))?></td>
							<td><?php echo date("d-m-Y", strtotime($f_presensi['date']))?></td>
							<td><?php echo $f_presensi['pelaku']?></td>
							<td><?php echo $f_presensi['keterangan']?></td>

							<td>
							<a onclick = "return confirm('Anda yakin?')" class = "btn btn-danger" href = "?stdid=<?php echo $f_presensi['time_id']?>" ><span class = "glyphicon glyphicon-remove">Hapus</span></a> 
							<a class = "btn btn-warning" href = "update_presensi_baru.php?time_id=<?php echo $f_presensi['time_id']?>" ><span class = "glyphicon glyphicon-edit">Edit</span></a> 
							</td>
							</tr>
						<?php
							}
							if(isset($_GET['stdid'])){
							$stdid=$_GET['stdid'];
							$result = $conn->query("DELETE FROM `time` WHERE `time_id` = '$stdid'") or die(mysqli_error());
							if($result){
								?>
							<script>
								alert("Succes to delete data");
								window.location.href='presensi.php';
							</script>
							<?php
							}else{
								?>
							<script>
								alert("Fail to delete data");
								window.location.href='presensi.php';
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