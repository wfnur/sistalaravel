<?php
//mulai proses edit data
 include('connect.php');
//cek dahulu, jika tombol simpan di klik
if(isset($_POST['simpan'])){
 
 //inlcude atau memasukkan file koneksi ke database

 
 //jika tombol tambah benar di klik maka lanjut prosesnya
 $student_id   = $_POST['student_id']; //membuat variabel $id dan datanya dari inputan hidden id
 $uid  = $_POST['uid']; //membuat variabel $nim dan datanya dari inputan NIM
 $nim  = $_POST['nim']; //membuat variabel $nama dan datanya dari inputan Nama Lengkap
 $namalengkapmhs  = $_POST['namalengkapmhs']; //membuat variabel $kelas dan datanya dari inputan dropdown Kelas
 $kelas_id = $_POST['kelas_id']; //membuat variabel $jurusan dan datanya dari inputan dropdown Jurusan
 $prodi_id = $_POST['prodi_id']; //membuat variabel $jurusan dan datanya dari inputan dropdown Jurusan
 $nip_walikelas = $_POST['nip_walikelas']; //membuat variabel $jurusan dan datanya dari inputan dropdown Jurusan
 $username = $_POST['username']; //membuat variabel $jurusan dan datanya dari inputan dropdown Jurusan
 $password = $_POST['password']; //membuat variabel $jurusan dan datanya dari inputan dropdown Jurusan

 
 
 //melakukan query dengan perintah UPDATE untuk update data ke database dengan kondisi WHERE siswa_id='$id' <- diambil dari inputan hidden id
 $update = $conn->query("UPDATE student SET uid='$uid', nim='$nim', namalengkapmhs='$namalengkapmhs', kelas_id='$kelas_id', prodi_id='$prodi_id', nip_walikelas='$nip_walikelas', username='$username', password='$password' WHERE student_id='$student_id'") or die(mysql_error());
 
 //jika query update sukses
 if($update){
  
  echo 'Data berhasil di simpan! ';  //Pesan jika proses simpan sukses
  echo '<a href="edit.php?student_id='.$student_id.'">Kembali</a>'; //membuat Link untuk kembali ke halaman edit
  
 }else{
  
  echo 'Gagal menyimpan data! ';  //Pesan jika proses simpan gagal
  echo '<a href="edit.php?student_id='.$student_id.'">Kembali</a>'; //membuat Link untuk kembali ke halaman edit
  
 }

}else{ //jika tidak terdeteksi tombol simpan di klik

 //redirect atau dikembalikan ke halaman edit
 echo '<script>window.history.back()</script>';

}
?>