<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class berkasProposalTA extends Model
{
    protected $table = 'berkas_proposal';
    protected $fillable = ['NIM','nama_berkas','jenis_berkas','revisike'];

    public function mahasiswa(){
        return $this->belongsTo('App\Mahasiswa','NIM','NIM');
    }
}
