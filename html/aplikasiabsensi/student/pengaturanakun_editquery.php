<?php
//EDIT STUDENT FORM
	require_once 'connect.php';
	$nim = $_POST['nim'];
	$namalengkapmhs = $_POST['namalengkapmhs'];
	$kelas_id = $_POST['kelas_id'];
	$prodi_id = $_POST['prodi_id'];
	$username = $_POST['username'];
	$password = $_POST['password'];
		$conn->query("UPDATE `student` SET `nim` = '$nim', `namalengkapmhs` = '$namalengkapmhs', `kelas_id` = '$kelas_id', `prodi_id` = '$prodi_id', `username` = '$username', `password` = '$password' WHERE `student_id` = '$_REQUEST[student_id]'") or die(mysqli_error());
		echo '
			<script type = "text/javascript">
				alert("Successfully Edited");
				window.location = "pengaturanakun.php";
			</script>
		';	