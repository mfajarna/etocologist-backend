<?php

namespace App\Models\gudangfarmasi;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jenisobat extends Model
{
    use HasFactory;

    protected $table ="jenisobats";

    protected $fillable = [
        'nama_jenis_obat'
    ];

    public function getCreatedAttribute($value)
    {
        return Carbon::parse($value)->timestamp;
    }

     public function getUpdatedAttribute($value)
     {
         return Carbon::parse($value)->timestamp;
     }
}
