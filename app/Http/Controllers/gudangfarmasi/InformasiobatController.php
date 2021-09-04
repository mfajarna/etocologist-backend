<?php

namespace App\Http\Controllers\gudangfarmasi;

use Illuminate\Http\Request;
use App\Models\gudangfarmasi\Obat;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\gudangfarmasi\Informasiobat;
use Yajra\DataTables\Facades\DataTables;

class InformasiobatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Informasiobat::with('obat')->latest()->get();
        if(request()->ajax())
        {
            $data = Informasiobat::with('obat')->latest()->get();
            return DataTables::of($data)->make(true);
        }

        return view('master.gudangfarmasi.informasi.index',[
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Obat::all();
        return view('master.gudangfarmasi.informasi.create', [
            'data' => $data
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
            'obat_id' => 'required',
            'sediaan' => 'required',
            'tgl_masuk' => 'required',
            'harga' => 'required'
        ],
        [
            'obat_id.unique' => 'Nama obat sudah tersedia!',
            'sediaan.required' => 'Sediaan tidak boleh kosong!',
            'tgl_masuk.required' => 'Tanggal tidak boleh kosong!',
            'harga.required' => 'Harga Obat Tidak Boleh Kosong'
        ]);


        $model = new Informasiobat;

        $model->obat_id = $request->obat_id;
        $model->sediaan = $request->sediaan;
        $model->tgl_masuk = $request->tgl_masuk;
        $model->harga = $request->harga;




        $model->save();

        return redirect()->route('informasi-obat.index')->with('success','Pemasukan obat berhasil ditambahkan!');
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
    public function edit(Informasiobat $informasiobat)
    {

        return view('master.gudangfarmasi.informasi.edit',[
            'item' => $informasiobat
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

    public function autofill(Request $request)
    {
        $id = $request->input('id');

        $data = DB::table('obats')
                ->select('nama_obat','jenis_obat')
                ->where('id', $id)
                ->get();

        foreach ($data as $item)
        {
            $jenis_obat = $item->jenis_obat;
            $nama_obat = $item->nama_obat;
        }

        $arr = [
            'jenis_obat' => $jenis_obat,
            'nama_obat' => $nama_obat
        ];

        echo json_encode($arr);
    }

    public function removeinformasi(Request $request)
    {
        // $jenisobat->delete();

        // return redirect()->route('jenisobat.index')->with('hapus', 'Jenis Obat berhasil dihapus!');

        $data = Informasiobat::find($request->input('id'));


        if($data){
            $data->each->delete();
        }
    }
}
