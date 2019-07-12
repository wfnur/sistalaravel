<?php
//EDIT DOSEN FORM
	require_once 'connect.php';
	$nip = $_POST['nip'];
	$namalengkapdsn = $_POST['namalengkapdsn'];
	$kelas_id = $_POST['kelas_id'];
	$prodi_id = $_POST['prodi_id'];
	$gmail = $_POST['gmail'];
	$username = $_POST['username'];
	$password = $_POST['password'];
		$conn->query("UPDATE `dosen` SET `nip` = '$nip', `namalengkapdsn` = '$namalengkapdsn', `kelas_id` = '$kelas_id', `prodi_id` = '$prodi_id', `gmail`='$gmail', `username` = '$username', `password` = '$password' WHERE `dosen_id` = '$_REQUEST[dosen_id]'") or die(mysqli_error());
		echo '
			<script type = "text/javascript">
				alert("Successfully Edited");
				window.location = "dosen.php";
			</script>
		';	