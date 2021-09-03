<?php

namespace App\Http\Livewire;

use App\Models\layanan\Layanan;
use Livewire\Component;

class Rujukan extends Component
{

    public $data_keluhan = [];
    public $model = [];
    public $hasil_kode;

    public function mount()
    {
        $this->data_keluhan = [
            [
                'nama_layanan',
            ]
        ];
    }

    public function addRiwayat()
    {
        $this->data_keluhan[] = ['nama_layanan'];
    }

        public function removeRiwayat($index)
    {
        unset($this->data_keluhan[$index]);
        $this->data_keluhan = array_values($this->data_keluhan);
    }

    public function render()
    {
        info($this->data_keluhan);
        info($this->model);
        info($this->hasil_kode);

        $layanan = Layanan::all();
        return view('livewire.rujukan',[
            'layanan' => $layanan
        ]);
    }
}
