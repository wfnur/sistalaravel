<?php
// FORM BUAT dosen
	require_once 'connect.php';
	$q_edit_dosen = $conn->query("SELECT * FROM `dosen` WHERE `dosen_id` = '$_REQUEST[dosen_id]'") or die(mysqli_error());
	$f_edit_dosen = $q_edit_dosen->fetch_array();
?>
<form method = "POST" action = "pengaturanakun_editquery.php?dosen_id=<?php echo $f_edit_dosen['dosen_id']?>" enctype = "multipart/form-data">
	<div class  = "modal-body">
		<div class = "form-group">
			<label>NIP:</label>
			<input type = "text" name = "nip" value = "<?php echo $f_edit_dosen['nip']?>" required = "required" class = "form-control" readonly />
		</div>
		<div class = "form-group">
			<label>Nama Lengkap:</label>
			<input type = "text" name = "namalengkapdsn" value = "<?php echo $f_edit_dosen['namalengkapdsn']?>" required = "required" class = "form-control" />
		</div>
		<div class = "form-group">
			<label>Walikelas:</label>
			<input type = "text" name = "kelas_id" value = "<?php echo $f_edit_dosen['kelas_id']?>" placeholder = "(Optional)" class = "form-control" readonly />
		</div>
		<div class = "form-group">
			<label>Prodi:</label>
			<input type = "text" name = "prodi_id" value = "<?php echo htmlentities($f_edit_dosen['prodi_id'])?>" required = "required" class = "form-control"  readonly />
		</div>
		<div class = "form-group">
			<label>Username</label>
			<input type = "text" name = "username" value = "<?php echo $f_edit_dosen['username']?>" name = "course" required = "required" class = "form-control" />
		</div>
		<div class = "form-group">
			<label>Password</label>
			<input type = "text" name = "password" required = "required" value = "<?php echo $f_edit_dosen['password']?>" class = "form-control" />
		</div>
	</div>
	<div class = "modal-footer">
		<button  class = "btn btn-warning"  name = "edit_admin"><span class = "glyphicon glyphicon-edit"></span> Save Changes</button>
	</div>
</form>	