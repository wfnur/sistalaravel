<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use \App\proposal_ta;
use \App\Dosen;
use \App\bidang;

class proposal_taController extends Controller
{

    public function createR0(){
        $cekdata = proposal_ta::where('nim', '=', Auth::user()->username)
            ->where('revisike','=','0')
            ->get();

        if ($cekdata->isEmpty()) {
            $pembimbing1 = Dosen::where('status','=','0')->get();
            $pembimbing2 = Dosen::where('status','=','1')->get();
            $bidang = bidang::all();
            return view('ProposalTA.createR0',compact('pembimbing1','pembimbing2','bidang'));
        } else {
            $pembimbing1 = Dosen::where('status','=','0')->get();
            $pembimbing2 = Dosen::where('status','=','1')->get();
            $bidang = bidang::all();

            // GET Data
            $proposal_ta = proposal_ta::where('nim','=',Auth::user()->username)
                ->where('revisike','=','0')
                ->first();

            // Get tinjauan pustaka
            $tinpus1 = array("","","","","","","","","","");
            if ($proposal_ta->tinjauan_pustaka_1 != "") {
                $tinpus1 = explode('&&&', $proposal_ta->tinjauan_pustaka_1);
            }

            //Get Metode
            $metode = array("","","","","","");
            if ($proposal_ta->metode_pelaksanaan != "") {
                $metode = explode('&&&', $proposal_ta->metode_pelaksanaan);
            }

            //Get Pendahuluan
            $pendahuluan = array("","","","","","","");
            if ($proposal_ta->pendahuluan != "") {
                $pendahuluan = explode('&&&', $proposal_ta->pendahuluan);
            }

            $daftar_pustaka = array( 
                $proposal_ta->pustaka_1, 
                $proposal_ta->pustaka_2, 
                $proposal_ta->pustaka_3, 
                $proposal_ta->pustaka_4,
                $proposal_ta->pustaka_5,
                $proposal_ta->pustaka_6,
                $proposal_ta->pustaka_7,
                $proposal_ta->pustaka_8,
                $proposal_ta->pustaka_9,
                $proposal_ta->pustaka_10
            );

            return view('ProposalTA.editR0',compact(
                'proposal_ta',
                'pembimbing1',
                'pembimbing2',
                'bidang',
                'proposal_ta',
                'tinpus1',
                'pendahuluan',
                'metode',
                'daftar_pustaka')
            );
        }        
    }

    public function createR1(){
        $pembimbing1 = \App\Dosen::where('status','=','0')->get();
        $pembimbing2 = \App\Dosen::where('status','=','1')->get();
        $bidang = \App\Bidang::all();
        return view('ProposalTA.createR1',compact('pembimbing1','pembimbing2','bidang'));
    }

    public function storefinalisasi(Request $request){
        $proposal_ta = proposal_ta::where('nim','=',Auth::user()->username)
            ->where('revisike','=',$request->revisike)
            ->update([$request->nama_field => 1 ]);
        
        if ($proposal_ta) {
            return redirect()->back()->with('sukses','Berhasil Difinalisasi');
        }else{
            return redirect()->back()->with('gagal','Gagal Difinalisasi');
        }
        
    }

    public function storeDataProposal(Request $request){
        $proposal_ta = \App\proposal_ta::updateOrCreate([
            //Add unique field combo to match here
            //For example, perhaps you only want one entry per user:
            'nim'   => Auth::user()->username,
            'revisike' => $request->get('revisike'),
        ],[
            'judul_ta'      => $request->get('judul_ta'),
            'bidang'        => $request->get('bidang'),
            'pembimbing_1'  => $request->get("pembimbing_1"),
            'pembimbing_2'  => $request->get('pembimbing_2')
        ]);
        
        if ($proposal_ta) {
            return redirect()->back()->with('sukses','Data Proposal Berhasil Diubah/Disimpan');
        }else{
            return redirect()->back()->with('gagal','Data Proposal Gagal Diubah/Disimpan');
        }
    }

    public function storeAbstrak(Request $request){
        $proposal_ta = \App\proposal_ta::updateOrCreate([
            //Add unique field combo to match here
            //For example, perhaps you only want one entry per user:
            'nim'   => Auth::user()->username,
            'revisike' => $request->get('revisike'),
        ],[
            'abstrak_ind'  => $request->get('abstrak_ind'),
            'keyword_ind'  => $request->get('keyword_ind'),
            'abstrak_eng'  => $request->get("abstrak_eng"),
            'keyword_eng'  => $request->get('keyword_eng')
        ]);
        
        if ($proposal_ta) {
            return redirect()->back()->with('sukses','Abstrak Berhasil Diubah/Disimpan');
        }else{
            return redirect()->back()->with('gagal','Abstrak Gagal Diubah/Disimpan');
        }
    }

