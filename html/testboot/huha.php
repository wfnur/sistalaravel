<!doctype html>
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Candal|Alegreya+Sans">
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
<html>
<head>
<meta charset="utf-8">
<link rel="icon" href="logo-polban.png">
<title>Lihat Nilai?</title>
</head>
<?php 
	  @session_start();
	  ?>
<body>

<div id="wrapper">
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header"><img src="logo-polban.png" width="40" height="40" alt=""/><b><font size="small">	POLBAN</font></b></div>
        <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#feature">Features</a></li>
          <li><a href="#organisations">Organisations</a></li>
          <li><a href="#courses">Courses</a></li>
          
		  <?php 
		  if ((isset($_SESSION['username'])) and ($_SESSION['status']=='mahasiswa')){?>
		  <li><a>Selamat datang <?php echo $_SESSION['nama'] ?></a></li>
		  <?php }
		  else {?>
          <li><a href="#" data-target="#login" data-toggle="modal">Sign in mahasiswa</a></li>
          <li><a href="#" data-target="#login2" data-toggle="modal">Sign in Dosen</a></li>
		  <?php }?>
          
        </ul>
        </div>
      </div>
    </nav>
    
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                   
                    <li class="active">
					
                        <a href="index.html"><i class="fa fa-fw fa-home"></i> Dashboard</a>
                    </li>
					
						 <li>
						 
                        <a href="charts.html"><i class="fa fa-fw fa-bar-chart-o"></i> Charts</a>
                    </li>
                    <li>
                        <a href="tables.html"><i class="fa fa-fw fa-table"></i> Tables</a>
                    </li>
                    <li>
                        <a href="forms.html"><i class="fa fa-fw fa-edit"></i> Forms</a>
                    </li>
                    <li>
                        <a href="bootstrap-elements.html"><i class="fa fa-fw fa-desktop"></i> Bootstrap Elements</a>
                    </li>
                    <li>
                        <a href="bootstrap-grid.html"><i class="fa fa-fw fa-wrench"></i> Bootstrap Grid</a>
                    </li>
					<?php 
		  if ((isset($_SESSION['username'])) and (($_SESSION['status']=='mahasiswa') or ($_SESSION['status']=='dosen')) ){?>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-users"></i> Data Pengguna <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="#">Data Dosen & Staff</a>
                            </li>
                            <li>
                                <a href="#">Data Mahasiswa</a>
                            </li>
                        </ul>
                    </li>
		  <?php }
		  if ((isset($_SESSION['username'])) and (($_SESSION['status']=='mahasiswa') or ($_SESSION['status']=='dosen')) ){?>
		  <li><a href="logout.php">Logout</a></li>
		  <?php }?>
                </ul>
            </div>
           
        </nav>
        <div id="page-wrapper">
    <div class="row">
                    <div class="col-lg-12">
                    <h1 class="page-header">
                    Data Member
                    </h1>
                        <?php
	  if ((@$_GET['menu']=='home') || (@$_GET['menu']=='')) {require "datamem.php";}
      elseif ($_GET['menu']=='edit') {require "edit.php";}?>
                    </div>
                </div>
                </div>
                </div>

      
        <!-- Modal content no 1-->
    <div class="modal fade" id="login" role="dialog">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title text-center form-title">Login</h4>
          </div>
          <div class="modal-body padtrbl">

            <div class="login-box-body">
              <p class="login-box-msg">Sign in to start your session</p>
              <div class="form-group">
                <form  method="post" action="proses_login.php">
       <div class="form-group has-feedback"> <!----- username -------------->
<input name="username" class="form-control" placeholder="NIM"  id="username" type="text" autocomplete="off" /> 
<span style="display:none;font-weight:bold; position:absolute;color: red;position: absolute;padding:4px;font-size: 11px;background-color:rgba(128, 128, 128, 0.26);z-index: 17;  right: 27px; top: 5px;" id="span_loginid"></span><!---Alredy exists  ! -->
                      <span class="glyphicon glyphicon-user form-control-feedback"></span>
                  </div>
                  <div class="form-group has-feedback"><!----- password -------------->
                      <input name="password" class="form-control" placeholder="Password" id="password" type="password" autocomplete="off" />
            <span style="display:none;font-weight:bold; position:absolute;color: grey;position: absolute;padding:4px;font-size: 11px;background-color:rgba(128, 128, 128, 0.26);z-index: 17;  right: 27px; top: 5px;" id="span_loginpsw"></span><!---Alredy exists  ! -->
                      <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                  </div>
                  <div class="row">
                      <div class="col-xs-12">
                          <div class="checkbox icheck">
                              <label>
                                <input type="checkbox" id="loginrem" > Remember Me
                              </label>
                          </div>
                      </div>
                      <div class="col-xs-12">
                          <button type="submit" class="btn btn-green btn-block btn-flat" onclick="userlogin()">Sign In</button>
                      </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
    
    
  <!--login 2-->
  <div class="modal fade" id="login2" role="dialog">
      <div class="modal-dialog modal-sm">
      
  <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title text-center form-title">Login</h4>
          </div>
          <div class="modal-body padtrbl">
>
            <div class="login-box-body">
              <p class="login-box-msg">Sign in to start your session</p>
              <div class="form-group">
                <form  method="post" action="proses_login.php">
                 <tr>
      <th width="70" scope="row">Kode Dosen</th>
      <td width="3">:</td>
      <td width="82"><input name="username" type="text" id="username" size="10" /></td>
    </tr>
    <tr>
       <p>&nbsp;          </p>
      <th scope="row">Password</th>
      <td>:</td>
      <td><input name="password" type="password" id="password" size="10" /></td>
    </tr>
            <span style="display:none;font-weight:bold; position:absolute;color: grey;position: absolute;padding:4px;font-size: 11px;background-color:rgba(128, 128, 128, 0.26);z-index: 17;  right: 27px; top: 5px;" id="span_loginpsw"></span><!---Alredy exists  ! -->
                      <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                  </div>
                  <div class="row">
                      <div class="col-xs-12">
                          <div class="checkbox icheck">
                              <label>
                                <input type="checkbox" id="loginrem" > Remember Me
                              </label>
                          </div>
                      </div>
                      <div class="col-xs-12">
                          <button type="submit" class="btn btn-green btn-block btn-flat" onclick="userlogin()">Sign In</button>
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
 
</html>