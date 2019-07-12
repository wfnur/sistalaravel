<?php
// VALIDASI AKUN
	session_start();
	if(!ISSET($_SESSION['dosen_id'])){
		header('location: index.php');
	}