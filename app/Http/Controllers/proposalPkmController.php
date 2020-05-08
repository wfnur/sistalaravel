<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller as BaseController;
use Auth;
use \App\proposal_ta;
use \App\Dosen;
use \App\bidang;
use \App\proposalTA;
use \App\proposalpkm;
use \App\berkasProposalTA;
use \App\deadline;

class proposalPkmController extends Controller
{
          
    public function getproposalPkm(Request $request, $revisike){
        $proposalpkm = \App\proposalpkm::where('nim_ketua','=', Auth::user()->username)
        ->where('revisike','=',$revisike)
        ->first();
        return response()->json(['data' => $proposalpkm]);
    }

    public function storefinalisasi(Request $request){
        //return $request->get('revisike');

        $proposalpkm = \App\proposalpkm::updateOrCreate([
            'nim_ketua'   => Auth::user()->username,
            'revisike' => $request->get('revisike'),
        ],[
            $request->get('nama_field') => 1
        ]);

        if ($proposalpkm) {
            return response()->json(['success'=>'Product saved successfully.','data' => $proposalpkm]);
        }else{
            return response()->json(['error'=>'Product Failed to Save.']);
        }
        
    }

    public function storeUploadBerkas(Request $request){
        //return $request;
        $namakolom = getNamakolomBerkas($request->get('jenisBerkas'));
        
        $imgName = generateNamaProposalPKM(Auth::user()->username,$request->file('berkas')->getClientOriginalExtension(),$request->revisike,$request->get('jenisBerkas'));
        $request->file('berkas')->move('public/BerkasProposalPKM/',$imgName);

        $berkasproposapkm = proposalpkm::updateOrCreate([
            'nim_ketua'           => Auth::user()->username,
            'revisike'      => $request->get('revisike'),
        ],[
            $namakolom => $imgName,
        ]);

        if ($berkasproposapkm) {
            return response()->json(['success'=>$namakolom,'data' => $berkasproposapkm]);
        }else{
            return response()->json(['error'=>'Product Failed to Save.']);
        }
    }
    
