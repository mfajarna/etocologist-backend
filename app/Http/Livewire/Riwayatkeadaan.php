<?php

namespace App\Http\Livewire;

use App\Models\polianak\Inputanak;
use Livewire\Component;

class Riwayatkeadaan extends Component
{
    public $riwayatKeadaan = [];

    public function mount()
    {
        $this->riwayatKeadaan = [
            [
            'tanggal' => '',
            'minggu_ke' => '',
            'umur_hari' => '',
            'bb' => '',
            'pb' => '',
            'st_gizi' => '',
            'makanan' => '',
            'tali_pusat' => '',
            'imunisasi' => '',
            'kk' => '',
            'cacat' => '',
            'gejala' => '',
            'tindakan_nasehat' => '',
            ]
        ];
    }

    public function addRiwayat()
    {
        $this->riwayatKeadaan[] = [
           'tanggal' => '',
           'minggu_ke' => '',
           'umur_hari' => '',
           'bb' => '',
           'pb' => '',
           'st_gizi' => '',
           'makanan' => '',
           'tali_pusat' => '',
           'imunisasi' => '',
           'kk' => '',
           'cacat' => '',
           'gejala' => '',
           'tindakan_nasehat' => '',
        ];
    }

        public function removeRiwayat($index)
        {
            unset($this->riwayatKeadaan[$index]);
            $this->riwayatKeadaan = array_values($this->riwayatKeadaan);
        }



    public function render()
    {
        info($this->riwayatKeadaan);

        $model = Inputanak::with('ibu')->latest()->get();
        return view('livewire.riwayatkeadaan',[
            'model' => $model
        ]);
    }
}
