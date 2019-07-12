<h1 class="page-header">
                    
                    </h1>

					<?php
          if ((isset($_SESSION['username'])) ){?>
		<div class="col-lg-4"> 
		 <div class="alert alert-info"><h4>Selamat datang,<?php echo $_SESSION['nama'] ?></h4></div></div>
		  <?php } 
		  else {?>
		  <div class="col-lg-4">
		  <div class="alert alert-info"><h4>Anda belum login, silahkan login terlebih dahulu</h4><?php require "popuplogin.php"; ?></div></div>
		  
		  <?php
		  }?>
					