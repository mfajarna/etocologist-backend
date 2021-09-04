<?php

namespace App\Models\rujukan;

use App\Models\poliibu\Inputpasien;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rujukan extends Model
{
    use HasFactory;

    protected $table = 'rujukans';

    protected $fillable = [
        'id_ibu',
        'kode_rujukan',
        'id_layanan',
        'catatan_obat',
        'status'
    ];

    public function ibu()
    {
        return $this->hasOne(Inputpasien::class, 'id','id_ibu');
    }
}
