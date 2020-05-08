<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class statusFinalisasiDosen extends Model
{
    protected $table = 'proposal_manpro';
    protected $fillable = ['nim',
                        'revisike',
                        'status_dataProposal',
                        'status_pendahuluan',
                        'status_tinpus',
                        'status_metode',
                        'status_biayaJadwal',
                        'status_dapus',
                        'status_justifikasiOrganisasi',
                        'status_uploadFile',
                        'status_gambaranTeknologi',
                        ];
}
