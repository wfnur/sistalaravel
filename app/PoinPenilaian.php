<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PoinPenilaian extends Model
{
    protected $table = 'poin_penilaianta';
    protected $fillable = ['poin_penilaian','bobot','kategori','ket'];
}
