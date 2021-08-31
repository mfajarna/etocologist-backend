<?php

namespace App\Http\Controllers\polianak;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\polianak\Inputanak;
use App\Http\Controllers\Controller;
use App\Models\polianak\Riwayatkeadaan;
use Illuminate\Support\Facades\Redirect;
use App\Models\polianak\Kunjungankeadaan;

class KunjungankeadaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Riwayatkeadaan::with('anak')->where('id_anak', $id)->get()->toArray();


        return view('polianak.pelayanananak.kunjungankeadaan.create',[
            'model' => $model
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function addKunjungan(Request $request)
    {
        $kunjungan = $request->kunjunganKeadaan;

        $id_riwayatkeadaan = $request->id_riwayatkeadaan;
        $id_anak = $request->id_anak;

        foreach($kunjungan as $item)
        {
            Kunjungankeadaan::create([
                'id_riwayatkeadaan' => $id_riwayatkeadaan,
                'id_anak' => $id_anak,
                'bulan' => $item['bulan'] ,
                'umur' => $item['umur'],
                'tanggal' => $item['tanggal'],
                'bb' => $item['bb'],
                'pb' => $item['pb'],
                'lk' => $item['lk'],
                'asi' => $item['asi'],
                'pasi' => $item['pasi'],
                'mpa' => $item['mpa'],
                'imunisasi' => $item['imunisasi'],
                'perkembangan_kesehatan' => $item['perkembangan_kesehatan'],
                'th' => $item['th'],
                'nasehat' => $item['nasehat'],
            ]);
        }

        return Redirect::to('poli-anak/pelayanan-anak/kunjungankeadaan/'.$id_anak.'/edit');
    }


    public function getRiwayatKeadaanKunjungan($id)
    {
        $data = Kunjungankeadaan::where('id_anak', $id)->latest()->get();

        if(request()->ajax())
        {
            $data = Kunjungankeadaan::where('id_anak', $id)->latest()->get();

            return DataTables::of($data)->make(true);
        }

        return response()->json($data);
    }


    public function cetakKartuAnak($id)
    {
        $riwayatKeadaan = Riwayatkeadaan::where('id_anak', $id)->get()->toArray();
        $kunjunganKeadaan = Kunjungankeadaan::where('id_anak', $id)->get()->toArray();
        $anak = Inputanak::find($id);

        return view('polianak.pelayanananak.kunjungankeadaan.cetak',[
            'riwayatKeadaan' => $riwayatKeadaan,
            'kunjunganKeadaan' => $kunjunganKeadaan,
            'anak' => $anak
        ]);
    }

}