    public function storePendahuluan(Request $request){
        $pendahuluan = implode($request->pendahuluan, '&&&');
        
        $proposal_ta = \App\proposal_ta::updateOrCreate([
            //Add unique field combo to match here
            //For example, perhaps you only want one entry per user:
            'nim'   => Auth::user()->username,
            'revisike' => $request->get('revisike'),
        ],[
            'pendahuluan'  => $pendahuluan
        ]);
        //dd($proposal_ta);
        if ($proposal_ta) {
            return redirect()->back()->with('sukses','Pendahuluan Berhasil Diubah/Disimpan');
        }else{
            return redirect()->back()->with('gagal','Pendahuluan Gagal Diubah/Disimpan');
        }
    }

    public function storeTinjauanPustaka(Request $request){
        $tinpus1 = implode($request->tinjauan_pustaka, '&&&');
        
        $proposal_ta = \App\proposal_ta::updateOrCreate([
            //Add unique field combo to match here
            //For example, perhaps you only want one entry per user:
            'nim'   => Auth::user()->username,
            'revisike' => $request->get('revisike'),
        ],[
            'tinjauan_pustaka_1'    => $tinpus1,
            'tinjauan_pustaka_2'    => $request->pustaka_2
        ]);
        //dd($proposal_ta);
        if ($proposal_ta) {
            return redirect()->back()->with('sukses','Pendahuluan Berhasil Diubah/Disimpan');
        }else{
            return redirect()->back()->with('gagal','Pendahuluan Gagal Diubah/Disimpan');
        }
    }

    public function storeMetodePelaksanaan(Request $request){
        $metode = implode($request->metode_pelaksanaan, '&&&');
        
        $proposal_ta = \App\proposal_ta::updateOrCreate([
            //Add unique field combo to match here
            //For example, perhaps you only want one entry per user:
            'nim'   => Auth::user()->username,
            'revisike' => $request->get('revisike'),
        ],[
            'metode_pelaksanaan'    => $metode
        ]);
        //dd($proposal_ta);
        if ($proposal_ta) {
            return redirect()->back()->with('sukses','Pendahuluan Berhasil Diubah/Disimpan');
        }else{
            return redirect()->back()->with('gagal','Pendahuluan Gagal Diubah/Disimpan');
        }
    }

    public function storeBiayaJadwal(Request $request){
        
        $proposal_ta = \App\proposal_ta::updateOrCreate([
            //Add unique field combo to match here
            //For example, perhaps you only want one entry per user:
            'nim'   => Auth::user()->username,
            'revisike' => $request->get('revisike'),
        ],[
            'biaya'    => $request->biaya,
            'jadwal_kegiatan'    => $request->jadwal_kegiatan,
        ]);
        if ($proposal_ta) {
            return redirect()->back()->with('sukses','Pendahuluan Berhasil Diubah/Disimpan');
        }else{
            return redirect()->back()->with('gagal','Pendahuluan Gagal Diubah/Disimpan');
        }
    }

    public function storeDaftarPustaka(Request $request){
        
        $proposal_ta = \App\proposal_ta::updateOrCreate([
            //Add unique field combo to match here
            //For example, perhaps you only want one entry per user:
            'nim'   => Auth::user()->username,
            'revisike' => $request->get('revisike'),
        ],[
            'pustaka_1'    => $request->dapus_1,
            'pustaka_2'    => $request->dapus_2,
            'pustaka_3'    => $request->dapus_3,
            'pustaka_4'    => $request->dapus_4,
            'pustaka_5'    => $request->dapus_5,
            'pustaka_6'    => $request->dapus_6,
            'pustaka_7'    => $request->dapus_7,
            'pustaka_8'    => $request->dapus_8,
            'pustaka_9'    => $request->dapus_9,
            'pustaka_10'   => $request->dapus_10
        ]);
        if ($proposal_ta) {
            return redirect()->back()->with('sukses','Pendahuluan Berhasil Diubah/Disimpan');
        }else{
            return redirect()->back()->with('gagal','Pendahuluan Gagal Diubah/Disimpan');
        }
    }

    public function storeJustifikasiAnggaran(Request $request){
        
        $proposal_ta = \App\proposal_ta::updateOrCreate([
            'nim'   => Auth::user()->username,
            'revisike' => $request->get('revisike'),
        ],[
            'justifikasi_anggaran'    => $request->justifikasi_anggaran,
            
        ]);
        if ($proposal_ta) {
            return redirect()->back()->with('sukses','Pendahuluan Berhasil Diubah/Disimpan');
        }else{
            return redirect()->back()->with('gagal','Pendahuluan Gagal Diubah/Disimpan');
        }
    }

