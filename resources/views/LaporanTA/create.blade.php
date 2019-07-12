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
                    <li class="breadcrumb-item active">Laporan Tugas Akhir</li>
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
                          Laporan Tugas Akhir
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
                            <form method='post' action='{{url('/LaporanTA/Store')}}' enctype='multipart/form-data'>
                              {{ csrf_field() }}
                                  <!--judul-->
                                  <div class='form-group row'>
                                      <div class='col-md-12'>
                                        <label>Judul Tugas Akhir (terbaru)</label>
                                        <textarea cols="80" name="judul_ta" rows="3" class="form-control" required {{$disable}}></textarea>
                                      </div>
                                  </div>

                                  <!--bidang-->
                                  <div class="form-group row">
                                    <div class='col-md-12'>
                                        <label>Bidang</label>
                                        <select class="form-control" name="bidang" required {{$disable}}>
                                            <option value='0'>-------------------------</option>
                                            @foreach ($bidang as $valBidang)
                                              <option value="{{ $valBidang->id }}"> {{ $valBidang->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                  </div>

                                  <!--Jenis-->
                                  <div class="form-group row">
                                    <div class='col-md-12'>
                                        <label>Jenis Judul Tugas Akhir</label>
                                        <hr>
                                        <span>Lihat format laporan dibawah ini untuk keterangan lebih lanjut <br>
                                        (lihat kolom jenis judul TA. sesuaikan butir yang tersedia pada laporan saudara dengan jenis judul TA)</span><br>
                                        <a href={{asset('storage/panduan_laporan.xlsx')}} class="btn btn-primary" target="_blank"> Lihat Panduan</a>
                                        <hr>
                                        <select class="form-control" name="jenis_judulta" required {{$disable}}>
                                            <option value='0'>-------------------------</option>
                                            <option value='1'>Pada Laporan Terdapat Komponen Hardware</option>
                                            <option value='2'>Pada Laporan Terdapat Komponen Software</option>
                                            <option value='3'>Pada Laporan Terdapat Komponen Hardware dan Software</option>
                                            <option value='4'>Antena/Filter</option>
                                        </select>
                                    </div>
                                  </div>

                                  <!--Pembimbing 1-->
                                  <div class="form-group row">
                                    <div class='col-md-12'>
                                        <label>Pembimbing 1 </label>
                                        <select class="form-control" name="pembimbing1" required {{$disable}}>
                                          <option value='0'>-------------------------</option>
                                          @foreach ($pembimbing1 as $p1)
                                            <option value={{$p1->kode_dosen }}> {{ $p1->nama }}</option>
                                          @endforeach
                                        </select>
                                    </div>
                                  </div>

                                  <!--Pembimbing 2-->
                                  <div class="form-group row">
                                    <div class='col-md-12'>
                                        <label>Pembimbing 2 </label>
                                        <select class="form-control" name="pembimbing2" {{$disable}}>
                                          <option value='0'>-------------------------</option>
                                          @foreach ($pembimbing2 as $p2)
                                            <option value={{ $p2->kode_dosen }}> {{ $p2->nama }}</option>
                                          @endforeach
                                        </select>
                                    </div>
                                  </div>

                                  <!--Upload abstrak-->
                                  <div class="form-group row">
                                      <label for="exampleInputFile"> Abstrak Laporan Tugas Akhir Final (PDF) </label>
                                      <br>
                                      <span> Abstak indonesia dan inggris</span>
                                      <input type="file" name="abstrak" accept=".pdf"  class="form-control" {{$disable}}>         
                                  </div>

                                  <!--Upload Laporan-->
                                  <div class="form-group row">
                                      <label for="exampleInputFile"> Isi Laporan Tugas Akhir Final (PDF) </label>
                                      <br>
                                      <span> mulai dari daftar isi sampai dengan Daftar Pustaka</span>
                                      <input type="file" name="laporanTA" accept=".pdf"  class="form-control" {{$disable}}>         
                                  </div>

                                  <!--Upload Lampiran-->
                                  <div class="form-group row">
                                      <label for="exampleInputFile"> Lampiran Laporan Tugas Akhir Final (PDF) </label>
                                      <br>
                                      <span>Lampiran-lampiran pada laporan</span>
                                      <input type="file" name="lampiran" accept=".pdf"  class="form-control" {{$disable}}>         
                                  </div>

                                  <!--Upload Laporan Full-->
                                  <div class="form-group row">
                                      <label for="exampleInputFile"> Laporan Tugas Akhir Final Ful(DOC) </label>
                                      <span class="btn-warning" style="padding:5px; border-radius:10px;">Laporan Tugas Akhir Utuh dari cover s.d Lampiran</span>
                                      <input type="file" name="laporandoc" accept=".doc, .docx"  class="form-control" {{$disable}}>         
                                  </div>

                                  <!--Form Permohonan-->
                                  <div class="form-group row">
                                      <label for="exampleInputFile"> Form Permohonan (PDF) </label>
                                      <input type="file" name="form_permohonan" accept=".pdf"  class="form-control" {{$disable}}>         
                                  </div>

                                  <!--Form Bimbingan-->
                                  <div class="form-group row">
                                      <label for="exampleInputFile"> Form Bimbingan yang sudah ditandatangani oleh Pembimbing (PDF) </label>
                                      <input type="file" name="form_bimbingan" accept=".pdf"  class="form-control">         
                                  </div>

                                  <div class='form-group'>
                                      <input type="submit" value="Simpan" class='btn btn-info' {{$disable}}>
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