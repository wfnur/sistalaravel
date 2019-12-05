@extends('Layout.master')

@section('title','Bimbingan')

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
</nav>

 
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
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="offset-2">
                <h1 class="m-0 text-dark">Upload Form Bimbingan</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left" style="margin-top:7px;">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item">Bimbingan</li>
                <li class="breadcrumb-item active">Tambah Bimbingan</li>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
        
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <section class="col-8 offset-2">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
                <div class="card-body">
                    <div class="col-12">
                        <form action="{{url('/Bimbingan/store')}}" method="POST" enctype="multipart/form-data">              
                            {{csrf_field()}}
                            <div class="form-group">
                                <label>Tanggal Bimbingan</label>
                                <input type="text" name="tanggalbimbingan" class="tanggalbimbingan form-control" autocomplete="off" required>
                            </div> 

                            <div class="form-group">
                                <label>Pembimbing </label>
                                <select name="pembimbing" class="form-control">
                                    <option value="P1">Pembimbing 1</option>
                                    <option value="P2">Pembimbing 2</option>
                                </select>
                            </div>

                            <div class="form-group ">
                                <label> Form Bimbingan (PDF) </label>
                                <input type="file" name="formBimbingan" accept=".pdf"  class="form-control">         
                            </div>
                                
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary"> Simpan</button>
                            </div>
                        </form>
                    </div>
                </div><!-- /.card-body -->
            </div>
            <!-- /.card -->

            </section>
            <!-- /.Left col -->
            
        </div>
        <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection