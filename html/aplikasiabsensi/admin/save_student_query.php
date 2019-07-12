<?php
	require_once 'connect.php';
	if(ISSET($_POST['save'])){
		$uid = $_POST['uid'];
		$nim = $_POST['nim'];
		$namalengkapmhs = $_POST['namalengkapmhs'];
		$kelas_id = $_POST['kelas_id'];
		$prodi_id = $_POST['prodi_id'];
		$nip_walikelas = $_POST['nip_walikelas'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$conn->query("INSERT INTO `student` VALUES('','$uid', '$nim','$namalengkapmhs', '$kelas_id', '$prodi_id', '$nip_walikelas', '$username', '$password')") or die(mysqli_error());
			echo '
				<script type = "text/javascript">
					alert("Saved Record");
					window.location = "student.php";
				</script>
			';
	}	