    public function proposalPkm(Request $request, $revisike){
        $tablepustaka2="<table border='1'> <thead> <th>Metoda yang digunakan dalam daftar pustaka</th> <th>Keunggulan</th> <th>Kelemahan</th> </thead> <tbody> <tr> <td>Metoda 1 (nama, tahun)</td><td></td><td></td> </tr> <tr> <td>Metoda 2 (nama, tahun)</td><td></td><td></td> </tr> <tr> <td>Metoda 3 (nama, tahun)</td><td></td><td></td> </tr> <tr> <td>Metoda 4 (nama, tahun)</td><td></td><td></td> </tr> <tr> <td>Metoda 5 (nama, tahun)</td><td></td><td></td> </tr> <tr> <td>Metoda 6 (nama, tahun)</td><td></td><td></td> </tr> <tr> <td>Metoda 7 (nama, tahun)</td><td></td><td></td> </tr> <tr> <td>Metoda 8 (nama, tahun)</td><td></td><td></td> </tr> <tr> <td>Metoda 9 (nama, tahun)</td><td></td><td></td> </tr> <tr> <td>Metoda 10 (nama, tahun)</td><td></td><td></td> </tr> <tr> <td>Metoda yang diusulkan</td><td></td><td></td> </tr> </tbody> </table>";
        $tablebiaya="<b>4.1 Anggaran Biaya</b><br> Penggunaan anggaran yang dibutuhkan untuk kegiatan ini adalah sebesar Rp x.xxx.xxx,- </p> <center>Tabel 4.1.1 Format Ringkasan Anggaran Biaya Kegiatan</center> <table border='1' cellspacing='0' cellpadding='0'> <thead> <tr> <td>No.</td> <td>Jenis Pengeluaran</td> <td>Biaya (Rp)</td> </tr> </thead> <tbody> </tbody> <tr> <td style='text-align:center'>1</td> <td>Peralatan penunjang</td> <td>x.xxx.xxx</td> </tr> <tr> <td style='text-align:center'>2</td> <td>Bahan habis pakai <br> (Komponen utama dan pengujian)</td> <td>x.xxx.xxx</td> </tr> <tr> <td style='text-align:center'>3</td> <td>Biaya perjalanan</td> <td>x.xxx.xxx</td> </tr> <tr> <td style='text-align:center'>4</td> <td>Lain-lain</td> <td>x.xxx.xxx</td> </tr> <tr> <td colspan='2' style='text-align:center'>Jumlah</td> <td>x.xxx.xxx</td> </tr> </tbody> </table>";
        $tablejadwal="<b>4.2 Jadwal Kegiatan</b> <br> Tabel 4.2.1 Jadwal Kegiatan PKM-xxx </p> <table border='1' cellspacing='0' cellpadding='0'> <thead> <tr> <td rowspan='3'>No. </td> <td rowspan='3'>Kegiatan</td> <td colspan='20'>Bulan</td> </tr> <tr> <td colspan='4'>Bulan Ke-1</td> <td colspan='4'>Bulan Ke-2</td> <td colspan='4'>Bulan Ke-3</td> <td colspan='4'>Bulan Ke-4</td> <td colspan='4'>Bulan Ke-5</td> </tr> <tr> <td style='text-align:center'>1</td> <td style='text-align:center'>2</td> <td style='text-align:center'>3</td> <td style='text-align:center'>4</td> <td style='text-align:center'>1</td> <td style='text-align:center'>2</td> <td style='text-align:center'>3</td> <td style='text-align:center'>4</td> <td style='text-align:center'>1</td> <td style='text-align:center'>2</td> <td style='text-align:center'>3</td> <td style='text-align:center'>4</td> <td style='text-align:center'>1</td> <td style='text-align:center'>2</td> <td style='text-align:center'>3</td> <td style='text-align:center'>4</td> <td style='text-align:center'>1</td> <td style='text-align:center'>2</td> <td style='text-align:center'>3</td> <td style='text-align:center'>4</td> </tr> </thead> <tbody> <tr> <td style='text-align:center'>1</td> <td>Koleksi data awal</td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> </tr> <tr> <td style='text-align:center'>2</td> <td>Mendesain alat (Menyusun desain teknis)</td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> </tr> <tr> <td style='text-align:center'>4</td> <td>Membuat alat (Proses realisasi alat)</td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> </tr> <tr> <td style='text-align:center'>5</td> <td>Uji keandalan alat</td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> </tr> <tr> <td style='text-align:center'>6</td> <td>Menganalisis data</td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> </tr> <tr> <td style='text-align:center'>7</td> <td>Evaluasi kinerja alat</td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> </tr> </tbody> </table>";
        $tableanggaran="<table border='1'> <tr> <td style='font-weight:bold'>1. Jenis Perlengkapan</td> <td>Volume</td> <td>Harga Satuan (Rp)</td> <td>Nilai (Rp)</td> </tr> <tr> <td></td><td></td><td></td><td></td> </tr> <tr> <td></td><td></td><td></td><td></td> </tr> <tr> <td colspan='3' style='text-align:right'>SUB TOTAL (Rp)</td><td></td> </tr> <tr> <td style='text-align:left'>2. Bahan Habis</td> <td>Volume</td> <td>Harga Satuan (Rp)</td> <td>Nilai (Rp)</td> </tr> <tr> <td></td><td></td><td></td><td></td> </tr> <tr> <td></td><td></td><td></td><td></td> </tr> <tr> <td colspan='3' style='text-align:right'>SUB TOTAL (Rp)</td><td></td> </tr> <tr> <td style='text-align:left'>3. Perjalanan</td> <td>Volume</td> <td>Harga Satuan (Rp)</td> <td>Nilai (Rp)</td> </tr> <tr> <td></td><td></td><td></td><td></td> </tr> <tr> <td></td><td></td><td></td><td></td> </tr> <tr> <td colspan='3' style='text-align:right'>SUB TOTAL (Rp)</td><td></td> </tr> <tr> <td style='text-align:left'>4. Lain - lain</td> <td>Volume</td> <td>Harga Satuan (Rp)</td> <td>Nilai (Rp)</td> </tr> <tr> <td></td><td></td><td></td><td></td> </tr> <tr> <td></td><td></td><td></td><td></td> </tr> <tr> <td colspan='3' style='text-align:right'>SUB TOTAL (Rp)</td><td></td> </tr> <tr> <td colspan='3' style='text-align:right'>TOTAL 1+2+3+4 (Rp)</td><td></td> </tr> <tr> <td colspan='4'>(Terbilang)</td> </tr> </table>";
        $tableorganisasi="<table border='1'> <thead> <th>No</th> <th>NIM / Nama</th> <th>Program Studi</th> <th>Bidang Ilmu</th> <th>Alokasi Waktu(jam/minggu)</th><th>Uraian Tugas</th> </thead> <tbody> <tr> <td>1</td><td></td><td></td><td></td><td></td><td></td> </tr> <tr> <td>2</td><td></td><td></td><td></td><td></td><td></td> </tr> <tr> <td>3</td><td></td><td></td><td></td><td></td><td></td> </tr> </tbody> </table>";

        $cekdata = \App\proposalpkm::where('nim_ketua', '=', Auth::user()->username)
            ->where('revisike','=',$revisike)
            ->first();
        
        if($cekdata != null){
            if($cekdata->tinjauan_pustaka_2 != "" or $cekdata->tinjauan_pustaka_2 != null){
                $tablepustaka2 = $cekdata->tinjauan_pustaka_2;
            }
            if($cekdata->biaya != "" or $cekdata->biaya != null){
                $tablebiaya = $cekdata->biaya;
            }
            if($cekdata->jadwal_kegiatan != "" or $cekdata->jadwal_kegiatan != null){
                $tablejadwal = $cekdata->jadwal_kegiatan;
            }
            if($cekdata->justifikasi_anggaran != "" or $cekdata->justifikasi_anggaran != null){
                $tableanggaran = $cekdata->justifikasi_anggaran;
            }
            if($cekdata->susunan_organisasi != "" or $cekdata->susunan_organisasi != null){
                $tableorganisasi = $cekdata->susunan_organisasi;
            }
        }
        

        $pembimbing1 = Dosen::where('status','=','0')->get();
        $pembimbing2 = Dosen::where('status','=','1')->get();
        $bidang = bidang::all();
        
        if($revisike == 0){
            return view('ProposalPkm.ProposalPkm',compact('pembimbing1','pembimbing2','bidang',
            'revisike','tablepustaka2','tablebiaya','tablejadwal','tableanggaran','tableorganisasi'));
        }else{
            $prerevisi = $revisike -1;
            $predata = \App\proposalpkm::where('nim_ketua', '=', Auth::user()->username)
            ->where('revisike','=',$prerevisi)
            ->first();
            
            $pembimbing1_old = \App\Dosen::where('kode_dosen', '=', $predata->pembimbing_1)->first();
            $pembimbing2_old = \App\Dosen::where('kode_dosen', '=', $predata->pembimbing_2)->first();
            
            $bidang_old = \App\bidang::find($predata->bidang)->first();

            return view('ProposalPkm.ProposalPkm2',compact('pembimbing1','pembimbing2','bidang',
            'revisike','tablepustaka2','tablebiaya','tablejadwal','tableanggaran','tableorganisasi',
            'pembimbing1_old','pembimbing2_old','bidang_old'));
        }
        
              
    }

