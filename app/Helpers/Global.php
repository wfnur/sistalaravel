<?php

use App\proposal_ta;
use \App\Mahasiswa;
use \App\mingguBimbingan;
use \App\bimbingan;
use \App\nilaiLaporan;
use \App\revisiLaporan;
//use Auth;



function cekStatusFinalisasi_dataProposal($reviske){
    $proposal_ta = proposal_ta::where('nim', '=',auth()->user()->username)
        ->where('revisike','=',$reviske)
        ->first();

    $judul = $proposal_ta->judul_ta;
    $bidang = $proposal_ta->bidang;
    $p1 = $proposal_ta->pembimbing_1;
    $p2 = $proposal_ta->pembimbing_2;

    if ($judul != "" || $bidang != "" || $p1 != "" || $p2 != "") {
        if ($proposal_ta->status_dataProposal == "1") {
            $button = "<span class='btn btn-lg btn-danger' >Sudah difinalisasi</span>";
        }else{
            $button = "
            <p>
            Dengan menekan tombol dibawah ini, saya sudah yakin dengan data-data diatas dan siap untuk dinilai dan dikomentari
            oleh reviewer.
            <span style='color:red'> Setelah menekan tombol dibawah ini, data-data diatas sudah tidak bisa diubah kembali, jadi pastikan data tersebut
            SUDAH DIISI DAN DISIMPAN (dengan menekan tombol simpan sebagai draft) TERLEBIH DAHULU !!!</span>
            </p>
            <button class='btn btn-lg btn-success col-md-12'> Finalisasi</button>";
        }
    }else{}

    return $button;
}

function cekStatusFinalisasi_abstrak($reviske){
    
    $proposal_ta = proposal_ta::where('nim', '=',auth()->user()->username)
        ->where('revisike','=',$reviske)
        ->first();

    $abstrak_ind    = $proposal_ta->abstrak_ind;
    $abstrak_eng    = $proposal_ta->abstrak_eng;
    $keyword_ind    = $proposal_ta->keyword_ind;
    $keyword_eng    = $proposal_ta->keyword_eng;

    if ($abstrak_ind != "" || $abstrak_eng != "" || $keyword_ind != "" || $keyword_eng != "") {
        if ($proposal_ta->status_abstrak == "1") {
            $button_abstrak = "<span class='btn btn-lg btn-danger' >Sudah difinalisasi</span>";
        }else{
            $button_abstrak = "
            <p>
            Dengan menekan tombol dibawah ini, saya sudah yakin dengan data-data diatas dan siap untuk dinilai dan dikomentari
            oleh reviewer.
            <span style='color:red'> Setelah menekan tombol dibawah ini, data-data diatas sudah tidak bisa diubah kembali, jadi pastikan data tersebut
            SUDAH DIISI DAN DISIMPAN (dengan menekan tombol simpan sebagai draft) TERLEBIH DAHULU !!!</span>
            </p>
            <button class='btn btn-lg btn-success col-md-12'> Finalisasi</button>";
        }
    }else{
        $button_abstrak = "";
    }

    return $button_abstrak;
}

function cekStatusFinalisasi_pendahuluan($reviske){
    
    $proposal_ta = proposal_ta::where('nim', '=',auth()->user()->username)
        ->where('revisike','=',$reviske)
        ->first();

    $pend   = $proposal_ta->pendahuluan;

    if ($pend != "") {
        if ($proposal_ta->status_pendahuluan == "1") {
            $button = "<span class='btn btn-lg btn-danger' >Sudah difinalisasi</span>";
        }else{
            $button = "
            <p>
            Dengan menekan tombol dibawah ini, saya sudah yakin dengan data-data diatas dan siap untuk dinilai dan dikomentari
            oleh reviewer.
            <span style='color:red'> Setelah menekan tombol dibawah ini, data-data diatas sudah tidak bisa diubah kembali, jadi pastikan data tersebut
            SUDAH DIISI DAN DISIMPAN (dengan menekan tombol simpan sebagai draft) TERLEBIH DAHULU !!!</span>
            </p>
            <button class='btn btn-lg btn-success col-md-12'> Finalisasi</button>";
        }
    }else{
        $button = "";
    }

    return $button;
}

