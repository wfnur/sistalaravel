@extends('Layout.master')

@section('title','Daftar Mahasiswa')

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

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2" style="padding-left:20px">
            <div class="">
                <h1 class="m-0 text-dark">Daftar Mahasiswa - Review Proposal TA</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left" style="margin-top:7px;">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item">Review</li>
                <li class="breadcrumb-item active">Proposal TA</li>
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
                <div class="card-body">
                    <table class="table table-responsive table-striped" id="listMhs">
                        <thead class="thead-dark">
                           <th>NIM</th> <th>Nama</th> <th>Kelas </th> <th>Judul Tugas Akhir</th> <th>Uploaded File</th> 
                        </thead>
                        <tbody>
                            
                            @foreach ($mahasiswa as $item)
                                @php
                                    $kelas = date('Y') - $item->angkatan;
                                    if(date('m') > 9){
                                        $kelas = $kelas+1;
                                    }
                                    $fixkelas =$kelas.$item->kelas;
                                    $proposal = \App\proposalTA::where('NIM', '=', $item->NIM)->first();
                                    $berkasdoc = \App\berkasProposalTA::where('NIM', '=', $item->NIM)
                                    ->where('jenis_berkas', '=', 'doc')
                                    ->first();
                                    $berkaspdf = \App\berkasProposalTA::where('NIM', '=', $item->NIM)
                                    ->where('jenis_berkas', '=', 'pdf')
                                    ->first();

                                @endphp
                                @if ($fixkelas == '3A' OR $fixkelas == '3B' OR $fixkelas == '4NK')
                                    <tr>
                                    <td><a href={{url('/Review/ProposalTA',[$item->NIM])}} target='_blank'>{{$item->NIM}}</a></td>
                                        <td>{{$item->nama}}</td>
                                        <td>{{$fixkelas}}</td>
                                        <td>{{$proposal->judul_ta or '(kosong)'}}</td>
                                        <td>
                                            
                                            @if ($berkasdoc != "")
                                                <a href={{asset('storage/Berkas_ProposalTA/'.$berkasdoc->nama_berkas)}} target="_blank" class="btn btn-success" style="margin-bottom:5px;">
                                                    <i class="fa fa-check-circle"></i>
                                                    Proposal TA (.doc)
                                                </a>
                                            @else
                                                <div class="btn btn-danger" style="margin-bottom:5px;">
                                                    <i class="fa fa-remove"></i>
                                                    Proposal TA (.doc)
                                                </div>
                                            @endif

                                            @if ($berkaspdf != "")
                                                <a href={{asset('storage/Berkas_ProposalTA/'.$berkaspdf->nama_berkas)}} target="_blank" class="btn btn-success" style="margin-bottom:5px;">
                                                    <i class="fa fa-check-circle"></i>
                                                    Proposal TA (.pdf)
                                                </a>
                                            @else
                                                <div class="btn btn-danger" style="margin-bottom:5px;">
                                                    <i class="fa fa-remove"></i>
                                                    Proposal TA (.pdf)
                                                </div>
                                            @endif
                                            

                                            
                                            
                                        </td>
                                        
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
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

@push('scripts')  
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
    <script>
        $('#ok2').html('');
        $(function () {
            $("#listMhs").DataTable({
                dom: 'Bfrtip',
                buttons: [{
                    extend : 'excel',
                    text : 'Export to Excel',
                    title: 'Daftar Judul TA',
                    exportOptions : {
                        modifier : {
                            // DataTables core
                            order : 'index',  // 'current', 'applied', 'index',  'original'
                            page : 'all',      // 'all',     'current'
                            search : 'none'     // 'none',    'applied', 'removed'
                        }
                    }
                }]
            });
        });           

    </script>  
    
    <script>
        function unlock(nim){
            var kode_bimbingan = $("form[id="+nim+"_1]").serialize();
            console.log(kode_bimbingan);
            $.ajax({
                type:"post",
                url:"{{url('/Unlock/Laporan')}}",
                data: kode_bimbingan,
                cache:false,
                success: function (a){
                    if(a=='saved'){
                        alert('Unlock Nilai Laporan Success');
                        $('#ok2').html("<i class='fa fa-unlock fa-2x text-success'></i>");
                        $('#ok1').html("");   
                    }
                }
            });
            return false; 
        }

        function unlock2(nim){
            var kode_bimbingan = $("form[id="+nim+"_2]").serialize();
            console.log(kode_bimbingan);
            $.ajax({
                type:"post",
                url:"{{url('/Unlock/Laporan')}}",
                data: kode_bimbingan,
                cache:false,
                success: function (a){
                    if(a=='saved'){
                        alert('Unlock Nilai Laporan Success');
                        $('#ok22').html("<i class='fa fa-unlock fa-2x text-success'></i>");
                        $('#ok12').html("");   
                    }
                }
            });
            return false; 
        }

        function unlock3(nim){
            var kode_bimbingan = $("form[id="+nim+"_3]").serialize();
            console.log(kode_bimbingan);
            $.ajax({
                type:"post",
                url:"{{url('/Unlock/Laporan')}}",
                data: kode_bimbingan,
                cache:false,
                success: function (a){
                    if(a=='saved'){
                        alert('Unlock Nilai Laporan Success');
                        $('#ok23').html("<i class='fa fa-unlock fa-2x text-success'></i>");
                        $('#ok13').html("");   
                    }
                }
            });
            return false; 
        }
    </script>
@endpush