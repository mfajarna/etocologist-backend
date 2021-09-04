<?php

namespace App\Models\poliibu;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Riwayatpersalinan extends Model
{
    use HasFactory;

    protected $table = 'riwayatpersalinans';

    protected $fillable = [
        'id_riwayat',
        'id_ibu',
        'no',
        'umur',
        'partus',
        'cara',
        'keterangan',
        'id_user'
    ];

    public function riwayat()
    {
        return $this->hasOne(Riwayatkehamilan::class, 'id', 'id_riwayat');
    }

    public function ibu()
    {
        return $this->hasOne(Inputpasien::class, 'id', 'id_ibu');
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