function cekStatusFinalisasi_tinpus($reviske){
    
    $proposal_ta = proposal_ta::where('nim', '=',auth()->user()->username)
        ->where('revisike','=',$reviske)
        ->first();

    $tinpus1   = $proposal_ta->tinjauan_pustaka_1;
    $tinpus2   = $proposal_ta->tinjauan_pustaka_2;

    if ($tinpus1 != "" || $tinpus2 != "") {
        if ($proposal_ta->status_tinpus == "1") {
            $button = "<span class='btn btn-lg btn-danger' >Sudah difinalisasi</span>";
        }else{
            $button = "
            <p>
            Dengan menekan tombol dibawah ini, saya sudah yakin dengan data-data diatas dan siap untuk dinilai dan dikomentari
            oleh reviewer.
            <span style='color:red'> Setelah menekan tombol dibawah ini, data-data diatas sudah tidak bisa diubah kembali, jadi pastikan data tersebut
            SUDAH DIISI DAN DISIMPAN (dengan menekan tombol simpan sebagai draft) TERLEBIH DAHULU !!!</span>
            </p>
            <button class='btn btn-lg btn-success col-md-12'> Finalisasi</button>";
        }
    }else{
        $button = "";
    }

    return $button;
}

function cekStatusFinalisasi_metode($reviske){
    
    $proposal_ta = proposal_ta::where('nim', '=',auth()->user()->username)
        ->where('revisike','=',$reviske)
        ->first();

    $metode   = $proposal_ta->metode_pelaksanaan;

    if ($metode != "" ) {
        if ($proposal_ta->status_metode == "1") {
            $button = "<span class='btn btn-lg btn-danger' >Sudah difinalisasi</span>";
        }else{
            $button = "
            <p>
            Dengan menekan tombol dibawah ini, saya sudah yakin dengan data-data diatas dan siap untuk dinilai dan dikomentari
            oleh reviewer.
            <span style='color:red'> Setelah menekan tombol dibawah ini, data-data diatas sudah tidak bisa diubah kembali, jadi pastikan data tersebut
            SUDAH DIISI DAN DISIMPAN (dengan menekan tombol simpan sebagai draft) TERLEBIH DAHULU !!!</span>
            </p>
            <button class='btn btn-lg btn-success col-md-12'> Finalisasi</button>";
        }
    }else{
        $button = "";
    }

    return $button;
}

function cekStatusFinalisasi_biayaJadwal($reviske){
    
    $proposal_ta = proposal_ta::where('nim', '=',auth()->user()->username)
        ->where('revisike','=',$reviske)
        ->first();

    $biaya   = $proposal_ta->biaya;
    $jadwal   = $proposal_ta->jadwal_kegiatan;

    if ($biaya != "" || $jadwal != "" ) {
        if ($proposal_ta->status_biayaJadwal == "1") {
            $button = "<span class='btn btn-lg btn-danger' >Sudah difinalisasi</span>";
        }else{
            $button = "
            <p>
            Dengan menekan tombol dibawah ini, saya sudah yakin dengan data-data diatas dan siap untuk dinilai dan dikomentari
            oleh reviewer.
            <span style='color:red'> Setelah menekan tombol dibawah ini, data-data diatas sudah tidak bisa diubah kembali, jadi pastikan data tersebut
            SUDAH DIISI DAN DISIMPAN (dengan menekan tombol simpan sebagai draft) TERLEBIH DAHULU !!!</span>
            </p>
            <button class='btn btn-lg btn-success col-md-12'> Finalisasi</button>";
        }
    }else{
        $button = "";
    }

    return $button;
}