    public function storeDataProposalPKM(Request $request){

        $proposal_ta = \App\proposalpkm::updateOrCreate([
            'nim_ketua'   => Auth::user()->username,
            'revisike' => $request->get('revisike'),
        ],[
            'judul_proposal_polban'     => $request->get('judul_proposal_polban'),
            'judul_proposal_belmawa'    => $request->get('judul_proposal_belmawa'),
            'judul_proposal_TA'         => $request->get('judul_proposal_TA'),
            'jenis'                     => $request->get('jenis'),
            'bidang'                    => $request->get('bidang'),
            'pembimbing_1'              => $request->get("pembimbing_1"),
            'pembimbing_2'              => $request->get('pembimbing_2')
        ]);
        if ($proposal_ta) {
            return response()->json(['success'=>'Product saved successfully.','data' => $proposal_ta]);
        }else{
            return response()->json(['error'=>'Product Failed to Save.']);
        }
    }

    public function storePendahuluanPKM(Request $request){
        $pendahuluan =[];
        for($i=1;$i<=7;$i++){
            array_push($pendahuluan,$request->get('pendahuluan_p'.$i));
        }
        $joinpendahuluan = implode("&&&",$pendahuluan);
        
        $proposal_ta = \App\proposalpkm::updateOrCreate([
            "nim_ketua"   => Auth::user()->username,
            'revisike' => $request->get('revisike'),
        ], [
            "pendahuluan" => $joinpendahuluan
        ]);
        
        if ($proposal_ta) {
            return response()->json(['success'=>'Product saved successfully.','data' => $proposal_ta]);
        }else{
            return response()->json(['error'=>'Product Failed to Save.']);
        }
    }

