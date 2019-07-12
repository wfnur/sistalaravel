<?php
//EDIT presensi FORM bagian DATABASENYA
	require_once 'connect.php';
	$student_no = $_POST['student_no'];
	$student_name = $_POST['student_name'];
	$kelas_id = $_POST['kelas_id'];
	$time = $_POST['time'];
	$date = $_POST['date'];
	$keterangan = $_POST['keterangan'];
		$conn->query("UPDATE `time` SET `student_no` = '$student_no', `student_name` = '$student_name', `kelas` = '$kelas_id', `time` = '$time', `date` = '$date', `keterangan` = '$keterangan' WHERE `time_id` = '$_REQUEST[time_id]'") or die(mysqli_error());
		echo '
			<script type = "text/javascript">
				alert("Successfully Edited");
				window.location = "presensi.php";
			</script>
		';	