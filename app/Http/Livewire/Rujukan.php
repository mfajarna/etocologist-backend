<?php

namespace App\Http\Livewire;

use App\Models\gudangfarmasi\Informasiobat;
use App\Models\layanan\Layanan;
use Livewire\Component;

class Rujukan extends Component
{

    public $data_keluhan = [];
    public $data_obat = [];
    public $model = [];
    public $hasil_kode;

    public function mount()
    {
        $this->data_keluhan = [
            [
                'nama_layanan' => '',
            ]
        ];

        $this->data_obat = [
            [
                'nama_obat' => '',
                'quantity' => 1
            ]
        ];
    }

    public function addRiwayat()
    {
        $this->data_keluhan[] = ['nama_layanan' => ''];
    }

        public function addObat()
    {
        $this->data_obat[] = ['nama_obat' => '','quantity' => 1];
    }



    public function removeRiwayat($index)
    {
        unset($this->data_keluhan[$index]);
        $this->data_keluhan = array_values($this->data_keluhan);
    }

        public function removeObat($index)
    {
        unset($this->data_obat[$index]);
        $this->data_obat = array_values($this->data_obat);
    }

    public function render()
    {
        info($this->data_keluhan);
        info($this->model);
        info($this->hasil_kode);
        info($this->data_obat);

        $layanan = Layanan::all();
        $obat = Informasiobat::with('obat')->get();
        return view('livewire.rujukan',[
            'layanan' => $layanan,
            'obat' => $obat
        ]);
    }
}
