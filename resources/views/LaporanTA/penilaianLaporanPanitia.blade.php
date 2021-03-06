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
                <h1>LOCKED Penilaian Laporan Tugas Akhir</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item">Laporan Tugas Akhir</li>
                    <li class="breadcrumb-item active">Penilaian</li>
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
                                        <textarea cols="30" rows="4" class="form-control" disabled>{{ $laporanTA->judul_ta }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Lihat Berkas</label>
                                        <div class="col-sm-10">
                                            <a href={{url('/Laporan/Download',[$laporanTA->abstrak] )}} class="btn btn-primary" target="_blank"> Lihat Abstrak Laporan</a>
                                            <a href={{url('/Laporan/Download',[$laporanTA->laporan] )}} class="btn btn-primary" target="_blank"> Lihat Isi Laporan</a>
                                            <a href={{url('/Laporan/Download',[$laporanTA->lampiran] )}} class="btn btn-primary" target="_blank"> Lihat Lampiran Laporan</a>
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

                <div class="row">
                    <div class="col-12">
                        <!-- Custom Tabs -->
                        <div class="card">
                            <div class="card-header d-flex p-0">
                                <ul class="nav nav-pills p-2">
                                <li class="nav-item"><a class="nav-link active" href="#depan2" data-toggle="tab">Halaman Depan</a></li>
                                <li class="nav-item"><a class="nav-link" href="#bab2" data-toggle="tab">BAB 1 s.d 5</a></li>
                                <li class="nav-item"><a class="nav-link" href="#lampiran2" data-toggle="tab">Lampiran</a></li>
                                
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">

                                <div class="tab-pane active" id="depan2">
                                    <table class="table table-responsive table-bordered table-striped" style="width:100%;">
                                        <thead class="thead-dark" style="text-align:center">
                                            <th style="width:5%">No. </th> <th style="min-width:45%">Poin Penilaian</th> <th style="width:50%">Nilai</th>
                                        </thead>
                                        <tbody>
                                            @php $i=1; @endphp
                                            @foreach ($poinPenilaianLaporan_Depan as $item)
                                                @php
                                                    $jenis = explode(",",$item->jenis);

                                                    $nilaiLaporan = \App\nilaiLaporan::where('poin_penilaian_id','=',$item->id)
                                                    ->where(function ($query) use($nim,$kode_dosen) {
                                                        $query->where('kode_dosen','=',$kode_dosen)
                                                        ->where('nim','=',$nim);
                                                    })
                                                    ->first();
                                                    if (isset($nilaiLaporan->nilai)) {
                                                        $nilai = strval($nilaiLaporan->nilai); 
                                                    }else{
                                                        $nilai = "0";
                                                    }                                  
                                                @endphp
                                                @if (in_array($laporanTA->jenis_judulta,$jenis))
                                                    <tr>
                                                        <td>{{$i}}</td>
                                                        <td>{{$item->poin_penilaian}}</td>
                                                        <td>  {{$nilai}}
                                                        </td>
                                                    </tr>
                                                @endif
                                                
                                            @php $i++; @endphp
                                            @endforeach                                
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.tab-pane -->

                                <div class="tab-pane" id="bab2">
                                    <table class="table table-responsive table-bordered table-striped" style="width:100%;">
                                        <thead class="thead-dark" style="text-align:center">
                                            <th style="width:5%">No. </th> <th style="min-width:45%">Poin Penilaian</th> <th style="width:50%">Nilai</th>
                                        </thead>
                                        <tbody>
                                            @php $i=1; @endphp
                                            @foreach ($poinPenilaianLaporan_Bab as $item)
                                                @php
                                                    $jenis = explode(",",$item->jenis);

                                                    $nilaiLaporan = \App\nilaiLaporan::where('poin_penilaian_id','=',$item->id)
                                                    ->where(function ($query) use($nim,$kode_dosen) {
                                                        $query->where('kode_dosen','=',$kode_dosen)
                                                        ->where('nim','=',$nim);
                                                    })
                                                    ->first();
                                                    if (isset($nilaiLaporan->nilai)) {
                                                        $nilai = strval($nilaiLaporan->nilai); 
                                                    }else{
                                                        $nilai = "0";
                                                    }                                  
                                                @endphp
                                                @if (in_array($laporanTA->jenis_judulta,$jenis))
                                                    <tr>
                                                        <td>{{$i}}</td>
                                                        <td>{{$item->poin_penilaian}}</td>
                                                        <td>  {{$nilai}}
                                                        </td>
                                                    </tr>
                                                @endif
                                                
                                            @php $i++; @endphp
                                            @endforeach                                
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.tab-pane -->

                                <div class="tab-pane" id="lampiran2">
                                    <table class="table table-responsive table-bordered table-striped" style="width:100%;">
                                        <thead class="thead-dark" style="text-align:center">
                                            <th style="width:5%">No. </th> <th style="min-width:45%">Poin Penilaian</th> <th style="width:50%">Nilai</th>
                                        </thead>
                                        <tbody>
                                            @php $i=1; @endphp
                                            @foreach ($poinPenilaianLaporan_Lampiran as $item)
                                                @php
                                                    $jenis = explode(",",$item->jenis);

                                                    $nilaiLaporan = \App\nilaiLaporan::where('poin_penilaian_id','=',$item->id)
                                                    ->where(function ($query) use($nim,$kode_dosen) {
                                                        $query->where('kode_dosen','=',$kode_dosen)
                                                        ->where('nim','=',$nim);
                                                    })
                                                    ->first();
                                                    if (isset($nilaiLaporan->nilai)) {
                                                        $nilai = strval($nilaiLaporan->nilai); 
                                                    }else{
                                                        $nilai = "0";
                                                    }                                  
                                                @endphp
                                                @if (in_array($laporanTA->jenis_judulta,$jenis))
                                                    <tr>
                                                        <td>{{$i}}</td>
                                                        <td>{{$item->poin_penilaian}}
                                                            <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                                Link with href
                                                            </a>
                                                            <div class="collapse" id="collapseExample">
                                                                <div class="card card-body">
                                                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td> {{$nilai}} </td>
                                                    </tr>
                                                @endif
                                                
                                            @php $i++; @endphp
                                            @endforeach                                
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.tab-pane -->

                                
                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                        <!-- ./card -->
                    </div>
                    <!-- /.col -->
                </div>

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
                                    <form action="{{url('/Laporan/Revisi/simpan')}}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="nim" value="{{$nim}}">
                                        <input type="hidden" name="kode_dosen" value="{{$kode_dosen}}">
                                        <div class="form-group">
                                            <textarea name="revisi" id="revisiLaporan" cols="30" rows="10">{{$revisiLaporan->revisi or ''}}</textarea>
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