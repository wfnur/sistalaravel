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
            <li class="breadcrumb-item">Proposal PKM Revisi 1</li>
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
                      <form method='post' action='' id="formDataProposal">
                        {{ csrf_field() }}
                        <input type="hidden" name="nim" value="{{auth()->user()->username}}">
                        <input type="hidden" name="revisike" value="{{$revisike}}">
                            <!--judul pkm-->
                            <div class='form-group row'>
                                <div class='col-md-6'>
                                  <label>Judul PKM Polban</label>
                                  <textarea cols="80"  rows="3" class="form-control" id="judul_pkmpolban_old" disabled></textarea> <br>
                                  <textarea cols="80" name="judul_proposal_polban" rows="3" class="form-control" id="judul_pkmpolban"></textarea>
                                </div>
                                <div class='col-md-2'>
                                    <label>Nilai (0 - 100)</label>
                                    <input type="text" name="nilai_judul_polban" id="nilai_judul_polban" class="form-control" disabled>
                                </div>
                                <div class='col-md-4'>
                                    <label>Komentar</label>
                                    <textarea name="rev_judul_polban" id="rev_judul_polban" rows="3" class="form-control" disabled></textarea>
                                </div>
                            </div>

                            <!--judul belmawa-->
                            <div class='form-group row'>
                                <div class='col-md-6'>
                                  <label>Judul Judul PKM BELMAWA (Rencana)</label>
                                  <textarea cols="80" rows="3" class="form-control" id="judul_belmawa_old" disabled></textarea> <br>
                                  <textarea cols="80" name="judul_proposal_belmawa" rows="3" class="form-control" id="judul_belmawa"></textarea>
                                </div>
                                <div class='col-md-2'>
                                    <label>Nilai (0 - 100)</label>
                                    <input type="text" name="nilai_judul_belmawa" id="nilai_judul_belmawa" class="form-control" disabled>
                                </div>
                                <div class='col-md-4'>
                                    <label>Komentar</label>
                                    <textarea name="rev_judul_belmawa" id="rev_judul_belmawa" rows="3" class="form-control" disabled></textarea>
                                </div>
                            </div>
                            
                            <!--judul ta-->
                            <div class='form-group row'>
                                <div class='col-md-6'>
                                  <label>Judul TA/KP (Rencana)</label>
                                  <textarea cols="80" rows="3" class="form-control" id="judul_ta_old" disabled></textarea> <br>
                                  <textarea cols="80" name="judul_proposal_TA" rows="3" class="form-control" id="judul_ta"></textarea>
                                </div>
                                <div class='col-md-2'>
                                    <label>Nilai (0 - 100)</label>
                                    <input type="text" name="nilai_judul_TA" id="nilai_judul_TA" disabled class="form-control">
                                </div>
                                <div class='col-md-4'>
                                    <label>Komentar</label>
                                    <textarea name="rev_judul_TA" id="rev_judul_TA" rows="3" disabled class="form-control"></textarea>
                                </div>
                            </div>

                            <!--jenis PKM-->
                            <div class="form-group row">
                              <div class='col-md-6'>
                                  <label>Jenis PKM</label>
                                  <input type="text" id="jenis_old" class="form-control" disabled><br>
                                  <select class="form-control" name="jenis" id="jenis">
                                      <option value='0'>-------------------------</option>
                                      <option value='PKM - Karsa Cipta'>PKM - Karsa Cipta</option>
                                      <option value='PKM - Penelitian'>PKM - Penelitian</option>
                                  </select>
                              </div>
                            </div>

                            <!--bidang-->
                            <div class="form-group row">
                              <div class='col-md-6'>
                                  <label>Bidang</label>
                                  <input type="text" value="{{$bidang_old->nama}}" disabled class="form-control"><br>
                                  <select class="form-control" name="bidang" id="bidang">
                                      <option value='0'>-------------------------</option>
                                      @foreach ($bidang as $valBidang)
                                        <option value="{{ $valBidang->id }}"> {{ $valBidang->nama }}</option>
                                      @endforeach
                                  </select>
                              </div>
                            </div>

                            <!--Pembimbing 1-->
                            <div class="form-group row">
                              <div class='col-md-6'>
                                  <label>Pembimbing 1 </label>
                                  <input type="text" value="{{$pembimbing1_old->nama}}" disabled class="form-control"><br>
                                  <select class="form-control" name="pembimbing_1" id="pembimbing_1">
                                    <option value='0'>-------------------------</option>
                                    @foreach ($pembimbing1 as $p1)
                                      <option value={{$p1->kode_dosen }}> {{ $p1->nama }}</option>
                                    @endforeach
                                  </select>
                              </div>
                            </div>

                            <!--Pembimbing 2-->
                            <div class="form-group row">
                              <div class='col-md-6'>
                                  <label>Pembimbing 2 </label>
                                  <input type="text" value="{{$pembimbing2_old->nama}}" disabled class="form-control"><br>
                                  <select class="form-control" name="pembimbing_2" id="pembimbing_2">
                                    <option value='0'>-------------------------</option>
                                    @foreach ($pembimbing2 as $p2)
                                      <option value={{ $p2->kode_dosen }}> {{ $p2->nama }}</option>
                                    @endforeach
                                  </select>
                              </div>
                            </div>

                            <div class='form-group'>
                                <input type="submit" value="Simpan" class='btn btn-info' id="saveDataProposal">
                            </div>
                      </form>
                      <div class='row' id="finalisasi-DataProposal" style="display:none">
                          <div class='col-md-12'>
                            <form action="simpan_finalisasi" method="post" id='finalisasiFormDataProposal'>
                                {{ csrf_field() }}
                                <input type="hidden" name="nim_ketua" value="{{auth()->user()->username}}">
                                <input type="hidden" name="revisike" value="{{$revisike}}">
                                <input type="hidden" name="nama_field" value="status_dataProposal">
                                <p>
                                Dengan menekan tombol dibawah ini, saya sudah yakin dengan data-data diatas dan siap untuk dinilai dan dikomentari
                                oleh reviewer.
                                <span style='color:red'> Setelah menekan tombol dibawah ini, data-data diatas sudah tidak bisa diubah kembali, jadi pastikan data tersebut
                                SUDAH DIISI DAN DISIMPAN (dengan menekan tombol simpan sebagai draft) TERLEBIH DAHULU !!!</span>
                                </p>
                                <span class='btn btn-lg btn-danger' id='btnfinalisasi-dataproposal-done' style="display:none">Sudah difinalisasi</span>
                                <input type="submit" class='btn btn-lg btn-success col-md-12' id='btnfinalisasi-dataproposal'  value="Finalisasi"> 
                            </form>
                          </div>
                      </div>
                    </div>
                    <!--Pendahuluan-->
                    <div class="tab-pane fade" id="pendahuluan" role="tabpanel" aria-labelledby="pendahuluan-tab">
                      <button type="button" class="btn btn-danger" data-toggle="collapse" data-target="#col_pendahuluan">Klik untuk keterangan lebih lanjut</button>
                      <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#col_caraPengutipan">cara penulisan sitasi format harvard (khusus website ini)</button>
                      <div id="col_pendahuluan" class="collapse" style='padding :20px;'>
                        <div class='row'>
                          <div class='col-md-6'>
                            <h4>PKM POLBAN</h4>
                              <p>
                              Pada bagian ini uraikan proses dalam mengidentifikasi masalah yang akan dicari
                              solusinya yang merujuk pada berbagai sumber pustaka, pandangan singkat dari para
                              penulis lain yang pernah melakukan pembahasan topik terkait dapat dikemukakan di
                              sini. Uraikan pula kondisi dan potensi wilayah dari segi fisik, sosial, ekonomi maupun
                              lingkungan yang relevan dengan kegiatan yang akan dilakukan. Uraikan secara singkat
                              pada bagian mana karsa cipta yang ditawarkan mampu memberikan nilai atau
                              manfaat jangka panjang kepada pihak sasaran. Luaran yang diharapkan dari
                              kegiatan ini dan manfaat kegiatan juga harus disajikan pada bab ini.
                              </p>
                          </div>
                          <div class='col-md-6'>
                            <h4>PKM BELMAWA</h4>
                              <p>
                              Uraikan proses identifikasi persoalan yang akan dicari solusi atau pengembangannya
                              termasuk sumber inspirasinya. Jika titik pijaknya adalah hasil riset orang lain, maka
                              nyatakan nama pelaksana dan institusi tim riset serta hasilnya yang akan
                              dikonstruksikan dalam PKM-KC. Ungkapkan pula fase final yang akan dicapai
                              dalam PKM-KC
                              </p>
                              <p>
                              Jika akan melakukan pengembangan atau penyempurnaan atas produk eksisting di
                              masyarakat atau sudah digunakan di kalangan terbatas, maka nyatakan nama
                              produsen/ pembuat dan institusinya. Jangan lupa ungkapkan target yang akan
                              dicapai dan aspek pengembangan/ penyempurnaan yang akan dilakukan disertai
                              justifikasi ilmiah dan/atau aspek ekonominya.
                              </p>
                              <p>
                              Jika produk PKM-KC harus dibuat mulai dari titik NOL, artinya belum ada produk
                              riset sebelumnya yang dapat dijadikan pijakan, juga tidak ada produk yang
                              ditemukan/digunakan di masyarakat, maka ungkapkan target fungsionalnya disertai
                              justifikasi ilmiah yang akhirnya dimuarakan pada desain sebelum dikonstruksikan
                              menjadi produk/jasa final yang fungsional.  
                              </p>
                              <p>
                              Pada Bab 1 ini pula, nyatakan Luaran PKM-KC yang ditargetkan dan manfaatnya.
                              </p>
                          </div>
                        </div>
                      </div>
                      <div id="col_caraPengutipan" class="collapse" style='padding :20px;'>
                        <div class='row'>
                          <div class='col-md-6'>
                            <h4>Cara Pengutipan</h4>
                              <p>
                              Pada setiap akhir pengutikan beri simbol '->' kemudian angka yang merujuk ke pustaka. <br>
                              contoh :
                              ""......... (Jhon, 2006)->1 <br>
                              <br>
                              setalah tatacara pengutipan model harvard, yang tanda kurung, dilanjutkan dengan simbol -> dan angka
                              yang merujuk ke urutan pustaka. nomor pengutipan dan nomor/urutan daftar pustaka harus sesuai. karna akan di cek oleh sistem
                              secara otomatis 
                              
                              </p>
                          </div>
                        </div>
                      </div> 

                      <form method='post' action='' id="formPendahuluan">
                        {{ csrf_field() }}
                        <input type="hidden" name="nim" value="{{auth()->user()->username}}">
                        <input type="hidden" name="revisike" value="{{$revisike}}">

                        <div class='form-group row'>
                          <div class='col-md-6'>
                              <label>Paragraf 1 : Permasalahan yang diangkat berdasarkan trend saat ini</label>
                              <textarea id='pendahuluan_p1_old' rows='5' class='form-control' disabled ></textarea> <br>
                              <textarea name='pendahuluan_p1' id='pendahuluan_p1' rows='5' class='form-control' required ></textarea>
                          </div>
                          <div class='col-md-2'>
                              <label>Nilai (0 - 100)</label>
                              <input type="text" name="nilai_pendahuluan_p1" id="nilai_pendahuluan_p1" class="form-control" disabled>
                          </div>
                          <div class='col-md-4'>
                              <label>Komentar</label>
                              <textarea name="rev_pendahuluan_p1" id="rev_pendahuluan_p1" rows="3" class="form-control" disabled></textarea>
                          </div>
                        </div>
                        <div class='form-group row'>
                            <div class='col-md-6'>
                              <label>Paragraf 2 : Ulasan tentang karya-karya yang telah ada sebelumnya. Resumekan dari Bab Tinjauan Pustaka yang telah dibuat</label>
                              <textarea id='pendahuluan_p2_old' rows='5' class='form-control' disabled ></textarea> <br>
                              <textarea name='pendahuluan_p2' id='pendahuluan_p2' rows='5' class='form-control' required ></textarea>
                            </div>
                            <div class='col-md-2'>
                                <label>Nilai (0 - 100)</label>
                                <input type="text" name="nilai_pendahuluan_p2" id="nilai_pendahuluan_p2" class="form-control" disabled>
                            </div>
                            <div class='col-md-4'>
                                <label>Komentar</label>
                                <textarea name="rev_pendahuluan_p2" id="rev_pendahuluan_p2" rows="3" class="form-control" disabled></textarea>
                            </div>
                        </div>
                        <div class='form-group row'>
                          <div class='col-md-6'>
                            <label>Paragraf 3 : Ide yang diusulkan untuk pemecahan masalah tersebut di atas</label>
                            <textarea id='pendahuluan_p3_old' rows='5' class='form-control' disabled ></textarea> <br>
                            <textarea name='pendahuluan_p3' id='pendahuluan_p3' rows='5' class='form-control' required ></textarea>
                          </div>
                          <div class='col-md-2'>
                              <label>Nilai (0 - 100)</label>
                              <input type="text" name="nilai_pendahuluan_p3" id="nilai_pendahuluan_p3" class="form-control" disabled>
                          </div>
                          <div class='col-md-4'>
                              <label>Komentar</label>
                              <textarea name="rev_pendahuluan_p3" id="rev_pendahuluan_p3" rows="3" class="form-control" disabled></textarea>
                          </div>
                        </div>
                        <div class='form-group row'>
                            <div class='col-md-6'>
                              <label>Paragraf 4 : Gambaran umum cara kerja alat yang diusulkan</label>
                              <textarea id='pendahuluan_p4_old' rows='5' class='form-control' disabled  ></textarea> <br>
                              <textarea name='pendahuluan_p4' id='pendahuluan_p4' rows='5' class='form-control' required  ></textarea>
                            </div>
                            <div class='col-md-2'>
                                <label>Nilai (0 - 100)</label>
                                <input type="text" name="nilai_pendahuluan_p4" id="nilai_pendahuluan_p4" class="form-control" disabled>
                            </div>
                            <div class='col-md-4'>
                                <label>Komentar</label>
                                <textarea name="rev_pendahuluan_p4" id="rev_pendahuluan_p4" rows="3" class="form-control" disabled></textarea>
                            </div>
                        </div>
                        <div class='form-group row'>
                            <div class='col-md-6'>
                                <label>Paragraf 5 : Jelaskan pembagian sistem dengan partner kerja bila topik dibagi menjadi 2 atau lebih</label>
                                <textarea id='pendahuluan_p5_old' rows='5' class='form-control' disabled  ></textarea> <br>
                                <textarea name='pendahuluan_p5' id='pendahuluan_p5' rows='5' class='form-control' required  ></textarea>
                            </div>
                            <div class='col-md-2'>
                                <label>Nilai (0 - 100)</label>
                                <input type="text" name="nilai_pendahuluan_p5" id="nilai_pendahuluan_p5" class="form-control" disabled>
                            </div>
                            <div class='col-md-4'>
                                <label>Komentar</label>
                                <textarea name="rev_pendahuluan_p5" id="rev_pendahuluan_p5" rows="3" class="form-control" disabled></textarea>
                            </div>
                        </div>
                        <div class='form-group row'>
                            <div class='col-md-6'>
                              <label>Paragraf 6 : Tuliskan Manfaat dari karya yang diusulkan</label>
                              <textarea id='pendahuluan_p6_old' rows='3' class='form-control' disabled ></textarea> <br>
                              <textarea name='pendahuluan_p6' id='pendahuluan_p6' rows='3' class='form-control' required ></textarea>
                            </div>
                            <div class='col-md-2'>
                                <label>Nilai (0 - 100)</label>
                                <input type="text" name="nilai_pendahuluan_p6" id="nilai_pendahuluan_p6" class="form-control" disabled>
                            </div>
                            <div class='col-md-4'>
                                <label>Komentar</label>
                                <textarea name="rev_pendahuluan_p6" id="rev_pendahuluan_p6" rows="3" class="form-control" disabled></textarea>
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
                              <textarea id='pendahuluan_p7_old' rows='3' class='form-control' disabled ></textarea> <br>
                              <textarea name='pendahuluan_p7' id='pendahuluan_p7' rows='3' class='form-control' required ></textarea>
                            </div>
                            <div class='col-md-2'>
                                <label>Nilai (0 - 100)</label>
                                <input type="text" name="nilai_pendahuluan_p7" id="nilai_pendahuluan_p7" class="form-control" disabled> 
                            </div>
                            <div class='col-md-4'>
                                <label>Komentar</label>
                                <textarea name="rev_pendahuluan_p7" id="rev_pendahuluan_p7" rows="3" class="form-control" disabled></textarea>
                            </div>
                        </div>
                        <div class='form-group'>
                            <input type="submit" value="Simpan" class='btn btn-info' id="savePendahuluan">
                        </div>
                      </form>
                      <div class='row'>
                          <div class='col-md-12' id="finalisasi-pendahuluan" style="display:none">
                            <form action="simpan_finalisasi" method="post" id='finalisasiform_pendahuluan'>
                              {{ csrf_field() }}
                              <input type="hidden" name="nim" value="{{auth()->user()->username}}">
                              <input type="hidden" name="revisike" value="{{$revisike}}">
                              <input type="hidden" name="nama_field" value="status_pendahuluan">
                              <p>
                              Dengan menekan tombol dibawah ini, saya sudah yakin dengan data-data diatas dan siap untuk dinilai dan dikomentari
                              oleh reviewer.
                              <span style='color:red'> Setelah menekan tombol dibawah ini, data-data diatas sudah tidak bisa diubah kembali, jadi pastikan data tersebut
                              SUDAH DIISI DAN DISIMPAN (dengan menekan tombol simpan sebagai draft) TERLEBIH DAHULU !!!</span>
                              </p>
                              <span class='btn btn-lg btn-danger' id='btnfinalisasi-pendahuluan-done' style="display:none">Sudah difinalisasi</span>
                              <button class='btn btn-lg btn-success col-md-12' id='btnfinalisasi-pendahuluan'> Finalisasi</button>
                            </form>
                          </div>
                      </div>
                    </div>
                    <!-- Tinjauan Pustaka -->
                    <div class="tab-pane fade" id="tinjauan-pustaka" role="tabpanel" aria-labelledby="tinjauan-pustaka-tab">
                      <button type="button" class="btn btn-danger" data-toggle="collapse" data-target="#col_tinpus">Klik untuk keterangan lebih lanjut</button>
                      <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#col_caraPengutipan_tinpus">cara penulisan sitasi format harvard (khusus website ini)</button>
                        <div id="col_tinpus" class="collapse" style='padding :20px;'>
                          <div class='row'>
                            <div class='col-md-6'>
                              <h4>PKM POLBAN</h4>
                                <p>
                                Pada bab ini, uraikan kondisi umum lingkungan yang menimbulkan gagasan
                                menciptakan yang didasari atas karsa dan nalar mahasiswa. Tunjukkan keberadaan
                                produk-produk teknologi yang mendukung pada ide PKM-KC. Uraikan juga literatur
                                yang memiliki keterkaitan dengan ide atau gagasan yang ditawarkan dan jika ada
                                kemiripan, pada bagian mana karsa cipta yang ditawarkan memiliki perbedaan atau
                                keunikan. Karsa cipta yang ditawarkan harus bersifat konstruktif dan mampu
                                menghasilkan suatu sistem, desain, model/barang atau prototip dan sejenisnya serta
                                memiliki daya guna yang jelas.
                                </p>
                            </div>
                            <div class='col-md-6'>
                              <h4>PKM BELMAWA</h4>
                                <p>
                                Pada PKM-KC ada kemungkinan pustaka acuan seperti yang lazim disitasi untuk PKM-P
                                tidak ditemukan. Selain skripsi, tesis, disertasi, buku referensi, artikel jurnal ilmiah
                                ataupun prosiding, tinjauan pustaka dalam PKM-KC diijinkan untuk mengacu pada
                                informasi yang diperoleh melalui brosur, media cetak dan sumber-sumber lainnya. Yang
                                penting dalam bab ini adalah terungkapnya informasi ilmiah yang relevan dengan
                                spesifikasi awal dan/atau akhir produk serta menjadi solusi yang bermanfaat.
                                </p>
                                
                            </div>
                          </div>
                        </div>
                        <div id="col_caraPengutipan_tinpus" class="collapse" style='padding :20px;'>
                          <div class='row'>
                            <div class='col-md-6'>
                              <h4>Cara Pengutipan</h4>
                                <p>
                                Pada setiap akhir pengutikan beri simbol '->' kemudian angka yang merujuk ke pustaka. <br>
                                contoh :
                                ""......... (Jhon, 2006)->1 <br>
                                <br>
                                setalah tatacara pengutipan model harvard, yang tanda kurung, dilanjutkan dengan simbol -> dan angka
                                yang merujuk ke urutan pustaka. nomor pengutipan dan nomor/urutan daftar pustaka harus sesuai. karna akan di cek oleh sistem
                                secara otomatis 
                                
                                </p>
                            </div>
                          </div>
                        </div>
                        <form method='post' action='' id="formTinjauanPustaka">
                          {{ csrf_field() }}
                          <input type="hidden" name="nim_ketua" value="{{auth()->user()->username}}">
                          <input type="hidden" name="revisike" value="{{$revisike}}">
                          <div class='form-group'>
                              <label>Gambaran metoda yang digunakan, kelebihan dan kekurangan dari setiap pustaka yang 
                              digunakan dalam daftar pustaka. Setiap 1 pustaka dibuat 1 paragraf.</label>
                          </div>
                          @for($i=1;$i<=10;$i++)
                            <div class='form-group row'>
                              <div class='col-md-6'>
                                <label>Gambaran metoda yang digunakan pustaka {{$i}} .<br> 
                                <span style='color:red'>Tambahkan link pengutipan model Harvard pada akhir kalimat, contoh : (Budiman,2000)</span>
                                </label>
                                <textarea id='pustaka_1{{$i}}_old' rows='5' class='form-control' disabled></textarea> <br>
                                <textarea id='pustaka_1{{$i}}' name='pustaka_1{{$i}}' rows='5' class='form-control'></textarea>
                              </div>
                              <div class='col-md-2'>
                                  <label>Nilai (0 - 100)</label>
                                  <input type="text" name="nilai_pustaka_1{{$i}}" id="nilai_pustaka_1{{$i}}" class="form-control" disabled>
                              </div>
                              <div class='col-md-4'>
                                  <label>Komentar</label>
                                  <textarea name="rev_pustaka_1{{$i}}" id="rev_pustaka_1{{$i}}" rows="3" class="form-control" disabled></textarea>
                              </div>
                            </div>

                          @endfor
                          <div class='form-group row'>
                              <div class='col-md-6'>
                                <label>2. Tabel Perbandingan karya yang sudah ada dalam daftar pustaka dengan karya yang diusulkan.</label>
                                <textarea id="pustaka_2_old" rows='3' class='form-control' disabled>{{$tablepustaka2}}</textarea>
                                <textarea id="pustaka_2" name='pustaka_2' rows='3' class='form-control'>{{$tablepustaka2}}</textarea>
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
                              <input type="submit" value="Simpan" class='btn btn-info' id='saveTinjauanPustaka'>
                          </div>
                        </form>
                        <div class='row'>
                          <div class='col-md-12' id="finalisasi-tinpus" style="display:none">
                            <form action="simpan_finalisasi" method="post" id='finalisasiform_tinpus'>
                              {{ csrf_field() }}
                              <input type="hidden" name="nim" value="{{auth()->user()->username}}">
                              <input type="hidden" name="revisike" value="{{$revisike}}">
                              <input type="hidden" name="nama_field" value="status_Tinpus">
                              <p>
                              Dengan menekan tombol dibawah ini, saya sudah yakin dengan data-data diatas dan siap untuk dinilai dan dikomentari
                              oleh reviewer.
                              <span style='color:red'> Setelah menekan tombol dibawah ini, data-data diatas sudah tidak bisa diubah kembali, jadi pastikan data tersebut
                              SUDAH DIISI DAN DISIMPAN (dengan menekan tombol simpan sebagai draft) TERLEBIH DAHULU !!!</span>
                              </p>
                              <span class='btn btn-lg btn-danger' id='btnfinalisasi-tinpus-done' style="display:none">Sudah difinalisasi</span>
                              <button class='btn btn-lg btn-success col-md-12' id='btnfinalisasi-tinpus'> Finalisasi</button>
                            </form>
                          </div>
                        </div>
                    </div>
                    <!-- Metode Pelaksanaan -->
                    <div class="tab-pane fade" id="metode-pelaksanaan" role="tabpanel" aria-labelledby="metode-pelaksanaan-tab">
                      <button type="button" class="btn btn-danger" data-toggle="collapse" data-target="#col_metode">Klik untuk keterangan lebih lanjut</button>
                      <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#col_caraPengutipan_metode">cara penulisan sitasi format harvard (khusus website ini)</button>
                        <div id="col_metode" class="collapse" style='padding :20px;'>
                          <div class='row'>
                            <div class='col-md-6'>
                              <h4>PKM POLBAN</h4>
                                <p>
                                Pada bagian ini uraikan metode yang digunakan dalam pelaksanaan program (cara
                                koleksi data awal, rekayasa keteknikan, cara uji keandalan karya, teknik koleksi,
                                pengolahan, analisis data dll) secara rinci. Selain itu, uraikan juga tahapan pekerjaan
                                dalam menyelesaikan permasalahan dan sekaligus pencapaian tujuan program.
                                </p>
                            </div>
                            <div class='col-md-6'>
                              <h4>PKM BELMAWA</h4>
                                <p>
                                Pada bagian ini diuraikan tahap pelaksanaan program dan fase akhir yang akan dicapai
                                secara rinci (Lihat Gambar 6.2). Dimulai dari koleksi data yang diperlukan untuk desain
                                atau perancangan awal, menyusun desain teknis, membuat produk/jasa layanan, menguji
                                keandalan karya, evaluasi level penerimaan masyarakat (jika dimungkinkan) dan lain-lain
                                yang relevan.
                                </p>
                                
                            </div>
                          </div>
                        </div>
                        <div id="col_caraPengutipan_metode" class="collapse" style='padding :20px;'>
                          <div class='row'>
                            <div class='col-md-6'>
                              <h4>Cara Pengutipan</h4>
                                <p>
                                Pada setiap akhir pengutikan beri simbol '->' kemudian angka yang merujuk ke pustaka. <br>
                                contoh :
                                ""......... (Jhon, 2006)->1 <br>
                                <br>
                                setalah tatacara pengutipan model harvard, yang tanda kurung, dilanjutkan dengan simbol -> dan angka
                                yang merujuk ke urutan pustaka. nomor pengutipan dan nomor/urutan daftar pustaka harus sesuai. karna akan di cek oleh sistem
                                secara otomatis 
                                
                                </p>
                            </div>
                          </div>
                        </div>

                        <form method='post' action='' id="formMetodePelaksanaan">
                          {{ csrf_field() }}
                          <input type="hidden" name="nim_ketua" value="{{auth()->user()->username}}">
                          <input type="hidden" name="revisike" value="{{$revisike}}">
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
                                  <textarea id='metode_pelaksanaan_{{$j}}_old' rows='5' class='form-control' disabled></textarea> <br>
                                  <textarea name='metode_pelaksanaan_{{$j}}' id='metode_pelaksanaan_{{$j}}' rows='5' class='form-control'></textarea>
                              </div>
                              <div class='col-md-2'>
                                  <label>Nilai (0 - 100)</label>
                                  <input type="text" name="nilai_metode_pelaksanaan_{{$j}}" id="nilai_metode_pelaksanaan_{{$j}}" class="form-control" disabled>
                              </div>
                              <div class='col-md-4'>
                                  <label>Komentar</label>
                                  <textarea name="rev_metode_pelaksanaan_{{$j}}" id="rev_metode_pelaksanaan_{{$j}}" rows="3" class="form-control" disabled></textarea>
                              </div>
                            </div>
                          @endfor
                          <div class='form-group'>
                              <input type="submit" value="Simpan" class='btn btn-info' id='saveMetodePelaksanaan'>
                          </div>
                        </form>
                        <div class='row'>
                          <div class='col-md-12' id='finalisasi-metode' style="display:none">
                            <form action="simpan_finalisasi" method="post" id='finalisasiform_metode'>
                              {{ csrf_field() }}
                              <input type="hidden" name="nim" value="{{auth()->user()->username}}">
                              <input type="hidden" name="revisike" value="{{$revisike}}">
                              <input type="hidden" name="nama_field" value="status_metode">
                              <p>
                              Dengan menekan tombol dibawah ini, saya sudah yakin dengan data-data diatas dan siap untuk dinilai dan dikomentari
                              oleh reviewer.
                              <span style='color:red'> Setelah menekan tombol dibawah ini, data-data diatas sudah tidak bisa diubah kembali, jadi pastikan data tersebut
                              SUDAH DIISI DAN DISIMPAN (dengan menekan tombol simpan sebagai draft) TERLEBIH DAHULU !!!</span>
                              </p>
                              <span class='btn btn-lg btn-danger' id='btnfinalisasi-metode-done' style="display:none">Sudah difinalisasi</span>
                              <button class='btn btn-lg btn-success col-md-12' id='btnfinalisasi-metode'> Finalisasi</button>
                            </form>
                          </div>
                        </div>
                    </div>
                    <!-- Biaya dan Jadwal Kegiatan -->
                    <div class="tab-pane fade" id="biaya-jadwalkegiatan" role="tabpanel" aria-labelledby="biaya-jadwalkegiatan-tab">
                      <form method='post' action='' id="formBiayaKegiatan">
                          {{ csrf_field() }}
                          <input type="hidden" name="nim_ketua" value="{{auth()->user()->username}}">
                          <input type="hidden" name="revisike" value="{{$revisike}}">
                          <div class='form-group row'>
                            <div class='col-md-6'>
                                <label>Anggaran Biaya</label>
                                <textarea cols="80" id="biaya_old" rows="20" class="form-control" disabled></textarea> <br>
                                <textarea cols="80" id="biaya" name="biaya" rows="20" class="form-control">{{$tablebiaya}}</textarea>
                            </div>
                            <div class='col-md-2'>
                                <label>Nilai (0 - 100)</label>
                                <input type="text" name="nilai_biaya" id="nilai_biaya" class="form-control" disabled>
                            </div>
                            <div class='col-md-4'>
                                <label>Komentar</label>
                                <textarea name="rev_biaya" id="rev_biaya" rows="3" class="form-control" disabled></textarea>
                            </div>
                          </div>
                          <div class='form-group row'>
                            <div class='col-md-6'>
                                <label>Jadwal Kegiatan</label>
                                <textarea cols="80" id="jadwal_kegiatan_old" rows="20" class="form-control" disabled></textarea> <br>
                                <textarea cols="80" id="jadwal_kegiatan" name="jadwal_kegiatan" rows="20" class="form-control">{{$tablejadwal}}</textarea>
                            </div>
                            <div class='col-md-2'>
                                <label>Nilai (0 - 100)</label>
                                <input type="text" name="nilai_jadwal" id="nilai_jadwal" class="form-control" disabled>
                            </div>
                            <div class='col-md-4'>
                                <label>Komentar</label>
                                <textarea name="rev_jadwal" id="rev_jadwal" rows="3" class="form-control" disabled></textarea>
                            </div>
                          </div>
                          <div class='form-group'>
                              <input type="submit" value="Simpan" class='btn btn-info' id="saveBiayaKegiatan">
                          </div>
                      </form>
                      <div class='row'>
                        <div class='col-md-12' id="finalisasi-biayakegiatan" style="display:none">
                          <form action="simpan_finalisasi" method="post" id='finalisasiform_biayaKegiatan'>
                            {{ csrf_field() }}
                            <input type="hidden" name="nim" value="{{auth()->user()->username}}">
                            <input type="hidden" name="revisike" value="{{$revisike}}">
                            <input type="hidden" name="nama_field" value="status_biayaJadwal">
                            <p>
                            Dengan menekan tombol dibawah ini, saya sudah yakin dengan data-data diatas dan siap untuk dinilai dan dikomentari
                            oleh reviewer.
                            <span style='color:red'> Setelah menekan tombol dibawah ini, data-data diatas sudah tidak bisa diubah kembali, jadi pastikan data tersebut
                            SUDAH DIISI DAN DISIMPAN (dengan menekan tombol simpan sebagai draft) TERLEBIH DAHULU !!!</span>
                            </p>
                            <span class='btn btn-lg btn-danger' id='btnfinalisasi-biayaKegiatan-done' style="display:none">Sudah difinalisasi</span>
                            <button class='btn btn-lg btn-success col-md-12' id='btnfinalisasi-biayaKegiatan'> Finalisasi</button>
                          </form>
                        </div>
                      </div>
                    </div>
                    <!-- daftar pustaka -->
                    <div class="tab-pane fade" id="daftar-pustaka" role="tabpanel" aria-labelledby="daftar-pustaka-tab">
                      <form method='post' action='' id="formDaftarPustaka">
                        {{ csrf_field() }}
                        <input type="hidden" name="nim_ketua" value="{{auth()->user()->username}}">
                        <input type="hidden" name="revisike" value="{{$revisike}}">
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
                              <textarea id='dapus_{{$i}}_old' name='pustaka_{{$i}}' rows='5' class='form-control' disabled></textarea> <br>
                              <textarea id='dapus_{{$i}}' name='pustaka_{{$i}}' rows='5' class='form-control'></textarea>
                            </div>
                            <div class='col-md-2'>
                                <label>Nilai (0 - 100)</label>
                                <input type="text" name="nilai_dapus_{{$i}}" id="nilai_dapus_{{$i}}" class="form-control" disabled>
                            </div>
                            <div class='col-md-4'>
                                <label>Komentar</label>
                                <textarea name="rev_dapus_{{$i}}" id="rev_dapus_{{$i}}" rows="3" class="form-control" disabled></textarea>
                            </div> 
                          </div>

                        @endfor
                        <div class='form-group'>
                            <input type="submit" value="Simpan" class='btn btn-info' id='saveDaftarPustaka'>
                        </div>
                      </form>
                      <div class='row'>
                        <div class='col-md-12' id="finalisasi-dapus" style="display:none">
                          <form action="simpan_finalisasi" method="post" id='finalisasiform_dapus' >
                            {{ csrf_field() }}
                            <input type="hidden" name="nim" value="{{auth()->user()->username}}">
                            <input type="hidden" name="revisike" value="{{$revisike}}">
                            <input type="hidden" name="nama_field" value="status_dapus">
                            <p>
                            Dengan menekan tombol dibawah ini, saya sudah yakin dengan data-data diatas dan siap untuk dinilai dan dikomentari
                            oleh reviewer.
                            <span style='color:red'> Setelah menekan tombol dibawah ini, data-data diatas sudah tidak bisa diubah kembali, jadi pastikan data tersebut
                            SUDAH DIISI DAN DISIMPAN (dengan menekan tombol simpan sebagai draft) TERLEBIH DAHULU !!!</span>
                            </p>
                            <span class='btn btn-lg btn-danger' id='btnfinalisasi-dapus-done' style="display:none">Sudah difinalisasi</span>
                            <button class='btn btn-lg btn-success col-md-12' id='btnfinalisasi-dapus'> Finalisasi</button>
                          </form>
                        </div>
                      </div>
                    </div>
                    <!-- Justifikasi Anggaran dan Organisasi -->
                    <div class="tab-pane fade" id="justifikasi-organisasi" role="tabpanel" aria-labelledby="justifikasi-organisasi-tab">
                      <form method='post' action='' id="formJustifikasiOrganisasi">
                            {{ csrf_field() }}
                            <input type="hidden" name="nim_ketua" value="{{auth()->user()->username}}">
                            <input type="hidden" name="revisike" value="{{$revisike}}">
                            <div class='form-group row'>
                              <div class='col-md-6'>
                                <label>Justifikasi Anggaran</label>
                                <textarea cols="80" id="justifikasi_anggaran_old" rows="20" class="form-control" disabled></textarea> <br>
                                <textarea cols="80" id="justifikasi_anggaran" name="justifikasi_anggaran" rows="20" class="form-control">{{$tableanggaran}}</textarea>
                              </div>
                              <div class='col-md-2'>
                                  <label>Nilai (0 - 100)</label>
                                  <input type="text" name="nilai_justifikasi_anggaran"  id="nilai_justifikasi_anggaran" class="form-control" disabled>
                              </div>
                              <div class='col-md-4'>
                                  <label>Komentar</label>
                                  <textarea name="rev_justifikasi_anggaran" id="rev_justifikasi_anggaran" rows="3" class="form-control" disabled></textarea>
                              </div> 
                            </div>
                            <div class='form-group row'>
                              <div class='col-md-6'>
                                <label>Susunan Organisasi</label>
                                <textarea cols="80" id="susunan_organisasi_old" rows="10" class="form-control" disabled></textarea> <br>
                                <textarea cols="80" id="susunan_organisasi" name="susunan_organisasi" rows="10" class="form-control">{{$tableorganisasi}}</textarea>
                              </div>
                              <div class='col-md-2'>
                                  <label>Nilai (0 - 100)</label>
                                  <input type="text" name="nilai_susunan_organisasi" id="nilai_susunan_organisasi" class="form-control" disabled>
                              </div>
                              <div class='col-md-4'>
                                  <label>Komentar</label>
                                  <textarea name="rev_susunan_organisasi" id="rev_susunan_organisasi" rows="3" class="form-control" disabled></textarea>
                              </div>
                            </div>
                            <div class='form-group'>
                                <input type="submit" value="Simpan" class='btn btn-info' id="saveJustifikasiOrganisasi">
                            </div>
                        </form>
                        <div class='row'>
                          <div class='col-md-12' id='finalisasi-JustifikasiOrganisasi' style="display:none">
                            <form action="simpan_finalisasi" id="finalisasiform_JustifikasiOrganisasi" method="post" >
                              {{ csrf_field() }}
                              <input type="hidden" name="nim" value="{{auth()->user()->username}}">
                              <input type="hidden" name="revisike" value="{{$revisike}}">
                              <input type="hidden" name="nama_field" value="status_justifikasiOrganisasi">
                              <p>
                              Dengan menekan tombol dibawah ini, saya sudah yakin dengan data-data diatas dan siap untuk dinilai dan dikomentari
                              oleh reviewer.
                              <span style='color:red'> Setelah menekan tombol dibawah ini, data-data diatas sudah tidak bisa diubah kembali, jadi pastikan data tersebut
                              SUDAH DIISI DAN DISIMPAN (dengan menekan tombol simpan sebagai draft) TERLEBIH DAHULU !!!</span>
                              </p>
                              <span class='btn btn-lg btn-danger' id='btnfinalisasi-JustifikasiOrganisasi-done' style="display:none">Sudah difinalisasi</span>
                              <button class='btn btn-lg btn-success col-md-12' id='btnfinalisasi-JustifikasiOrganisasi'> Finalisasi</button>
                            </form>
                          </div>
                        </div>
                    </div>
                    <!-- Upload File -->
                    <div class="tab-pane fade" id="upload-file" role="tabpanel" aria-labelledby="upload-file-tab">
                      <form role="form" method='post' action='' enctype='multipart/form-data' id="formPengesahan">
                        {{ csrf_field() }}
                        <input type="hidden" name="nim_ketua" value="{{auth()->user()->username}}">
                        <input type="hidden" name="revisike" value="{{$revisike}}">
                        <input type="hidden" name="jenisBerkas" value="LembarPengesahan">
                        <div class='form-group row'>
                          <div class='col-md-6'>
                            <label>Lembar Pengesahan</label>
                            <div class="row">
                              <div class="col-6">
                                <input type="file" name="berkas" accept=".pdf" id='pengesahan' onchange="uploadBerkas('pengesahan')" required>
                                <span id="pengesahan_error" style="color:#dc3545 "></span>
                              </div>
                              <div class="col-6">
                                <div class='col-md-4' id="locatePengesahan"></div>
                              </div>
                            </div>
                          </div>  
                          <div class='col-md-2'>
                              <label>Nilai (0 - 100)</label>
                              <input type="text" name="nilai_pengesahan"  id="nilai_pengesahan" class="form-control" disabled>
                          </div>
                          <div class='col-md-4'>
                              <label>Komentar</label>
                              <textarea name="rev_pengesahan" id="rev_pengesahan" rows="3" class="form-control" disabled></textarea>
                          </div>                       
                        </div>
                      </form>
                      <form role="form" method='post' action='' enctype='multipart/form-data' id="formBiodataKetua">
                        {{ csrf_field() }}
                        <input type="hidden" name="nim_ketua" value="{{auth()->user()->username}}">
                        <input type="hidden" name="revisike" value="{{$revisike}}">
                        <input type="hidden" name="jenisBerkas" value="BiodataKetua">
                        <div class='form-group row'>
                          <div class='col-md-6'>
                            <label>Biodata Ketua</label>
                            <div class="row">
                              <div class="col-6">
                                <input type="file" name="berkas" accept=".pdf" id='BiodataKetua' onchange="uploadBerkas('BiodataKetua')" required>
                              </div>
                              <div class="col-6">
                                <div class='col-md-2' id="locateBiodataKetua" style="float:right"></div>
                              </div>
                            </div>
                          </div>
                          <div class='col-md-2'>
                              <label>Nilai (0 - 100)</label>
                              <input type="text" name="nilai_biodata_ketua"  id="nilai_biodata_ketua" class="form-control" disabled>
                          </div>
                          <div class='col-md-4'>
                              <label>Komentar</label>
                              <textarea name="rev_biodata_ketua" id="rev_biodata_ketua" rows="3" class="form-control" disabled></textarea>
                          </div>  
                        </div>
                      </form>
                      <form role="form" method='post' action='' enctype='multipart/form-data' id="formBiodataAnggota1">
                        {{ csrf_field() }}
                        <input type="hidden" name="nim_ketua" value="{{auth()->user()->username}}">
                        <input type="hidden" name="revisike" value="{{$revisike}}">
                        <input type="hidden" name="jenisBerkas" value="BiodataAnggota1">
                        <div class='form-group row'>
                          <div class='col-md-6'>
                            <label>Biodata Anggota 1</label>
                            <div class="row">
                              <div class="col-6">
                                <input type="file" name="berkas" accept=".pdf" id='BiodataAnggota1' onchange="uploadBerkas('BiodataAnggota1')" required>
                              </div>
                              <div class="col-6">
                                <div class='col-md-4' id="locateBiodataAnggota1"></div>
                              </div>
                            </div>
                          </div>  
                          <div class='col-md-2'>
                              <label>Nilai (0 - 100)</label>
                              <input type="text" name="nilai_biodata_anggota"  id="nilai_biodata_anggota" class="form-control" disabled>
                          </div>
                          <div class='col-md-4'>
                              <label>Komentar</label>
                              <textarea name="rev_biodata_anggota" id="rev_biodata_anggota" rows="3" class="form-control" disabled></textarea>
                          </div>                        
                        </div>
                      </form>
                      <form role="form" method='post' action='' enctype='multipart/form-data' id="formBiodataAnggota2">
                        {{ csrf_field() }}
                        <input type="hidden" name="nim_ketua" value="{{auth()->user()->username}}">
                        <input type="hidden" name="revisike" value="{{$revisike}}">
                        <input type="hidden" name="jenisBerkas" value="BiodataAnggota2">
                        <div class='form-group row'>
                          <div class='col-md-6'>
                            <label>Biodata Anggota 2</label>
                            <div class="row">
                              <div class="col-6">
                                <input type="file" name="berkas" accept=".pdf" id='BiodataAnggota2' onchange="uploadBerkas('BiodataAnggota2')" required>
                              </div>
                              <div class="col-6">
                                <div class='col-md-4' id="locateBiodataAnggota2"></div>
                              </div>
                            </div>
                          </div>
                          <div class='col-md-2'>
                              <label>Nilai (0 - 100)</label>
                              <input type="text" name="nilai_biodata_anggota2"  id="nilai_biodata_anggota2" class="form-control" disabled>
                          </div>
                          <div class='col-md-4'>
                              <label>Komentar</label>
                              <textarea name="rev_biodata_anggota2" id="rev_biodata_anggota2" rows="3" class="form-control" disabled></textarea>
                          </div> 
                        </div>
                      </form>
                      <form role="form" method='post' action='' enctype='multipart/form-data' id="formBiodataPembimbing">
                        {{ csrf_field() }}
                        <input type="hidden" name="nim_ketua" value="{{auth()->user()->username}}">
                        <input type="hidden" name="revisike" value="{{$revisike}}">
                        <input type="hidden" name="jenisBerkas" value="BiodataPembimbing">
                        <div class='form-group row'>
                          <div class='col-md-6'>
                            <label>Biodata Pembimbing</label>
                            <div class="row">
                              <div class="col-6">
                                <input type="file" name="berkas" accept=".pdf" id='BiodataPembimbing' onchange="uploadBerkas('BiodataPembimbing')" required>
                              </div>
                              <div class="col-6">
                                <div class='col-md-4' id="locateBiodataPembimbing"></div>
                              </div>
                            </div>
                          </div>
                          <div class='col-md-2'>
                              <label>Nilai (0 - 100)</label>
                              <input type="text" name="nilai_biodata_pembimbing"  id="nilai_biodata_pembimbing" class="form-control" disabled>
                          </div>
                          <div class='col-md-4'>
                              <label>Komentar</label>
                              <textarea name="rev_biodata_pembimbing" id="rev_biodata_pembimbing" rows="3" class="form-control" disabled></textarea>
                          </div> 
                        </div>
                      </form>
                      <form role="form" method='post' action='' enctype='multipart/form-data' id="formBiodataPembimbing">
                        {{ csrf_field() }}
                        <input type="hidden" name="nim_ketua" value="{{auth()->user()->username}}">
                        <input type="hidden" name="revisike" value="{{$revisike}}">
                        <input type="hidden" name="jenisBerkas" value="SuratPernyataan">
                        <div class='form-group row'>
                          <div class='col-md-6'>
                            <label>Surat Pernyataan</label>
                            <div class="row">
                              <div class="col-6">
                                <input type="file" name="berkas" accept=".pdf" id='SuratPernyataan' onchange="uploadBerkas('SuratPernyataan')" required>
                              </div>
                              <div class="col-6">
                                <div class='col-md-4' id="locateSuratPernyataan"></div>
                              </div>
                            </div>
                          </div>
                          <div class='col-md-2'>
                              <label>Nilai (0 - 100)</label>
                              <input type="text" name="nilai_surat_pernyataan"  id="nilai_surat_pernyataan" class="form-control" disabled>
                          </div>
                          <div class='col-md-4'>
                              <label>Komentar</label>
                              <textarea name="rev_surat_pernyataan" id="rev_surat_pernyataan" rows="3" class="form-control" disabled></textarea>
                          </div> 
                          
                        </div>
                      </form>

                    </div>

                    <!-- Gambaran Teknologi -->
                    <div class="tab-pane fade" id="gambaran-teknologi" role="tabpanel" aria-labelledby="gambaran-teknologi-tab">
                      <!-- A -->
                      <div class='form-group row'>
                        <div class='col-md-6'>
                          <label>A. Ilustrasi system (gambar)</label>
                          <div class="row">
                            <div class="col-6">
                              <form role="form" method='post' action='' enctype='multipart/form-data' id="formGambarIlustrasi">
                                {{ csrf_field() }}
                                <input type="hidden" name="nim_ketua" value="{{auth()->user()->username}}">
                                <input type="hidden" name="revisike" value="{{$revisike}}">
                                <input type="hidden" name="jenisBerkas" value="gambar_ilustrasi">
                                <input type="file" name="berkas" accept=".pdf" id='gambar_ilustrasi' onchange="uploadBerkas('gambar_ilustrasi')" required>
                              </form>
                            </div>
                            <div class="col-6">
                              <div class='col-md-6' id="locategambar_ilustrasi"></div>
                            </div>
                          </div>
                        </div>
                        <div class='col-md-2'>
                          <label>Nilai (0 - 100)</label>
                          <input type="text" name="nilai_gambar_ilustrasi"  id="nilai_gambar_ilustrasi" class="form-control" disabled>
                        </div>
                        <div class='col-md-4'>
                            <label>Komentar</label>
                            <textarea name="rev_gambar_ilustrasi" id="rev_gambar_ilustrasi" rows="3" class="form-control" disabled></textarea>
                        </div> 
                      </div>
                      <!-- D -->
                      <div class='form-group row'>
                        <div class='col-md-6'>
                          <label>D. Blok Diagram Sistem Keseluruhan (gambar) (bila 1 topik dibagi menjadi 2 atau lebih subtopic).</label>
                          <div class="row">
                            <div class="col-6">
                              <form role="form" method='post' action='' enctype='multipart/form-data' id="formGambarBlokDiagram">
                                {{ csrf_field() }}
                                <input type="hidden" name="nim_ketua" value="{{auth()->user()->username}}">
                                <input type="hidden" name="revisike" value="{{$revisike}}">
                                <input type="hidden" name="jenisBerkas" value="gambar_blok_diagram">
                                <input type="file" name="berkas" accept=".pdf" id='gambar_blok_diagram' onchange="uploadBerkas('gambar_blok_diagram')" required>
                              </form>
                            </div>
                            <div class="col-6">
                              <div class='col-md-6' id="locategambar_blok_diagram"></div>
                            </div>
                          </div>
                        </div>
                        <div class='col-md-2'>
                          <label>Nilai (0 - 100)</label>
                          <input type="text" name="nilai_gambar_blokdiagram"  id="nilai_gambar_blokdiagram" class="form-control" disabled>
                        </div>
                        <div class='col-md-4'>
                            <label>Komentar</label>
                            <textarea name="rev_gambar_blokdiagram" id="rev_gambar_blokdiagram" rows="3" class="form-control" disabled></textarea>
                        </div> 
                      </div>
                      <!-- F -->
                      <div class='form-group row'>
                        <div class='col-md-6'>
                          <label>F. Blok Diagram Sistem yang dibuat (gambar).</label>
                          <div class="row">
                            <div class="col-6">
                              <form role="form" method='post' action='' enctype='multipart/form-data' id="formGambarBlokDiagram2">
                                {{ csrf_field() }}
                                <input type="hidden" name="nim_ketua" value="{{auth()->user()->username}}">
                                <input type="hidden" name="revisike" value="{{$revisike}}">
                                <input type="hidden" name="jenisBerkas" value="gambar_blok_diagram2">
                                <input type="file" name="berkas" accept=".pdf" id='gambar_blok_diagram2' onchange="uploadBerkas('gambar_blok_diagram2')" required>
                              </form>
                            </div>
                            <div class="col-6">
                              <div class='col-md-6' id="locategambar_blok_diagram2"></div>
                            </div>
                          </div>
                        </div>
                        <div class='col-md-2'>
                          <label>Nilai (0 - 100)</label>
                          <input type="text" name="nilai_gambar_blokdiagram2"  id="nilai_gambar_blokdiagram2" class="form-control" disabled>
                        </div>
                        <div class='col-md-4'>
                            <label>Komentar</label>
                            <textarea name="rev_gambar_blokdiagram2" id="rev_gambar_blokdiagram2" rows="3" class="form-control" disabled></textarea>
                        </div> 
                      </div>
                      <!-- H -->
                      <div class='form-group row'>
                        <div class='col-md-6'>
                          <label>H. Flow Chart system keseluruhan dan bagian yang dibuat (gambar)</label>
                          <div class="row">
                            <div class="col-6">
                              <form role="form" method='post' action='' enctype='multipart/form-data' id="formGambarFlowchart">
                                {{ csrf_field() }}
                                <input type="hidden" name="nim_ketua" value="{{auth()->user()->username}}">
                                <input type="hidden" name="revisike" value="{{$revisike}}">
                                <input type="hidden" name="jenisBerkas" value="gambar_flowchart">
                                <input type="file" name="berkas" accept=".pdf" id='gambar_flowchart' onchange="uploadBerkas('gambar_flowchart')" required>
                              </form>
                            </div>
                            <div class="col-6">
                              <div class='col-md-6' id="locategambar_flowchart"></div>
                            </div>
                          </div>
                        </div>
                        <div class='col-md-2'>
                          <label>Nilai (0 - 100)</label>
                          <input type="text" name="nilai_gambar_flowchart"  id="nilai_gambar_flowchart" class="form-control" disabled>
                        </div>
                        <div class='col-md-4'>
                            <label>Komentar</label>
                            <textarea name="rev_gambar_flowchart" id="rev_gambar_flowchart" rows="3" class="form-control" disabled></textarea>
                        </div> 
                      </div>
                      <form action="" id="formGambaranTeknologi">
                        {{ csrf_field() }}
                        <input type="hidden" name="nim_ketua" value="{{auth()->user()->username}}">
                        <input type="hidden" name="revisike" value="{{$revisike}}">
                        <!-- B -->
                        <div class='form-group row'>
                          <div class='col-md-6'>
                            <label>B. Penjelasan gambar ilustrasi poin A. (narasi).</label>
                            <textarea id="penjelasan_ilustrasi" name="penjelasan_ilustrasi" rows="5" class="form-control"></textarea>
                          </div>
                          <div class='col-md-2'>
                            <label>Nilai (0 - 100)</label>
                            <input type="text" name="nilai_penjelasan_ilustrasi"  id="nilai_penjelasan_ilustrasi" class="form-control" disabled>
                          </div>
                          <div class='col-md-4'>
                              <label>Komentar</label>
                              <textarea name="rev_penjelasan_ilustrasi" id="rev_penjelasan_ilustrasi" rows="3" class="form-control" disabled></textarea>
                          </div> 
                        </div>
                        <!-- C -->
                        <div class='form-group row'>
                          <div class='col-md-6'>
                            <label>C. Spesifikasi Teknis yang Diharapkan.</label>
                            <textarea id="spek_teknis" name="spek_teknis" rows="5" class="form-control"></textarea>
                          </div>
                          <div class='col-md-2'>
                            <label>Nilai (0 - 100)</label>
                            <input type="text" name="nilai_spek_teknis"  id="nilai_spek_teknis" class="form-control" disabled>
                          </div>
                          <div class='col-md-4'>
                              <label>Komentar</label>
                              <textarea name="rev_spek_teknis" id="rev_spek_teknis" rows="3" class="form-control" disabled></textarea>
                          </div> 
                        </div>
                        <!-- E -->
                        <div class='form-group row'>
                          <div class='col-md-6'>
                            <label>E. Penjelasan blok diagram poin D. (narasi) (bila 1 topik dibagi menjadi 2 atau lebih subtopic).</label>
                            <textarea id="penjelasan_blok_diagram" name="penjelasan_blok_diagram" rows="5" class="form-control"></textarea>
                          </div>
                          <div class='col-md-2'>
                            <label>Nilai (0 - 100)</label>
                            <input type="text" name="nilai_penjelasan_blokdiagram"  id="nilai_penjelasan_blokdiagram" class="form-control" disabled>
                          </div>
                          <div class='col-md-4'>
                              <label>Komentar</label>
                              <textarea name="rev_penjelasan_blokdiagram" id="rev_penjelasan_blokdiagram" rows="3" class="form-control" disabled></textarea>
                          </div> 
                        </div>
                        <!-- G -->
                        <div class='form-group row'>
                          <div class='col-md-6'>
                            <label>G. Penjelasan blok diagram poin F. (narasi). </label>
                            <textarea id="penjelasan_blok_diagram2" name="penjelasan_blok_diagram2" rows="5" class="form-control"></textarea>
                          </div>
                          <div class='col-md-2'>
                            <label>Nilai (0 - 100)</label>
                            <input type="text" name="nilai_penjelasan_blokdiagram2"  id="nilai_penjelasan_blokdiagram2" class="form-control" disabled>
                          </div>
                          <div class='col-md-4'>
                              <label>Komentar</label>
                              <textarea name="rev_penjelasan_blokdiagram2" id="rev_penjelasan_blokdiagram2" rows="3" class="form-control" disabled></textarea>
                          </div> 
                        </div>
                        <!-- I -->
                        <div class='form-group row'>
                          <div class='col-md-6'>
                            <label>I. Penjelasan flowchart poin H. (narasi). </label>
                            <textarea id="penjelasan_flowchart" name="penjelasan_flowchart" rows="5" class="form-control"></textarea>
                          </div>
                          <div class='col-md-2'>
                            <label>Nilai (0 - 100)</label>
                            <input type="text" name="nilai_penjelasan_flowchart"  id="nilai_penjelasan_flowchart" class="form-control" disabled>
                          </div>
                          <div class='col-md-4'>
                              <label>Komentar</label>
                              <textarea name="rev_penjelasan_flowchart" id="rev_penjelasan_flowchart" rows="3" class="form-control" disabled></textarea>
                          </div> 
                        </div>
                        <!-- J -->
                        <div class='form-group row'>
                          <div class='col-md-6'>
                            <label>J. Komponen Utama yang Digunakan. </label>
                            <textarea id="komponen" name="komponen" rows="5" class="form-control"></textarea>
                          </div>
                          <div class='col-md-2'>
                            <label>Nilai (0 - 100)</label>
                            <input type="text" name="nilai_komponen"  id="nilai_komponen" class="form-control" disabled>
                          </div>
                          <div class='col-md-4'>
                              <label>Komentar</label>
                              <textarea name="rev_komponen" id="rev_komponen" rows="3" class="form-control" disabled></textarea>
                          </div> 
                        </div>
                        <div class='form-group row'>
                          <input type="submit" value="Simpan" class='btn btn-info' id="saveGambaranTeknologi">
                        </div>
                      </form>

                      <div class='row'>
                        <div class='col-md-12'>
                          <form id='finalisasiform_gambaranteknologi'>
                            {{ csrf_field() }}
                            <input type="hidden" name="nim" value="{{auth()->user()->username}}">
                            <input type="hidden" name="revisike" value="{{$revisike}}">
                            <input type="hidden" name="nama_field" value="status_gambaranTeknologi">
                            <p>
                            Dengan menekan tombol dibawah ini, saya sudah yakin dengan data-data diatas dan siap untuk dinilai dan dikomentari
                            oleh reviewer.
                            <span style='color:red'> Setelah menekan tombol dibawah ini, data-data diatas sudah tidak bisa diubah kembali, jadi pastikan data tersebut
                            SUDAH DIISI DAN DISIMPAN (dengan menekan tombol simpan sebagai draft) TERLEBIH DAHULU !!!</span>
                            </p>
                            <span class='btn btn-lg btn-danger' id='btnfinalisasi-GambaranTeknologi-done' style="display:none">Sudah difinalisasi</span>
                            <button class='btn btn-lg btn-success col-md-12' id='btnfinalisasi-GambaranTeknologi'> Finalisasi</button>
                          </form>
                        </div>
                      </div>
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
                var revisike = "{{$revisike}}" - 1 ;
                var nim = "{{auth()->user()->username}}";
                var url = "{{url('/ReviewProposal/get')}}/"+revisike+"/"+nim+"/"+data.data[i].indikator;
                
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

          //get previous value
          var prerevisi = "{{$revisike}}" -1 ;
          $.ajax({ url: "{{url('/Proposal/PKM')}}/"+prerevisi+"/get",
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
              $( '#judul_pkmpolban_old' ).val(data.data.judul_proposal_polban);
              $( '#judul_belmawa_old' ).val(data.data.judul_proposal_belmawa);
              $( '#judul_ta_old' ).val(data.data.judul_proposal_TA);
              $( '#jenis_old' ).val(data.data.jenis);

              var pendahuluan = data.data.pendahuluan;
              if(pendahuluan!=null){
                var splitPendahuluan = pendahuluan.split("&&&");
                for(var i=0;i < splitPendahuluan.length ;i++){
                  var j = i+1;
                  $('#pendahuluan_p'+j+'_old').val(splitPendahuluan[i]);
                }
              }

              var tinpus1 = data.data.tinjauan_pustaka_1;
              if(tinpus1!=null){
                var splittinpus1 = tinpus1.split("&&&");
                for(var i=0;i < splittinpus1.length ;i++){
                  var j = i+1;
                  $('#pustaka_1'+j+'_old').val(splittinpus1[i]);
                };
              }
              CKEDITOR.instances['pustaka_2_old'].setData(data.data.tinjauan_pustaka_2);

              var metodePelaksanaan = data.data.metode_pelaksanaan;
              if(metodePelaksanaan!=null){
                var splitmetodePelaksanaan = metodePelaksanaan.split("&&&");
                for(var i=0;i < splitmetodePelaksanaan.length ;i++){
                  var j = i+1;
                  $('#metode_pelaksanaan_'+j+'_old').val(splitmetodePelaksanaan[i]);
                }
              }
              
              CKEDITOR.instances['biaya_old'].setData(data.data.biaya);
              CKEDITOR.instances['jadwal_kegiatan_old'].setData(data.data.jadwal_kegiatan);

              $('#dapus_1_old').val(data.data.pustaka_1);
              $('#dapus_2_old').val(data.data.pustaka_2);
              $('#dapus_3_old').val(data.data.pustaka_3);
              $('#dapus_4_old').val(data.data.pustaka_4);
              $('#dapus_5_old').val(data.data.pustaka_5);
              $('#dapus_6_old').val(data.data.pustaka_6);
              $('#dapus_7_old').val(data.data.pustaka_7);
              $('#dapus_8_old').val(data.data.pustaka_8);
              $('#dapus_9_old').val(data.data.pustaka_9);
              $('#dapus_10_old').val(data.data.pustaka_10);

              // $('#penjelasan_ilustrasi').val(data.data.penjelasan_ilustrasi);
              // $('#spek_teknis').val(data.data.spek_teknis);
              // $('#penjelasan_blok_diagram').val(data.data.penjelasan_blok_diagram);
              // $('#penjelasan_blok_diagram2').val(data.data.penjelasan_blok_diagram2);
              // $('#penjelasan_flowchart').val(data.data.penjelasan_flowchart);
              // $('#komponen').val(data.data.komponen);

              CKEDITOR.instances['justifikasi_anggaran_old'].setData(data.data.justifikasi_anggaran);
              CKEDITOR.instances['susunan_organisasi_old'].setData(data.data.susunan_organisasi);
              
              // if(data.data.pengesahan !=null){
              //   var pengesahan = "{{asset('BerkasProposalPKM')}}"+"/"+data.data.pengesahan
              //   $('#locatePengesahan').html('<a href='+pengesahan+' target="_blank" class="btn btn-warning">Lihat File</a>');
              // }
              // if(data.data.biodata_ketua !=null){
              //   var biodata_ketua = "{{asset('BerkasProposalPKM')}}"+"/"+data.data.biodata_ketua
              //   $('#locateBiodataKetua').html('<a href='+biodata_ketua+' target="_blank" class="btn btn-warning">Lihat File</a>');
              // }
              // if(data.data.biodata_anggota1 !=null){
              //   var biodata_anggota1 = "{{asset('BerkasProposalPKM')}}"+"/"+data.data.biodata_anggota1
              //   $('#locateBiodataAnggota1').html('<a href='+biodata_anggota1+' target="_blank" class="btn btn-warning">Lihat File</a>');
              // }
              // if(data.data.biodata_anggota2 !=null){
              //   var biodata_anggota2 = "{{asset('BerkasProposalPKM')}}"+"/"+data.data.biodata_anggota2
              //   $('#locateBiodataAnggota2').html('<a href='+biodata_anggota2+' target="_blank" class="btn btn-warning">Lihat File</a>');
              // }
              // if(data.data.biodata_pembimbing !=null){
              //   var biodata_pembimbing = "{{asset('BerkasProposalPKM')}}"+"/"+data.data.biodata_pembimbing
              //   $('#locateBiodataPembimbing').html('<a href='+biodata_pembimbing+' target="_blank" class="btn btn-warning">Lihat File</a>');
              // }
              // if(data.data.surat_pernyataan !=null){
              //   var surat_pernyataan = "{{asset('BerkasProposalPKM')}}"+"/"+data.data.surat_pernyataan
              //   $('#locateSuratPertanyaan').html('<a href='+surat_pernyataan+' target="_blank" class="btn btn-warning">Lihat File</a>');
              // }
              // if(data.data.gambar_ilustrasi !=null){
              //   var gambar_ilustrasi = "{{asset('BerkasProposalPKM')}}"+"/"+data.data.gambar_ilustrasi
              //   $('#locategambar_ilustrasi').html('<a href='+gambar_ilustrasi+' target="_blank" class="btn btn-warning">Lihat File</a>');
              // }

              // if(data.data.gambar_blok_diagram !=null){
              //   var gambar_blok_diagram = "{{asset('BerkasProposalPKM')}}"+"/"+data.data.gambar_blok_diagram
              //   $('#locategambar_blok_diagram').html('<a href='+gambar_blok_diagram+' target="_blank" class="btn btn-warning">Lihat File</a>');
              // }
              // if(data.data.gambar_blok_diagram2 !=null){
              //   var gambar_blok_diagram2 = "{{asset('BerkasProposalPKM')}}"+"/"+data.data.gambar_blok_diagram2
              //   $('#locategambar_blok_diagram2').html('<a href='+gambar_blok_diagram2+' target="_blank" class="btn btn-warning">Lihat File</a>');
              // }
              // if(data.data.gambar_flowchart !=null){
              //   var gambar_flowchart = "{{asset('BerkasProposalPKM')}}"+"/"+data.data.gambar_flowchart
              //   $('#locategambar_flowchart').html('<a href='+gambar_flowchart+' target="_blank" class="btn btn-warning">Lihat File</a>');
              // }
              

              
              ////////////////////////////////////////////////////////////////////////////////////////////////
            },
            error: function (data) {
                console.log('Error:', data);
            }
          });

          //get now value
          $.ajax({ url: "{{url('/Proposal/PKM')}}/{{$revisike}}/get",
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
              $( '#jenis' ).val(data.data.jenis);
              $( '#bidang' ).val(data.data.bidang);
              $( '#pembimbing_1' ).val(data.data.pembimbing_1);
              $( '#pembimbing_2' ).val(data.data.pembimbing_2);

              var pendahuluan = data.data.pendahuluan;
              if(pendahuluan !=null){
                var splitPendahuluan = pendahuluan.split("&&&");
                for(var i=0;i < splitPendahuluan.length ;i++){
                  var j = i+1;
                  $('#pendahuluan_p'+j).val(splitPendahuluan[i]);
                }
              }

              var tinpus1 = data.data.tinjauan_pustaka_1;
              if(tinpus1 != null){
                var splittinpus1 = tinpus1.split("&&&");
                for(var i=0;i < splittinpus1.length ;i++){
                  var j = i+1;
                  $('#pustaka_1'+j).val(splittinpus1[i]);
                };
                CKEDITOR.instances['pustaka_2'].setData(data.data.tinjauan_pustaka_2);
              }
              

              var metodePelaksanaan = data.data.metode_pelaksanaan;
              if(metodePelaksanaan !=null){
                var splitmetodePelaksanaan = metodePelaksanaan.split("&&&");
                for(var i=0;i < splitmetodePelaksanaan.length ;i++){
                  var j = i+1;
                  $('#metode_pelaksanaan_'+j).val(splitmetodePelaksanaan[i]);
                }
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
              

              // show  finalisasi button

              if(data.data.pendahuluan != ""){
                $('#finalisasi-pendahuluan').css('display','block');
                if(data.data.status_pendahuluan == 1){
                  $('#btnfinalisasi-pendahuluan').css('display','none');
                  $('#btnfinalisasi-pendahuluan-done').css('display','block');
                  $('#savePendahuluan').prop('disabled', true);
                }
              }
              if(data.data.judul_proposal_polban != null){
                
                $('#finalisasi-DataProposal').css('display','block');
                if(data.data.status_dataProposal == 0){
                  $('#btnfinalisasi-dataproposal').css('display','block');
                }else{
                  $('#btnfinalisasi-dataproposal-done').css('display','block');
                  $('#saveDataProposal').prop('disabled', true);
                }
              }
              if(data.data.biaya !=null && data.data.jadwal_kegiatan !=null){
                $('#finalisasi-biayakegiatan').css('display','block');
                if(data.data.status_biayaJadwal == 1){
                  $('#btnfinalisasi-biayaKegiatan-done').css('display','block');
                  $('#btnfinalisasi-biayaKegiatan').css('display','none');
                  $('#saveBiayaKegiatan').prop('disabled', true);
                }
              }
              
              if(data.data.tinjauan_pustaka_1 !=null && data.data.tinjauan_pustaka_2 !=null){
                $('#finalisasi-tinpus').css('display','block');
                if(data.data.status_Tinpus == 1){
                  $('#btnfinalisasi-tinpus-done').css('display','block');
                  $('#btnfinalisasi-tinpus').css('display','none');
                  $('#saveTinjauanPustaka').prop('disabled', true);
                }
              }
              if(data.data.metode_pelaksanaan !=null ){
                $('#finalisasi-metode').css('display','block');
                if(data.data.status_metode == 1){
                  $('#btnfinalisasi-metode-done').css('display','block');
                  $('#btnfinalisasi-metode').css('display','none');
                  $('#saveMetodePelaksanaan').prop('disabled', true);
                }
              }
              if(data.data.pustaka_1 !=null && data.data.pustaka_2 !=null && data.data.pustaka_3 !=null && data.data.pustaka_4 !=null && data.data.pustaka_5 !=null ){
                $('#finalisasi-dapus').css('display','block');
                if(data.data.status_dapus == 1){
                  $('#btnfinalisasi-dapus-done').css('display','block');
                  $('#btnfinalisasi-dapus').css('display','none');
                  $('#saveDaftarPustaka').prop('disabled', true);
                }
              }
              if(data.data.justifikasi_anggaran !=null && data.data.susunan_organisasi !=null  ){
                $('#finalisasi-JustifikasiOrganisasi').css('display','block');
                if(data.data.status_justifikasiOrganisasi == 1){
                  $('#btnfinalisasi-JustifikasiOrganisasi-done').css('display','block');
                  $('#btnfinalisasi-JustifikasiOrganisasi').css('display','none');
                  $('#saveJustifikasiOrganisasi').prop('disabled', true);
                }
              }
              
              if(data.data.pengesahan !=null  ){
                $('#finalisasiform_uploadfile').css('display','block');
                if(data.data.status_uploadFile == 1){
                  $('#btnfinalisasi-UploadFile-done').css('display','block');
                  $('#btnfinalisasi-UploadFile').css('display','none');
                  $('#pengesahan').prop('disabled', true);
                  $('#BiodataKetua').prop('disabled', true);
                  $('#BiodataAnggota1').prop('disabled', true);
                  $('#BiodataAnggota2').prop('disabled', true);
                  $('#BiodataPembimbing').prop('disabled', true);
                  $('#SuratPernyataan').prop('disabled', true);
                }
              }

              if(data.data.status_gambaranTeknologi == 1){
                $('#btnfinalisasi-GambaranTeknologi').css('display','none');
                $('#btnfinalisasi-GambaranTeknologi-done').css('display','block');
                $('#gambar_ilustrasi').prop('disabled', true);
                $('#gambar_blok_diagram').prop('disabled', true);
                $('#gambar_blok_diagram2').prop('disabled', true);
                $('#gambar_flowchart').prop('disabled', true);
                $('#saveGambaranTeknologi').prop('disabled', true);
              }
              ////////////////////////////////////////////////////////////////////////////////////////////////
            },
            error: function (data) {
                console.log('Error:', data);
            }
          });

          $('#saveDataProposal').click(function (e) {
              e.preventDefault();
              $.ajax({
                data: $('#formDataProposal').serialize(),
                url: "{{url('/ProposalPKMR0/store/dataproposal')}}",
                type: "POST",
                dataType: 'json',
                success: function (data) {                    
                  $('#finalisasi-DataProposal').css('display','block');
                  $( '#judul_pkmpolban' ).val(data.data.judul_proposal_polban);
                  $( '#judul_belmawa' ).val(data.data.judul_proposal_belmawa);
                  $( '#judul_ta' ).val(data.data.judul_proposal_TA);
                  $( '#jenis' ).val(data.data.jenis);
                  $( '#bidang' ).val(data.data.bidang);
                  $( '#pembimbing_1' ).val(data.data.pembimbing_1);
                  $( '#pembimbing_2' ).val(data.data.pembimbing_2);
                  swal("Data Proposal Berhasil Disimpan", "", "success");
                },
                error: function (data) {
                    console.log('Error:', data);
                    swal("Data Gagal Disimpan", "", "error");
                }
              });
          });

          $('#savePendahuluan').click(function (e) {
              e.preventDefault();
              $.ajax({
                data: $('#formPendahuluan').serialize(),
                url: "{{url('/ProposalPKMR0/store/pendahuluan')}}",
                type: "POST",
                dataType: 'json',
                success: function (data) {  
                  var pendahuluan = data.data.pendahuluan;
                  var splitPendahuluan = pendahuluan.split("&&&");
                  for(var i=0;i < splitPendahuluan.length ;i++){
                    var j = i+1;
                    $('#pendahuluan_p'+j).val(splitPendahuluan[i]);
                  }
                  swal("Pendahuluan Berhasil Disimpan", "", "success");
                  $('#finalisasi-pendahuluan').css('display','block');
                    
                },
                error: function (data) {
                    console.log('Error:', data);
                    swal("Pendahuluan Gagal Disimpan", "", "error");
                }
              });
          });
          
          $('#saveTinjauanPustaka').click(function (e) {
              e.preventDefault();
              var tinpus_1=[];
              for(var i=0;i < 10 ;i++){
                var j = i+1;
                tinpus_1.push($('#pustaka_1'+j).val());
              }
              var tinpus_2=CKEDITOR.instances['pustaka_2'].getData();
              var _token = $("input[name='_token']").val();
              var nim_ketua = $("input[name='nim_ketua']").val();
              var revisike = $("input[name='revisike']").val();
              
              $.ajax({
                data: {tinjauan_pustaka_1:tinpus_1.join("&&&"),tinjauan_pustaka_2:tinpus_2,_token:_token,nim_ketua:nim_ketua,revisike:revisike},
                url: "{{url('/ProposalPKMR0/store/tinjauanPustaka')}}",
                type: "POST",
                //dataType: 'json',
                success: function (data) {  
                  var tinpus1 = data.data.tinjauan_pustaka_1;
                  var splittinpus1 = tinpus1.split("&&&");
                  for(var i=0;i < splittinpus1.length ;i++){
                    var j = i+1;
                    $('#pustaka_1'+j).val(splittinpus1[i]);
                  }
                  CKEDITOR.instances['pustaka_2'].setData(data.data.tinjauan_pustaka_2);
                  swal("Tinjauan Pustaka Berhasil Disimpan", "", "success");
                  $('#finalisasi-tinpus').css('display','block');
                    
                },
                error: function (data) {
                    console.log('Error:', data);
                    swal("Tinjauan Pustaka Gagal Disimpan", "", "error");
                }
              });
          });

          $('#saveMetodePelaksanaan').click(function (e) {
              e.preventDefault();
              $.ajax({
                data: $('#formMetodePelaksanaan').serialize(),
                url: "{{url('/ProposalPKMR0/store/metodePelaksanaan')}}",
                type: "POST",
                dataType: 'json',
                success: function (data) { 
                  var metodePelaksanaan = data.data.metode_pelaksanaan;
                  var splitmetodePelaksanaan = metodePelaksanaan.split("&&&");
                  for(var i=0;i < splitmetodePelaksanaan.length ;i++){
                    var j = i+1;
                    $('#metode_pelaksanaan_'+j).val(splitmetodePelaksanaan[i]);
                  }
                  swal("Metode Pelaksanaan Berhasil Disimpan", "", "success");
                  $('#finalisasi-metode').css('display','block');
                    
                },
                error: function (data) {
                    console.log('Error:', data);
                    swal("Metode Pelaksanaan Gagal Disimpan", "", "error");
                }
              });
          });
          
          $('#saveBiayaKegiatan').click(function (e) {
              e.preventDefault();

              var biaya=CKEDITOR.instances['biaya'].getData();
              var jadwal_kegiatan=CKEDITOR.instances['jadwal_kegiatan'].getData();
              var _token = $("input[name='_token']").val();
              var nim_ketua = $("input[name='nim_ketua']").val();
              var revisike = $("input[name='revisike']").val();

              $.ajax({
                data: {biaya:biaya,jadwal_kegiatan:jadwal_kegiatan,_token:_token,nim_ketua:nim_ketua,revisike:revisike},
                url: "{{url('/ProposalPKMR0/store/biayaJadwal')}}",
                type: "POST",
                success: function (data) { 
                  CKEDITOR.instances['biaya'].setData(data.data.biaya);
                  CKEDITOR.instances['jadwal_kegiatan'].setData(data.data.jadwal_kegiatan);
                  swal("Biaya dan Jadwal Kegiatan Berhasil Disimpan", "", "success");
                  $('#finalisasi-biayakegiatan').css('display','block');
                    
                },
                error: function (data) {
                    console.log('Error:', data);
                    swal("Biaya dan Jadwal Kegiatan Gagal Disimpan", "", "error");
                }
              });
          });
          
          $('#saveDaftarPustaka').click(function (e) {
              e.preventDefault();
              $.ajax({
                data: $('#formDaftarPustaka').serialize(),
                url: "{{url('/ProposalPKMR0/store/daftarPustaka')}}",
                type: "POST",
                dataType: 'json',
                success: function (data) {                    
                  $('#finalisasi-dapus').css('display','block');
                  swal("Daftar Pustaka Berhasil Disimpan", "", "success");
                },
                error: function (data) {
                    console.log('Error:', data);
                    swal("Daftar Pustaka Berhasil Disimpan", "", "error");
                }
              });
          });
          
          $('#saveJustifikasiOrganisasi').click(function (e) {
              e.preventDefault();

              var justifikasi_anggaran=CKEDITOR.instances['justifikasi_anggaran'].getData();
              var susunan_organisasi=CKEDITOR.instances['susunan_organisasi'].getData();
              var _token = $("input[name='_token']").val();
              var nim_ketua = $("input[name='nim_ketua']").val();
              var revisike = $("input[name='revisike']").val();

              $.ajax({
                data: {justifikasi_anggaran:justifikasi_anggaran,susunan_organisasi:susunan_organisasi,_token:_token,nim_ketua:nim_ketua,revisike:revisike},
                url: "{{url('/ProposalPKMR0/store/justifikasiOrganisasi')}}",
                type: "POST",
                success: function (data) {
                  $('#finalisasi-JustifikasiOrganisasi').css('display','block');
                  swal("Biaya dan Jadwal Kegiatan Berhasil Disimpan", "", "success");
                },
                error: function (data) {
                    console.log('Error:', data);
                    swal("Biaya dan Jadwal Kegiatan Gagal Disimpan", "", "error");
                }
              });
          });

          $('#saveGambaranTeknologi').click(function (e) {
              e.preventDefault();
              $.ajax({
                data: $('#formGambaranTeknologi').serialize(),
                url: "{{url('/ProposalPKMR0/store/GambaranTeknologi')}}",
                type: "POST",
                dataType: 'json',
                success: function (data) {                    
                  $('#penjelasan_ilustrasi').val(data.data.penjelasan_ilustrasi);
                  $('#spek_teknis').val(data.data.spek_teknis);
                  $('#penjelasan_blok_diagram').val(data.data.penjelasan_blok_diagram);
                  $('#penjelasan_blok_diagram2').val(data.data.penjelasan_blok_diagram2);
                  $('#penjelasan_flowchart').val(data.data.penjelasan_flowchart);
                  $('#komponen').val(data.data.komponen);
                  swal("Gambaran Teknologi Berhasil Disimpan", "", "success");
                },
                error: function (data) {
                    console.log('Error:', data);
                    swal("Gambaran Teknologi Berhasil Disimpan", "", "error");
                }
              });
          });                   


          ///////////////////////////////////////////////////////////////////////////////////////////////

          $('#btnfinalisasi-dataproposal').click(function (e) {
              e.preventDefault();
              $.ajax({
                data: $('#finalisasiFormDataProposal').serialize(),
                url: "{{url('/ProposalPKM/finalisasi')}}",
                type: "POST",
                dataType: 'json',
                success: function (data) {                    
                  $('#btnfinalisasi-dataproposal').css('display','none');
                  $('#btnfinalisasi-dataproposal-done').css('display','block');
                  $('#saveDataProposal').prop('disabled', true);
                  swal("Data Proposal Berhasil Difinalisasi", "", "success");
                },
                error: function (data) {
                    console.log('Error:', data);
                    swal("Data Proposal Gagal Difinalisasi", "", "error");
                }
              });
          });

          $('#btnfinalisasi-pendahuluan').click(function (e) {
              e.preventDefault();
              $.ajax({
                data: $('#finalisasiform_pendahuluan').serialize(),
                url: "{{url('/ProposalPKM/finalisasi')}}",
                type: "POST",
                dataType: 'json',
                success: function (data) {                   
                  $('#btnfinalisasi-pendahuluan').css('display','none');
                  $('#btnfinalisasi-pendahuluan-done').css('display','block');
                  $('#savePendahuluan').prop('disabled', true);
                  swal("Data Proposal Berhasil Difinalisasi", "", "success");
                },
                error: function (data) {
                    console.log('Error:', data);
                    swal("Data Proposal Gagal Difinalisasi", "", "error");
                }
              });
          });

          $('#btnfinalisasi-biayaKegiatan').click(function (e) {
              e.preventDefault();
              $.ajax({
                data: $('#finalisasiform_biayaKegiatan').serialize(),
                url: "{{url('/ProposalPKM/finalisasi')}}",
                type: "POST",
                dataType: 'json',
                success: function (data) {                 
                  $('#btnfinalisasi-biayaKegiatan').css('display','none');
                  $('#btnfinalisasi-biayaKegiatan-done').css('display','block');
                  $('#saveBiayaKegiatan').prop('disabled', true);
                  swal("Biaya dan Jadwal kegiatan Berhasil Difinalisasi", "", "success");
                },
                error: function (data) {
                    console.log('Error:', data);
                    swal("Biaya dan Jadwal kegiatan Gagal Difinalisasi", "", "error");
                }
              });
          });

          $('#btnfinalisasi-metode').click(function (e) {
              e.preventDefault();
              $.ajax({
                data: $('#finalisasiform_metode').serialize(),
                url: "{{url('/ProposalPKM/finalisasi')}}",
                type: "POST",
                dataType: 'json',
                success: function (data) {                 
                  $('#btnfinalisasi-metode').css('display','none');
                  $('#btnfinalisasi-metode-done').css('display','block');
                  $('#saveMetodePelaksanaan').prop('disabled', true);
                  swal("Metode Pelaksanaan kegiatan Berhasil Difinalisasi", "", "success");
                },
                error: function (data) {
                    console.log('Error:', data);
                    swal("Metode Pelaksanaan Gagal Difinalisasi", "", "error");
                }
              });
          });

          $('#btnfinalisasi-tinpus').click(function (e) {
              e.preventDefault();
              $.ajax({
                data: $('#finalisasiform_tinpus').serialize(),
                url: "{{url('/ProposalPKM/finalisasi')}}",
                type: "POST",
                dataType: 'json',
                success: function (data) {                 
                  $('#btnfinalisasi-tinpus').css('display','none');
                  $('#btnfinalisasi-tinpus-done').css('display','block');
                  $('#saveTinjauanPustaka').prop('disabled', true);
                  swal("Tinjauan Pustaka Berhasil Difinalisasi", "", "success");
                },
                error: function (data) {
                    console.log('Error:', data);
                    swal("Tinjauan Pustaka Gagal Difinalisasi", "", "error");
                }
              });
          });

          $('#btnfinalisasi-dapus').click(function (e) {
              e.preventDefault();
              $.ajax({
                data: $('#finalisasiform_dapus').serialize(),
                url: "{{url('/ProposalPKM/finalisasi')}}",
                type: "POST",
                dataType: 'json',
                success: function (data) {                 
                  $('#btnfinalisasi-dapus').css('display','none');
                  $('#btnfinalisasi-dapus-done').css('display','block');
                  $('#saveDaftarPustaka').prop('disabled', true);
                  swal("Daftar Pustaka Berhasil Difinalisasi", "", "success");
                },
                error: function (data) {
                    console.log('Error:', data);
                    swal("Daftar Pustaka Gagal Difinalisasi", "", "error");
                }
              });
          });
          
          $('#btnfinalisasi-JustifikasiOrganisasi').click(function (e) {
              e.preventDefault();
              $.ajax({
                data: $('#finalisasiform_JustifikasiOrganisasi').serialize(),
                url: "{{url('/ProposalPKM/finalisasi')}}",
                type: "POST",
                dataType: 'json',
                success: function (data) {                 
                  $('#btnfinalisasi-JustifikasiOrganisasi').css('display','none');
                  $('#btnfinalisasi-JustifikasiOrganisasi-done').css('display','block');
                  $('#saveJustifikasiOrganisasi').prop('disabled', true);
                  swal("Justifikasi Anggaran dan Susunan Organisasi Berhasil Difinalisasi", "", "success");
                },
                error: function (data) {
                    console.log('Error:', data);
                    swal("Justifikasi Anggaran dan Susunan Organisasi Gagal Difinalisasi", "", "error");
                }
              });
          });

          $('#btnfinalisasi-UploadFile').click(function (e) {
              e.preventDefault();
              $.ajax({
                data: $('#finalisasiform_uploadfile').serialize(),
                url: "{{url('/ProposalPKM/finalisasi')}}",
                type: "POST",
                dataType: 'json',
                success: function (data) {                 
                  $('#btnfinalisasi-UploadFile').css('display','none');
                  $('#btnfinalisasi-UploadFile-done').css('display','block');
                  $('#pengesahan').prop('disabled', true);
                  $('#BiodataKetua').prop('disabled', true);
                  $('#BiodataAnggota1').prop('disabled', true);
                  $('#BiodataAnggota2').prop('disabled', true);
                  $('#BiodataPembimbing').prop('disabled', true);
                  $('#SuratPernyataan').prop('disabled', true);
                  swal("Upload File Berhasil Difinalisasi", "", "success");
                },
                error: function (data) {
                    console.log('Error:', data);
                    swal("Upload File Gagal Difinalisasi", "", "error");
                }
              });
          });

          $('#btnfinalisasi-GambaranTeknologi').click(function (e) {
              e.preventDefault();
              $.ajax({
                data: $('#finalisasiform_gambaranteknologi').serialize(),
                url: "{{url('/ProposalPKM/finalisasi')}}",
                type: "POST",
                dataType: 'json',
                success: function (data) {                 
                  $('#btnfinalisasi-GambaranTeknologi').css('display','none');
                  $('#btnfinalisasi-GambaranTeknologi-done').css('display','block');
                  $('#gambar_ilustrasi').prop('disabled', true);
                  $('#gambar_blok_diagram').prop('disabled', true);
                  $('#gambar_blok_diagram2').prop('disabled', true);
                  $('#gambar_flowchart').prop('disabled', true);
                  $('#saveGambaranTeknologi').prop('disabled', true);
                  swal("Gambaran Teknologi Berhasil Difinalisasi", "", "success");
                },
                error: function (data) {
                    console.log('Error:', data);
                    swal("Gambaran Teknologi Gagal Difinalisasi", "", "error");
                }
              });
          });

          
          
        });

        
