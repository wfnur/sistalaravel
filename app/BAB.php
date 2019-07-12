<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BAB extends Model
{
    protected $table = 'bab';
    protected $primaryKey = 'id';
    protected $fillable = ['bab','ket','status'];

    public function SubBab(){
        return $this->hasMany('App\SubBab');
    }
}
