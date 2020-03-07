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
          <div class='col-6'>
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
                          
                          <!--judul-->
                          <div class='form-group'>
                            <label>Judul TA</label>
                            <textarea cols="80" name="judul_ta" rows="3" class="form-control" disabled>{{$proposal->judul_ta or ''}}</textarea>
                          </div>

                          <!--keyword-->
                          <div class='form-group'>
                            <label>Keyword</label>
                            <input type="text" name="keyword" class='form-control' value='' disabled value="{{$proposal->keyword or ''}}">
                          </div>

                          <!--Pembimbing 1-->
                          <div class="form-group">
                            <label>Pembimbing 1 </label>
                            <input type="text" class='form-control' disabled value="{{$pembimbing1->nama or ''}}">
                          </div>

                          <!--Pembimbing 2-->
                          <div class="form-group">
                            <label>Pembimbing 2 </label>
                            <input type="text" class='form-control' disabled value="{{$pembimbing2->nama or ''}}">
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

          <div class='col-6'>
            <!-- ./Data Proposal -->    
            <div class="row">
              <div class="col-md-12">
                  <div class="card card-info card-outline">
                    <div class="card-header">
                      <h3 class="card-title">
                        Abstrak
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
                          <!--abstrak-->
                          <div class="form-group">
                            <label>Abstrak (max: 250 kata)</label>
                            <textarea id="abstrak_ind" name="abstrak" class="form-control" readonly>{{$proposal->abstrak or ''}}</textarea>
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
        {{-- Revisi 1 --}}
        <div class="row">
          <div class='col-12'>

            <!-- ./Data Proposal -->    
            <div class="row">
              <div class="col-md-12">
                  <div class="card card-info card-outline">
                    <div class="card-header">
                      <h3 class="card-title">
                        Review Proposal 1
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

                    <div class="card-body" style="display: block;">
                        <div class="row">
                          <div id="example1" class="col-6" style='min-height:700px;'></div>
                          <div class="col-6">
                            <form method='post' action='{{url('/Review/ProposalTA/create')}}'>
                              {{ csrf_field() }}
                              <input type="hidden" name="reviewer" value="{{auth()->user()->username}}">
                              <input type="hidden" name="NIM" value="{{$mahasiswa->NIM}}">
                              <input type="hidden" name="revisike" value="1">
                              <h4>Review Proposal TA</h4>
                              <textarea cols="80" id="reviewPTA" name="reviewPTA" rows="20" class="form-control">{{$reviewPTA1->revisi or ''}}</textarea>
                              <br>
                              <div class='form-group'>
                                  <select class="form-control" name="status">
                                    <option value='0' @if($reviewPTA1 !="") @if($reviewPTA1->status==0) selected @endif @endif>Revisi</option>
                                    <option value='1' @if($reviewPTA1 !="") @if($reviewPTA1->status==1) selected @endif @endif>Tidak Revisi</option>
                                  </select>
                              </div>
                              <div class='form-group'>
                                  <input type="submit" value="Simpan" class='btn btn-info'>
                              </div>
                            </form>
                          </div>
                        </div>
                        
                    </div>
                  </div>
                  <!-- /.card -->          
              </div>
            
            </div>
            <!-- ./row -->
                
          </div>
        </div>

        {{-- Revisi 2 --}}
        <div class="row">
          <div class='col-12'>

            <!-- ./Data Proposal -->    
            <div class="row">
              <div class="col-md-12">
                  <div class="card card-info card-outline">
                    <div class="card-header">
                      <h3 class="card-title">
                        Review Proposal 2
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
                        <div class="row">
                          <div id="example2" class="col-6" style='min-height:700px;'></div>
                          <div class="col-6">
                            <form method='post' action='{{url('/Review/ProposalTA/create')}}'>
                              {{ csrf_field() }}
                              <input type="hidden" name="reviewer" value="{{auth()->user()->username}}">
                              <input type="hidden" name="NIM" value="{{$mahasiswa->NIM}}">
                              <input type="hidden" name="revisike" value="2">
                              <h4>Review Proposal TA</h4>
                              <textarea cols="80" id="reviewPTA" name="reviewPTA" rows="20" class="form-control">{{$reviewPTA2->revisi or ''}}</textarea>
                              <br>
                              <div class='form-group'>
                                  <select class="form-control" name="status">
                                    <option value='0' @if($reviewPTA2 !="") @if($reviewPTA2->status==0) selected @endif @endif>Revisi</option>
                                    <option value='1' @if($reviewPTA2 !="") @if($reviewPTA2->status==1) selected @endif @endif>Tidak Revisi</option>
                                  </select>
                              </div>
                              <div class='form-group'>
                                  <input type="submit" value="Simpan" class='btn btn-info'>
                              </div>
                            </form>
                          </div>
                        </div>
                        
                    </div>
                  </div>
                  <!-- /.card -->          
              </div>
            
            </div>
            <!-- ./row -->
                
          </div>
        </div>
    <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@stop

@push('scripts') 
    <script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfobject/2.1.1/pdfobject.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfobject/2.1.1/pdfobject.min.js"></script>
    <script src="{{asset('js/ckeditor.js')}}"></script>
    <script>
        var options = {
          pdfOpenParams: {
            navpanes: 1,
            view: "FitH",
            pagemode: "thumbs"
          }
        };
        PDFObject.embed("{{asset('public/Berkas_ProposalTA/'.$namapdf1)}}", "#example1",options);
        PDFObject.embed("{{asset('public/Berkas_ProposalTA/'.$namapdf2)}}", "#example2",options);
                 
    </script>
   
@endpush