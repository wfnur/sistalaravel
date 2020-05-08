<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $deadline = \App\deadline::where('status','=',1)->first();
    return redirect()->action('AuthController@login');
});

Route::get('/Login', 'AuthController@login')->name('login');
Route::post('/postlogin', 'AuthController@postlogin');
Route::get('/Logout', 'AuthController@logout');

Route::get('kategoriReview/get', 'proposalPkmController@kategoriReview');
Route::get('ReviewProposal/get/{revisike}/{nim}/{indikator}', 'proposalPkmController@getDataReview');
Route::group(['middleware' => ['auth','checkRole:admin']], function () {
    Route::get('/Dashboard-Admin', 'DashboardController@admin');
    Route::get('/Mahasiswa', 'MahasiswaController@index');
    Route::post('/Mahasiswa/create', 'MahasiswaController@create');
    Route::get('/Mahasiswa/edit/{NIM}', 'MahasiswaController@edit');
    Route::post('/Mahasiswa/update/{NIM}', 'MahasiswaController@update');
    Route::get('/Mahasiswa/delete/{NIM}', 'MahasiswaController@delete');
    Route::get('/Mahasiswa/CreateUser', 'MahasiswaController@createUserMahasiswa');

    Route::get('/Dosen/Create', 'DosenController@create');
    Route::get('/Dosen/edit/{kode_dosen}', 'DosenController@edit');
    Route::post('/Dosen/updateAdmin/{kode_dosen}', 'DosenController@updateAdmin');
    Route::get('/Dosen/delete/{kode_dosen}', 'DosenController@delete');
    Route::post('/Dosen/Store', 'DosenController@store');
    Route::get('/Dosen/CreateUser', 'DosenController@createUserDosen');

    Route::resource('BAB', 'BabController');
    Route::resource('SubBab', 'SubBabController');
    Route::resource('Minggu-Bimbingan', 'MinggubimbinganController');
    Route::resource('Deadline', 'deadlineController');
    Route::resource('Poin-Penilaian', 'PoinPenilaianController');
    Route::resource('Poin-Penilaian-Laporan', 'poinPenilaianLaporanController');
    Route::resource('Jadwal-Sidang', 'JadwalSidangController');
});

Route::group(['middleware' => ['auth','checkRole:mhs']], function () {
    Route::get('/Mahasiswa/Beranda', 'DashboardController@mahasiswa');
    Route::get('/Mahasiswa/Profile', 'MahasiswaController@profile');
    Route::post('/Mahasiswa/update/{NIM}', 'MahasiswaController@update'); 
    Route::post('/Mahasiswa/changePassword', 'MahasiswaController@changePassword');

    //// Proposal Lama
    Route::post('/Proposal/Store/Finalisasi', 'proposal_taController@storefinalisasi');
    Route::get('/Proposal/TA/R0', 'proposal_taController@createR0');
    Route::get('/Proposal/TA/R1', 'proposal_taController@createR1');
    Route::post('/Proposal/Store/DataProposal', 'proposal_taController@storeDataProposal');
    Route::post('/Proposal/Store/Abstrak', 'proposal_taController@storeAbstrak');
    Route::post('/Proposal/Store/Pendahuluan', 'proposal_taController@storePendahuluan');
    Route::post('/Proposal/Store/TinjauanPustaka', 'proposal_taController@storeTinjauanPustaka');
    Route::post('/Proposal/Store/MetodePelaksanaan', 'proposal_taController@storeMetodePelaksanaan');
    Route::post('/Proposal/Store/BiayaJadwal', 'proposal_taController@storeBiayaJadwal');
    Route::post('/Proposal/Store/DaftarPustaka', 'proposal_taController@storeDaftarPustaka');
    Route::post('/Proposal/Store/JustifikasiAnggaran', 'proposal_taController@storeJustifikasiAnggaran');
    Route::post('/Proposal/Store/UploadFile', 'proposal_taController@storeUploadFile');
    Route::post('/Proposal/Store/GambaranTeknologi', 'proposal_taController@storeGambaranTeknologi');
    ///////////////////////////////////////////////////

    /// Proposal Baru
    Route::get('/Proposal/TA', 'proposal_taController@createProposalTA');
    Route::post('/Proposal/Store/ProposalTA', 'proposal_taController@storeProposalTA');
    Route::post('/Proposal/Store/BerkasProposalTA', 'proposal_taController@storeUploadBerkas');
    //////////////////////////////////////////

    /// Laporan
    Route::get('/Laporan/TA', 'laporanTAController@create');
    Route::get('/Laporan/Revisi', 'laporanTAController@createRevisi');
    Route::post('/LaporanTA/Store', 'laporanTAController@store');
    Route::post('/LaporanTA/Revisi/Store', 'laporanTAController@storeRevisi');
    ////////////////////////////////////

    /// Bimbingan
    Route::get('Bimbingan', 'BimbinganController@index');
    Route::get('Bimbingan/create', 'BimbinganController@create');
    Route::post('Bimbingan/store', 'BimbinganController@store');
    Route::resource('Paper', 'paperController');
    ///////////////////

    //Proposal PKM
    Route::get('Proposal/PKM/R/{revisike}', 'proposalPkmController@proposalPkm');
    Route::get('Proposal/PKM/{revisike}/get', 'proposalPkmController@getproposalPkm');
    Route::post('ProposalPKM/finalisasi', 'proposalPkmController@storefinalisasi');
    Route::post('ProposalPKM/uploadFile', 'proposalPkmController@storeUploadBerkas');
    Route::post('ProposalPKMR0/store/dataproposal', 'proposalPkmController@storeDataProposalPKM');
    Route::post('ProposalPKMR0/store/pendahuluan', 'proposalPkmController@storePendahuluanPKM');
    Route::post('ProposalPKMR0/store/tinjauanPustaka', 'proposalPkmController@storetinjauanPustaka');
    Route::post('ProposalPKMR0/store/metodePelaksanaan', 'proposalPkmController@storemetodePelaksanaan');
    Route::post('ProposalPKMR0/store/biayaJadwal', 'proposalPkmController@storebiayaJadwal');
    Route::post('ProposalPKMR0/store/daftarPustaka', 'proposalPkmController@storedapus');
    Route::post('ProposalPKMR0/store/justifikasiOrganisasi', 'proposalPkmController@storeJustifikasiOrganisasi');
    Route::post('ProposalPKMR0/store/GambaranTeknologi', 'proposalPkmController@storeGambaranTeknologi');
    
});

