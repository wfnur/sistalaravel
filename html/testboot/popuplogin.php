
<!-- Large modal -->
<script> $('#myModal').modal('show'); </script>
<button class="btn btn-primary" data-toggle="modal" data-target="#myModal">
    Login</button>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg-8">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    ×</button>
                <h4 class="modal-title" id="myModalLabel">
                    Login</h4>
            </div>
            <div class="modal-body">
                
				<div class="row">
                    
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#Login" data-toggle="tab">Mahasiswa</a></li>
                            <li><a href="#LoginD" data-toggle="tab">Dosen</a></li>
							<li><a href="#admin" data-toggle="tab">Admin</a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
						<!--Mahasiswa-->
                           <div class="tab-pane active" id="Login">
                                <form  method="post" action="proses_login.php">
                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label">
                                        NIM</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="username" name="username" placeholder="NIM" />
                                    </div>
                                </div>
								
                                <div class="form-group">
                                    <label for="exampleInputPassword1" class="col-sm-2 control-label">
                                        Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                    </div>
									
                                    <div class="col-sm-10 col-sm-offset-6">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            Submit</button>
                                        
                                    </div>
                                </div>
                                </form>
                            </div>
					<!--Dosen-->
                            <div class="tab-pane" id="LoginD">
                                <form  method="post" action="proses_login2.php">
                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label">
                                        NIP</label>
                                    <div class="col-sm-10">
                                        <input name="username" type="text" class="form-control" id="username" placeholder="NIP" />
                                    </div>
                                </div>
								
                                <div class="form-group">
                                    <label for="exampleInputPassword1" class="col-sm-2 control-label">
                                        Password</label>
                                    <div class="col-sm-10">
                                        <input name="password" type="password" class="form-control" id="password" placeholder="Password" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                    </div>
									
                                    <div class="col-sm-10 col-sm-offset-6">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            Submit</button>
                                        
                                    </div>
                                </div>
                                </form>
                            </div>
							<!--Admin-->
							<div class="tab-pane" id="admin">
                                <form  method="post" action="proses_login3.php">
                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label">
                                        ID</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="username" name="username" placeholder="ID" />
                                    </div>
                                </div>
								
                                <div class="form-group">
                                    <label for="exampleInputPassword1" class="col-sm-2 control-label">
                                        Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                    </div>
									
                                    <div class="col-sm-10 col-sm-offset-6">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            Submit</button>
                                        
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                        
                </div>
            
        </div>
    </div>
</div>