function cekStatusFinalisasi_dapus($reviske){
    
    $proposal_ta = proposal_ta::where('nim', '=',auth()->user()->username)
        ->where('revisike','=',$reviske)
        ->first();

    $dapus1   = $proposal_ta->pustaka_1;
    $dapus2   = $proposal_ta->pustaka_2;
    $dapus3   = $proposal_ta->pustaka_3;
    $dapus4   = $proposal_ta->pustaka_4;
    $dapus5   = $proposal_ta->pustaka_5;
    $dapus6   = $proposal_ta->pustaka_6;
    $dapus7   = $proposal_ta->pustaka_7;
    $dapus8   = $proposal_ta->pustaka_8;
    $dapus9   = $proposal_ta->pustaka_9;
    $dapus10  = $proposal_ta->pustaka_10;

    if ($dapus1 != "" || $dapus2 != "" || $dapus3 != "" || $dapus4 != "" || $dapus5 != "" || $dapus6 != "" || $dapus7 != "" || $dapus8 != "" || $dapus9 != "" || $dapus10 != "" ) {
        if ($proposal_ta->status_dapus == "1") {
            $button = "<span class='btn btn-lg btn-danger' >Sudah difinalisasi</span>";
        }else{
            $button = "
            <p>
            Dengan menekan tombol dibawah ini, saya sudah yakin dengan data-data diatas dan siap untuk dinilai dan dikomentari
            oleh reviewer.
            <span style='color:red'> Setelah menekan tombol dibawah ini, data-data diatas sudah tidak bisa diubah kembali, jadi pastikan data tersebut
            SUDAH DIISI DAN DISIMPAN (dengan menekan tombol simpan sebagai draft) TERLEBIH DAHULU !!!</span>
            </p>
            <button class='btn btn-lg btn-success col-md-12'> Finalisasi</button>";
        }
    }else{
        $button = "";
    }

    return $button;
}

function cekStatusFinalisasi_justifikasi($reviske){
    
    $proposal_ta = proposal_ta::where('nim', '=',auth()->user()->username)
        ->where('revisike','=',$reviske)
        ->first();

    if ($proposal_ta->justifikasi_anggaran != "" ) {
        if ($proposal_ta->status_justifikasi == "1") {
            $button = "<span class='btn btn-lg btn-danger' >Sudah difinalisasi</span>";
        }else{
            $button = "
            <p>
            Dengan menekan tombol dibawah ini, saya sudah yakin dengan data-data diatas dan siap untuk dinilai dan dikomentari
            oleh reviewer.
            <span style='color:red'> Setelah menekan tombol dibawah ini, data-data diatas sudah tidak bisa diubah kembali, jadi pastikan data tersebut
            SUDAH DIISI DAN DISIMPAN (dengan menekan tombol simpan sebagai draft) TERLEBIH DAHULU !!!</span>
            </p>
            <button class='btn btn-lg btn-success col-md-12'> Finalisasi</button>";
        }
    }else{
        $button = "";
    }

    return $button;
}

function cekStatusFinalisasi_uploadFile($reviske){
    
    $proposal_ta = proposal_ta::where('nim', '=',auth()->user()->username)
        ->where('revisike','=',$reviske)
        ->first();
    $pengesahan = $proposal_ta->pengesahan;
    $biodata = $proposal_ta->biodata;
    $biodata_pembimbing = $proposal_ta->biodata_pembimbing;

    if ( $pengesahan != "" || $biodata != "" || $biodata_pembimbing != "" ) {
        if ($proposal_ta->status_uploadFile == "1") {
            $button = "<span class='btn btn-lg btn-danger' >Sudah difinalisasi</span>";
        }else{
            $button = "
            <p>
            Dengan menekan tombol dibawah ini, saya sudah yakin dengan data-data diatas dan siap untuk dinilai dan dikomentari
            oleh reviewer.
            <span style='color:red'> Setelah menekan tombol dibawah ini, data-data diatas sudah tidak bisa diubah kembali, jadi pastikan data tersebut
            SUDAH DIISI DAN DISIMPAN (dengan menekan tombol simpan sebagai draft) TERLEBIH DAHULU !!!</span>
            </p>
            <button class='btn btn-lg btn-success col-md-12'> Finalisasi</button>";
        }
    }else{
        $button = "";
    }

    return $button;
}

