<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class laporanTA extends Model
{
    protected $table = 'laporanta';
    protected $fillable = ['nim','judul_ta','bidang','jenis_judulta','pembimbing1','pembimbing2','laporan','abstrak','lampiran','laporandoc','laporanrevisipdf','form_bimbingan','form_permohonan'];
    
    public function mahasiswa()
    {
        return $this->belongsTo('App\Mahasiswa','nim','nim');
    }

    public function bidangRelasi()
    {
        return $this->belongsTo('App\bidang','bidang');
    }
    
}
