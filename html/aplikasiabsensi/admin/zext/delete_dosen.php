<?php
	require_once 'connect.php';
	$conn->query("DELETE FROM `dosen` WHERE `dosen_id` = '$_REQUEST[dosen_id]'") or die(mysqli_error());
	header('location:dosen.php');