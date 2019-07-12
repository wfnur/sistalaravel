<?php
// AKUN ADMIN DAN STUDENT NANTI TAMBAH DOSEN
	require_once 'connect.php';
	$q_adminname = $conn->query("SELECT * FROM `admin` WHERE `admin_id` = '$_SESSION[admin_id]'") or die(mysqli_error());
	$f_adminname = $q_adminname->fetch_array();
	$admin_name = $f_adminname['namalengkap']." "." ";