@extends('Layout.master')

@section('title','Laporan Tugas Akhir')

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
        <a href="{{url('/Mahasiswa/Profile')}}" class="nav-link">Ubah Profile</a>
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

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Laporan Tugas Akhir</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item">Laporan Tugas Akhir</li>
                    <li class="breadcrumb-item active">Revisi</li>
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
                          Revisi Laporan Tugas Akhir
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
                            <form method='post' action='{{url('/LaporanTA/Revisi/Store')}}' enctype='multipart/form-data'>
                              {{ csrf_field() }}
                                <!--Upload Laporan Full-->
                                <div class="form-group row">
                                    <label for="exampleInputFile"> Laporan Tugas Akhir Final Ful(DOC) </label>
                                    <br>
                                    <span>Laporan Tugas Akhir Utuh dari cover s.d Lampiran</span>
                                    <input type="file" name="laporandoc" accept=".doc, .docx"  class="form-control" >         
                                </div>

                                <!--Upload Laporan Full-->
                                <div class="form-group row">
                                    <label for="exampleInputFile"> Laporan Tugas Akhir Final Ful(PDF) </label>
                                    <br>
                                    <span>Laporan Tugas Akhir Utuh dari cover s.d Lampiran</span>
                                    <input type="file" name="laporanrevisipdf" accept=".pdf"  class="form-control" >         
                                </div>

                                <div class='form-group'>
                                    <input type="submit" value="Simpan" class='btn btn-info'>
                                </div>
                            </form>
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
@stop

@push('scripts')
  
 

@endpush