    public function storetinjauanPustaka(Request $request){        
        
        $proposalpkm = \App\proposalpkm::updateOrCreate([
            "nim_ketua"   => Auth::user()->username,
            "revisike"    =>$request->get('revisike')
        ], [
            "tinjauan_pustaka_1" =>  $request->get('tinjauan_pustaka_1'),
            "tinjauan_pustaka_2" => $request->get('tinjauan_pustaka_2')
        ]);
        
        if ($proposalpkm) {
            return response()->json(['data' => $proposalpkm]);
        }else{
            return response()->json(['error'=>'Failed to Save.']);
        }
    }

    public function storemetodePelaksanaan(Request $request){
        
        $metodepelaksanaan =[];
        for($i=1;$i<=6;$i++){
            array_push($metodepelaksanaan,$request->get('metode_pelaksanaan_'.$i));
        }
        $joinmetodepelaksanaan = implode("&&&",$metodepelaksanaan);
        
        $proposalpkm = \App\proposalpkm::updateOrCreate([
            "nim_ketua"   => Auth::user()->username,
            "revisike"    => $request->get('revisike')
        ], [
            "metode_pelaksanaan" => $joinmetodepelaksanaan
        ]);
        
        if ($proposalpkm) {
            return response()->json(['data' => $proposalpkm]);
        }else{
            return response()->json(['error'=>'Failed to Save.']);
        }
    }

    public function storebiayaJadwal(Request $request){        
        //return $request;
        $proposalpkm = \App\proposalpkm::updateOrCreate([
            "nim_ketua"   => Auth::user()->username,
            "revisike"    =>$request->get('revisike')
        ], [
            "biaya" =>  $request->get('biaya'),
            "jadwal_kegiatan" => $request->get('jadwal_kegiatan')
        ]);
        
        if ($proposalpkm) {
            return response()->json(['data' => $proposalpkm]);
        }else{
            return response()->json(['error'=>'Failed to Save.']);
        }
    }

    public function storedapus(Request $request){        
        
        $proposalpkm = \App\proposalpkm::updateOrCreate([
            "nim_ketua"   => Auth::user()->username,
            "revisike"    =>$request->get('revisike')
        ], [
            "pustaka_1" =>  $request->get('pustaka_1'),
            "pustaka_2" =>  $request->get('pustaka_2'),
            "pustaka_3" =>  $request->get('pustaka_3'),
            "pustaka_4" =>  $request->get('pustaka_4'),
            "pustaka_5" =>  $request->get('pustaka_5'),
            "pustaka_6" =>  $request->get('pustaka_6'),
            "pustaka_7" =>  $request->get('pustaka_7'),
            "pustaka_8" =>  $request->get('pustaka_8'),
            "pustaka_9" =>  $request->get('pustaka_9'),
            "pustaka_10" =>  $request->get('pustaka_10')
        ]);
        
        if ($proposalpkm) {
            return response()->json(['data' => $proposalpkm]);
        }else{
            return response()->json(['error'=>'Failed to Save.']);
        }
    }

