<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\poliibu\Inputpasien;

class Riwayatkehamilans extends Component
{
    public $riwayatkehamilans = [];


    public function mount()
    {
        $this->riwayatkehamilans = [
            [
                'id_riwayat' => '4',
                'no_riwayat' => '',
                'umur_riwayat' => '',
                'partus_riwayat' =>  '',
                'cara_riwayat' => '',
                'ket_riwayat' => ''
            ]
        ];
    }

    public function addRiwayat ()
    {

        $this->riwayatkehamilans[] = ['id_riwayat' => '4','no_riwayat' => '', 'umur_riwayat' => '', 'partus_riwayat' => '', 'cara_riwayat' => '', 'ket_riwayat' => ''];
    }

    public function removeRiwayat($index)
    {
        unset($this->riwayatkehamilans[$index]);
        $this->riwayatkehamilans = array_values($this->riwayatkehamilans);
    }

    public function render()
    {

        info($this->riwayatkehamilans);

        $model = Inputpasien::all();
        return view('livewire.riwayatkehamilans',[
            'model' => $model
        ]);
    }
}
