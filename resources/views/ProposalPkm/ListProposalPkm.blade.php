@extends('Layout.master')

@section('title','Propsal PKM')

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
        <h1>Daftar Mahasiswa (Program Kreativitas Mahasiswa POLBAN)</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item">Proposal PKM</li>
        </ol>
        </div>
    </div>
    </div><!-- /.container-fluid -->
</section>


<!-- Main content -->
<section class="content">
    <div class="container-fluid">
    
    <!-- Main row -->
    <div class="row">
        <!-- Left col -->
        <section class="col-12">
        <!-- Custom tabs (Charts with tabs)-->
        <div class="card">
            <div class="card-body" style="padding:30px">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered table-responsive" id="tableListPoposalPKm">
                            <thead>
                                <th>No. Urut</th>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Judul PKM POLBAN</th>
                                <th>Judul PKM BELMAWA (Rencana)</th>
                                <th>Judul TA/KP (Rencana)</th>
                                <th>Jenis PKM</th>
                                <th>Bidang</th>
                                <th>Pembimbing 1</th>
                                <th>Pembimbing 2</th>
                            </thead>
                            <tbody>
                                @foreach($listproposalpkm as $item)
                                    @php
                                        $tahun = date('Y') - $item->angkatan;
                                        $kelas = $tahun.$item->kelas;
                                    @endphp
                                    @if($kelas == "2A" || $kelas == "2b" || $kelas == "3NK")
                                    <tr>
                                        <td>{{$item->nourut}}</td>
                                        <td><a href="{{url('/ReviewProposal/PKM/R')}}/{{$revisike}}/{{$item->NIM}}">{{$item->NIM}}</a></td>
                                        <td>{{$item->nama}}</td>
                                        <td>{{$item->judul_proposal_polban}}</td>
                                        <td>{{$item->judul_proposal_belmawa}}</td>	
                                        <td>{{$item->judul_proposal_TA}}</td>	
                                        <td>{{$item->jenis}}</td>	
                                        <td>{{$item->bidang}}</td>	
                                        <td>{{$item->pembimbing_1}}</td>	
                                        <td>{{$item->pembimbing_2}}</td>	
                                    </tr>
                                    @endif

                                @endforeach
                            </tbody>
                        </table>
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

@stop

@push('scripts') 
<!-- Page level plugins -->
<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script>
    $(function () {
        $("#tableListPoposalPKm").DataTable( {
            "order": [[ 0, "asc" ]],
            buttons: [
                'excelHtml5',
                'pdfHtml5'
            ]
        } );
    });      
</script>  
@endpush