    public function storeUploadFile(Request $request){
        
        if ($request->hasFile('pengesahan')) {
            $imgName = generateNamaPengesahan(Auth::user()->username,$request->file('pengesahan')->getClientOriginalExtension());
            $request->file('pengesahan')->move('public/Lembar_Pengesahan/',$imgName);

            $proposal_ta = proposal_ta::updateOrCreate([
                'nim'   => Auth::user()->username,
                'revisike' => $request->get('revisike'),
            ],[
                'pengesahan' => $imgName,
                
            ]);
            if(!$proposal_ta){
                return redirect()->back()->with('gagal','Gagal Upload Diubah/Disimpan');
            }
        }

        if ($request->hasFile('biodata')) {
            $imgName = generateNamaBiodata(Auth::user()->username,$request->file('biodata')->getClientOriginalExtension());
            $request->file('biodata')->move('public/Biodata_Mahasiswa/',$imgName);

            $proposal_ta = proposal_ta::updateOrCreate([
                'nim'   => Auth::user()->username,
                'revisike' => $request->get('revisike'),
            ],[
                'biodata' => $imgName,
                
            ]);
            if(!$proposal_ta){
                return redirect()->back()->with('gagal','Gagal Upload Diubah/Disimpan');
            }
        }

        if ($request->hasFile('biodata_pembimbing')) {
            $imgName = generateNamaBiodata_Pembimbing(Auth::user()->username,$request->file('biodata_pembimbing')->getClientOriginalExtension());
            $request->file('biodata_pembimbing')->move('public/Biodata_Pembimbing/',$imgName);

            $proposal_ta = proposal_ta::updateOrCreate([
                'nim'   => Auth::user()->username,
                'revisike' => $request->get('revisike'),
            ],[
                'biodata_pembimbing' => $imgName,
                
            ]);
            if(!$proposal_ta){
                return redirect()->back()->with('gagal','Gagal Upload Diubah/Disimpan');
            }
        }

        if ($proposal_ta) {
            return redirect()->back()->with('sukses','Upload File Berhasil Diubah/Disimpan');
        }else{
            return redirect()->back()->with('gagal','Upload File Gagal Diubah/Disimpan');
        }
    }

    public function storeGambaranTeknologi(Request $request){
        
        $proposal_ta = proposal_ta::updateOrCreate([
            //Add unique field combo to match here
            //For example, perhaps you only want one entry per user:
            'nim'   => Auth::user()->username,
            'revisike' => $request->get('revisike'),
        ],[
            'penjelasan_ilustrasi'      => $request->penjelasan_ilustrasi,
            'spek_teknis'               => $request->spek_teknis,
            'penjelasan_blok_diagram'   => $request->penjelasan_blok_diagram,
            'penjelasan_blok_diagram2'  => $request->penjelasan_blok_diagram2,
            'penjelasan_flowchart'      => $request->penjelasan_flowchart,
            'komponen'                  => $request->komponen_utama
        ]);

        if ($request->hasFile('gambar_ilustrasi')) {
            $imgName = generateNamaGambarIlustrasi(Auth::user()->username,$request->file('gambar_ilustrasi')->getClientOriginalExtension());
            $request->file('gambar_ilustrasi')->move('public/Gambar_Ilustrasi/',$imgName);

            $proposal_ta = proposal_ta::updateOrCreate([
                'nim'   => Auth::user()->username,
                'revisike' => $request->get('revisike'),
            ],[
                'gambar_ilustrasi' => $imgName,
                
            ]);
            if(!$proposal_ta){
                return redirect()->back()->with('gagal','Gagal Upload Diubah/Disimpan');
            }
        }

        if ($request->hasFile('blok_diagram')) {
            $imgName = generateNamaBlokDiagram(Auth::user()->username,$request->file('blok_diagram')->getClientOriginalExtension());
            $request->file('blok_diagram')->move('public/Blok_Diagram/',$imgName);

            $proposal_ta = proposal_ta::updateOrCreate([
                'nim'   => Auth::user()->username,
                'revisike' => $request->get('revisike'),
            ],[
                'gambar_blok_diagram' => $imgName,
                
            ]);
            if(!$proposal_ta){
                return redirect()->back()->with('gagal','Gagal Upload Diubah/Disimpan');
            }
        }

        if ($request->hasFile('blok_diagram2')) {
            $imgName = generateNamaBlokDiagram2(Auth::user()->username,$request->file('blok_diagram2')->getClientOriginalExtension());
            $request->file('blok_diagram2')->move('public/Blok_Diagram/',$imgName);

            $proposal_ta = proposal_ta::updateOrCreate([
                'nim'   => Auth::user()->username,
                'revisike' => $request->get('revisike'),
            ],[
                'gambar_blok_diagram2' => $imgName,
                
            ]);
            if(!$proposal_ta){
                return redirect()->back()->with('gagal','Gagal Upload Diubah/Disimpan');
            }
        }

        if ($request->hasFile('gambar_flowchart')) {
            $imgName = generateNamaFlowchart(Auth::user()->username,$request->file('gambar_flowchart')->getClientOriginalExtension());
            $request->file('gambar_flowchart')->move('public/Flowchart/',$imgName);

            $proposal_ta = proposal_ta::updateOrCreate([
                'nim'   => Auth::user()->username,
                'revisike' => $request->get('revisike'),
            ],[
                'gambar_flowchart' => $imgName,
                
            ]);
            if(!$proposal_ta){
                return redirect()->back()->with('gagal','Gagal Upload Diubah/Disimpan');
            }
        }

        if ($proposal_ta) {
            return redirect()->back()->with('sukses','Gambaran Teknologi Berhasil Diubah/Disimpan');
        }else{
            return redirect()->back()->with('gagal','Gambaran Teknologi Gagal Diubah/Disimpan');
        }
    }
}
