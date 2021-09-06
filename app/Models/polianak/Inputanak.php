<?php

namespace App\Models\polianak;

use App\Models\poliibu\Dataibu;
use App\Models\poliibu\Inputpasien;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Inputanak extends Model
{
    use HasFactory;

    protected $table = 'inputanaks';

    protected $fillable = [
        'id_ibu',
        'id_user_ibu',
        'nama',
        'tanggal_lahir',
        'jenis_kelamin',
        'bb',
        'bblr',
        'keadaan_lahir',
        'tempat_lahir',
        'proses_lahir',
        'ditolong_oleh',
        'letak_janin',
        'jenis_imunisasi',
        'cara_lahir'
    ];

    public function ibu(){
        return $this->hasOne(Inputpasien::class, 'id', 'id_ibu');
    }

    public function useribu(){
        return $this->hasOne(Dataibu::class, 'id', 'id_user_ibu');
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
