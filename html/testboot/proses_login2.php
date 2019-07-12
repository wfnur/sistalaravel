<?php
include"config.php";
@session_start();
$user=$_POST['username'];
$pass=md5($_POST['password']);
$pembanding=mysql_query("select * from data_dosen where kode_dosen='$user' 
and pass='$pass'");
$data=mysql_fetch_array($pembanding);
$status=$data['level'];
$nama=$data['nama'];
$jumlah=mysql_num_rows($pembanding);
if ($jumlah ==1) {
$_SESSION['username']=$user;
$_SESSION['status']=$status;
$_SESSION['nama']=$nama;
echo "<script>alert('selamat datang  $nama ');document.location.href='index.php';</script>";}
else{ echo "<script>alert('Maaf username atau password salah');
</script>";}
?>