function cekStatusFinalisasi_gambaranTeknologi($reviske){
    
    $proposal_ta = proposal_ta::where('nim', '=',auth()->user()->username)
        ->where('revisike','=',$reviske)
        ->first();
    $gambar_ilustrasi = $proposal_ta->gambar_ilustrasi;
    $penjelasan_ilustrasi = $proposal_ta->penjelasan_ilustrasi;
    $spek_teknis = $proposal_ta->spek_teknis;
    $gambar_blok_diagram = $proposal_ta->gambar_blok_diagram;
    $penjelasan_blok_diagram = $proposal_ta->penjelasan_blok_diagram;
    $gambar_blok_diagram2 = $proposal_ta->gambar_blok_diagram2;
    $penjelasan_blok_diagram2 = $proposal_ta->penjelasan_blok_diagram2;
    $gambar_flowchart = $proposal_ta->gambar_flowchart;
    $penjelasan_flowchart = $proposal_ta->penjelasan_flowchart;
    $komponen = $proposal_ta->komponen;


    if ( $gambar_ilustrasi != "" || $penjelasan_ilustrasi != "" || $spek_teknis != "" || $gambar_blok_diagram != "" || $penjelasan_blok_diagram != "" || $gambar_blok_diagram2 != "" || $penjelasan_blok_diagram2 != "" || $gambar_flowchart != "" || $penjelasan_flowchart != "" || $komponen != "" ) {
        if ($proposal_ta->status_gambaranTeknologi == "1") {
            $button = "<span class='btn btn-lg btn-danger' >Sudah difinalisasi</span>";
        }else{
            $button = "
            <p>
            Dengan menekan tombol dibawah ini, saya sudah yakin dengan data-data diatas dan siap untuk dinilai dan dikomentari
            oleh reviewer.
            <span style='color:red'> Setelah menekan tombol dibawah ini, data-data diatas sudah tidak bisa diubah kembali, jadi pastikan data tersebut
            SUDAH DIISI DAN DISIMPAN (dengan menekan tombol simpan sebagai draft) TERLEBIH DAHULU !!!</span>
            </p>
            <button class='btn btn-lg btn-success col-md-12'> Finalisasi</button>";
        }
    }else{
        $button = "";
    }

    return $button;
}

function generateNamaProposalTA($nim,$ext,$revisike){
    $mahasiswa = Mahasiswa::find($nim);
    $str_name= str_replace(" ","",$mahasiswa->nama);
    $namafile = $nim."_ProposalTA_R".$revisike."_".$str_name."_".$mahasiswa->kelas."_".$mahasiswa->angkatan.".".$ext;

    return $namafile;
}

function getNamakolomBerkas($jenisBerkas){
    switch ($jenisBerkas) {
        case 'LembarPengesahan':
            return "pengesahan";
        break;

        case 'BiodataKetua':
            return "biodata_ketua";
        break;

        case 'BiodataAnggota1':
            return "biodata_anggota1";
        break;

        case 'BiodataAnggota2':
            return "biodata_anggota2";
        break;

        case 'BiodataPembimbing':
            return "biodata_pembimbing";
        break;

        case 'formSuratPernyataan':
            return "surat_pernyataan";
        break;

        case 'gambar_ilustrasi':
            return "gambar_ilustrasi";
        break;

        case 'gambar_blok_diagram':
            return "gambar_blok_diagram";
        break;

        case 'gambar_blok_diagram2':
            return "gambar_blok_diagram2";
        break;

        case 'gambar_flowchart':
            return "gambar_flowchart";
        break;
        
        default:
        
        break;
    }
}

function generateNamaProposalPKM($nim,$ext,$revisike,$jenisBerkas){
    $mahasiswa = Mahasiswa::find($nim);
    $str_name= str_replace(" ","",$mahasiswa->nama);
    $namafile = $nim."_".$jenisBerkas."_R".$revisike."_".$str_name."_".$mahasiswa->kelas."_".$mahasiswa->angkatan.".".$ext;

    return $namafile;
}

function generateNamaLaporanTA($nim,$ext){
    $mahasiswa = Mahasiswa::find($nim);
    $str_name= str_replace(" ","",$mahasiswa->nama);
    $namafile = $nim."_LaporanTA_".$str_name."_".$mahasiswa->kelas."_".$mahasiswa->angkatan.".".$ext;

    return $namafile;
}

function generateNamaAbstrak($nim,$ext){
    $mahasiswa = Mahasiswa::find($nim);
    $str_name= str_replace(" ","",$mahasiswa->nama);
    $namafile = $nim."_Abstrak_".$str_name."_".$mahasiswa->kelas."_".$mahasiswa->angkatan.".".$ext;

    return $namafile;
}

function generateNamaLampiran($nim,$ext){
    $mahasiswa = Mahasiswa::find($nim);
    $str_name= str_replace(" ","",$mahasiswa->nama);
    $namafile = $nim."_Lampiran_".$str_name."_".$mahasiswa->kelas."_".$mahasiswa->angkatan.".".$ext;

    return $namafile;
}

