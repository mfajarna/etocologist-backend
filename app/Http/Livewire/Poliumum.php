<?php

namespace App\Http\Livewire;

use App\Models\poliibu\Inputpasien;
use Livewire\Component;

class Poliumum extends Component
{

    public $keadaan = [];
    public $id_ibu;


    public function mount()
    {
        $this->keadaan = [
            [
                'tanggal' => '',
                'keluhan' => '',
                'tensi' => '',
                'bb' => '',
                'lab' => '',
                'pemeriksaan' => '',
                'theraphi' => '',
                'ket' => '',
            ]
        ];
    }

    public function addRiwayat ()
    {

        $this->keadaan[] = [
                'tanggal' => '',
                'keluhan' => '',
                'tensi' => '',
                'bb' => '',
                'lab' => '',
                'pemeriksaan' => '',
                'theraphi' => '',
                'ket' => '',
        ];
    }

    public function removeRiwayat($index)
    {
        unset($this->keadaan[$index]);
        $this->keadaan = array_values($this->keadaan);
    }

    public function render()
    {
        $id = $this->id_ibu;

        info($this->keadaan);
        $data = Inputpasien::where('id', $id)->latest()->get();
        return view('livewire.poliumum',[
            'data' => $data,
            'id' => $id
        ]);
    }
}
