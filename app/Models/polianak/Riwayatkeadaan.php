<?php

namespace App\Models\polianak;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Riwayatkeadaan extends Model
{
    use HasFactory;

    protected $table = 'riwayatkeadaans';

    protected $fillable = [
           'id_anak',
           'tanggal',
           'minggu_ke',
           'umur_hari',
           'bb',
           'pb',
           'st_gizi',
           'makanan',
           'tali_pusat',
           'imunisasi',
           'kk',
           'cacat',
           'gejala',
           'tindakan_nasehat',
    ];


    public function anak()
    {
        return $this->hasOne(Inputanak::class, 'id', 'id_anak');
    }


    public function getCreatedAttribute($value)
    {
        return Carbon::parse($value)->timestamp;
    }

     public function getUpdatedAttribute($value)
     {
         return Carbon::parse($value)->timestamp;
     }
}
