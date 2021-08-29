<?php

namespace App\Http\Controllers\polianak;

use App\Http\Controllers\Controller;
use App\Models\polianak\Inputanak;
use App\Models\polianak\Riwayatkeadaan;
use Illuminate\Http\Request;

class RiwayatkeadaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('polianak.pelayanananak.riwayatkeadaan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = Inputanak::all();

        return view('polianak.pelayanananak.riwayatkeadaan.create',[
            'model' => $model
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->riwayatKeadaan;

        $id_anak = $request->id_anak;

        foreach($data as $item)
        {

            Riwayatkeadaan::create([
                'id_anak' => $id_anak,
                'tanggal' => $item['tanggal'],
                'minggu_ke' => $item['minggu_ke'],
                'umur_hari' => $item['umur_hari'],
                'bb' => $item['bb'],
                'pb' => $item['pb'],
                'st_gizi' => $item['st_gizi'],
                'makanan' => $item['makanan'],
                'tali_pusat' => $item['tali_pusat'],
                'imunisasi' => $item['imunisasi'],
                'kk' => $item['kk'],
                'cacat' => $item['cacat'],
                'gejala' => $item['gejala'],
                'tindakan_nasehat' => $item['tindakan_nasehat']
            ]);
        }

        return redirect()->route('riwayatkeadaan.index')->with('success', 'Riwayat Keadaan Anak berhasil di Tambahkan!');
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
        //
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

    public function getDataAnak(Request $request){
         $id = $request->input('id');
         $model = Inputanak::with('ibu')->find($id);

         return response()->json($model);

    }
}