    public function storeJustifikasiOrganisasi(Request $request){        
        //return $request;
        $proposalpkm = \App\proposalpkm::updateOrCreate([
            "nim_ketua"   => Auth::user()->username,
            "revisike"    =>$request->get('revisike')
        ], [
            "justifikasi_anggaran" =>  $request->get('justifikasi_anggaran'),
            "susunan_organisasi" => $request->get('susunan_organisasi')
        ]);
        
        if ($proposalpkm) {
            return response()->json(['data' => $proposalpkm]);
        }else{
            return response()->json(['error'=>'Failed to Save.']);
        }
    }

    public function storeGambaranTeknologi(Request $request){        
        
        $proposalpkm = \App\proposalpkm::updateOrCreate([
            "nim_ketua"   => Auth::user()->username,
            "revisike"    =>$request->get('revisike')
        ], [
            "penjelasan_ilustrasi" =>  $request->get('penjelasan_ilustrasi'),
            "spek_teknis" =>  $request->get('spek_teknis'),
            "penjelasan_blok_diagram" =>  $request->get('penjelasan_blok_diagram'),
            "penjelasan_blok_diagram2" =>  $request->get('penjelasan_blok_diagram2'),
            "penjelasan_flowchart" =>  $request->get('penjelasan_flowchart'),
            "komponen" =>  $request->get('komponen')
        ]);
        
        if ($proposalpkm) {
            return response()->json(['data' => $proposalpkm]);
        }else{
            return response()->json(['error'=>'Failed to Save.']);
        }
    }

    public function ListReviewProposal($revisike){
        $listproposalpkm = DB::table('mahasiswa')
        ->leftJoin('proposal_manpro', 'proposal_manpro.nim_ketua', '=', 'mahasiswa.NIM')
        ->get();
        return view('ProposalPkm.ListProposalPkm',compact('listproposalpkm','revisike'));
    }

    public function getproposalPkmDetail($revisike,$nim){
        $proposalpkm = \App\proposalpkm::where('nim_ketua','=', $nim)
        ->where('revisike','=',$revisike)
        ->first();
        return response()->json(['data' => $proposalpkm]);
    }

