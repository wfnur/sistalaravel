<?php
	require_once 'admin/connect.php';
	$student = $_POST['student'];
	$time = date("H:i", strtotime("+5 HOURS"));
	$date = date("Y-m-d", strtotime("+5 HOURS"));
	$q_student = $conn->query("SELECT * FROM `student` WHERE `nim` = '$student'") or die(mysqli_error());
	$f_student = $q_student->fetch_array();
	$uid = $f_student['uid']." "." ";
	$student_name = $f_student['namalengkapmhs']." "." ";
	$student_kelas = $f_student['kelas_id']." "." ";
	$prodi = $f_student['prodi_id']." "." ";
	$conn->query("INSERT INTO `time` VALUES('', '$uid', '$student', '$student_name', '$student_kelas','$prodi','$time', '$date','Mahasiswa', 'Hadir')") or die(mysqli_error());
	echo "<h3 class = 'text-muted'>".$student_name." <label class = 'text-info'>at  ".date("h:i a", strtotime($time))."</label></h3>";