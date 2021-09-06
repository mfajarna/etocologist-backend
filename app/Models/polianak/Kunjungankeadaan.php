<?php

namespace App\Models\polianak;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kunjungankeadaan extends Model
{
    use HasFactory;

    protected $table = 'kunjungankeadaans';

    protected $fillable = [
            'id_user_ibu',
           'id_riwayatkeadaan',
           'id_anak',
           'bulan',
           'umur',
           'tanggal',
           'bb',
           'pb',
           'lk',
           'asi',
           'pasi',
           'mpa',
           'imunisasi',
           'perkembangan_kesehatan',
           'th',
           'nasehat',
    ];


    public function riwayatKeadaan()
    {
        return $this->hasOne(Riwayatkeadaan::class, 'id', 'id_riwayatkeadaan');
    }

    public function anak()
    {
        return $this->hasOne(Inputanak::class, 'id', 'id_anak');
    }
}
