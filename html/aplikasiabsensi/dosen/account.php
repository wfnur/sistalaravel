<?php
// AKUN ADMIN DAN STUDENT NANTI TAMBAH DOSEN
	require_once 'connect.php';
	require_once 'validator.php';
	$q_adminname = $conn->query("SELECT * FROM `dosen` WHERE `dosen_id` = '$_SESSION[dosen_id]'") or die(mysqli_error());
	$f_adminname = $q_adminname->fetch_array();
	$admin_name = $f_adminname['namalengkapdsn']." "." ";