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
        'no',
        'umur',
        'partus',
        'cara',
        'keterangan'
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
