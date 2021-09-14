<?php

namespace App\Models\uploadusg;

use App\Models\poliibu\Inputpasien;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Uploadusg extends Model
{
    use HasFactory;

    protected $table = 'uploadusgs';

    protected $fillable = [
        'id_ibu',
        'title',
        'photoPath'
    ];

    public function ibu()
    {
        return $this->hasOne(Inputpasien::class, 'id', 'id_ibu');
    }

    public function toArray(){
        $toArray = parent::toArray();
        $toArray['photoPath'] = $this->photoPath;

        return $toArray;
    }

    public function getPhotoPathAttribute()
    {
        return url('') . Storage::url($this->attributes['photoPath']);
    }

}