function generateNamaFormPermohonan($nim,$ext){
    $mahasiswa = Mahasiswa::find($nim);
    $str_name= str_replace(" ","",$mahasiswa->nama);
    $namafile = "FormPermohonan_".$nim."_".$str_name."_".$mahasiswa->kelas."_".$mahasiswa->angkatan.".".$ext;

    return $namafile;
}

function generateNamaPengesahan($nim,$ext){
    $mahasiswa = Mahasiswa::find($nim);
    $str_name= str_replace(" ","",$mahasiswa->nama);
    $namafile = "Lembar_Pengesahan_".$nim."_".$str_name."_".$mahasiswa->kelas."_".$mahasiswa->angkatan.".".$ext;

    return $namafile;
}

function generateNamaGambarIlustrasi($nim,$ext){
    $mahasiswa = Mahasiswa::find($nim);
    $str_name= str_replace(" ","",$mahasiswa->nama);
    $namafile = "Gambar_Ilustrasi_".$nim."_".$str_name."_".$mahasiswa->kelas."_".$mahasiswa->angkatan.".".$ext;

    return $namafile;
}

function generateNamaBlokDiagram($nim,$ext){
    $mahasiswa = Mahasiswa::find($nim);
    $str_name= str_replace(" ","",$mahasiswa->nama);
    $namafile = "Blok_Diagram1_".$nim."_".$str_name."_".$mahasiswa->kelas."_".$mahasiswa->angkatan.".".$ext;

    return $namafile;
}

function generateNamaBlokDiagram2($nim,$ext){
    $mahasiswa = Mahasiswa::find($nim);
    $str_name= str_replace(" ","",$mahasiswa->nama);
    $namafile = "Blok_Diagram2_".$nim."_".$str_name."_".$mahasiswa->kelas."_".$mahasiswa->angkatan.".".$ext;

    return $namafile;
}

function generateNamaFlowchart($nim,$ext){
    $mahasiswa = Mahasiswa::find($nim);
    $str_name= str_replace(" ","",$mahasiswa->nama);
    $namafile = "FlowChart_".$nim."_".$str_name."_".$mahasiswa->kelas."_".$mahasiswa->angkatan.".".$ext;

    return $namafile;
}


function generateNamaBiodata_Pembimbing($nim,$ext){
    $mahasiswa = Mahasiswa::find($nim);
    $str_name= str_replace(" ","",$mahasiswa->nama);
    $namafile = "Biodata_Pembimbing".$nim."_".$str_name."_".$mahasiswa->kelas."_".$mahasiswa->angkatan.".".$ext;

    return $namafile;
}

function generateNamaBiodata($nim,$ext){
    $mahasiswa = Mahasiswa::find($nim);
    $str_name= str_replace(" ","",$mahasiswa->nama);
    $namafile = "Biodata_Mahasiswa_".$nim."_".$str_name."_".$mahasiswa->kelas."_".$mahasiswa->angkatan.".".$ext;

    return $namafile;
}

function generateNamaFormBimbingan($nim,$pembimbing,$tanggal,$ext){
    $mahasiswa = Mahasiswa::find($nim);
    $str_name= str_replace(" ","",$mahasiswa->nama);
    $namafile = "Bimbingan_".$nim."_".$str_name."_".$pembimbing."_".$tanggal.".".$ext;
    return $namafile;
}

function fixkelas($angkatan,$kelas){
    $tahun = date("Y")-$angkatan;
    $fixkelas = $tahun.$kelas;
    return $fixkelas;
}

function hitungMinggu($NIM, $kode_minggu,$pembimbing){
    $minggu = Bimbingan::where([
        ['nim', '=', $NIM],
        ['status', '=' , 1],
        ['pembimbing' ,'=', $pembimbing],
        ['mingguBimbingan_id', '=' ,$kode_minggu]
        ])->count();
    return $minggu;
}

function cekNilaiLaporanDosen($nim, $kode_dosen){
    $nilaiLaporan = nilaiLaporan::where('nim','=',$nim)
    ->where('kode_dosen','=',$kode_dosen)
    ->first();

    if(isset($nilaiLaporan)){
        $status = "<i class='fa fa-check-circle-o fa-2x text-success'><i>";
    }else{
        $status = "<i class='fa fa-remove fa-2x text-danger'><i>";
    }
    return $status;
}

