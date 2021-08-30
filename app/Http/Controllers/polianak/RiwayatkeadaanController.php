<?php

namespace App\Http\Controllers\polianak;

use Illuminate\Http\Request;
use App\Models\polianak\Inputanak;
use App\Http\Controllers\Controller;
use App\Models\polianak\Riwayatkeadaan;
use Illuminate\Support\Facades\Redirect;
use Yajra\DataTables\Facades\DataTables;

class RiwayatkeadaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax())
        {
            $data = Riwayatkeadaan::with('anak')->latest()->get();

            return DataTables::of($data)->make(true);
        }


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

        $this->validate($request,[
            'id_anak' => 'required|unique:riwayatkeadaans,id_anak'
        ],[
            'id_anak.required' => 'Nama anak tidak boleh kosong!',
            'id_anak.unique' => 'Tidak boleh menggunakan nama anak yang sudah terdaftar!'
        ]);

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
        $model = Inputanak::with('ibu')->find($id);

        $anak_id = $model->id;

        return view('polianak.pelayanananak.riwayatkeadaan.edit',[
            'model' => $model,
            'anak_id' => $anak_id
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
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


    public function getRiwayatKeadaanAnak($id)
    {
        $data = Riwayatkeadaan::where('id_anak', $id)->latest()->get();

        if(request()->ajax())
        {
            $data = Riwayatkeadaan::where('id_anak', $id)->latest()->get();

            return DataTables::of($data)->make(true);
        }

        return response()->json($data);
    }


    public function addData(Request $request)
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

        return Redirect::to('poli-anak/pelayanan-anak/riwayatkeadaan/'.$id_anak.'/edit');

    }



}
