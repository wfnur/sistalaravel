<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class proposalTA extends Model
{
    protected $table = 'proposalta';
    protected $fillable = ['NIM','judul_ta','abstrak','keyword','revisi','pembimbing1','pembimbing2','revisi_tambahan','reviewer','udate','status_pta'];

    public function mahasiswa(){
        return $this->hasMany('App\Mahasiswa','NIM','nim');
    }
}
