<?php
// FORM BUAT presensi
	require_once 'connect.php';
	$q_edit_student = $conn->query("SELECT * FROM `time` WHERE `time_id` = '$_REQUEST[time_id]'") or die(mysqli_error());
	$f_edit_student = $q_edit_student->fetch_array();
?>
<form method = "POST" action = "edit_presensi_query.php?time_id=<?php echo $f_edit_student['time_id']?>" enctype = "multipart/form-data">
	<div class  = "modal-body">
		<div class = "form-group">
			<label>NIM:</label>
			<input type = "text" name = "student_no" value = "<?php echo $f_edit_student['student_no']?>" readonly required = "required" class = "form-control" />
		</div>
		<div class = "form-group">
			<label>Nama Mahasiswa:</label>
			<input type = "text" name = "student_name" value = "<?php echo $f_edit_student['student_name']?>" readonly required = "required" class = "form-control" />
		</div>
		<div class = "form-group">
			<label>Kelas:</label>
			<input type = "text" name = "kelas_id" value = "<?php echo $f_edit_student['kelas']?>" readonly required = "required" class = "form-control" />
		</div>
		<div class = "form-group">
			<label>Waktu:</label>
			<input type = "text" name = "time" value = "<?php echo $f_edit_student['time']?>" placeholder = "(Optional)" class = "form-control" />
		</div>
		<div class = "form-group">
			<label>Tanggal:</label>
			<input type = "text" name = "date" value = "<?php echo htmlentities($f_edit_student['date'])?>" required = "required" class = "form-control" />
		</div>
		<div class = "form-group">
			<label>Keterangan</label>
			<div class = "form-group">
									<select name="keterangan" class = "form-control">
									<option value = "<?php echo $f_edit_student['keterangan']?>" selected>Sekarang :<?php echo $f_edit_student['keterangan']?> </option>
										<option value="Hadir">Hadir</option>
										<option value="Sakit">Sakit</option>
										<option value="Ijin">Ijin</option>
										<option value="Alpha">Alpha</option>
									</select>
								</div>
		</div>
	</div>
	<div class = "modal-footer">
		<button  class = "btn btn-warning"  name = "edit_presensi"><span class = "glyphicon glyphicon-edit"></span> Save Changes</button>
	</div>
</form>	