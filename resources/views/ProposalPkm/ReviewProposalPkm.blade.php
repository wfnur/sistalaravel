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

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Proposal Program Kreativitas Mahasiswa</h1>
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
        <div class="row">
        
            <div class='col-md-12 col-xs-12'>
              <div id="alert-pkm"></div>
              <div class="card card-primary card-outline card-tabs">
                <div class="card-header p-0 pt-1 border-bottom-0">
                  <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="data-proposal-tab" data-toggle="pill" href="#data-proposal" role="tab" aria-controls="custom-tabs-two-home" aria-selected="true">Data Proposal</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="pendahuluan-tab" data-toggle="pill" href="#pendahuluan" role="tab" aria-controls="custom-tabs-two-profile" aria-selected="false">Pendahuluan</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="tinjauan-pustaka-tab" data-toggle="pill" href="#tinjauan-pustaka" role="tab" aria-controls="custom-tabs-two-messages" aria-selected="false">Tinjauan Pustaka</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="metode-pelaksanaan-tab" data-toggle="pill" href="#metode-pelaksanaan" role="tab" aria-controls="custom-tabs-two-settings" aria-selected="false">Metode Pelaksanaan</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="biaya-jadwalkegiatan-tab" data-toggle="pill" href="#biaya-jadwalkegiatan" role="tab" aria-controls="custom-tabs-two-settings" aria-selected="false">Biaya dan Jadwal kegiatan</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="daftar-pustaka-tab" data-toggle="pill" href="#daftar-pustaka" role="tab" aria-controls="custom-tabs-two-settings" aria-selected="false">Daftar Pustaka</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="justifikasi-organisasi-tab" data-toggle="pill" href="#justifikasi-organisasi" role="tab" aria-controls="custom-tabs-two-settings" aria-selected="false">Justifikasi Anggaran dan Susunan Organisasi</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="upload-file-tab" data-toggle="pill" href="#upload-file" role="tab" aria-controls="custom-tabs-two-settings" aria-selected="false">Upload File</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="gambaran-teknologi-tab" data-toggle="pill" href="#gambaran-teknologi" role="tab" aria-controls="custom-tabs-two-settings" aria-selected="false">Gambaran Teknologi yang Hendak Diterapkembangkan</a>
                    </li>
                  </ul>
                </div>
                <div class="card-body">
                  <div class="tab-content" id="custom-tabs-two-tabContent">
                    <!--Data Proposal-->
                    <div class="tab-pane fade show active" id="data-proposal" role="tabpanel" aria-labelledby="data-proposal-tab">
                        <form id="formdataproposal">
                        {{ csrf_field() }}
                        <input type="hidden" name="nim" value="{{$nim}}">
                        <input type="hidden" name="revisike" value="{{$revisike}}">
                        <input type="hidden" name="kategori" value="dataproposal">

                        <div class="col-md-12">
                            <!--judul pkm-->
                            <div class='form-group row'>
                                <div class='col-md-6'>
                                    <label>Judul PKM Polban</label>
                                    <textarea id="judul_pkmpolban" rows="3" class="form-control" disabled></textarea>
                                </div>
                                <div class='col-md-2'>
                                    <label>Nilai (0 - 100)</label>
                                    <input type="text" name="nilai_judul_polban" id="nilai_judul_polban" class="form-control">
                                </div>
                                <div class='col-md-4'>
                                    <label>Komentar</label>
                                    <textarea name="rev_judul_polban" id="rev_judul_polban" rows="3" class="form-control"></textarea>
                                </div>
                            </div>

                            <!--judul belmawa-->
                            <div class='form-group row'>
                                <div class='col-md-6'>
                                    <label>Judul Judul PKM BELMAWA (Rencana)</label>
                                    <textarea id="judul_belmawa" rows="3" class="form-control" disabled></textarea>
                                </div>
                                <div class='col-md-2'>
                                    <label>Nilai (0 - 100)</label>
                                    <input type="text" name="nilai_judul_belmawa" id="nilai_judul_belmawa" class="form-control">
                                </div>
                                <div class='col-md-4'>
                                    <label>Komentar</label>
                                    <textarea name="rev_judul_belmawa" id="rev_judul_belmawa" rows="3" class="form-control"></textarea>
                                </div>
                            </div>
                            
                            <!--judul ta-->
                            <div class='form-group row'>
                                <div class='col-md-6'>
                                    <label>Judul TA/KP (Rencana)</label>
                                    <textarea id="judul_ta" rows="3" class="form-control" disabled></textarea>
                                </div>
                                <div class='col-md-2'>
                                    <label>Nilai (0 - 100)</label>
                                    <input type="text" name="nilai_judul_TA" id="nilai_judul_TA" class="form-control">
                                </div>
                                <div class='col-md-4'>
                                    <label>Komentar</label>
                                    <textarea name="rev_judul_TA" id="rev_judul_TA" rows="3" class="form-control"></textarea>
                                </div>
                            </div>

                            <!--jenis PKM-->
                            <div class="form-group row">
                                <div class='col-md-6'>
                                    <label>Jenis PKM</label>
                                    <input type="text" value="{{$data->jenis}}" class='form-control' disabled>
                                </div>
                                <div class="col-md-6">
                                  <input type="submit" value="Simpan" class="btn btn-primary">
                                </div>
                                
                            </div>

                            <!--bidang-->
                            <div class="form-group row">
                                <div class='col-md-6'>
                                    <label>Bidang </label>
                                    <input type="text" value="{{$bidang->nama}}" class='form-control' disabled>
                                </div>
                            </div>

                            <!--Pembimbing 1-->
                            <div class="form-group row">
                                <div class='col-md-6'>
                                    <label>Pembimbing 1 </label>
                                    <input type="text" value="{{$pembimbing1->nama}}" class='form-control' disabled>
                                </div>
                            </div>

                            <!--Pembimbing 2-->
                            <div class="form-group row">
                                <div class='col-md-6'>
                                    <label>Pembimbing 2 </label>
                                    <input type="text" value="{{$pembimbing2->nama}}" class='form-control' disabled>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                    <!--Pendahuluan-->
                    <div class="tab-pane fade" id="pendahuluan" role="tabpanel" aria-labelledby="pendahuluan-tab">
                      <form id="formpendahuluan">
                        {{ csrf_field() }}
                        <input type="hidden" name="nim" value="{{$nim}}">
                        <input type="hidden" name="revisike" value="{{$revisike}}">
                        <input type="hidden" name="kategori" value="pendahuluan">

                        <div class='form-group row'>
                          <div class='col-md-6'>
                              <label>Paragraf 1 : Permasalahan yang diangkat berdasarkan trend saat ini</label>
                              <textarea name='pendahuluan_p1' id='pendahuluan_p1' rows='5' class='form-control' disabled ></textarea>
                          </div>
                          <div class='col-md-2'>
                              <label>Nilai (0 - 100)</label>
                              <input type="text" name="nilai_pendahuluan_p1" id="nilai_pendahuluan_p1" class="form-control">
                          </div>
                          <div class='col-md-4'>
                              <label>Komentar</label>
                              <textarea name="rev_pendahuluan_p1" id="rev_pendahuluan_p1" rows="3" class="form-control"></textarea>
                          </div>
                        </div>
                        <div class='form-group row'>
                            <div class='col-md-6'>
                                <label>Paragraf 2 : Ulasan tentang karya-karya yang telah ada sebelumnya. Resumekan dari Bab Tinjauan Pustaka yang telah dibuat</label>
                                <textarea name='pendahuluan_p2' id='pendahuluan_p2' rows='5' class='form-control' disabled ></textarea>
                            </div>
                            <div class='col-md-2'>
                                <label>Nilai (0 - 100)</label>
                                <input type="text" name="nilai_pendahuluan_p2" id="nilai_pendahuluan_p2" class="form-control">
                            </div>
                            <div class='col-md-4'>
                                <label>Komentar</label>
                                <textarea name="rev_pendahuluan_p2" id="rev_pendahuluan_p2" rows="3" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class='form-group row'>
                          <div class='col-md-6'>
                            <label>Paragraf 3 : Ide yang diusulkan untuk pemecahan masalah tersebut di atas</label>
                              <textarea name='pendahuluan_p3' id='pendahuluan_p3' rows='5' class='form-control' disabled ></textarea>
                          </div>
                          <div class='col-md-2'>
                              <label>Nilai (0 - 100)</label>
                              <input type="text" name="nilai_pendahuluan_p3" id="nilai_pendahuluan_p3" class="form-control">
                          </div>
                          <div class='col-md-4'>
                              <label>Komentar</label>
                              <textarea name="rev_pendahuluan_p3" id="rev_pendahuluan_p3" rows="3" class="form-control"></textarea>
                          </div>
                        </div>
                        <div class='form-group row'>
                            <div class='col-md-6'>
                                <label>Paragraf 4 : Gambaran umum cara kerja alat yang diusulkan</label>
                                <textarea name='pendahuluan_p4' id='pendahuluan_p4' rows='5' class='form-control' disabled  ></textarea>
                            </div>
                            <div class='col-md-2'>
                              <label>Nilai (0 - 100)</label>
                              <input type="text" name="nilai_pendahuluan_p4" id="nilai_pendahuluan_p4" class="form-control">
                            </div>
                            <div class='col-md-4'>
                                <label>Komentar</label>
                                <textarea name="rev_pendahuluan_p4" id="rev_pendahuluan_p4" rows="3" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class='form-group row'>
                            <div class='col-md-6'>
                                <label>Paragraf 5 : Jelaskan pembagian sistem dengan partner kerja bila topik dibagi menjadi 2 atau lebih</label>
                                <textarea name='pendahuluan_p5' id='pendahuluan_p5' rows='5' class='form-control' disabled  ></textarea>
                            </div>
                            <div class='col-md-2'>
                              <label>Nilai (0 - 100)</label>
                              <input type="text" name="nilai_pendahuluan_p5" id="nilai_pendahuluan_p5" class="form-control">
                            </div>
                            <div class='col-md-4'>
                                <label>Komentar</label>
                                <textarea name="rev_pendahuluan_p5" id="rev_pendahuluan_p5" rows="3" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class='form-group row'>
                            <div class='col-md-6'>
                                <label>Paragraf 6 : Tuliskan Manfaat dari karya yang diusulkan</label>
                                <textarea name='pendahuluan_p6' id='pendahuluan_p6' rows='3' class='form-control' disabled ></textarea>
                            </div>
                            <div class='col-md-2'>
                              <label>Nilai (0 - 100)</label>
                              <input type="text" name="nilai_pendahuluan_p6" id="nilai_pendahuluan_p6" class="form-control">
                            </div>
                            <div class='col-md-4'>
                                <label>Komentar</label>
                                <textarea name="rev_pendahuluan_p6" id="rev_pendahuluan_p6" rows="3" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class='form-group row'>
                            <div class='col-md-6'>
                            <label>Paragraf 7 : Tuliskan Luaran dari karya yang diusulkan, Pilih salah satu atau lebih luaran berikut <br>
                                <ul>
                                    <li>Prototipe</li>
                                    <li>Produk</li>
                                    <li>Publikasi pada Proceding Seminar Nasional</li>
                                    <li>Publikasi pada Proceding Seminar Internasional</li>
                                    <li>Publikasi pada Jurnal Nasional Terindex</li>
                                    <li>Publikasi pada Jurnal Internasional Terindex</li>
                                    <li>Paten</li>
                                    <li>Simulasi</li>
                                </ul>
                            </label>
                                <textarea name='pendahuluan_p7' id='pendahuluan_p7' rows='3' class='form-control' disabled ></textarea>
                            </div>
                            <div class='col-md-2'>
                              <label>Nilai (0 - 100)</label>
                              <input type="text" name="nilai_pendahuluan_p7" id="nilai_pendahuluan_p7" class="form-control">
                            </div>
                            <div class='col-md-4'>
                                <label>Komentar</label>
                                <textarea name="rev_pendahuluan_p7" id="rev_pendahuluan_p7" rows="3" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class='form-group'>
                            <input type="submit" value="Simpan" class='btn btn-info'>
                        </div>
                      </form>
                    </div>
                    <!-- Tinjauan Pustaka -->
                    <div class="tab-pane fade" id="tinjauan-pustaka" role="tabpanel" aria-labelledby="tinjauan-pustaka-tab">
                        <form id="formtinjauanpustaka">
                          {{ csrf_field() }}
                          <input type="hidden" name="nim" value="{{$nim}}">
                          <input type="hidden" name="revisike" value="{{$revisike}}">
                          <input type="hidden" name="kategori" value="tinjauanpustaka">
                          @for($i=1;$i<=10;$i++)
                            <div class='form-group row'>
                              <div class='col-md-6'>
                                <label>Gambaran metoda yang digunakan pustaka {{$i}}</label>
                                <textarea id='pustaka_1{{$i}}' rows='5' class='form-control' disabled></textarea>
                              </div>
                              <div class='col-md-2'>
                                  <label>Nilai (0 - 100)</label>
                                  <input type="text" name="nilai_pustaka_1{{$i}}" id="nilai_pustaka_1{{$i}}" class="form-control">
                              </div>
                              <div class='col-md-4'>
                                  <label>Komentar</label>
                                  <textarea name="rev_pustaka_1{{$i}}" id="rev_pustaka_1{{$i}}" rows="3" class="form-control"></textarea>
                              </div>
                            </div>

                          @endfor
                          <div class='form-group row'>
                              <div class='col-md-6'>
                                <label>2. Tabel Perbandingan karya yang sudah ada dalam daftar pustaka dengan karya yang diusulkan.</label>
                                <textarea id="pustaka_2" rows='3' class='form-control' disabled>{{$tablepustaka2}}</textarea>
                              </div>
                              <div class='col-md-2'>
                                  <label>Nilai (0 - 100)</label>
                                  <input type="text" name="nilai_pustaka_2" id="nilai_pustaka_2" class="form-control">
                              </div>
                              <div class='col-md-4'>
                                  <label>Komentar</label>
                                  <textarea name="rev_pustaka_2" id="rev_pustaka_2" rows="3" class="form-control"></textarea>
                              </div>
                          </div>
                          <div class='form-group'>
                              <input type="submit" value="Simpan" class='btn btn-info'>
                          </div>
                        </form>
                    </div>
                    <!-- Metode Pelaksanaan -->
                    <div class="tab-pane fade" id="metode-pelaksanaan" role="tabpanel" aria-labelledby="metode-pelaksanaan-tab">
                        <form id="formmetodepelaksanaan">
                          {{ csrf_field() }}
                          <input type="hidden" name="nim" value="{{$nim}}">
                          <input type="hidden" name="revisike" value="{{$revisike}}">
                          <input type="hidden" name="kategori" value="metodepelaksanaan">
                          @for($i=0;$i < 6;$i++)
                            @php $j=$i+1;
                            $ket = array(
                              "Cara koleksi data awal",
                              "Cara mendesain alat (Menyusun desain teknis)",
                              "Cara membuat alat (Proses realisasi alat)",
                              "Cara uji keandalan alat",
                              "Cara menganalisis data",
                              "Cara evaluasi kinerja alat"
                            );
                            @endphp
                            <div class='form-group row'>
                              <div class='col-md-6'>
                                  <label>{{$ket[$i]}}</label>
                                  <textarea id='metode_pelaksanaan_{{$j}}' rows='5' class='form-control' disabled></textarea>
                              </div>
                              <div class='col-md-2'>
                                  <label>Nilai (0 - 100)</label>
                                  <input type="text" name="nilai_metode_pelaksanaan_{{$j}}" id="nilai_metode_pelaksanaan_{{$j}}" class="form-control">
                              </div>
                              <div class='col-md-4'>
                                  <label>Komentar</label>
                                  <textarea name="rev_metode_pelaksanaan_{{$j}}" id="rev_metode_pelaksanaan_{{$j}}" rows="3" class="form-control"></textarea>
                              </div>
                            </div>
                          @endfor
                          <div class='form-group'>
                              <input type="submit" value="Simpan" class='btn btn-info'>
                          </div>
                        </form>
                    </div>
                    <!-- Biaya dan Jadwal Kegiatan -->
                    <div class="tab-pane fade" id="biaya-jadwalkegiatan" role="tabpanel" aria-labelledby="biaya-jadwalkegiatan-tab">
                      <form id="formbiayakegiatan">
                          {{ csrf_field() }}
                          <input type="hidden" name="nim" value="{{$nim}}">
                          <input type="hidden" name="revisike" value="{{$revisike}}">
                          <input type="hidden" name="kategori" value="biayajadwal">
                          <div class='form-group row'>
                            <div class='col-md-6'>
                                <label>Anggaran Biaya</label>
                                <textarea cols="80" id="biaya" name="biaya" rows="20" class="form-control">{{$tablebiaya}}</textarea>
                            </div>
                            <div class='col-md-2'>
                                <label>Nilai (0 - 100)</label>
                                <input type="text" name="nilai_biaya" id="nilai_biaya" class="form-control">
                            </div>
                            <div class='col-md-4'>
                                <label>Komentar</label>
                                <textarea name="rev_biaya" id="rev_biaya" rows="3" class="form-control"></textarea>
                            </div>                                
                          </div>
                          <div class='form-group row'>
                            <div class='col-md-6'>
                                <label>Jadwal Kegiatan</label>
                                <textarea cols="80" id="jadwal_kegiatan" name="jadwal_kegiatan" rows="20" class="form-control">{{$tablejadwal}}</textarea>
                            </div>
                            <div class='col-md-2'>
                                <label>Nilai (0 - 100)</label>
                                <input type="text" name="nilai_jadwal" id="nilai_jadwal" class="form-control">
                            </div>
                            <div class='col-md-4'>
                                <label>Komentar</label>
                                <textarea name="rev_jadwal" id="rev_jadwal" rows="3" class="form-control"></textarea>
                            </div>
                              
                          </div>
                          <div class='form-group'>
                              <input type="submit" value="Simpan" class='btn btn-info' >
                          </div>
                      </form>
                      
                    </div>
                    <!-- daftar pustaka -->
                    <div class="tab-pane fade" id="daftar-pustaka" role="tabpanel" aria-labelledby="daftar-pustaka-tab">
                      <form id="formdaftarpustaka">
                          {{ csrf_field() }}
                          <input type="hidden" name="nim" value="{{$nim}}">
                          <input type="hidden" name="revisike" value="{{$revisike}}">
                          <input type="hidden" name="kategori" value="daftarpustaka">
                        @for($i=1;$i<=10;$i++)
                          <div class='form-group row'>
                            <div class='col-md-6'>
                              <label>Pustaka {{$i}} Sumber dari :
                              @if($i <= 4)
                                Jurnal/proceding/artikel ilmiah/majalah ilmiah/buku
                              @elseif($i >=5 and $i<=7)
                                Pustaka online / semua yang ada diatas
                              @else
                                Laporan akhir / semua yang ada diatas
                              @endif
                              </label>
                              <textarea id='dapus_{{$i}}' rows='5' class='form-control' disabled></textarea>
                            </div>
                            <div class='col-md-2'>
                                <label>Nilai (0 - 100)</label>
                                <input type="text" name="nilai_dapus_{{$i}}" id="nilai_dapus_{{$i}}" class="form-control">
                            </div>
                            <div class='col-md-4'>
                                <label>Komentar</label>
                                <textarea name="rev_dapus_{{$i}}" id="rev_dapus_{{$i}}" rows="3" class="form-control"></textarea>
                            </div> 
                          </div>

                        @endfor
                        <div class='form-group'>
                            <input type="submit" value="Simpan" class='btn btn-info' >
                        </div>
                      </form>
                    </div>
                    <!-- Justifikasi Anggaran dan Organisasi -->
                    <div class="tab-pane fade" id="justifikasi-organisasi" role="tabpanel" aria-labelledby="justifikasi-organisasi-tab">
                      <form id="formjustifikasiorganisasi">
                          {{ csrf_field() }}
                          <input type="hidden" name="nim" value="{{$nim}}">
                          <input type="hidden" name="revisike" value="{{$revisike}}">
                          <input type="hidden" name="kategori" value="justifikasiorganisasi">
                            <div class='form-group row'>
                              <div class='col-md-6'>
                                  <label>Justifikasi Anggaran</label>
                                  <textarea cols="80" id="justifikasi_anggaran" rows="20" class="form-control" disabled>{{$tableanggaran}}</textarea>
                              </div>
                              <div class='col-md-2'>
                                  <label>Nilai (0 - 100)</label>
                                  <input type="text" name="nilai_justifikasi_anggaran"  id="nilai_justifikasi_anggaran" class="form-control">
                              </div>
                              <div class='col-md-4'>
                                  <label>Komentar</label>
                                  <textarea name="rev_justifikasi_anggaran" id="rev_justifikasi_anggaran" rows="3" class="form-control"></textarea>
                              </div> 
                            </div>
                            <div class='form-group row'>
                              <div class='col-md-6'>
                                  <label>Susunan Organisasi</label>
                                  <textarea cols="80" id="susunan_organisasi" rows="10" class="form-control" disabled>{{$tableorganisasi}}</textarea>
                              </div>
                              <div class='col-md-2'>
                                  <label>Nilai (0 - 100)</label>
                                  <input type="text" name="nilai_susunan_organisasi" id="nilai_susunan_organisasi" class="form-control">
                              </div>
                              <div class='col-md-4'>
                                  <label>Komentar</label>
                                  <textarea name="rev_susunan_organisasi" id="rev_susunan_organisasi" rows="3" class="form-control"></textarea>
                              </div> 
                            </div>
                            <div class='form-group'>
                                <input type="submit" value="Simpan" class='btn btn-info' >
                            </div>
                        </form>
                    </div>
                    <!-- Upload File -->
                    <div class="tab-pane fade" id="upload-file" role="tabpanel" aria-labelledby="upload-file-tab">
                      <form id="formUploadFile">
                        {{ csrf_field() }}
                        <input type="hidden" name="nim" value="{{$nim}}">
                        <input type="hidden" name="revisike" value="{{$revisike}}">
                        <input type="hidden" name="kategori" value="uploadFile">
                        <div class='form-group row'>
                            <div class='col-md-4'>
                              <label>Lembar Pengesahan</label>
                            </div>
                            <div class='col-md-2' id="locatePengesahan"></div>
                            <div class='col-md-2'>
                                <label>Nilai (0 - 100)</label>
                                <input type="text" name="nilai_pengesahan"  id="nilai_pengesahan" class="form-control">
                            </div>
                            <div class='col-md-4'>
                                <label>Komentar</label>
                                <textarea name="rev_pengesahan" id="rev_pengesahan" rows="3" class="form-control"></textarea>
                            </div> 

                        </div>
                      
                        <div class='form-group row'>
                          <div class='col-md-4'>
                            <label>Biodata Ketua</label>
                          </div>
                          <div class='col-md-2' id="locateBiodataKetua"></div>
                          <div class='col-md-2'>
                            <label>Nilai (0 - 100)</label>
                            <input type="text" name="nilai_biodata_ketua"  id="nilai_biodata_ketua" class="form-control">
                          </div>
                          <div class='col-md-4'>
                              <label>Komentar</label>
                              <textarea name="rev_biodata_ketua" id="rev_biodata_ketua" rows="3" class="form-control"></textarea>
                          </div> 
                        </div>
                      
                        <div class='form-group row'>
                          <div class='col-md-4'>
                            <label>Biodata Anggota 1</label>
                          </div>
                          <div class='col-md-2' id="locateBiodataAnggota1"></div>
                          <div class='col-md-2'>
                            <label>Nilai (0 - 100)</label>
                            <input type="text" name="nilai_biodata_anggota1"  id="nilai_biodata_anggota1" class="form-control">
                          </div>
                          <div class='col-md-4'>
                              <label>Komentar</label>
                              <textarea name="rev_biodata_anggota1" id="rev_biodata_anggota1" rows="3" class="form-control"></textarea>
                          </div> 
                        </div>
                      
                        <div class='form-group row'>
                          <div class='col-md-4'>
                            <label>Biodata Anggota 2</label>
                          </div>
                          <div class='col-md-2' id="locateBiodataAnggota2"></div>
                          <div class='col-md-2'>
                            <label>Nilai (0 - 100)</label>
                            <input type="text" name="nilai_biodata_anggota2"  id="nilai_biodata_anggota2" class="form-control">
                          </div>
                          <div class='col-md-4'>
                              <label>Komentar</label>
                              <textarea name="rev_biodata_anggota2" id="rev_biodata_anggota2" rows="3" class="form-control"></textarea>
                          </div> 
                        </div>
                      
                        <div class='form-group row'>
                          <div class='col-md-4'>
                            <label>Biodata Pembimbing</label>
                          </div>
                          <div class='col-md-2' id="locateBiodataPembimbing"></div>
                          <div class='col-md-2'>
                            <label>Nilai (0 - 100)</label>
                            <input type="text" name="nilai_biodata_pembimbing"  id="nilai_biodata_pembimbing" class="form-control">
                          </div>
                          <div class='col-md-4'>
                              <label>Komentar</label>
                              <textarea name="rev_biodata_pembimbing" id="rev_biodata_pembimbing" rows="3" class="form-control"></textarea>
                          </div> 
                        </div>
                      
                        <div class='form-group row'>
                          <div class='col-md-4'>
                            <label>Surat Pernyataan</label>
                          </div>
                          <div class='col-md-2' id="locateSuratPernyataan"></div>
                          <div class='col-md-2'>
                            <label>Nilai (0 - 100)</label>
                            <input type="text" name="nilai_surat_pernyataan"  id="nilai_surat_pernyataan" class="form-control">
                          </div>
                          <div class='col-md-4'>
                              <label>Komentar</label>
                              <textarea name="rev_surat_pernyataan" id="rev_surat_pernyataan" rows="3" class="form-control"></textarea>
                          </div> 
                        </div>
                        <div class='form-group row'>
                          <input type="submit" value="Simpan" class='btn btn-info' >
                        </div>
                      </form>
                    </div>
                    <!-- Gambaran Teknologi -->
                    <div class="tab-pane fade" id="gambaran-teknologi" role="tabpanel" aria-labelledby="gambaran-teknologi-tab">
                      <form id="formGambaranTeknologi">
                        {{ csrf_field() }}
                        <input type="hidden" name="nim" value="{{$nim}}">
                        <input type="hidden" name="revisike" value="{{$revisike}}">
                        <input type="hidden" name="kategori" value="gambaranTeknologi">

                        <div class='form-group row'>
                          <div class='col-md-4'>
                            <label>A. Ilustrasi system (gambar)</label>
                          </div>
                          <div class='col-md-2' id="locategambar_ilustrasi"></div>
                          <div class='col-md-2'>
                            <label>Nilai (0 - 100)</label>
                            <input type="text" name="nilai_gambar_ilustrasi"  id="nilai_gambar_ilustrasi" class="form-control">
                          </div>
                          <div class='col-md-4'>
                              <label>Komentar</label>
                              <textarea name="rev_gambar_ilustrasi" id="rev_gambar_ilustrasi" rows="3" class="form-control"></textarea>
                          </div> 
                        </div>
                        <div class='form-group row'>
                          <div class='col-md-6'>
                            <label>B. Penjelasan gambar ilustrasi poin A. (narasi).</label>
                            <textarea id="penjelasan_ilustrasi" name="penjelasan_ilustrasi" rows="5" class="form-control" disabled></textarea>
                          </div>
                          <div class='col-md-2'>
                            <label>Nilai (0 - 100)</label>
                            <input type="text" name="nilai_penjelasan_ilustrasi"  id="nilai_penjelasan_ilustrasi" class="form-control">
                          </div>
                          <div class='col-md-4'>
                              <label>Komentar</label>
                              <textarea name="rev_penjelasan_ilustrasi" id="rev_penjelasan_ilustrasi" rows="3" class="form-control"></textarea>
                          </div> 
                        </div>
                        <div class='form-group row'>
                          <div class='col-md-6'>
                            <label>C. Spesifikasi Teknis yang Diharapkan.</label>
                            <textarea id="spek_teknis" name="spek_teknis" rows="5" class="form-control" disabled></textarea>
                          </div>
                          <div class='col-md-2'>
                            <label>Nilai (0 - 100)</label>
                            <input type="text" name="nilai_spek_teknis"  id="nilai_spek_teknis" class="form-control">
                          </div>
                          <div class='col-md-4'>
                              <label>Komentar</label>
                              <textarea name="rev_spek_teknis" id="rev_spek_teknis" rows="3" class="form-control"></textarea>
                          </div> 
                        </div>
                        <div class='form-group row'>
                          <div class='col-md-4'>
                            <label>D. Blok Diagram Sistem Keseluruhan (gambar) (bila 1 topik dibagi menjadi 2 atau lebih subtopic).</label>
                          </div>
                          <div class='col-md-2' id="locategambar_blok_diagram"></div>
                          <div class='col-md-2'>
                            <label>Nilai (0 - 100)</label>
                            <input type="text" name="nilai_gambar_blokdiagram"  id="nilai_gambar_blokdiagram" class="form-control">
                          </div>
                          <div class='col-md-4'>
                              <label>Komentar</label>
                              <textarea name="rev_gambar_blokdiagram" id="rev_gambar_blokdiagram" rows="3" class="form-control"></textarea>
                          </div> 
                        </div>
                        <div class='form-group row'>
                          <div class='col-md-6'>
                            <label>E. Penjelasan blok diagram poin D. (narasi) (bila 1 topik dibagi menjadi 2 atau lebih subtopic).</label>
                            <textarea id="penjelasan_blok_diagram" name="penjelasan_blok_diagram" rows="5" class="form-control" disabled></textarea>
                          </div>
                          <div class='col-md-2'>
                            <label>Nilai (0 - 100)</label>
                            <input type="text" name="nilai_penjelasan_blokdiagram"  id="nilai_penjelasan_blokdiagram" class="form-control">
                          </div>
                          <div class='col-md-4'>
                              <label>Komentar</label>
                              <textarea name="rev_penjelasan_blokdiagram" id="rev_penjelasan_blokdiagram" rows="3" class="form-control"></textarea>
                          </div> 
                        </div>
                        <div class='form-group row'>
                          <div class='col-md-4'>
                            <label>F. Blok Diagram Sistem yang dibuat (gambar).</label>
                          </div>
                          <div class='col-md-2' id="locategambar_blok_diagram2"></div>
                          <div class='col-md-2'>
                            <label>Nilai (0 - 100)</label>
                            <input type="text" name="nilai_gambar_blokdiagram2"  id="nilai_gambar_blokdiagram2" class="form-control">
                          </div>
                          <div class='col-md-4'>
                              <label>Komentar</label>
                              <textarea name="rev_gambar_blokdiagram2" id="rev_gambar_blokdiagram2" rows="3" class="form-control"></textarea>
                          </div> 
                        </div>
                        <div class='form-group row'>
                          <div class='col-md-6'>
                            <label>G. Penjelasan blok diagram poin F. (narasi). </label>
                            <textarea id="penjelasan_blok_diagram2" name="penjelasan_blok_diagram2" rows="5" class="form-control" disabled></textarea>
                          </div>
                          <div class='col-md-2'>
                            <label>Nilai (0 - 100)</label>
                            <input type="text" name="nilai_penjelasan_blokdiagram2"  id="nilai_penjelasan_blokdiagram2" class="form-control">
                          </div>
                          <div class='col-md-4'>
                              <label>Komentar</label>
                              <textarea name="rev_penjelasan_blokdiagram2" id="rev_penjelasan_blokdiagram2" rows="3" class="form-control"></textarea>
                          </div> 
                        </div>
                        <div class='form-group row'>
                          <div class='col-md-4'>
                            <label>H. Flow Chart system keseluruhan dan bagian yang dibuat (gambar)</label>
                          </div>
                          <div class='col-md-2' id="locategambar_flowchart"></div>
                          <div class='col-md-2'>
                            <label>Nilai (0 - 100)</label>
                            <input type="text" name="nilai_gambar_flowchart"  id="nilai_gambar_flowchart" class="form-control">
                          </div>
                          <div class='col-md-4'>
                              <label>Komentar</label>
                              <textarea name="rev_gambar_flowchart" id="rev_gambar_flowchart" rows="3" class="form-control"></textarea>
                          </div> 
                        </div>
                        <div class='form-group row'>
                          <div class='col-md-6'>
                            <label>I. Penjelasan flowchart poin H. (narasi). </label>
                            <textarea id="penjelasan_flowchart" name="penjelasan_flowchart" rows="5" class="form-control" disabled></textarea>
                          </div>
                          <div class='col-md-2'>
                            <label>Nilai (0 - 100)</label>
                            <input type="text" name="nilai_penjelasan_flowchart"  id="nilai_penjelasan_flowchart" class="form-control">
                          </div>
                          <div class='col-md-4'>
                              <label>Komentar</label>
                              <textarea name="rev_penjelasan_flowchart" id="rev_penjelasan_flowchart" rows="3" class="form-control"></textarea>
                          </div> 
                        </div>
                        <div class='form-group row'>
                          <div class='col-md-6'>
                            <label>J. Komponen Utama yang Digunakan.  </label>
                            <textarea id="komponen" name="komponen" rows="5" class="form-control" disabled></textarea>
                          </div>
                          <div class='col-md-2'>
                            <label>Nilai (0 - 100)</label>
                            <input type="text" name="nilai_komponen"  id="nilai_komponen" class="form-control">
                          </div>
                          <div class='col-md-4'>
                              <label>Komentar</label>
                              <textarea name="rev_komponen" id="rev_komponen" rows="3" class="form-control"></textarea>
                          </div> 
                        </div>
                          
                        <div class='form-group row'>
                          <input type="submit" value="Simpan" class='btn btn-info' >
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- /.card -->
              </div> 
            </div>
          </div>
    <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