function swal_ajax(type) {
  switch (type) {
  case 'load':
      swal.fire({
          title: '',
          html: '<div class="save_loading"><svg viewBox="0 0 140 140" width="140" height="140"><g class="outline"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="rgba(0,0,0,0.1)" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round"></path></g><g class="circle"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="#71BBFF" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-dashoffset="200" stroke-dasharray="300"></path></g></svg></div><div><h4>Save in progress...</h4></div>',
          showConfirmButton: false,
          allowOutsideClick: false
      });
      break;
  case 'error':
      setTimeout(function(){
          $('#swal2-content').html('<div class="sa"><div class="sa-error"><div class="sa-error-x"><div class="sa-error-left"></div><div class="sa-error-right"></div></div><div class="sa-error-placeholder"></div><div class="sa-error-fix"></div></div></div><div><h4>An error has occurred; please contact web support for assistance.</h4></div><button class="confirm swal-close" style="display: inline-block; border-left-color: rgb(48, 133, 214); border-right-color: rgb(48, 133, 214);">OK</button>');
          }, 1000);
      $('.swal-close').on('click', function() { swal.closeModal(); });
      break;
  case 'success':
      setTimeout(function(){
          $('#swal2-content').html('<div class="sa"><div class="sa-success"><div class="sa-success-tip"></div><div class="sa-success-long"></div><div class="sa-success-placeholder"></div><div class="sa-success-fix"></div></div></div><div><h4>Save successful!</h4></div>');
      }, 1000);
      setTimeout(function() {
          swal.close(true);
      }, 2000);
      break;
  }
}

