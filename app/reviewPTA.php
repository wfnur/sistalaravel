<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reviewPTA extends Model
{
    protected $table = 'reviewPTA';
    protected $fillable = ['NIM','reviewer','revisi','revisike','status'];

    public function Mahasiswa(){
        return $this->belongsTo('App\Mahasiswa','NIM');
    }
}
