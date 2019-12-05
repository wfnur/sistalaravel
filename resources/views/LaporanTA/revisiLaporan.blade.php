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
        <a href="{{url('/Dosen/Beranda')}}" class="nav-link">Beranda</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
        <a href="{{url('/Dosen/Profile')}}" class="nav-link">Ubah Profile</a>
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
                <h1>LOCKED Penilaian Laporan Tugas Akhir</h1>
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
                            <!-- /.card-header -->
                            <div class="card-body" style="display: block;">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Judul Tugas Akhir</label>
                                    <div class="col-sm-10">
                                        <textarea cols="30" rows="1" class="form-control" disabled>{{ $laporanTA->mahasiswa->nama }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Judul Tugas Akhir</label>
                                    <div class="col-sm-10">
                                        <textarea cols="30" rows="4" class="form-control" disabled>{{ $laporanTA->judul_ta }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Lihat Berkas</label>
                                        <div class="col-sm-10">
                                            <a href={{asset('storage/Berkas_LaporanTA/'.$laporanTA->laporandoc)}} class="btn btn-primary" target="_blank"> Download Laporan DOC </a>
                                            <a href={{asset('storage/Berkas_LaporanTA/'.$laporanTA->laporanrevisipdf)}} class="btn btn-primary" target="_blank"> Lihat Laporan PDF</a>
                                        </div>
                                    </div>
                                <!---
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Status Dosen</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="{{$statusDosen}}" disabled >
                                    </div>
                                </div>
                                --->
                            </div>
                        </div>
                        <!-- /.card -->          
                    </div>
                    <!-- /.col-->
                </div>
                <!-- ./row -->

                <!-- ./Data Proposal -->    
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-info card-outline">
                            <div class="card-header">
                                <h3>Revisi Laporan</h3>
                            </div>
                        <!-- /.card-header -->
                        <div class="card-body" style="display: block;">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{url('/Laporan/Revisi/simpan2')}}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="nim" value="{{$nim}}">
                                        <input type="hidden" name="kode_dosen" value="{{auth()->user()->username}}">
                                        <div class="form-group">
                                            <textarea name="revisi" id="revisiLaporan" cols="30" rows="20">{{$revisiLaporan->revisi or ''}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <select name="status_revisi" class="form-control">
                                                <option value="0" @if ($revisiLaporan->status_revisi == 0) selected @endif>Masih Harus Revisi</option>
                                                <option value="1" @if ($revisiLaporan->status_revisi == 1) selected @endif>Tidak Ada revisi</option>
                                            </select>
                                        </div>
                                        <input type="submit" value="Simpan Revisi" class="btn btn-primary btn-lg">
                                    </form>
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
@stop

@push('scripts')    
<script>
    $(function(){
        $('input:radio').change(function(id){
            $(".Myform").submit();  
        });          
    
    });
    function saveNilai(id){
        var kode_bimbingan = $("form[id="+id+"]").serialize();
        console.log(kode_bimbingan);
        $.ajax({
            type:"post",
            url:"{{url('/Laporan/Penilaian/simpan')}}",
            data: kode_bimbingan,
            cache:false,
            success: function (a){
                if(a=='Saved'){
                    alert('Sukses Melakukan Verifikasi');
                    
                }
            }
        });
        
        return false; 
    }
    
    
</script>
    <script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
    <script src="{{asset('js/ckeditor.js')}}"></script>
@endpush