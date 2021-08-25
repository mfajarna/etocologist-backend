<?php

namespace App\Models\poliibu;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Proseskehamilan extends Model
{
    use HasFactory;

    protected $table = 'proseskehamilans';

    protected $fillable = [
        'id_riwayat',
        'tanggal',
        'umur_kehamilan',
        'k',
        'hb',
        'lila',
        'bb',
        'tinggi_fut',
        'letak_janin',
        'dda',
        'keluhan',
        'tindakan',
        'konseling',
        'n/r',
        'paraf'
    ];


    public function riwayat()
    {
        return $this->hasOne(Riwayatkehamilan::class, 'id', 'id_riwayat');
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
