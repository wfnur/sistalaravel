@extends('Layout.master')

@section('title','Propsal Tugas Akhir')

@section('navbar')
<!-- Navbar -->
<nav class="main-header navbar navbar-expand bg-primary navbar-dark ">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
        <a href="{{url('/Mahasiswa/Beranda')}}" class="nav-link">Beranda</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
        <a href="{{url('/Mahasiswa/Profile')}}" class="nav-link">Profile</a>
    </li>
  </ul> 

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Messages Dropdown Menu -->
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="fa fa-comments-o"></i>
        <span class="badge badge-danger navbar-badge">3</span>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <a href="#" class="dropdown-item">
          <!-- Message Start -->
          <div class="media">
            <img src="{{asset('adminlte/dist/img/user1-128x128.jpg')}}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
            <div class="media-body">
              <h3 class="dropdown-item-title">
                Brad Diesel
                <span class="float-right text-sm text-danger"><i class="fa fa-star"></i></span>
              </h3>
              <p class="text-sm">Call me whenever you can...</p>
              <p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i> 4 Hours Ago</p>
            </div>
          </div>
          <!-- Message End -->
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
          <!-- Message Start -->
          <div class="media">
            <img src="{{asset('adminlte/dist/img/user8-128x128.jpg')}}" alt="User Avatar" class="img-size-50 img-circle mr-3">
            <div class="media-body">
              <h3 class="dropdown-item-title">
                John Pierce
                <span class="float-right text-sm text-muted"><i class="fa fa-star"></i></span>
              </h3>
              <p class="text-sm">I got your message bro</p>
              <p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i> 4 Hours Ago</p>
            </div>
          </div>
          <!-- Message End -->
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
          <!-- Message Start -->
          <div class="media">
            <img src="{{asset('dist/img/user3-128x128.jpg')}}" alt="User Avatar" class="img-size-50 img-circle mr-3">
            <div class="media-body">
              <h3 class="dropdown-item-title">
                Nora Silvester
                <span class="float-right text-sm text-warning"><i class="fa fa-star"></i></span>
              </h3>
              <p class="text-sm">The subject goes here</p>
              <p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i> 4 Hours Ago</p>
            </div>
          </div>
          <!-- Message End -->
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
      </div>
    </li>
    <!-- Notifications Dropdown Menu -->
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="fa fa-bell-o"></i>
        <span class="badge badge-warning navbar-badge">15</span>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <span class="dropdown-item dropdown-header">15 Notifications</span>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
          <i class="fa fa-envelope mr-2"></i> 4 new messages
          <span class="float-right text-muted text-sm">3 mins</span>
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
          <i class="fa fa-users mr-2"></i> 8 friend requests
          <span class="float-right text-muted text-sm">12 hours</span>
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
          <i class="fa fa-file mr-2"></i> 3 new reports
          <span class="float-right text-muted text-sm">2 days</span>
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
          class="fa fa-th-large"></i></a>
    </li>
  </ul>
</nav>
<!-- /.navbar -->
@stop

@section('content')
@if (session('sukses'))
<div class="alert alert-success col-md-6 alert-fixed" role="alert" >
    {{session('sukses')}}
</div>
@elseif (session('gagal'))
<div class="alert alert-danger col-md-6 alert-fixed" role="alert" >
    {{session('gagal')}}
</div>
@endif

@if (session('error'))
<div class="alert alert-danger col-md-6 alert-fixed">
    {{ session('error') }}
</div>
@endif
@if (session('success'))
<div class="alert alert-success col-md-6 alert-fixed">
    {{ session('success') }}
