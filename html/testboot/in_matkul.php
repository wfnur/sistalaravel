
<head>

<title>Tambah Matakuliah</title>


</head>
<?php 

	  @session_start();
	  
	   if ((isset($_SESSION['username'])) and ($_SESSION['status']=='admin'))   { ?>

<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <h1 align="center">Tambah Mahtakuliah</h1>
  <p>&nbsp;</p>
  <div class="col-lg-6 col-lg-offset-3">
  <table class="table table-bordered table-hover table-striped" width="662" border="0" align="center" cellpadding="0" cellspacing="0">
 
    <tr>
      <td >Kode Matkul</td>
      <td width="8">:</td>
      <td >
        <input type="text" name="nim" id="nim" PlaceHolder="Kode Matkul"></td>
    </tr>
	<tr>
      <td >SKS</td>
      <td width="8">:</td>
      <td>
        <input type="text" name="sks" id="sks" PlaceHolder="SKS"></td>
    </tr>
	
    <tr>
      <td>Nama</td>
      <td>:</td>
      <td><label>
        <input name="nama" type="text" id="nama" />
      </label>        <label for="nama"></label></td>
    </tr>
	
    <tr>
      <td>Prodi</td>
      <td>:</td>
      <td><p>
        <label for="prodi"></label>
        <select name="prodi" id="prodi">
          <option value="D3-Teknik Telekomunikasi">D3-Teknik Telekomunikasi</option>
          <option value="D4-Teknik Telekomunikasi">D4-Teknik Telekomunikasi</option>
          <option value="D3-Teknik Listrik">D3-Teknik Listrik</option>
          <option value="D4-Teknik Otomasi Industri">D4-Teknik Otomasi Industri</option>
          <option value="D3-Teknik Elektro">D3-Teknik Elektro</option>
          <option value="D4-Teknik Elektro">D4-Teknik Elektro</option>
        </select>
        <br />
      </p></td>
    </tr>
	
    <tr>
      <td>Semester</td>
      <td>:</td>
      <td><label for="bulan">
        <select name="semester" id="semester">
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
          <option value="7">7</option>
          <option value="8">8</option>
        </select>
      </label></td>
    </tr>
   
  
    
    
    <tr>
      <td colspan="3" align="center"><input class="btn btn-primary" type="submit" name="sign" id="sign" value="Daftar" />
        <label>
        <input class="btn btn-danger" name="batal" type="submit" id="batal" value="batal" />
      </label></td>
    </tr>
  </table>
</div>
</form>

  <?php
 if(!isset($_POST['sign'])) exit();
 $value= array('sign','nim','nama','sks','prodi','semester');
 
 $error= false;
 foreach($value as $post){
	 if(empty($_POST[$post])){
		 $error = true;
	 }
 }
 if ($error){
	 echo "<script> alert ('Semua form harus diisi'); </script>";
 }
 else {
include "config.php";
if (!empty ($_POST['sign'])) {
	$nim=$_POST['nim'];
	
	$nama=$_POST['nama'];
	$prodi=$_POST['prodi'];
	$semester=$_POST['semester'];
	$sks=$_POST['sks'];
	
	$simpan=mysql_query("insert into data_matkul values ('$nim','$nama','$sks','$prodi','$semester')");
	
	if ($simpan)  {
		echo "<script> alert ('Pendaftaran Berhasil,Selamat Datang!');</script>";
	} else {
		echo "<script> alert ('Gagal'); </script>";
	}
}
 }
 
?>

<?php } else { ?>
	
		  <div class="alert alert-danger">Anda tidak memiliki hak untuk mengakses halaman ini!</div>
	<?php	  
	  }
	  ?>
