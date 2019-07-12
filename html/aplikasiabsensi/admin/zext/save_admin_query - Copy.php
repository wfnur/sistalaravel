<?php
	require_once 'connect.php';
	if(ISSET($_POST['save'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$nip = $_POST['nip'];
		$namalengkap = $_POST['namalengkap'];
		$email = $_POST['email'];
		$q_checkadmin = $conn->query("SELECT * FROM `admin` WHERE `admin_id` = '$admin_id'") or die(mysqli_error());
		$v_checkadmin = $q_checkadmin->num_rows;
		if($v_checkadmin == 1){
			echo '
				<script type = "text/javascript">
					alert("Username already taken");
					window.location = "admin.php";
				</script>
			';
		}else{
			$conn->query("INSERT INTO `admin` VALUES('', '$username', '$password', '$nip', '$namalengkap', '$email')") or die(mysqli_error());
			echo '
				<script type = "text/javascript">
					alert("Saved Record");
					window.location = "admin.php";
				</script>
			';
		}
	}	