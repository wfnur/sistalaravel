<!DOCTYPE html>
<html>
<head>
 <title>Simple CRUD by suckittrees.com</title>
</head>
<body>
 <h2>Simple CRUD</h2>
 
 <p><a href="index.php">Beranda</a> / <a href="tambah.php">Tambah Data</a></p>
 
 <h3>Edit Data Siswa</h3>
 
 <?php
 //proses mengambil data ke database untuk ditampilkan di form edit berdasarkan siswa_id yg didapatkan dari GET id -> edit.php?id=siswa_id
 
 //include atau memasukkan file koneksi ke database
 include('connect.php');
 
	$student_id='4';
	$ok = $conn->query("SELECT * FROM `student` WHERE `student_id` = '$student_id' limit 0,1");
	$data = $ok->fetch_assoc();
 ?>
 
 <form action="zz.php" method="post">
  <input type="hidden" name="id" value="<?php echo $student_id; ?>"> <!-- membuat inputan hidden dan nilainya adalah siswa_id -->
  <table cellpadding="3" cellspacing="0">
   <tr>
    <td>id</td>
    <td>:</td>
    <td><input type="text" name="student_id" value="<?php echo $data['student_id']; ?>" required readonly></td> <!-- value diambil dari hasil query -->
   </tr>
   <tr>
    <td>UID</td>
    <td>:</td>
    <td><input type="text" name="uid" size="30" value="<?php echo $data['uid']; ?>" required></td> <!-- value diambil dari hasil query -->
   </tr>
   <tr>
    <td>NIM</td>
    <td>:</td>
    <td><input type="text" name="nim" size="30" value="<?php echo $data['nim']; ?>" required></td> <!-- value diambil dari hasil query -->
   </tr>
    <tr>
    <td>Nama</td>
    <td>:</td>
    <td><input type="text" name="namalengkapmhs" size="30" value="<?php echo $data['namalengkapmhs']; ?>" required></td> <!-- value diambil dari hasil query -->
   </tr>
    <tr>
    <td>Kelas</td>
    <td>:</td>
    <td><input type="text" name="kelas_id" size="30" value="<?php echo $data['kelas_id']; ?>" required></td> <!-- value diambil dari hasil query -->
   </tr>
    <tr>
    <td>Prodi</td>
    <td>:</td>
    <td><input type="text" name="prodi_id" size="30" value="<?php echo $data['prodi_id']; ?>" required></td> <!-- value diambil dari hasil query -->
   </tr>
    <tr>
    <td>Nip</td>
    <td>:</td>
    <td><input type="text" name="nip_walikelas" size="30" value="<?php echo $data['nip_walikelas']; ?>" required></td> <!-- value diambil dari hasil query -->
   </tr>
    <tr>
    <td>Username</td>
    <td>:</td>
    <td><input type="text" name="username" size="30" value="<?php echo $data['username']; ?>" required></td> <!-- value diambil dari hasil query -->
   </tr>
    <tr>
    <td>Password</td>
    <td>:</td>
    <td><input type="text" name="password" size="30" value="<?php echo $data['password']; ?>" required></td> <!-- value diambil dari hasil query -->
   </tr>
   
    <td>&nbsp;</td>
    <td></td>
    <td><input type="submit" name="simpan" value="Simpan"></td>
   </tr>
  </table>
 </form>
</body>
</html>