function cekNilaiDosen($nim, $kode_dosen){
    $nilaiLaporan = \App\nilaiSidangTA::where('nim','=',$nim)
    ->where('kode_dosen','=',$kode_dosen)
    ->first();

    if(count($nilaiLaporan) > 0){
        $status = "<i class='fa fa-check-circle-o fa-2x text-success'><i>";
    }else{
        $status = "<i class='fa fa-remove fa-2x text-danger'><i>";
    }
    return $status;
}

function cekFinalisasiNilaiLaporanDosen($nim, $kode_dosen){
    $revisiLaporan = revisiLaporan::where('nim','=',$nim)
    ->where('kode_dosen','=',$kode_dosen)
    ->first();

    if(count($revisiLaporan) > 0){
        if($revisiLaporan->status == 1){
            $status = "<button class='btn' id='{{$nim}}'><i class='fa fa-lock fa-2x text-danger'></i></button>";
        }else{
            $status = "<i class='fa fa-unlock fa-2x text-success'></i>";
        }
    }else{
        $status = "<i class='fa fa-unlock fa-2x text-success'></i>";
    }
    return $status;
}

function cekFinalisasiNilaiSidangDosen($nim, $kode_dosen){
    $revisiLaporan = revisiLaporan::where('nim','=',$nim)
    ->where('kode_dosen','=',$kode_dosen)
    ->first();

    if(count($revisiLaporan) > 0){
        if($revisiLaporan->status_nilaiSidang == 1){
            $status = "<button class='btn' id='{{$nim}}'><i class='fa fa-lock fa-2x text-danger'></i></button>";
        }else{
            $status = "<i class='fa fa-unlock fa-2x text-success'></i>";
        }
    }else{
        $status = "<i class='fa fa-unlock fa-2x text-success'></i>";
    }
    return $status;
}

function getNamaDosen($kode_dosen){
    $namaDosen = \App\Dosen::where('kode_dosen','=',$kode_dosen)->first();
    if (isset($namaDosen->nama)) {
        $nama = $namaDosen->nama ;
    }else{
        $nama = "Belum ada Dijadwal";
    }
    return  $nama;
}

function getNilaiLaporan($nim,$kode_dosen,$poinPenilaian){
    $nilai = \App\nilaiLaporan::where('nim','=',$nim)
        ->where('kode_dosen','=',$kode_dosen)
        ->where('poin_penilaian_id','=',$poinPenilaian)
        ->first();

    if (isset($nilai->nilai)) {
        $nilaiLaporan = $nilai->nilai;
    }else{
        $nilaiLaporan = 0;
    }
    

    return $nilaiLaporan;
}


function statistik($array, $output){
    if(!is_array($array)){ 
        return FALSE;    
    }else{
        switch($output){ 
            
            case 'mean':                 
                $count = count($array);                 
                $sum = array_sum($array);               
                $total = $sum / $count; 
            break; 
            
            case 'median':                 
                sort($array);                
                $count = count($array); //total numbers in array
                $middleval = floor(($count-1)/2); // find the middle value, or the lowest middle value
                if($count % 2) { // odd number, middle is the median
                    $total = $array[$middleval];
                } else { // even number, calculate avg of 2 medians
                    $low = $array[$middleval];
                    $high = $array[$middleval+1];
                    $total = (($low+$high)/2);
                }
            break; 
        } 
        return $total; 
    } 
} 

