<?php

namespace App\Models\Poliumum;

use App\Models\poliibu\Inputpasien;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poliumum extends Model
{
    use HasFactory;

    protected $table = 'poliumums';

    protected $fillable = [
        'id_ibu',
        'tanggal',
        'keluhan',
        'tensi',
        'bb',
        'lab',
        'pemeriksaan',
        'theraphi',
        'ket',
    ];

    public function ibu()
    {
        return $this->hasOne(Inputpasien::class, 'id', 'id_ibu');
    }
}
