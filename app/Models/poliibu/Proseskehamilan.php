<?php

namespace App\Models\poliibu;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Proseskehamilan extends Model
{
    use HasFactory;

    protected $table = 'proseskehamilans';

    protected $fillable = [
        'id_riwayat',
        'id_ibu',
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
        'nr',
        'paraf',
        'id_user'
    ];


        public function user()
    {
        return $this->hasOne(User::class, 'id', 'id_user');
    }

    public function riwayat()
    {
        return $this->hasOne(Riwayatkehamilan::class, 'id', 'id_riwayat');
    }

    public function ibu()
    {
        return $this->hasOne(Inputpasien::class, 'id', 'id_ibu');
    }

    public function dataRiwayat()
    {
        return $this->belongsToMany(Riwayatkehamilan::class);
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
