<?php function Connection()
{ 
$server="localhost"; 
$user="root"; $pass=""; 
$db="db_sars"; 
$connection = mysql_connect($server, $user, $pass); 
if (!$connection) { die('MySQL ERROR: ' . mysql_error()); } 
mysql_select_db($db) or die( 'MySQL ERROR: '. mysql_error() ); 
return $connection; 
} 

$link=Connection(); 
$uid=$_GET["uid"];
$q_uid =mysql_query("SELECT * FROM `student` WHERE `uid` = '$uid'",$link) or die(mysqli_error());
$v_uid = mysql_num_rows($q_uid);
	if($v_uid> 0){
	$time = date("G:i", strtotime("+5 HOURS"));
	$date = date("Y-m-d", strtotime("+5 HOURS"));
	$q_uid = mysql_query("SELECT * FROM `student` WHERE `uid` = '$uid'",$link) or die(mysqli_error());
	$f_uid = mysql_fetch_array($q_uid);
	$nim = $f_uid['nim']." "." ";
	$student_name = $f_uid['namalengkapmhs']." "." ";
	$student_kelas = $f_uid['kelas_id']." "." ";
	$student_prodi = $f_uid['prodi_id']." "." ";
	$link=mysql_query("INSERT INTO `time` VALUES('', '$uid', '$nim', '$student_name', '$student_kelas', '$student_prodi','$time', '$date','Mahasiswa', 'Hadir')") or die(mysqli_error());
	}
?>
