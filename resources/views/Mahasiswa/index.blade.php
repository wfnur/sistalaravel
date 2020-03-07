@extends('Layout.master')

@section('title','Manaje Mahasiswa')

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
    <div class="col-8" style="margin:10px auto;">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('sukses')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
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
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Mahassiwa</li>
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
                    <div class="col-4">
                        <h1>Data Mahasiswa</h1>
                    </div>
                    <!--<div class="col-4">
                        <form class="form-inline float-right" method="GET" action="{{url('/Mahasiswa')}}" >
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="cari">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        </form>
                    </div>-->
                    <div class="offset-3 col-4">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" >
                            Tambah Mahasiswa
                        </button>
                        <a href={{url('/Mahasiswa/CreateUser')}} class="btn btn-warning float-right">Tambah User</a>
                    </div>              
                    
            
                    <div class="col-md-12">
                        <table class="table table-hover table-bordered table-responsive" id="listMhs_index">
                            <thead >
                                    <th>No Urut</th>
                                    <th>NIM</th>
                                    <th>Nama</th>
                                    <th>Angkatan</th>
                                    <th>Kelas</th>
                                    <th>Program Studi</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Alamat</th>
                                    <th>Tempat, Tanggal Lahir</th>
                                    <th>Email</th>
                                    <th>Telepon</th>
                                    <th>Action</th>
                                    <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach ($data_mahasiswa as $item)
                                <tr>
                                    <td>{{ $item->nourut }}</td>
                                    <td>{{ $item->NIM }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->angkatan }}</td>
                                    <td>{{ $item->kelas }}</td>
                                    <td>{{ $item->prodi }}</td>
                                    <td>{{ $item->jk }}</td>
                                    <td>{{ $item->alamat }}</td>
                                    <td>{{ $item->ttl }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->telpon }}</td>
                                    <td><a href="{{ url ('/Mahasiswa/edit',[$item->NIM ])}}" class="btn btn-warning">Edit</a></td>
                                    <td><a href="{{ url ('/Mahasiswa/delete',[$item->NIM ])}}" class="btn btn-danger" onclick="return confirm('Yakin anda akan menghapus data ini ?')">Hapus</a></td>
                                </tr>
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


<!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Mahasiswa</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form action="{{url('/Mahasiswa/create')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>NIM</label>
                        <input type="text" name="NIM"  class="form-control" required>  
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control" required>  
                    </div>
                    <div class="form-group">
                        <label>Program Studi</label>
                        <input type="text" name="prodi" class="form-control">  
                    </div>
                    <div class="form-group">
                        <label>Angkatan</label>
                        <input type="text" name="angkatan" class="form-control" required>  
                    </div>
                    <div class="form-group">
                        <label>Kelas</label>
                        <input type="text" name="kelas" class="form-control" required>  
                    </div>
                    <div class="form-group">
                        <label>Nomor Urut (absen)</label>
                        <input type="text" name="nourut" class="form-control" required>  
                    </div>
                    <div class="form-group">
                        <label>Tempat, Tanggal Lahir (ch : Bandung 8 September 1998)</label>
                        <input type="text" name="ttl" class="form-control">  
                    </div>
                    <div class="form-group">
                        <label>Jenis kelamin</label>
                    </div>
                    <div class='form-check form-check-inline' style='margin-top:-60px;'>
                        <input type="radio" name="jk" value="L" class="form-check-input" >
                        <label class="form-check-label">Laki - Laki</label>
                        <input type="radio" name="jk" value="P" class="form-check-input"  >
                        <label class="form-check-label">Perempuan</label>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea class="form-control" rows='5' name='alamat'></textarea>
                    </div>
                    <div class="form-group">
                        <label>Telpon</label>
                        <input type="text" name="telpon"  class="form-control">  
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control">  
                    </div>                
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" value="Simpan"> Save changes</button>
            </div>
                </form>
        </div>
        </div>
    </div>
     
@endsection

@push('scripts')  
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script>
        $(function () {
            $("#listMhs_index").DataTable( {
                "order": [[ 0, "asc" ]],
                buttons: [
                    'excelHtml5',
                    'pdfHtml5'
                ]
            } );
        });      
    </script>  
@endpush    