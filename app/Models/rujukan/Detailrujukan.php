<?php

namespace App\Models\rujukan;

use App\Models\gudangfarmasi\Informasiobat;
use App\Models\layanan\Layanan;
use App\Models\poliibu\Inputpasien;
use App\Models\rujukan\Rujukan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Detailrujukan extends Model
{
    use HasFactory;

    protected $table = 'detailrujukans';

    protected $fillable = [
        'id_rujukan',
        'id_layanan',
        'id_ibu',
        'id_informasiobat'
    ];

    public function rujukan()
    {
        return $this->hasOne(Rujukan::class, 'id','id_rujukan');
    }

    public function layanan()
    {
        return $this->hasOne(Layanan::class, 'id','id_layanan');
    }

    public function ibu()
    {
        return $this->hasOne(Inputpasien::class, 'id','id_ibu');
    }

    public function obat()
    {
        return $this->hasOne(Informasiobat::class, 'id', 'id_informasiobat');
    }
}
