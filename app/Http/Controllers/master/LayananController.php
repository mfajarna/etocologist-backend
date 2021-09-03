<?php

namespace App\Http\Controllers\master;

use App\Http\Controllers\Controller;
use App\Models\layanan\Layanan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class LayananController extends Controller
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
            $model = Layanan::latest()->get();

            return DataTables::of($model)->make(true);
        }

        return view('master.layanan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master.layanan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_layanan' => 'required|unique:layanans,nama_layanan',
            'harga' => 'required',

        ],[
            'nama_layanan.required' => 'Nama Layanan Tidak Boleh Kosong!',
            'nama_layanan.unique' => 'Nama Layanan Sudah Tersedia!',
            'harga.required' => 'Harga Layanan Tidak Boleh Kosong! '
        ]);

        $model = new Layanan;

        $model->nama_layanan = $request->nama_layanan;
        $model->harga = $request->harga;

        $model->save();

        return redirect()->route('layanan.index')->with('success','Jenis layanan '. $model->nama_layanan . ' berhasil ditambahkan!');
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


        public function remove(Request $request)
    {
        // $jenisobat->delete();

        // return redirect()->route('jenisobat.index')->with('hapus', 'Jenis Obat berhasil dihapus!');

        $data = Layanan::find($request->input('id'));


        if($data){
            $data->each->delete();
        }
    }
}