Route::group(['middleware' => ['auth','checkRole:dsn']], function () {
    Route::get('/Dosen/Beranda', 'DosenController@index');
    Route::get('/Dosen/Profile', 'DosenController@profile');
    Route::post('/Dosen/{kode_dosen}/update', 'DosenController@update');
    Route::post('/Dosen/changePassword', 'DosenController@changePassword');

    //review proposal pkm
    Route::get('proposalPKM/get/{nim}/{revisike}', 'proposalPkmController@proposalPKMData');
    
    
    Route::get('Get/ReviewProposal/PKM/R/{revisike}/{nim}', 'proposalPkmController@getproposalPkmDetail');
    Route::get('List/ReviewProposal/PKM/R/{revisike}', 'proposalPkmController@ListReviewProposal');
    Route::get('ReviewProposal/PKM/R/{revisike}/{nim}', 'proposalPkmController@ReviewProposal');
    Route::post('ReviewProposalTA/store/dataproproposal', 'proposalPkmController@storeReviewDataproposal');

    //proposal ta
    Route::get('/Review/ProposalTA', 'reviewProposalTAController@listMahasiswa');
    Route::get('/Review/ProposalTA/{nim}', 'reviewProposalTAController@reviewPTA');
    Route::post('/Review/ProposalTA/create', 'reviewProposalTAController@createReviewPTA');

    //Bimbingan
    Route::get('/Bimbingan/Verifikasi', 'BimbinganController@verifikasi');
    Route::get('/Bimbingan/Rekap', 'BimbinganController@rekap');
    Route::get('/Bimbingan/ListVerifikasi', 'BimbinganController@ListVerifikasi');
    Route::post('/Bimbingan/saveBimbingan', 'BimbinganController@saveBimbingan');

    //Laporan
    Route::get('/Laporan/Penilaian/List-Mahasiswa', 'laporanTAController@listMahasiswa');
    Route::get('/Laporan/Penilaian/{nim}', 'laporanTAController@penilaianLaporan');
    Route::post('/Laporan/Penilaian/simpan', 'laporanTAController@saveNilaiLaporan');
    Route::post('/Laporan/Revisi/simpan', 'laporanTAController@saveRevisiLaporan');
    Route::post('/Laporan/Revisi/finalisasi', 'laporanTAController@finalisasiRevisiLaporan');
    Route::get('/Laporan/Nilai/List-Mahasiswa', 'laporanTAController@listMahasiswapanitia');
    Route::get('/Laporan/Download/{nama}', 'laporanTAController@downloadfile');
    Route::post('/Unlock/Laporan', 'laporanTAController@unlocknilailaporan');
    Route::get('/Laporan/Nilai/{nim}', 'laporanTAController@detailNilaiLaporan');
    Route::get('/Laporan/Penilaian/Panitia/{nim}/{kode_dosen}', 'laporanTAController@penilaianLaporanPanitia');

    ////sidang ta
    Route::get('/SidangTA/Penilaian/List-Mahasiswa', 'sidangTAController@listMahasiswa');
    Route::get('/SidangTA/Penilaian/{nim}', 'sidangTAController@penilaianSidangTA');
    Route::post('/Laporan/Penilaian/SidangTA/simpan', 'sidangTAController@saveNilaiSidang');
    Route::post('/SidangTA/finalisasi', 'sidangTAController@finalisasiNilaiSidang');
    Route::get('/SidangTA/Nilai-Akhir/{nim}', 'sidangTAController@nilaiSidangAkhir');
    Route::get('/SidangTA/Nilai/List-Mahasiswa', 'sidangTAController@listMahasiswapanitia');
    Route::get('/SidangTA/Penilaian/Panitia/{nim}/{kode_dosen}', 'sidangTAController@penilaianSidangTAPanitia');
    Route::post('/Unlock/Sidang', 'sidangTAController@unlocknilaisidang');
    
    //NIlai PKM publikasi
    Route::resource('/Nilai-PKM-Publikasi', 'nilaiPKMPublikasiController');

    //Paper
    Route::get('/Mahasiswa-Paper', 'paperController@listMahasiswa');
    Route::post('/Paper/saveStatusPaper', 'paperController@saveStatusPaper');

     //Revisi
    Route::get('/Laporan/Revisi/List-Mahasiswa', 'laporanTAController@listMahasiswa_revisi');
    Route::get('/Laporan/Revisi/{nim}', 'laporanTAController@revisiLaporan');
    Route::post('/Laporan/Revisi/simpan2', 'laporanTAController@saveRevisiLaporan2');
    Route::get('/Laporan/Download/File/{nama}', 'laporanTAController@downloadfileRevisi');
   
});
