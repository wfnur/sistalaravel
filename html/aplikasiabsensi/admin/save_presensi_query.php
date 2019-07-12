<?php
	require_once 'connect.php';
	if(ISSET($_POST['save'])){
		$uid= $_POST['uid'];
		$student_no = $_POST['student_no'];
		$student_name = $_POST['student_name'];
		$kelas_id = $_POST['kelas_id'];
		$prodi_id = $_POST['prodi_id'];
		$time = $_POST['time'];
		$date = $_POST['date'];
		$oleh = $_POST['oleh'];
		$keterangan = $_POST['keterangan'];
		$conn->query("INSERT INTO `time` VALUES('','$uid','$student_no','$student_name', '$kelas_id','$prodi_id','$time', '$date', '$oleh','$keterangan')") or die(mysqli_error());
			echo '
				<script type = "text/javascript">
					alert("Saved presensi");
					window.location = "presensi.php";
				</script>
			';
	}	