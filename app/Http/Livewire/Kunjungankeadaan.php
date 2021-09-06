<?php

namespace App\Http\Livewire;

use App\Models\polianak\Inputanak;
use Livewire\Component;

class Kunjungankeadaan extends Component
{
    public $kunjunganKeadaan = [];
    public $model = [];

    public function mount()
    {
        $this->kunjunganKeadaan = [
            [
                'bulan' => '',
                'umur' => '',
                'tanggal' => '',
                'bb' => '',
                'pb' => '',
                'lk' => '',
                'asi' => '',
                'pasi' => '',
                'mpa' => '',
                'imunisasi' => '',
                'perkembangan_kesehatan' => '',
                'th' => '',
                'nasehat' => '',
            ]
        ];
    }

    public function addRiwayatKunjungan()
    {
        $this->kunjunganKeadaan[] =
            [
                'bulan' => '',
                'umur' => '',
                'tanggal' => '',
                'bb' => '',
                'pb' => '',
                'lk' => '',
                'asi' => '',
                'pasi' => '',
                'mpa' => '',
                'imunisasi' => '',
                'perkembangan_kesehatan' => '',
                'th' => '',
                'nasehat' => '',
            ];


    }

    public function removeRiwayat($index)
    {
        unset($this->kunjunganKeadaan[$index]);
        $this->kunjunganKeadaan = array_values($this->kunjunganKeadaan);
    }


    public function render()
    {
        info($this->kunjunganKeadaan);
        info($this->model);

        $data = $this->model;
        $id_riwayatkeadaan = 0;
        $id_anak = 0;
        $nama = '';
        $tanggal_lahir = '';
        $jenis_kelamin = '';
        $tempat_lahir = '';
        $bb = '';
        $id_user_ibu = 0;

        foreach($data as $item){
            $id_riwayatkeadaan = $item['id'];
            $id_anak = $item['id_anak'];
            $nama = $item['anak']['nama'];
            $tanggal_lahir = $item['anak']['tanggal_lahir'];
            $jenis_kelamin =  $item['anak']['jenis_kelamin'];
            $tempat_lahir =  $item['anak']['tempat_lahir'];
            $bb =  $item['anak']['bb'];
            $id_user_ibu = $item['anak']['id_user_ibu'];
        }


        return view('livewire.kunjungankeadaan',[
            'id_riwayatkeadaan' => $id_riwayatkeadaan,
            'id_anak' => $id_anak,
            'nama' => $nama,
            'tanggal_lahir' => $tanggal_lahir,
            'jenis_kelamin' => $jenis_kelamin,
            'tempat_lahir' => $tempat_lahir,
            'bb' => $bb,
            'id_user_ibu' => $id_user_ibu
        ]);
    }
}