</div>
@endif
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Proposal Tugas Akhir</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item">Proposal TA</li>
        </ol>
        </div>
    </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class='col-md-12 col-xs-12'>

              <!-- ./Data Proposal -->    
              <div class="row">
                <div class="col-md-12">
                    <div class="card card-info card-outline">
                      <div class="card-header">
                        <h3 class="card-title">
                          Data Proposal
                        </h3>
                          <!-- tools box -->
                          <div class="card-tools">
                            <button type="button" class="btn btn-tool btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                                <i class="fa fa-times"></i>
                            </button>
                          </div>
                          <!-- /. tools -->
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body" style="display: block;">
                          <div class="mb-3">
                            <form method='post' action='{{url('/Proposal/Store/ProposalTA')}}'>
                              {{ csrf_field() }}
                              <input type="hidden" name="nim" value="{{auth()->user()->username}}">
                                  <!--judul-->
                                  <div class='form-group'>
                                    <label>Judul TA</label>
                                    <textarea cols="80" name="judul_ta" rows="3" class="form-control" >{{$cekdata->judul_ta}}</textarea>
                                  </div>
                                  
                                  <!--abstrak-->
                                  <div class="form-group">
                                    <label>Abstrak (max: 250 kata)</label>
                                    <textarea cols="80" id="abstrak_ind" name="abstrak" rows="20" class="form-control">{{$cekdata->abstrak}}</textarea>
                                  </div>

                                  <!--keyword-->
                                  <div class='form-group'>
                                    <label>Keyword</label>
                                    <input type="text" name="keyword" class='form-control' value='{{$cekdata->keyword}}'>
                                  </div>

                                  <!--Pembimbing 1-->
                                  <div class="form-group">
                                    <label>Pembimbing 1 </label>
                                    <select class="form-control" name="pembimbing1">
                                        <option value='0'>-------------------------</option>
                                        @foreach ($pembimbing1 as $p1)
                                        <option value={{$p1->kode_dosen }} @if($cekdata->pembimbing1==$p1->kode_dosen) selected @endif> {{ $p1->nama }}</option>
                                        @endforeach
                                    </select>
                                  </div>

                                  <!--Pembimbing 2-->
                                  <div class="form-group">
                                    <label>Pembimbing 2 </label>
                                    <select class="form-control" name="pembimbing2">
                                        <option value='0'>-------------------------</option>
                                        @foreach ($pembimbing2 as $p2)
                                        <option value={{ $p2->kode_dosen }} @if($cekdata->pembimbing2==$p2->kode_dosen) selected @endif> {{ $p2->nama }}</option>
                                        @endforeach
                                    </select>
                                  </div>

                                  <div class='form-group'>
                                      <input type="submit" value="Simpan" class='btn btn-info'>
                                  </div>
                            </form>

                            <div class="row">
                                <div class="col-6">
                                    <form id="frm" enctype="multipart/form-data">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="nim" value="{{auth()->user()->username}}">
                                        <input type="hidden" name="jenis_berkas" value="pdf">
                                        <div class='form-group'>
                                            <label for="exampleInputFile">Proposal TA (.pdf)
                                                <br>
                                                <span id="file_error" style="color:#dc3545 "></span>
                                            </label>
                                            <input id="file_input" type="file" name="berkas" class="form-control" accept=".pdf" onchange="return validatepdf();"> </br>
                                            <input type="submit" value="Upload" id="btnsubmitpdf" class="btn btn-primary" >
                                            @if($cekdatapdf->nama_berkas!="")
                                                <a href={{asset('public/Berkas_ProposalTA/'.$cekdatapdf->nama_berkas)}} class="btn btn-warning" target="_blank"> Lihat Proposal</a>
                                            @endif
                                            <div id="wait">
                                                <div class="spinner-border" role="status">
                                                </div>
                                            </div> 
                                            
                                        </div>
                                    </form>
                                </div>
                                <div class="col-6">
                                    <form id="frmdoc" enctype="multipart/form-data">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="nim" value="{{auth()->user()->username}}">
                                        <input type="hidden" name="jenis_berkas" value="doc">
                                        <div class='form-group'>
                                            <label for="exampleInputFile">Proposal TA (.doc)
                                                <br>
                                                <span id="file_errordoc" style="color:#dc3545 "></span>
                                            </label>
                                            <input id="file_inputdoc" type="file" name="berkas" class="form-control" accept=".doc,.docx" onchange="return validatedoc();"> </br>
                                            <input type="submit" value="Upload" id="btnsubmitdoc" class="btn btn-primary" >
                                            @if($cekdatadoc->nama_berkas!="")
                                                <a href={{asset('public/Berkas_ProposalTA/'.$cekdatadoc->nama_berkas)}} class="btn btn-warning" target="_blank"> Lihat Proposal</a>
                                            @endif
                                            <div id="waitdoc">
                                                <div class="spinner-border" role="status">
                                                </div>
                                            </div> 
                                            
                                        </div>
                                    </form>
                                </div>
                            </div>

                            

                            
                            
                          </div>
                          
                      </div>
                    </div>
                    <!-- /.card -->          
                </div>
              <!-- /.col-->
              </div>
              <!-- ./row -->

              
                  
            </div>
          </div>
    <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