function hitungNilaiPenguji($nim){
    $poinPenilaianSidang = \App\PoinPenilaian::where('ket','=','Penguji')
        ->orderBy('id')
        ->get();

        foreach ($poinPenilaianSidang as $value) {
                //echo $value->poin_penilaian."<br>";
            $nilaiSidangTA = \App\nilaiSidangTA::where('nim','=',$nim)
                ->where('poin_penilaian_id','=',$value->id)
                ->get();

            if($nilaiSidangTA->count() == 0){
                return 0;
            }else{
                foreach ($nilaiSidangTA as $key ) {
                    $Arr_nilai[] = $key->nilai;
                    //echo $key->nim." | ".$key->poin_penilaian_id." | ". $key->nilai ."<br>";
                }
                $mean   = statistik($Arr_nilai,'mean');
                $median = statistik($Arr_nilai,'median');
                //echo "Rata-rata : ".$mean."<br>";
                //echo "Median : ".$median."<br>";

                $toleransi_atas = $median + 1;
                $toleransi_bawah = $median - 1;
                //echo "+1 : ".$toleransi_atas."<br>";
                //echo "-1 : ".$toleransi_bawah."<br>";
                for ($i=0; $i < 3; $i++) { 
                    if($Arr_nilai[$i] == $median || $Arr_nilai[$i] == $toleransi_atas || $Arr_nilai[$i] == $toleransi_bawah){
                        $nilai_baru = $Arr_nilai[$i]; 
                    }else{
                        $nilai_baru = round($mean);
                    }
                    $Arr_nilaiBaru[] = $nilai_baru;
                    //echo "Nilai Baru ".$i." : ".$nilai_baru."<br>";
                }
                //$Arr_nilai_akhir[] = array_sum($Arr_nilaiBaru)/3;
                $nilai_akhir = array_sum($Arr_nilaiBaru)/3;
                $nilaiKaliBobot = $nilai_akhir*$value->bobot;
                $Arr_nilaiKaliBobot[] = $nilai_akhir*$value->bobot;
                //echo "Nilai Total :".$nilai_akhir." x ".$value->bobot." = ".$nilaiKaliBobot."<br>";
                unset($Arr_nilaiBaru);
                unset($Arr_nilai);

                //echo "<br>";
            }
        }// end first loop (poin Penilaian)
        $jumlah_nilai_akhir = array_sum($Arr_nilaiKaliBobot)/10;

        return $jumlah_nilai_akhir;
}

function hitungNilaiPembimbing($nim){
    $poinPenilaianSidang = \App\PoinPenilaian::where('ket','=','Pembimbing')
        ->orderBy('id')
        ->get();

        foreach ($poinPenilaianSidang as $value) {
            //echo $value->poin_penilaian." =>";
            $nilaiSidangTA = \App\nilaiSidangTA::where('nim','=',$nim)
                ->where('poin_penilaian_id','=',$value->id)
                ->get();
            
            if($nilaiSidangTA->count() == 0){
                return 0;
            }else{
                foreach ($nilaiSidangTA as $key ) {
                    $Arr_nilaiKaliBobot_pembimbing[] = $key->nilai * $value->bobot;
                    //$nilaiKaliBobot_pembimbing = $key->nilai * $value->bobot;
                    //echo $key->nilai." x ". $value->bobot." = ".$nilaiKaliBobot_pembimbing."<br>"; 
                }
            }
        }// end first loop (poin Penilaian)
        $jumlah_nilai = array_sum($Arr_nilaiKaliBobot_pembimbing)/10;
        return $jumlah_nilai;
}

