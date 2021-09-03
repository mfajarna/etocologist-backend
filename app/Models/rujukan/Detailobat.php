<?php

namespace App\Models\rujukan;

use App\Models\rujukan\Rujukan;
use App\Models\gudangfarmasi\Obat;
use App\Models\poliibu\Inputpasien;
use Illuminate\Database\Eloquent\Model;
use App\Models\gudangfarmasi\Informasiobat;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Detailobat extends Model
{
    use HasFactory;
    protected $table = 'detailobats';

    protected $fillable = [
        'id_rujukan',
        'id_ibu',
        'id_informasiobat',
        'quantity',
        'id_obat'
    ];

    public function ibu()
    {
        return $this->hasOne(Inputpasien::class, 'id','id_ibu');
    }

    public function informasiobat()
    {
        return $this->hasOne(Informasiobat::class, 'id', 'id_informasiobat');
    }

    public function obat()
    {
        return $this->hasOne(Obat::class, 'id', 'id_obat');
    }

        public function rujukan()
    {
        return $this->hasOne(Rujukan::class, 'id','id_rujukan');
    }

}
