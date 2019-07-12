<?php 

	  
	   if ((isset($_SESSION['username'])) and ($_SESSION['status']=='mahasiswa'))   { ?>
<h1 class="page-header">
                    Data Semester
                    </h1>

<div class="row">
<div class="col-lg-3">
<div class="panel panel-default">

                            <div class="panel-heading">
                                <h3 class="panel-title">Semester</h3>
                            </div>
                            <div class="panel-body">
							<?php 
								require "config.php";
								$nim1=$_SESSION['username'];
								$ambildata=mysql_query("SELECT * FROM `data_mhsw` where nim='$nim1'");
								while ($isi=mysql_fetch_array($ambildata)){
									$sms=$isi['semester'];
									
									require"sms".$sms.".php";
                                } ?>
                            </div>
                        </div>
						<?php }  else { ?>
	
		  <div class="alert alert-danger">Anda tidak memiliki hak untuk mengakses halaman ini!</div>
	<?php	  
	  }
	  ?>