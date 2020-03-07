@extends('Layout.master')
@section('title','Ubah Data Mahasiswa')

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
    <div class="alert alert-success" role="alert">
        {{session('sukses')}}
    </div>        
    @endif

    <!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-2">
        <h1 class="m-0 text-dark">Mahasiswa</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item">Mahasiswa</li>
            <li class="breadcrumb-item active">Edit</li>
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
        <section class="col-12">
        <!-- Custom tabs (Charts with tabs)-->
        <div class="card">
            <div class="card-header">
            <h3 class="card-title p-3">
                <i class="fa fa-pie-chart mr-1"></i>
                Data Mahasiwa
            </h3>
            </div><!-- /.card-header -->
            <div class="card-body" style="padding:30px">
                
            <div class="row">
                <div class="col-12 offset-2">
                    <h1>Edit Mahasiswa</h1>
                </div>
                <div class="col-8 offset-2">
                    <form action="{{url('/Mahasiswa/update', [$mahasiswa->NIM])}}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>NIM</label>
                            <input type="text" name="NIM"  class="form-control" value="{{$mahasiswa->NIM}}" disabled>  
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control" value="{{$mahasiswa->nama}}">  
                        </div>
                        <div class="form-group">
                            <label>Program Studi</label>
                            <input type="text" name="prodi" class="form-control" value="{{$mahasiswa->prodi}}">  
                        </div>
                        <div class="form-group">
                            <label>Angkatan</label>
                            <input type="text" name="angkatan" class="form-control" value="{{$mahasiswa->angkatan}}">  
                        </div>
                        <div class="form-group">
                            <label>Kelas</label>
                            <input type="text" name="kelas" class="form-control" value="{{$mahasiswa->kelas}}">  
                        </div>
                        <div class="form-group">
                            <label>Nomor Urut (absen)</label>
                            <input type="text" name="nourut" class="form-control" value="{{$mahasiswa->nourut}}">  
                        </div>
                        <div class="form-group">
                            <label>Tempat, Tanggal Lahir (ch : Bandung 8 September 1998)</label>
                            <input type="text" name="ttl" class="form-control" value="{{$mahasiswa->ttl}}">  
                        </div>
                        <div class="form-group">
                            <label>Jenis kelamin</label>
                        </div>
                        <div class='form-check form-check-inline' style='margin-top:-60px;'>
                            <input type="radio" name="jk" value="L" class="form-check-input" @if ($mahasiswa->jk == 'L') checked @endif >
                            <label class="form-check-label">Laki - Laki</label>

                            <input type="radio" name="jk" value="P" class="form-check-input"  @if ($mahasiswa->jk == 'P') checked @endif >
                            <label class="form-check-label">Perempuan</label>
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea class="form-control" rows='5' name='alamat'>{{$mahasiswa->alamat}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Telpon</label>
                            <input type="text" name="telpon"  class="form-control" value="{{$mahasiswa->telpon}}">  
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" value="{{$mahasiswa->email}}">  
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-warning" value="Simpan"> Update</button>
                        </div>
                    </form>
                </div>
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