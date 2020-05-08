<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class indikatornilaimanpro extends Model
{
    protected $table = 'indikatornilaimanpro';
    protected $fillable = ['nim',
                        'indikator',
                        'kategori'];
}
