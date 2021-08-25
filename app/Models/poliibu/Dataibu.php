<?php

namespace App\Models\poliibu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dataibu extends Model
{
    use HasFactory;

    protected $table = "dataibus";

    protected $fillable = [
        "nama",
        "umur",
        "pekerjaan",
        "htpt",
        "nama_suami",
        "umur_suami",
        "pekerjaan_suami",
        "alamat",
        "kelurahan",
        "posyandu",
        "no_telp"
    ];
}
