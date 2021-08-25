<?php

namespace App\Http\Controllers\gudangfarmasi;

use App\Http\Controllers\Controller;
use App\Models\gudangfarmasi\Jenisobat;
use Illuminate\Http\Request;

use Yajra\DataTables\Facades\DataTables;

class JenisobatController extends Controller
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
            $data = Jenisobat::latest()->get();

            return DataTables::of($data)
                    ->make(true);
        };

        return view('master.gudangfarmasi.jenisobat.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master.gudangfarmasi.jenisobat.create');
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
            'nama_jenis_obat' => 'required|unique:jenisobats,nama_jenis_obat',
         ],[
             'nama_jenis_obat.required' => 'Nama jenis obat tidak boleh kosong',
             'nama_jenis_obat.unique' => 'Nama jenis obat sudah tersedia'
         ]);

        $nama_jenis_obat = $request->nama_jenis_obat;
        $model = new Jenisobat;

        $model->nama_jenis_obat = $nama_jenis_obat;

        $model->save();

        return redirect()->route('jenisobat.index')->with('success','Jenis obat '. $model->nama_jenis_obat . ' berhasil ditambahkan!');
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
    public function edit(Jenisobat $jenisobat)
    {
        return view('master.gudangfarmasi.jenisobat.edit',[
            'item' => $jenisobat
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jenisobat $jenisobat)
    {
          $this->validate($request,[
            'nama_jenis_obat' => 'required|unique:jenisobats,nama_jenis_obat',
        ]);

        $namajenisobat = $request->nama_jenis_obat;

        $data = $request->all();
        $jenisobat->update($data);

        return redirect()->route('jenisobat.index')->with('updatesuccess', 'Jenis Obat '. $namajenisobat .' berhasil di ubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
    }


    public function remove(Request $request)
    {
        // $jenisobat->delete();

        // return redirect()->route('jenisobat.index')->with('hapus', 'Jenis Obat berhasil dihapus!');

        $data = Jenisobat::find($request->input('id'));


        if($data){
            $data->each->delete();
        }
    }

}
