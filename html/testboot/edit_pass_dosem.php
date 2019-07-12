<?php 

	  @session_start();
	  
	   if ((isset($_SESSION['username'])) and ($_SESSION['status']=='dosen'))   { ?>
<h1 class="page-header">
                    
                    </h1><h3>Ganti Password</h3>
<?php
require"config.php";
$nim=$_SESSION['username'];


?>

<form action="proses_edit_dosen_pass.php" method="post" enctype="multipart/form-data" name="form1">
  <div align="center">
    <table width="624" height="172" border="0">
      <tr>
        <td width="61">NIP</td>
        <td width="3">:</td>
        <td width="452"><?php echo $nim ?></td>
      </tr>


	  <tr>
        <td width="61">Password</td>
        <td width="3">:</td>
        <td width="452"><input name="pass" type="password" id="pass" value=""></td>
      
      </tr>
    </table>
  </div>
  <p>&nbsp;</p>
  <p align="center">
    <label>
	
    <input class="btn btn-primary" type="submit" name="sign" value="sign" />
    </label>
  </p>
</form>
<?php  } else { ?>
	
		  <div class="alert alert-danger">Anda tidak memiliki hak untuk mengakses halaman ini!</div>
	<?php	  
	  }
	  ?>