<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\proposalTA;
use \App\berkasProposalTA;
use \App\Mahasiswa;
use \App\dosen;
use \App\reviewPTA;


class reviewProposalTAController extends Controller
{
    public function createReviewPTA(Request $request){
        $reviewPTA = \App\reviewPTA::updateOrCreate([
            'NIM'   => $request->NIM,
            'reviewer'   => $request->reviewer,
            'revisike'   => $request->revisike,
        ],[
            'revisi'        => $request->get('reviewPTA'),
            'status'        => $request->get('status')
        ]);
        
        if ($reviewPTA) {
            return redirect()->back()->with('sukses','Review Berhasil Diubah/Disimpan');
        }else{
            return redirect()->back()->with('gagal','Review Gagal Diubah/Disimpan');
        }
    }
    public function reviewPTA(Request $request){
        $pembimbing1 = NULL;
        $pembimbing2 = NULL;
        $proposal = proposalTA::where('NIM','=',$request->nim)->first();
        if($proposal != ""){
            $pembimbing1 = dosen::where('kode_dosen','=',$proposal->pembimbing1)->first();
            $pembimbing2 = dosen::where('kode_dosen','=',$proposal->pembimbing2)->first();
        }
        
        $mahasiswa = Mahasiswa::where('NIM','=',$request->nim)->first();
        $reviewPTA1 = reviewPTA::where('NIM','=',$request->nim)
                    ->where('reviewer','=',auth()->user()->username)
                    ->where('revisike','=',1)
                    ->first();
        $reviewPTA2 = reviewPTA::where('NIM','=',$request->nim)
                    ->where('reviewer','=',auth()->user()->username)
                    ->where('revisike','=',2)
                    ->first();
        
        $cekdatapdf1 = berkasProposalTA::where('NIM', '=', $request->nim) 
        ->where('jenis_berkas','=','pdf')
        ->where('revisike','=',1)
        ->first(); 
        $namapdf1 =null;
        if($cekdatapdf1 !=""){
            $namapdf1 = $cekdatapdf1->nama_berkas;
        }else{}
        
        
        $cekdatapdf2 = berkasProposalTA::where('NIM', '=', $request->nim) 
        ->where('jenis_berkas','=','pdf')
        ->where('revisike','=',2)
        ->first(); 
        $namapdf2 =null;
        if($cekdatapdf2 !=""){
            $namapdf2 = $cekdatapdf2->nama_berkas;
        }else{$namapdf2="";}

        return view('ProposalTA.reviewPTADetail', compact('proposal','mahasiswa','pembimbing1','pembimbing2',
        'cekdatadoc','namapdf1','namapdf2','reviewPTA1','reviewPTA2'));;

    }
    public function listMahasiswa(){
        $mahasiswa = Mahasiswa::all();
        $proposal = proposalTA::all();
        return view('ProposalTA.reviewPTAList', compact('mahasiswa'));
        
    }
}
