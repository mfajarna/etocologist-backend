<?php

namespace App\Models\gudangfarmasi;

use Illuminate\Database\Eloquent\Model;
use App\Models\gudangfarmasi\Informasiobat;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Laporanobat extends Model
{
    use HasFactory;

    protected $table = 'laporanobats';

    protected $fillable = [
        'obat_id',
        'id_informasiobat',
        'jumlah_keluaran',
        'tgl_keluar_obat',
    ];


    public function obat()
    {
        return $this->hasOne(Obat::class, 'id', 'obat_id');
    }
    public function informasiobat()
    {
        return $this->hasOne(Informasiobat::class, 'id', 'id_informasiobat');
    }
}
