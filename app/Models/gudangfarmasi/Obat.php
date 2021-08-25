<?php

namespace App\Models\gudangfarmasi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;

    protected $table = "obats";

    protected $fillable = [
        'nama_obat',
        'jenis_obat'
    ];
}
