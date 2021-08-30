<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\polianak\Riwayatkeadaan;
use Yajra\DataTables\Facades\DataTables;

class Riwayatkeadaanupdate extends Component
{
    public $riwayatKeadaan = [];
    public $model = [];
    public $anak_id;

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
        info($this->model);
        info($this->anak_id);

        $data = Riwayatkeadaan::where('id_anak', $this->anak_id)->latest()->get();

        if(request()->ajax())
        {
            $data = Riwayatkeadaan::where('id_anak', $this->anak_id)->latest()->get();

            return DataTables::of($data)->make(true);
        }

        return view('livewire.riwayatkeadaanupdate',[
            'data' => $data
        ]);
    }
}
