<?php

namespace App\Models\antrian;

use App\Models\poliibu\Inputpasien;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Antrianpolianak extends Model
{
    use HasFactory;

    protected $table = 'antrianpolianaks';

    protected $fillable = [
        'id_ibu',
        'no_antrian',
        'status',
        'nama_poli'
    ];

    public function ibu()
    {
        return $this->hasOne(Inputpasien::class, 'id', 'id_ibu');
    }
}