    public function ReviewProposal($revisike,$nim){
        $tablepustaka2="<table border='1'> <thead> <th>Metoda yang digunakan dalam daftar pustaka</th> <th>Keunggulan</th> <th>Kelemahan</th> </thead> <tbody> <tr> <td>Metoda 1 (nama, tahun)</td><td></td><td></td> </tr> <tr> <td>Metoda 2 (nama, tahun)</td><td></td><td></td> </tr> <tr> <td>Metoda 3 (nama, tahun)</td><td></td><td></td> </tr> <tr> <td>Metoda 4 (nama, tahun)</td><td></td><td></td> </tr> <tr> <td>Metoda 5 (nama, tahun)</td><td></td><td></td> </tr> <tr> <td>Metoda 6 (nama, tahun)</td><td></td><td></td> </tr> <tr> <td>Metoda 7 (nama, tahun)</td><td></td><td></td> </tr> <tr> <td>Metoda 8 (nama, tahun)</td><td></td><td></td> </tr> <tr> <td>Metoda 9 (nama, tahun)</td><td></td><td></td> </tr> <tr> <td>Metoda 10 (nama, tahun)</td><td></td><td></td> </tr> <tr> <td>Metoda yang diusulkan</td><td></td><td></td> </tr> </tbody> </table>";
        $tablebiaya="<b>4.1 Anggaran Biaya</b><br> Penggunaan anggaran yang dibutuhkan untuk kegiatan ini adalah sebesar Rp x.xxx.xxx,- </p> <center>Tabel 4.1.1 Format Ringkasan Anggaran Biaya Kegiatan</center> <table border='1' cellspacing='0' cellpadding='0'> <thead> <tr> <td>No.</td> <td>Jenis Pengeluaran</td> <td>Biaya (Rp)</td> </tr> </thead> <tbody> </tbody> <tr> <td style='text-align:center'>1</td> <td>Peralatan penunjang</td> <td>x.xxx.xxx</td> </tr> <tr> <td style='text-align:center'>2</td> <td>Bahan habis pakai <br> (Komponen utama dan pengujian)</td> <td>x.xxx.xxx</td> </tr> <tr> <td style='text-align:center'>3</td> <td>Biaya perjalanan</td> <td>x.xxx.xxx</td> </tr> <tr> <td style='text-align:center'>4</td> <td>Lain-lain</td> <td>x.xxx.xxx</td> </tr> <tr> <td colspan='2' style='text-align:center'>Jumlah</td> <td>x.xxx.xxx</td> </tr> </tbody> </table>";
        $tablejadwal="<b>4.2 Jadwal Kegiatan</b> <br> Tabel 4.2.1 Jadwal Kegiatan PKM-xxx </p> <table border='1' cellspacing='0' cellpadding='0'> <thead> <tr> <td rowspan='3'>No. </td> <td rowspan='3'>Kegiatan</td> <td colspan='20'>Bulan</td> </tr> <tr> <td colspan='4'>Bulan Ke-1</td> <td colspan='4'>Bulan Ke-2</td> <td colspan='4'>Bulan Ke-3</td> <td colspan='4'>Bulan Ke-4</td> <td colspan='4'>Bulan Ke-5</td> </tr> <tr> <td style='text-align:center'>1</td> <td style='text-align:center'>2</td> <td style='text-align:center'>3</td> <td style='text-align:center'>4</td> <td style='text-align:center'>1</td> <td style='text-align:center'>2</td> <td style='text-align:center'>3</td> <td style='text-align:center'>4</td> <td style='text-align:center'>1</td> <td style='text-align:center'>2</td> <td style='text-align:center'>3</td> <td style='text-align:center'>4</td> <td style='text-align:center'>1</td> <td style='text-align:center'>2</td> <td style='text-align:center'>3</td> <td style='text-align:center'>4</td> <td style='text-align:center'>1</td> <td style='text-align:center'>2</td> <td style='text-align:center'>3</td> <td style='text-align:center'>4</td> </tr> </thead> <tbody> <tr> <td style='text-align:center'>1</td> <td>Koleksi data awal</td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> </tr> <tr> <td style='text-align:center'>2</td> <td>Mendesain alat (Menyusun desain teknis)</td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> </tr> <tr> <td style='text-align:center'>4</td> <td>Membuat alat (Proses realisasi alat)</td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> </tr> <tr> <td style='text-align:center'>5</td> <td>Uji keandalan alat</td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> </tr> <tr> <td style='text-align:center'>6</td> <td>Menganalisis data</td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> </tr> <tr> <td style='text-align:center'>7</td> <td>Evaluasi kinerja alat</td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> </tr> </tbody> </table>";
        $tableanggaran="<table border='1'> <tr> <td style='font-weight:bold'>1. Jenis Perlengkapan</td> <td>Volume</td> <td>Harga Satuan (Rp)</td> <td>Nilai (Rp)</td> </tr> <tr> <td></td><td></td><td></td><td></td> </tr> <tr> <td></td><td></td><td></td><td></td> </tr> <tr> <td colspan='3' style='text-align:right'>SUB TOTAL (Rp)</td><td></td> </tr> <tr> <td style='text-align:left'>2. Bahan Habis</td> <td>Volume</td> <td>Harga Satuan (Rp)</td> <td>Nilai (Rp)</td> </tr> <tr> <td></td><td></td><td></td><td></td> </tr> <tr> <td></td><td></td><td></td><td></td> </tr> <tr> <td colspan='3' style='text-align:right'>SUB TOTAL (Rp)</td><td></td> </tr> <tr> <td style='text-align:left'>3. Perjalanan</td> <td>Volume</td> <td>Harga Satuan (Rp)</td> <td>Nilai (Rp)</td> </tr> <tr> <td></td><td></td><td></td><td></td> </tr> <tr> <td></td><td></td><td></td><td></td> </tr> <tr> <td colspan='3' style='text-align:right'>SUB TOTAL (Rp)</td><td></td> </tr> <tr> <td style='text-align:left'>4. Lain - lain</td> <td>Volume</td> <td>Harga Satuan (Rp)</td> <td>Nilai (Rp)</td> </tr> <tr> <td></td><td></td><td></td><td></td> </tr> <tr> <td></td><td></td><td></td><td></td> </tr> <tr> <td colspan='3' style='text-align:right'>SUB TOTAL (Rp)</td><td></td> </tr> <tr> <td colspan='3' style='text-align:right'>TOTAL 1+2+3+4 (Rp)</td><td></td> </tr> <tr> <td colspan='4'>(Terbilang)</td> </tr> </table>";
        $tableorganisasi="<table border='1'> <thead> <th>No</th> <th>NIM / Nama</th> <th>Program Studi</th> <th>Bidang Ilmu</th> <th>Alokasi Waktu(jam/minggu)</th><th>Uraian Tugas</th> </thead> <tbody> <tr> <td>1</td><td></td><td></td><td></td><td></td><td></td> </tr> <tr> <td>2</td><td></td><td></td><td></td><td></td><td></td> </tr> <tr> <td>3</td><td></td><td></td><td></td><td></td><td></td> </tr> </tbody> </table>";

        $data = \App\proposalpkm::where('nim_ketua', '=', $nim)
            ->where('revisike','=',$revisike)
            ->first();
        $pembimbing1 = \App\Dosen::where('kode_dosen', '=', $data->pembimbing_1)->first();
        $pembimbing2 = \App\Dosen::where('kode_dosen', '=', $data->pembimbing_2)->first();

        //$dataproposal = \App\indikatornilaimanpro::where('kategori','=','dataproposal')->get();
        //return $dataproposal;
        
        $bidang = \App\bidang::find( $data->bidang)->first();
        return view('ProposalPkm.ReviewProposalPkm',compact('data','revisike','nim','tablepustaka2',
        'tablebiaya','tablejadwal','tableanggaran','tableorganisasi','bidang','pembimbing1','pembimbing2'));
    }

