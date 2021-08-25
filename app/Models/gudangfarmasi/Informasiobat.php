<?php

namespace App\Models\gudangfarmasi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informasiobat extends Model
{
    use HasFactory;

    protected $table = 'informasiobats';

    protected $fillable = [
        'obat_id', 'sediaan', 'tgl_masuk'
    ];


    public function obat()
    {
        return $this->hasOne(Obat::class, 'id', 'obat_id');
    }
}