function hitungNilaiLaporan($nim){
    //ambil jenis judul ta
    $laporanTA = \App\laporanTA::where('nim','=',$nim)->first();
    if($laporanTA->jenis_judulta == 4){
        $poinPenilaianLaporan = \App\poinPenilaianLaporan::where('jenis','like','%4%')->get();
    }elseif($laporanTA->jenis_judulta == 3){
        $poinPenilaianLaporan = \App\poinPenilaianLaporan::where('jenis','like','%3%')->get();
    }elseif($laporanTA->jenis_judulta == 2){
        $poinPenilaianLaporan = \App\poinPenilaianLaporan::where('jenis','like','%2%')->get();
    }elseif($laporanTA->jenis_judulta == 1){
        $poinPenilaianLaporan = \App\poinPenilaianLaporan::where('jenis','like','%1%')->get();
    }else{
        return redirect()->back()->with('gagal','Tidak ada jenis judul TA');
    }

        foreach ($poinPenilaianLaporan as $value) {

            //echo $value->poin_penilaian."<br>";
            $nilaiLaporan = \App\nilaiLaporan::where('nim','=',$nim)
                ->where('poin_penilaian_id','=',$value->id)
                ->get();

            if($nilaiLaporan->count() == 0){
                return 0;
            }else{
                foreach ($nilaiLaporan as $key ) {
                    $Arr_nilai[] = $key->nilai;
                    //echo $key->nim." | ".$key->poin_penilaian_id." | ". $key->nilai ."<br>";
                }
                
                $mean   = statistik($Arr_nilai,'mean');
                $median = statistik($Arr_nilai,'median');
                
                //echo "Rata-rata : ".$mean."<br>";
                //echo "Median : ".$median."<br>";
                
                $toleransi_atas = $median + 1;
                $toleransi_bawah = $median - 1;
    
                //echo "+1 : ".$toleransi_atas."<br>";
                //echo "-1 : ".$toleransi_bawah."<br>";
                
                for ($i=0; $i < 3; $i++) { 
                    if($Arr_nilai[$i] == $median || $Arr_nilai[$i] == $toleransi_atas || $Arr_nilai[$i] == $toleransi_bawah){
                        $nilai_baru = $Arr_nilai[$i]; 
                    }else{
                        $nilai_baru = round($mean);
                    }
                    $Arr_nilaiBaru[] = $nilai_baru;
                    //echo "Nilai Baru ".$i." : ".$nilai_baru."<br>";
                }
            
                $Arr_nilai_akhir[] = array_sum($Arr_nilaiBaru)/3;
                $nilai_akhir = array_sum($Arr_nilaiBaru)/3;
                $nilaiKaliBobot = $nilai_akhir*$value->bobot;
                $Arr_nilaiKaliBobot[] = $nilai_akhir*$value->bobot;
                //echo "Nilai Total :".$nilai_akhir." x ".$value->bobot." = ".$nilaiKaliBobot."<br>";
                unset($Arr_nilaiBaru);
                unset($Arr_nilai);
                
                //cho "<br>";
            }
        }// end first loop (poin Penilaian)
        $jumlah_nilai_akhir = array_sum($Arr_nilaiKaliBobot);
        //echo "Nilai Akhir = ".$jumlah_nilai_akhir;

    return $jumlah_nilai_akhir;
}

function generateNamaBukti($nim,$ext){
    $mahasiswa = Mahasiswa::find($nim);
    $paper = \App\paper::where('nim','=',$nim)->count();
    $hitung = $paper+1;
    $str_name= str_replace(" ","",$mahasiswa->nama);
    $namafile = $nim."_BuktiPembayaran_".$hitung."_".$str_name."_".$mahasiswa->kelas.$mahasiswa->angkatan.".".$ext;

    return $namafile;
}

function generateNamaPaper($nim,$ext){
    $mahasiswa = Mahasiswa::find($nim);
    $paper = \App\paper::where('nim','=',$nim)->count();
    $hitung = $paper+1;
    $str_name= str_replace(" ","",$mahasiswa->nama);
    $namafile = $nim."_Paper_".$hitung."_".$str_name."_".$mahasiswa->kelas."_".$mahasiswa->angkatan.".".$ext;

    return $namafile;
}


function pembagiNilaiLaporan($nim){
    $laporanTA = \App\laporanTA::where('nim','=',$nim)->first();
    if($laporanTA->jenis_judulta == 4){
        $poinPenilaianLaporan = \App\poinPenilaianLaporan::where('jenis','like','%4%')->get();
    }elseif($laporanTA->jenis_judulta == 3){
        $poinPenilaianLaporan = \App\poinPenilaianLaporan::where('jenis','like','%3%')->get();
    }elseif($laporanTA->jenis_judulta == 2){
        $poinPenilaianLaporan = \App\poinPenilaianLaporan::where('jenis','like','%2%')->get();
    }elseif($laporanTA->jenis_judulta == 1){
        $poinPenilaianLaporan = \App\poinPenilaianLaporan::where('jenis','like','%1%')->get();
    }else{
        return redirect()->back()->with('gagal','Tidak ada jenis judul TA');
    }

    foreach($poinPenilaianLaporan as $value){
        $nilai[] = $value->bobot * 10;
    }
    return array_sum($nilai);
}

function cekRevisiLaporan($nim,$kode_dosen){
    $revisiLaporan = revisiLaporan::where('nim','=',$nim)
    ->where('kode_dosen','=',$kode_dosen)
    ->first();

    $status_revisi = $revisiLaporan->status_revisi;

    return $status_revisi;
}

function cekberkasporposal($nim,$jenis_berkas,$revisike){
    $cekdatadoc = App\berkasProposalTA::where('NIM', '=', $nim) 
        ->where('jenis_berkas','=',$jenis_berkas)
        ->where('revisike','=',$revisike)
        ->first();
    return $cekdatadoc;
}
?>