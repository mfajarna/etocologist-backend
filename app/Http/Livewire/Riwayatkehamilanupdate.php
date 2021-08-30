<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Riwayatkehamilanupdate extends Component
{
    public $riwayatkehamilanupdate = [];
    public $model = [];

    public function mount()
    {
        $this->riwayatkehamilanupdate = [
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

    public function addRiwayatKehamilanUpdate()
    {

        $this->riwayatkehamilanupdate[] = ['id_riwayat' => '4','no_riwayat' => '', 'umur_riwayat' => '', 'partus_riwayat' => '', 'cara_riwayat' => '', 'ket_riwayat' => ''];
    }

    public function removeRiwayat($index)
    {
        unset($this->riwayatkehamilanupdate[$index]);
        $this->riwayatkehamilanupdate = array_values($this->riwayatkehamilanupdate);
    }

    public function render()
    {

        info($this->riwayatkehamilanupdate);
        info($this->model);

        return view('livewire.riwayatkehamilanupdate');
    }
}
