<?php
// FORM BUAT dosen
	require_once 'connect.php';
	$q_edit_student = $conn->query("SELECT * FROM `dosen` WHERE `dosen_id` = '$_REQUEST[dosen_id]'") or die(mysqli_error());
	$f_edit_student = $q_edit_student->fetch_array();
?>
<form method = "POST" action = "edit_dosen_query.php?dosen_id=<?php echo $f_edit_student['dosen_id']?>" enctype = "multipart/form-data">
	<div class  = "modal-body">
		<div class = "form-group">
			<label>NIP:</label>
			<input type = "text" name = "nip" value = "<?php echo $f_edit_student['nip']?>" required = "required" class = "form-control" />
		</div>
		<div class = "form-group">
			<label>Nama Lengkap:</label>
			<input type = "text" name = "namalengkapdsn" value = "<?php echo $f_edit_student['namalengkapdsn']?>" required = "required" class = "form-control" />
		</div>
		<div class = "form-group">
			<label>Walikelas:</label>
			<input type = "text" name = "kelas_id" value = "<?php echo $f_edit_student['kelas_id']?>" placeholder = "(Optional)" class = "form-control" />
		</div>
		<div class = "form-group">
			<label>Prodi:</label>
			<input type = "text" name = "prodi_id" value = "<?php echo htmlentities($f_edit_student['prodi_id'])?>" required = "required" class = "form-control" />
		</div>
		<div class = "form-group">
			<label>Gmail :</label>
			<input type = "text" name = "gmail" placeholder = "(Optional)" class = "form-control" />
		</div>
		<div class = "form-group">
			<label>Username</label>
			<input type = "text" name = "username" value = "<?php echo $f_edit_student['username']?>" name = "course" required = "required" class = "form-control" />
		</div>
		<div class = "form-group">
			<label>Password</label>
			<input type = "text" name = "password" required = "required" value = "<?php echo $f_edit_student['password']?>" class = "form-control" />
		</div>
	</div>
	<div class = "modal-footer">
		<button  class = "btn btn-warning"  name = "edit_dosen"><span class = "glyphicon glyphicon-edit"></span> Save Changes</button>
	</div>
</form>	