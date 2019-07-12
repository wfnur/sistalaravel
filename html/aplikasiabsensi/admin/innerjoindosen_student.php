<?php
// konek
	require_once 'validator.php';
	require_once 'account.php'; 
$db_con = mysqli_connect ("localhost","root","","db_sars");
if (!$db_con){
	die(mysqli_connect_error() );
}
//query list
$gmail_dosen = "";
$pilihakun = "SELECT student.namalengkapmhs dosen.namalengkapdsn FROM student JOIN dosen ON dosen.nip = student.nip_walikelas ORDER BY student.namalengkapmhs ASC";
//cpeci
$gmail = mysqli_query($db_con,$pilihakun)or die (mysqli_error($db_con));
while($row=mysqli_fetch_array($gmail, MYSQLI_ASSOC)){
	$gmail_dosen=$row["namalengkapdsn"];
}
/// cloes sonen
mysqli_close($db_con);
echo $gmail_dosen;
echo $admin_name;
?>