<?php

namespace App\Models\poliibu;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Inputpasien extends Model
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
        "no_telp",
        'id_user'
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'id_user');
    }

    public function getCreatedAttribute($value)
    {
        return Carbon::parse($value)->timestamp;
    }

     public function getUpdatedAttribute($value)
     {
         return Carbon::parse($value)->timestamp;
     }
}
