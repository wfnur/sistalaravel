<!doctype html>
<html>
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/imagehover.min.css">
  
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<li><a href="#" data-target="#login2" data-toggle="modal">Sign in Dosen</a></li>
<div class="modal fade" id="login2" role="dialog">
      <div class="modal-dialog modal-sm">
      
  <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title text-center form-title">Login</h4>
          </div>
          <div class="modal-body padtrbl">
>
            <div class="modal-body">
              <p class="login-box-msg">Sign in to start your session</p>
              <div class="form-group">
                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <h1 align="center">Daftar !!!</h1>
  <table width="662" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td width="165">NIM</td>
      <td width="8">:</td>
      <td width="489"><label for="NIM"></label>
        <input type="text" name="nim" id="nim" PlaceHolder="Username"/></td>
    </tr>
    <tr>
      <td>password</td>
      <td width="8">:</td>
      <td width="489"><input type="password" name="pass" id="pass" PlaceHolder="Password"/></td>
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
          <option value="D4-Teknik Listrik">D4-Teknik Listrik</option>
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
      
    </tr>
    
    <tr>
      <td>Kelas</td>
      <td>:</td>
      <td><label for="kelas">
        <input name="kelas" type="text" id="kelas" />
      </label></td>
    </tr>
    
    <tr>
      <td colspan="3" align="center"><input type="submit" name="sign" id="sign" value="Daftar" />
        <label>
        <input name="batal" type="submit" id="batal" value="batal" />
      </label></td>
    </tr>
  </table>

</form>
<p>
  <?php
 
include "config.php";
if (!empty ($_POST['sign'])) {
	$nim=$_POST['nim'];
	$pass=md5($_POST['pass']);
	$nama=$_POST['nama'];
	$prodi=$_POST['prodi'];
	$semester=$_POST['semester'];
	$kelas=$_POST['kelas'];
	
	$simpan=mysql_query("insert into data_mhsw values ('$nim','$nama','$prodi','$semester','$kelas','$pass','mahasiswa')");
	
	if ($simpan)  {
		echo "<script> alert ('Pendaftaran Berhasil,Selamat Datang!');</script>";
	} else {
		echo "<script> alert ('Gagal'); </script>";
	}
}
?>
</p>
                      </div>
            </div>
                </form>
      </div>
        </div>
  </div>
</div>

      </div>
    </div>
                
</body>
</html>
 <script src="js/jquery.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="contactform/contactform.js"></script>
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>
