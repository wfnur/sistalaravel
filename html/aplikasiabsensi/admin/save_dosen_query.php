<?php
	require_once 'connect.php';
	if(ISSET($_POST['save'])){
		$nip = $_POST['nip'];
		$namalengkapdsn = $_POST['namalengkapdsn'];
		$kelas_id = $_POST['kelas_id'];
		$prodi_id = $_POST['prodi_id'];
		$gmail = $_POST['gmail'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$conn->query("INSERT INTO `dosen` VALUES('', '$nip','$namalengkapdsn', '$kelas_id', '$prodi_id', '$gmail','$username', '$password')") or die(mysqli_error());
			echo '
				<script type = "text/javascript">
					alert("Saved Record");
					window.location = "dosen.php";
				</script>
			';
	}	