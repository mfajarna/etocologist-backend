<?php

namespace App\Models\administrasi;

use App\Models\rujukan\Rujukan;
use App\Models\poliibu\Inputpasien;
use Illuminate\Database\Eloquent\Model;
use App\Models\gudangfarmasi\Informasiobat;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Checkout extends Model
{
    use HasFactory;

    protected $table = 'checkouts';

    protected $fillable = [
        'invoice',
        'id_ibu',
        'id_informasiobat',
        'quantity',
        'id_rujukan',
        'quantity',
        'total_obat',
        'total_layanan',
        'tanggal',
        'tempat',
        'total_harga_pembayaran',
        'total_bayar',
        'kembalian'
    ];

    public function ibu()
    {
        return $this->hasOne(Inputpasien::class, 'id','id_ibu');
    }

    public function informasiobat()
    {
        return $this->hasOne(Informasiobat::class, 'id', 'id_informasiobat');
    }

    public function rujukan()
    {
        return $this->hasOne(Rujukan::class, 'id','id_rujukan');
    }
}