<div class='btn btn-success col-md-2 notif-fixed' style="padding:10px 20px;">
    <b>Berkas Berhasil Disimpan</b>
</div>
@stop

@push('scripts') 
    <script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
    <script src="{{asset('js/ckeditor.js')}}"></script>
    <script type="text/javascript">
        
$(document).ready(function (e) {
    $( "#btnsubmitpdf" ).prop( "disabled", true );
    $( "#btnsubmitdoc" ).prop( "disabled", true );
    $("#wait").hide();
    $("#waitdoc").hide();
    $(".notif-fixed").hide(); 

    $("#frm").on('submit',(function(e) {
    e.preventDefault();
        $.ajax({
            url: "{{url('/Proposal/Store/BerkasProposalTA')}}",
            type: "POST",
            data:  new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            beforeSend : function(){
            //$("#preview").fadeOut();
                $("#wait").show();
            },
            success: function(data){
                $("#wait").hide();
                $(".notif-fixed").show();
                setTimeout(function(){
                    window.location.reload(); // you can pass true to reload function to ignore the client cache and reload from the server
                },2000);  
            },
            error: function(e){
                console.log("error");
            }          
        });
    }));

    $("#frmdoc").on('submit',(function(e) {
        e.preventDefault();
            $.ajax({
                url: "{{url('/Proposal/Store/BerkasProposalTA')}}",
                type: "POST",
                data:  new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                beforeSend : function(){
                //$("#preview").fadeOut();
                    $("#waitdoc").show();
                },
                success: function(data){
                    $("#wait").hide();
                    $(".notif-fixed").show();
                    setTimeout(function(){
                        window.location.reload(); // you can pass true to reload function to ignore the client cache and reload from the server
                    },2000);  
                },
                error: function(e){
                    console.log("error");
                }          
            });
        }));
});

function validatepdf() {
    $("#file_error").html("");
    var file_size = $('#file_input')[0].files[0].size;
    var inputFile = document.getElementById('file_input');
    var pathFile = inputFile.value;
    var ekstensiOk = /(\.pdf)$/i;
    if(!ekstensiOk.exec(pathFile)){
        alert('Silakan upload file yang memiliki ekstensi .pdf');
        inputFile.value = '';
        return false;
    }else{
        console.log(file_size);
        if(file_size>2097152) {
            $("#file_error").html("Ukuran File Lebih Dari 2 MB !");
            $( "#btnsubmitpdf" ).prop( "disabled", true );
            return false;
        } else{
            $( "#btnsubmitpdf" ).prop( "disabled", false );
        }
    }   
return true;
}

function validatedoc() {
    $("#file_errordoc").html("");
    var file_size = $('#file_inputdoc')[0].files[0].size;
    var inputFile = document.getElementById('file_inputdoc');
    var pathFile = inputFile.value;
    var ekstensiOk = /(\.doc|\.docx)$/i;
    if(!ekstensiOk.exec(pathFile)){
        alert('Silakan upload file yang memiliki ekstensi .pdf');
        inputFile.value = '';
        return false;
    }else{
        console.log(file_size);
        if(file_size>2097152) {
            $("#file_errordoc").html("Ukuran File Lebih Dari 2 MB !");
            $( "#btnsubmitdoc" ).prop( "disabled", true );
            return false;
        } else{
            $( "#btnsubmitdoc" ).prop( "disabled", false );
        }
    }   
return true;
}
    </script>
@endpush