<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\poliibu\Riwayatkehamilan;
use Yajra\DataTables\Facades\DataTables;

class Proseskehamilan extends Component
{
    public $proseskehamilan=[];
    public $data=[];
    public $id_riwayat = '';
    public $riwayatkehamilan=[];

    public function mount()
    {
        $this->proseskehamilan = [
            [

                'id_riwayat' => $this->data['id'],
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
                'nr' => '',
                'paraf' => ''
            ]
        ];



        $this->data;
        $this->id_riwayat;
    }


    public function addRiwayat ()
    {

        $this->proseskehamilan[] = [
                'id_riwayat' => $this->data['id'],
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
                'nr' => '',
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
        info($this->data);
        info($this->id_riwayat);

        return view('livewire.proseskehamilan');
    }
}
