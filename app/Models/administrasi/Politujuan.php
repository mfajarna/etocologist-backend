<?php

namespace App\Models\administrasi;

use Carbon\Carbon;
use App\Models\poliibu\Inputpasien;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Politujuan extends Model
{
    use HasFactory;

    protected $table = 'politujuans';

    protected $fillable = [
        'no_antrian',
        'id_ibu',
        'nama_poli_tujuan',
        'status',
        'no'
    ];

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
