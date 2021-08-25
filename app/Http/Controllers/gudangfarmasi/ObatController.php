<?php

namespace App\Http\Controllers\gudangfarmasi;

use App\Http\Controllers\Controller;
use App\Models\gudangfarmasi\Jenisobat;
use App\Models\gudangfarmasi\Obat;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ObatController extends Controller
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
            $data = Obat::latest()->get();

            return DataTables::of($data)->make(true);
        }

        return view('master.gudangfarmasi.obat.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = Jenisobat::all();

        return view('master.gudangfarmasi.obat.create',[
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
            'nama_obat' => 'required|unique:obats,nama_obat',
            'jenis_obat' => 'required',
        ],[
            'nama_obat.required' => 'Nama Obat Tidak Boleh Kosong!',
            'nama_obat.unique' => 'Nama obat sudah ada, Silahkan menggunakan nama obat lain!',
            'jenis_obat.required' => 'Jenis obat tidak boleh kosong!'
        ]);

        $nama_obat = $request->nama_obat;

        $model = new Obat;

        $model->nama_obat = $nama_obat;
        $model->jenis_obat = $request->jenis_obat;

        $model->save();

        return redirect()->route('obat.index')->with('success','Obat '. $nama_obat . ' berhasil ditambahkan!');
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
    public function edit(Obat $obat)
    {
        $model = Jenisobat::all();
        return view('master.gudangfarmasi.obat.edit', [
            'item' => $obat,
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
    public function update(Request $request, Obat $obat)
    {
          $this->validate($request,[
            'nama_obat' => 'required|unique:obats,nama_obat',
            'jenis_obat' => 'required',
          ],);

        $nama_obat = $request->nama_obat;

        $data = $request->all();

        $obat->update($data);

        return redirect()->route('obat.index')->with('updatesuccess', 'Obat '. $nama_obat .' berhasil di ubah!');


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

    public function hapus(Request $request)
    {
        // $jenisobat->delete();

        // return redirect()->route('jenisobat.index')->with('hapus', 'Jenis Obat berhasil dihapus!');

        $data = Obat::find($request->input('id'));


        if($data){
            $data->each->delete();
        }
    }
}
