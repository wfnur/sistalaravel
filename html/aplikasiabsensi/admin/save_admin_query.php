<?php
	require_once 'connect.php';
	if(ISSET($_POST['save'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$nip = $_POST['nip'];
		$namalengkap = $_POST['namalengkap'];
		$email = $_POST['email'];
		$conn->query("INSERT INTO `admin` VALUES('', '$username', '$password', '$nip', '$namalengkap', '$email')") or die(mysqli_error());
			echo '
				<script type = "text/javascript">
					alert("Saved Record");
					window.location = "admin.php";
				</script>
			';
	}	