@stop

@push('scripts') 
    <script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
    <script src="{{asset('js/ckeditor.js')}}"></script>
    <script type="text/javascript">
        $(function () {
          var tablepustaka2="<table border='1'> <thead> <th>Metoda yang digunakan dalam daftar pustaka</th> <th>Keunggulan</th> <th>Kelemahan</th> </thead> <tbody> <tr> <td>Metoda 1 (nama, tahun)</td><td></td><td></td> </tr> <tr> <td>Metoda 2 (nama, tahun)</td><td></td><td></td> </tr> <tr> <td>Metoda 3 (nama, tahun)</td><td></td><td></td> </tr> <tr> <td>Metoda 4 (nama, tahun)</td><td></td><td></td> </tr> <tr> <td>Metoda 5 (nama, tahun)</td><td></td><td></td> </tr> <tr> <td>Metoda 6 (nama, tahun)</td><td></td><td></td> </tr> <tr> <td>Metoda 7 (nama, tahun)</td><td></td><td></td> </tr> <tr> <td>Metoda 8 (nama, tahun)</td><td></td><td></td> </tr> <tr> <td>Metoda 9 (nama, tahun)</td><td></td><td></td> </tr> <tr> <td>Metoda 10 (nama, tahun)</td><td></td><td></td> </tr> <tr> <td>Metoda yang diusulkan</td><td></td><td></td> </tr> </tbody> </table>";
          
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
          //get nilai
          $.ajax({ url: "{{url('/kategoriReview/get')}}",
            context: document.body,
            dataType: 'json',
            
            success: function(data){
              for(var i = 0; i < data.data.length;i++){
                var url = "{{url('/ReviewProposal/get')}}/{{$revisike}}/{{$nim}}/"+data.data[i].indikator;
                //console.log(url);
                $.ajax({ url: url,
                  context: document.body,
                  dataType: 'json',
                  beforeSend: function() {
                    swal({
                      text: "Waiting...",
                      icon: "{{asset('Images/loading.gif')}}",
                      buttons: false
                    });
                  },
                  success: function(data){
                    $('#nilai_'+data.data.indikator).val(data.data.nilai);
                    $('#rev_'+data.data.indikator).val(data.data.revisi);
                    swal.close();
                  },
                  error: function (data) {
                      console.log('Error:', data);
                  }
                });

              }
            },
            error: function (data) {
                console.log('Error:', data);
            }
          });

          //get data proposal
          $.ajax({ url: "{{url('/proposalPKM/get')}}/{{$nim}}/{{$revisike}}",
            context: document.body,
            dataType: 'json',
            beforeSend: function() {
              swal({
                text: "Waiting...",
                icon: "{{asset('Images/loading.gif')}}",
                buttons: false
              });
            },
            success: function(data){
              swal.close()
              var i =1;
              $( '#judul_pkmpolban' ).val(data.data.judul_proposal_polban);
              $( '#judul_belmawa' ).val(data.data.judul_proposal_belmawa);
              $( '#judul_ta' ).val(data.data.judul_proposal_TA);

              var pendahuluan = data.data.pendahuluan;
              var splitPendahuluan = pendahuluan.split("&&&");
              for(var i=0;i < splitPendahuluan.length ;i++){
                var j = i+1;
                $('#pendahuluan_p'+j).val(splitPendahuluan[i]);
              }

              var tinpus1 = data.data.tinjauan_pustaka_1;
              var splittinpus1 = tinpus1.split("&&&");
              for(var i=0;i < splittinpus1.length ;i++){
                var j = i+1;
                $('#pustaka_1'+j).val(splittinpus1[i]);
              };
              CKEDITOR.instances['pustaka_2'].setData(data.data.tinjauan_pustaka_2);

              var metodePelaksanaan = data.data.metode_pelaksanaan;
              var splitmetodePelaksanaan = metodePelaksanaan.split("&&&");
              for(var i=0;i < splitmetodePelaksanaan.length ;i++){
                var j = i+1;
                $('#metode_pelaksanaan_'+j).val(splitmetodePelaksanaan[i]);
              }

              CKEDITOR.instances['biaya'].setData(data.data.biaya);
              CKEDITOR.instances['jadwal_kegiatan'].setData(data.data.jadwal_kegiatan);

              $('#dapus_1').val(data.data.pustaka_1);
              $('#dapus_2').val(data.data.pustaka_2);
              $('#dapus_3').val(data.data.pustaka_3);
              $('#dapus_4').val(data.data.pustaka_4);
              $('#dapus_5').val(data.data.pustaka_5);
              $('#dapus_6').val(data.data.pustaka_6);
              $('#dapus_7').val(data.data.pustaka_7);
              $('#dapus_8').val(data.data.pustaka_8);
              $('#dapus_9').val(data.data.pustaka_9);
              $('#dapus_10').val(data.data.pustaka_10);

              $('#penjelasan_ilustrasi').val(data.data.penjelasan_ilustrasi);
              $('#spek_teknis').val(data.data.spek_teknis);
              $('#penjelasan_blok_diagram').val(data.data.penjelasan_blok_diagram);
              $('#penjelasan_blok_diagram2').val(data.data.penjelasan_blok_diagram2);
              $('#penjelasan_flowchart').val(data.data.penjelasan_flowchart);
              $('#komponen').val(data.data.komponen);

              CKEDITOR.instances['justifikasi_anggaran'].setData(data.data.justifikasi_anggaran);
              CKEDITOR.instances['susunan_organisasi'].setData(data.data.susunan_organisasi);
              
              if(data.data.pengesahan !=null){
                var pengesahan = "{{asset('BerkasProposalPKM')}}"+"/"+data.data.pengesahan
                $('#locatePengesahan').html('<a href='+pengesahan+' target="_blank" class="btn btn-warning">Lihat File</a>');
              }
              if(data.data.biodata_ketua !=null){
                var biodata_ketua = "{{asset('BerkasProposalPKM')}}"+"/"+data.data.biodata_ketua
                $('#locateBiodataKetua').html('<a href='+biodata_ketua+' target="_blank" class="btn btn-warning">Lihat File</a>');
              }
              if(data.data.biodata_anggota1 !=null){
                var biodata_anggota1 = "{{asset('BerkasProposalPKM')}}"+"/"+data.data.biodata_anggota1
                $('#locateBiodataAnggota1').html('<a href='+biodata_anggota1+' target="_blank" class="btn btn-warning">Lihat File</a>');
              }
              if(data.data.biodata_anggota2 !=null){
                var biodata_anggota2 = "{{asset('BerkasProposalPKM')}}"+"/"+data.data.biodata_anggota2
                $('#locateBiodataAnggota2').html('<a href='+biodata_anggota2+' target="_blank" class="btn btn-warning">Lihat File</a>');
              }
              if(data.data.biodata_pembimbing !=null){
                var biodata_pembimbing = "{{asset('BerkasProposalPKM')}}"+"/"+data.data.biodata_pembimbing
                $('#locateBiodataPembimbing').html('<a href='+biodata_pembimbing+' target="_blank" class="btn btn-warning">Lihat File</a>');
              }
              if(data.data.surat_pernyataan !=null){
                var surat_pernyataan = "{{asset('BerkasProposalPKM')}}"+"/"+data.data.surat_pernyataan
                $('#locateSuratPertanyaan').html('<a href='+surat_pernyataan+' target="_blank" class="btn btn-warning">Lihat File</a>');
              }
              if(data.data.gambar_ilustrasi !=null){
                var gambar_ilustrasi = "{{asset('BerkasProposalPKM')}}"+"/"+data.data.gambar_ilustrasi
                $('#locategambar_ilustrasi').html('<a href='+gambar_ilustrasi+' target="_blank" class="btn btn-warning">Lihat File</a>');
              }

              if(data.data.gambar_blok_diagram !=null){
                var gambar_blok_diagram = "{{asset('BerkasProposalPKM')}}"+"/"+data.data.gambar_blok_diagram
                $('#locategambar_blok_diagram').html('<a href='+gambar_blok_diagram+' target="_blank" class="btn btn-warning">Lihat File</a>');
              }
              if(data.data.gambar_blok_diagram2 !=null){
                var gambar_blok_diagram2 = "{{asset('BerkasProposalPKM')}}"+"/"+data.data.gambar_blok_diagram2
                $('#locategambar_blok_diagram2').html('<a href='+gambar_blok_diagram2+' target="_blank" class="btn btn-warning">Lihat File</a>');
              }
              if(data.data.gambar_flowchart !=null){
                var gambar_flowchart = "{{asset('BerkasProposalPKM')}}"+"/"+data.data.gambar_flowchart
                $('#locategambar_flowchart').html('<a href='+gambar_flowchart+' target="_blank" class="btn btn-warning">Lihat File</a>');
              }
              
              ////////////////////////////////////////////////////////////////////////////////////////////////
            },
            error: function (data) {
                console.log('Error:', data);
            }
          });

          $('#formdataproposal').submit(function (e) {
              e.preventDefault();
              $.ajax({
                data: $('#formdataproposal').serialize(),
                url: "{{url('/ReviewProposalTA/store/dataproproposal')}}",
                type: "POST",
                dataType: 'json',
                beforeSend: function() {
                  swal({
                    text: "Waiting...",
                    icon: "{{asset('Images/loading.gif')}}",
                    buttons: false
                  });
                },
                success: function (data) {                    
                  console.log(data);
                  swal("Data Proposal Berhasil Disimpan", "", "success");
                },
                error: function (data) {
                    console.log('Error:', data);
                    swal("Data Berhasil Disimpan", "", "error");
                }
              });
          });

          $('#formpendahuluan').submit(function (e) {
              e.preventDefault();
              $.ajax({
                data: $('#formpendahuluan').serialize(),
                url: "{{url('/ReviewProposalTA/store/dataproproposal')}}",
                type: "POST",
                dataType: 'json',
                beforeSend: function() {
                  swal({
                    text: "Waiting...",
                    icon: "{{asset('Images/loading.gif')}}",
                    buttons: false
                  });
                },
                success: function (data) {                    
                  console.log(data);
                  swal("Pendahuluan Berhasil Disimpan", "", "success");
                },
                error: function (data) {
                    console.log('Error:', data);
                    swal("Pendahuluan Disimpan", "", "error");
                }
              });
          });

          $('#formtinjauanpustaka').submit(function (e) {
              e.preventDefault();
              $.ajax({
                data: $('#formtinjauanpustaka').serialize(),
                url: "{{url('/ReviewProposalTA/store/dataproproposal')}}",
                type: "POST",
                dataType: 'json',
                beforeSend: function() {
                  swal({
                    text: "Waiting...",
                    icon: "{{asset('Images/loading.gif')}}",
                    buttons: false
                  });
                },
                success: function (data) {                    
                  console.log(data);
                  swal("Tinjauan Pustaka Berhasil Disimpan", "", "success");
                },
                error: function (data) {
                    console.log('Error:', data);
                    swal("Tinjauan Pustaka Disimpan", "", "error");
                }
              });
          });

          $('#formmetodepelaksanaan').submit(function (e) {
              e.preventDefault();
              $.ajax({
                data: $('#formmetodepelaksanaan').serialize(),
                url: "{{url('/ReviewProposalTA/store/dataproproposal')}}",
                type: "POST",
                dataType: 'json',
                beforeSend: function() {
                  swal({
                    text: "Waiting...",
                    icon: "{{asset('Images/loading.gif')}}",
                    buttons: false
                  });
                },
                success: function (data) {                    
                  console.log(data);
                  swal("Metode Pelaksanaan Berhasil Disimpan", "", "success");
                },
                error: function (data) {
                    console.log('Error:', data);
                    swal("Metode Pelaksanaan Gagal Disimpan", "", "error");
                }
              });
          });

          $('#formbiayakegiatan').submit(function (e) {
              e.preventDefault();
              $.ajax({
                data: $('#formbiayakegiatan').serialize(),
                url: "{{url('/ReviewProposalTA/store/dataproproposal')}}",
                type: "POST",
                dataType: 'json',
                beforeSend: function() {
                  swal({
                    text: "Waiting...",
                    icon: "{{asset('Images/loading.gif')}}",
                    buttons: false
                  });
                },
                success: function (data) {                    
                  console.log(data);
                  swal("Biaya dan Jadwal Kegiatan Berhasil Disimpan", "", "success");
                },
                error: function (data) {
                    console.log('Error:', data);
                    swal("Biaya dan Jadwal Kegiatan Gagal Disimpan", "", "error");
                }
              });
          });

          $('#formdaftarpustaka').submit(function (e) {
              e.preventDefault();
              $.ajax({
                data: $('#formdaftarpustaka').serialize(),
                url: "{{url('/ReviewProposalTA/store/dataproproposal')}}",
                type: "POST",
                dataType: 'json',
                beforeSend: function() {
                  swal({
                    text: "Waiting...",
                    icon: "{{asset('Images/loading.gif')}}",
                    buttons: false
                  });
                },
                success: function (data) {                    
                  console.log(data);
                  swal("Daftar Pustaka Berhasil Disimpan", "", "success");
                },
                error: function (data) {
                    console.log('Error:', data);
                    swal("Daftar Pustaka Gagal Disimpan", "", "error");
                }
              });
          });

          $('#formjustifikasiorganisasi').submit(function (e) {
              e.preventDefault();
              $.ajax({
                data: $('#formjustifikasiorganisasi').serialize(),
                url: "{{url('/ReviewProposalTA/store/dataproproposal')}}",
                type: "POST",
                dataType: 'json',
                beforeSend: function() {
                  swal({
                    text: "Waiting...",
                    icon: "{{asset('Images/loading.gif')}}",
                    buttons: false
                  });
                },
                success: function (data) {                    
                  console.log(data);
                  swal("Justifikasi Anggaran dan Sususan Organisasi Berhasil Disimpan", "", "success");
                },
                error: function (data) {
                    console.log('Error:', data);
                    swal("Justifikasi Anggaran dan Sususan Organisasi Gagal Disimpan", "", "error");
                }
              });
          });

          $('#formUploadFile').submit(function (e) {
              e.preventDefault();
              $.ajax({
                data: $('#formUploadFile').serialize(),
                url: "{{url('/ReviewProposalTA/store/dataproproposal')}}",
                type: "POST",
                dataType: 'json',
                beforeSend: function() {
                  swal({
                    text: "Waiting...",
                    icon: "{{asset('Images/loading.gif')}}",
                    buttons: false
                  });
                },
                success: function (data) {                    
                  console.log(data);
                  swal("Nilai Berhasil Disimpan", "", "success");
                },
                error: function (data) {
                    console.log('Error:', data);
                    swal("Nilai Gagal Disimpan", "", "error");
                }
              });
          });

          $('#formGambaranTeknologi').submit(function (e) {
              e.preventDefault();
              $.ajax({
                data: $('#formGambaranTeknologi').serialize(),
                url: "{{url('/ReviewProposalTA/store/dataproproposal')}}",
                type: "POST",
                dataType: 'json',
                beforeSend: function() {
                  swal({
                    text: "Waiting...",
                    icon: "{{asset('Images/loading.gif')}}",
                    buttons: false
                  });
                },
                success: function (data) {                    
                  console.log(data);
                  swal("Nilai Berhasil Disimpan", "", "success");
                },
                error: function (data) {
                    console.log('Error:', data);
                    swal("Nilai Gagal Disimpan", "", "error");
                }
              });
          });
          

          
          
        });

 
    </script>
@endpush