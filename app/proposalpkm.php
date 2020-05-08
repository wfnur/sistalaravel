<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class proposalpkm extends Model
{
    protected $primaryKey = 'id_manpro';
    protected $table = 'proposal_manpro';
    protected $fillable = ['nim_ketua',
                        'pembimbing_1',
                        'pembimbing_2',
                        'judul_proposal_polban',
                        'judul_proposal_belmawa',
                        'judul_proposal_TA',
                        'jenis',
                        'bidang',
                        'revisike',
                        'pendahuluan',
                        'abstrak_ind',
                        'keyword_ind',
                        'abstrak_eng',
                        'keyword_eng',
                        'tinjauan_pustaka_1',
                        'tinjauan_pustaka_2',
                        'metode_pelaksanaan',
                        'jadwal_kegiatan',
                        'biaya',
                        'pustaka_1',
                        'pustaka_2',
                        'pustaka_3',
                        'pustaka_4',
                        'pustaka_5',
                        'pustaka_6',
                        'pustaka_7',
                        'pustaka_8',
                        'pustaka_9',
                        'pustaka_10',
                        'status',
                        'pengesahan',
                        'biodata_ketua',
                        'biodata_anggota1',
                        'biodata_anggota2',
                        'biodata_pembimbing',
                        'justifikasi_anggaran',
                        'susunan_organisasi',
                        'surat_pernyataan',
                        'gambar_ilustrasi',
                        'penjelasan_ilustrasi',
                        'spek_teknis',
                        'gambar_blok_diagram',
                        'penjelasan_blok_diagram',
                        'gambar_blok_diagram2',
                        'penjelasan_blok_diagram2',
                        'gambar_flowchart',
                        'penjelasan_flowchart',
                        'komponen',
                        'status_dataProposal',
                        'status_pendahuluan',
                        'status_Tinpus',
                        'status_metode',
                        'status_biayaJadwal',
                        'status_dapus',
                        'status_justifikasiOrganisasi',
                        'status_uploadFile',
                        'status_gambaranTeknologi',
                        ];

    
}
