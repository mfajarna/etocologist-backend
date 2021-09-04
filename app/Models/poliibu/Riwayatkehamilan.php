<?php

namespace App\Models\poliibu;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Riwayatkehamilan extends Model
{
    use HasFactory;

    protected $casts = [
        'riwayat_persalinan' => 'array'
    ];

    protected $table = 'riwayatkehamilans';

    protected $fillable = [
        'id_ibu',
        'gpa',
        'jarak_kehamilan',
        'siklus_haid',
        'tinggi_badan',
        'kb_sebelum_hamil',
        'riwayat_penyakit',
        'riwayat_persalinan',
        'id_user'
    ];

        public function user()
    {
        return $this->hasOne(User::class, 'id', 'id_user');
    }

    public function ibu()
    {
        return $this->hasOne(Inputpasien::class, 'id', 'id_ibu');
    }

    public function riwayats()
    {
        return $this->belongsToMany(Riwayatpersalinan::class);
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