function uploadBerkas(id) {
  var idform = $('#'+id).closest('form').attr('id');
  var dataform = document.getElementById(idform);
  var fd = new FormData(dataform );
  $.ajax({
    url: "{{url('/ProposalPKM/uploadFile')}}",
    type: "POST",
    data:  fd,
    contentType: false,
    cache: false,
    processData:false,
    beforeSend: function() {
      swal({
        text: "Uploading...",
        icon: "{{asset('Images/loading.gif')}}",
        buttons: false
      });
    },
    success: function (data,id) {
      $("#"+id).val();
      switch (data.success) {
          case 'pengesahan':
            var pengesahan = "{{asset('BerkasProposalPKM')}}"+"/"+data.data.pengesahan
            $('#locatePengesahan').html('<a href='+pengesahan+' target="_blank" class="btn btn-warning">Lihat File</a>');  
          break;

          case 'biodata_ketua':
            var biodata_ketua = "{{asset('BerkasProposalPKM')}}"+"/"+data.data.biodata_ketua
            $('#locateBiodataKetua').html('<a href='+biodata_ketua+' target="_blank" class="btn btn-warning">Lihat File</a>');
          break;

          case 'biodata_anggota1':
            var biodata_anggota1 = "{{asset('BerkasProposalPKM')}}"+"/"+data.data.biodata_anggota1
            $('#locateBiodataAnggota1').html('<a href='+biodata_anggota1+' target="_blank" class="btn btn-warning">Lihat File</a>');
          break;

          case 'biodata_anggota2':
            var biodata_anggota2 = "{{asset('BerkasProposalPKM')}}"+"/"+data.data.biodata_anggota2
            $('#locateBiodataAnggota2').html('<a href='+biodata_anggota2+' target="_blank" class="btn btn-warning">Lihat File</a>');
          break;

          case 'biodata_pembimbing':
            var biodata_pembimbing = "{{asset('BerkasProposalPKM')}}"+"/"+data.data.biodata_pembimbing
            $('#locateBiodataPembimbing').html('<a href='+biodata_pembimbing+' target="_blank" class="btn btn-warning">Lihat File</a>');
          break;

          case 'surat_pernyataan':
            var surat_pernyataan = "{{asset('BerkasProposalPKM')}}"+"/"+data.data.surat_pernyataan
            $('#locateSuratPertanyaan').html('<a href='+surat_pernyataan+' target="_blank" class="btn btn-warning">Lihat File</a>');
          break;

          case 'gambar_ilustrasi':
            var gambar_ilustrasi = "{{asset('BerkasProposalPKM')}}"+"/"+data.data.gambar_ilustrasi
            $('#locategambar_ilustrasi').html('<a href='+gambar_ilustrasi+' target="_blank" class="btn btn-warning">Lihat File</a>');
          break;

          case 'gambar_blok_diagram':
            var gambar_blok_diagram = "{{asset('BerkasProposalPKM')}}"+"/"+data.data.gambar_blok_diagram
            $('#locategambar_blok_diagram').html('<a href='+gambar_blok_diagram+' target="_blank" class="btn btn-warning">Lihat File</a>');
          break;

          case 'gambar_blok_diagram2':
            var gambar_blok_diagram2 = "{{asset('BerkasProposalPKM')}}"+"/"+data.data.gambar_blok_diagram2
            $('#locategambar_blok_diagram2').html('<a href='+gambar_blok_diagram2+' target="_blank" class="btn btn-warning">Lihat File</a>');
          break;

          case 'gambar_flowchart':
            var gambar_flowchart = "{{asset('BerkasProposalPKM')}}"+"/"+data.data.gambar_flowchart
            $('#locategambar_gambar_flowchart').html('<a href='+gambar_flowchart+' target="_blank" class="btn btn-warning">Lihat File</a>');
          break;
          

          
          
          default:
          
          break;
      }
      swal("Berkas Berhasil Disimpan", "", "success");

    },
    error: function (data) {
        console.log('Error:', data);
        swal("Berkas Gagal Disimpan", "", "error");
    }
  });
}

function checkIfFileLoaded(fileName) {
    $.get(fileName, function(data, textStatus) {
        if (textStatus == "success") {
            // execute a success code
            console.log("file loaded!");
        }
    });
}
    </script>
@endpush