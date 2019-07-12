<?php
	session_start();
	session_unset('student_id');
	header('location:index.php');