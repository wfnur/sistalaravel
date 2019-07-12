<!doctype html>

    


<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

   <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    

<link rel="icon" href="logo-polban.png">
<title>Lihat Nilai?</title>
</head>
<?php 
	  @session_start();
	  ?>
		<body>

			<div id="wrapper">
				<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
						<span class="sr-only">Toggle navigation</span>
					
		
						
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" href="index.php">Polban</a>
					</div>

					<div class="navbar-header">
              
						<div class="container">
        
							<div class="collapse navbar-collapse" id="myNavbar">
								<ul class="nav navbar-nav navbar-right">
									<?php
										if ((isset($_SESSION['username'])) and (($_SESSION['status']=='mahasiswa') or ($_SESSION['status']=='dosen')) ){?>
										<li><a href="?menu=edit&nim=<?php echo $_SESSION['username'] ?>">Selamat datang,<?php echo $_SESSION['nama'] ?></a></li>
									
									<?php } ?>
		 
          
								</ul>
							</div>
						</div>
				</nav>
    
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">                 
                    <li>					
						<a href="index.php"><i class="fa fa-fw fa-home"></i> Dashboard</a>
                    </li>
					
					<?php 
						if (isset($_SESSION['username']) and ($_SESSION['status']=='admin')){
							echo 
					'
							
								<li>
									<a  href="?menu=datadsn"><i class="fa fa-fw fa-user"></i>Data Dosen & Staff</a>
								</li>
								<li>
									<a href="?menu=datamah1"><i class="fa fa-fw fa-users"></i>Data Mahasiswa</a>
								</li>
								<li>
									<a href="?menu=tambahmhsw"><i class="glyphicon glyphicon-plus"></i>Tambah Mahasiswa</a>
								</li>
								<li>
									<a href="?menu=tambahdosen"><i class="glyphicon glyphicon-plus"></i>Tambah Dosen</a>
								</li>
								<li>
									<a href="?menu=inmatkul"><i class="glyphicon glyphicon-plus"></i>Tambah Matkul</a>
								</li>
								<li>
									<a href="?menu=inpengajar"><i class="glyphicon glyphicon-plus"></i>Tambah Pengajar</a>
								</li>
								<li>
									<a href="?menu=injadwal"><i class="glyphicon glyphicon-plus"></i>Masukan Jadwal</a>
								</li>
								<li>
									<a href="?menu=outjadwal"><i class="glyphicon glyphicon-calendar"></i>Tampilkan Jadwal</a>
								</li>
								<li>
									<a href="?menu=datngajar"><i class="fa fa-user"></i>Tampilkan Pengajar</a>
								</li>
								<li>
									<a href="?menu=datngajar"><i class="fa fa-book"></i>Tampilkan Matkul</a>
								</li>
								
							
							
                    ';
						}
						elseif (isset($_SESSION['username']) and ($_SESSION['status']=='mahasiswa')){
							echo '<li><a href="?menu=smshsw"><i class="fa fa-fw fa-bar-chart-o"></i>Lihat Nilai</a></li>
							<li><a href="?menu=jadwalmhsw"><i class="fa fa-fw fa-calendar"></i>Jadwal Mata Kuliah</a></li>
								<li><a href="?menu=editpass"><i class="fa fa-fw fa-key"></i>Ganti password</a></li>';
								
					 }
						
						elseif ((isset($_SESSION['username'])) and ($_SESSION['status']=='dosen')){?>
                    
								<li>
									<a href="?menu=jadwaldosen"><i class="fa fa-fw fa-calendar"></i>Jadwal Pengajar</a>
								</li>
								<li>
									<a href="?menu=bobot"><i class="fa fa-fw fa-bar-chart-o"></i>Data Bobot</a>
								</li>
                           
								<li>
									<a href="?menu=pengajar"><i class="fa fa-fw fa-bar-chart-o"></i>Penilaian</a>
								</li>
							<li><a href="?menu=passdosen"><i class="fa fa-fw fa-key"></i>Ganti password</a></li>
					<?php }
						if ((isset($_SESSION['username'])) and (($_SESSION['status']=='mahasiswa') or ($_SESSION['status']=='dosen') or ($_SESSION['status']=='admin')) ){?>
						<li><a href="logout.php"><i class="glyphicon glyphicon-log-out"></i>Logout</a></li>
					<?php } else {?>
							
						<?php }?>	 
                </ul>
            
           
        
		</div>
        <div id="page-wrapper">
    <div class="row">
                    <div class="col-lg-12" >
                    
                        <?php
	  if ((@$_GET['menu']=='home') || (@$_GET['menu']=='')) {require "home.php";}
      elseif ($_GET['menu']=='edit') {require "edit.php";}
	  elseif ($_GET['menu']=='editdosen') {require "editdosen.php";}
	  elseif ($_GET['menu']=='datamah') {require "datamem.php";}
	  elseif ($_GET['menu']=='datamah1') {require "telkom.php";}
	  elseif ($_GET['menu']=='datadsn') {require "datadosen.php";}
	  elseif ($_GET['menu']=='tambahmhsw') {require "register.php";}
	  elseif ($_GET['menu']=='tambahdosen') {require "register2.php";}
	  elseif ($_GET['menu']=='nilai') {require "nilai2.php";}
	  elseif ($_GET['menu']=='inputn') {require "input_nilai.php";}
	  elseif ($_GET['menu']=='prosesinputnilai') {require "proses_nilai.php";}
	  elseif ($_GET['menu']=='pengajar') {require "data_pengajar.php";}
	  elseif ($_GET['menu']=='inbobot') {require "input_bobot.php";}
	  elseif ($_GET['menu']=='bobot') {require "data_bobot.php";}
	  elseif ($_GET['menu']=='pdf') {require "mama2.php";}
	  elseif ($_GET['menu']=='nmhsw') {require "nilai_mhsw.php";}
	  elseif ($_GET['menu']=='dolin') {require "lihat_nd.php";}
	  elseif ($_GET['menu']=='smshsw') {require "pilih_sms.php";}
	  elseif ($_GET['menu']=='proseseditnilai') {require "proses_edit..php";}
	  elseif ($_GET['menu']=='editpass') {require "edit_pass_mhsw.php";}
	  elseif ($_GET['menu']=='editnilai') {require "edit_nilai.php";}
	  elseif ($_GET['menu']=='editbobot') {require "edit_bobot.php";}
	  elseif ($_GET['menu']=='injadwal') {require "jadwal.php";}
	  elseif ($_GET['menu']=='inpengajar') {require "in_pengajar.php";}
	  elseif ($_GET['menu']=='jadwaldosen') {require "jadwal_dosen.php";}
	  elseif ($_GET['menu']=='jadwalmhsw') {require "jadwal_mahasiswa.php";}
	  elseif ($_GET['menu']=='outjadwal') {require "jadwal_cari.php";}
	  elseif ($_GET['menu']=='data_matkul') {require "data_matkul.php";}
	  elseif ($_GET['menu']=='editnilai') {require "edit_nilai.php";}
	  elseif ($_GET['menu']=='datngajar') {require "lihat_pengajar.php";}
	  elseif ($_GET['menu']=='inmatkul') {require "in_matkul.php";}
	  elseif ($_GET['menu']=='outmatkul') {require "tampil_matkul.php";}
	  elseif ($_GET['menu']=='passdosen') {require "edit_pass_dosem.php";}?>
                    </div>
                </div>
                </div>
                

      
        
                  
                  

			  
			 
            

      </div>
    </div>
</body>
	    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>
   
 
 
</html>