    public function storeReviewDataproposal(Request $request){
        $dataproposal = \App\indikatornilaimanpro::where('kategori','=',$request->get('kategori'))->get();
        foreach($dataproposal as $value){
            $nilai = "nilai_".$value->indikator;
            $rev = "rev_".$value->indikator;

            $nilai_rev = \App\nilaiRevisiPkm::updateOrCreate([
                "nim"   => $request->get('nim'),
                "revisike"    => $request->get('revisike'),
                "indikator" => $value->indikator,
            ], [
                "nilai" =>  $request->get($nilai),
                "revisi" =>  $request->get($rev),
            ]);
        }
        return response()->json(['data' => 'ok']);
    }

    public function kategoriReview(){
        $kategori = \App\indikatornilaimanpro::all();
        return response()->json(['data' => $kategori]);
    }

    public function proposalPKMData(Request $request, $nim,$revisike){
        
        $dataproposal = \App\proposalpkm::where('nim_ketua', '=', $request->nim)
                ->where('revisike','=',$request->revisike)
                ->first();
        
        return response()->json(['data' => $dataproposal]);
    }

    public function getDataReview(Request $request, $nim,$revisike,$indikator){
        //return  $nim." ".$revisike." ".$indikator;
        $datareview = \App\nilaiRevisiPkm::where('nim','=',$request->nim)
        ->where('revisike','=',$request->revisike)
        ->where('indikator','=',$request->indikator)
        ->first();
        return response()->json(['data' => $datareview]);
    }


}
