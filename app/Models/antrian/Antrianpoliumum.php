<?php

namespace App\Models\antrian;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Antrianpoliumum extends Model
{
    use HasFactory;

    protected $table = 'antrianpoliumums';

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
