<?php

namespace App\Http\Livewire;

use App\Models\poliibu\Riwayatkehamilan;
use Livewire\Component;

class Proseskehamilan extends Component
{
    public $proseskehamilan=[];
    public $data;

    public function mount($data)
    {
        $this->proseskehamilan = [
            [
                'tanggal' => '',
                'umur_kehamilan' => '',
                'k' => '',
                'hb' => '',
                'lila' => '',
                'bb' => '',
                'tinggi_fut' => '',
                'letak_janin' => '',
                'dda' => '',
                'keluhan' => '',
                'tindakan' => '',
                'konseling' => '',
                'n/r' => '',
                'paraf' => ''
            ]
        ];
    }


    public function addRiwayat ()
    {

        $this->proseskehamilan[] = [
                'tanggal' => '',
                'umur_kehamilan' => '',
                'k' => '',
                'hb' => '',
                'lila' => '',
                'bb' => '',
                'tinggi_fut' => '',
                'letak_janin' => '',
                'dda' => '',
                'keluhan' => '',
                'tindakan' => '',
                'konseling' => '',
                'n/r' => '',
                'paraf' => ''
        ];
    }

    public function removeRiwayat($index)
    {
        unset($this->proseskehamilan[$index]);
        $this->proseskehamilan = array_values($this->proseskehamilan);
    }


    public function render()
    {

        info($this->proseskehamilan);
        return view('livewire.proseskehamilan');
    }
}
