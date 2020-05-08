<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nilaiRevisiPkm extends Model
{
    protected $table = 'nilai_revisi_manpro';
    protected $fillable = ['nim',
                        'indikator',
                        'revisike',
                        'nilai',
                        'revisi',
                        'status',
                        ];
}
