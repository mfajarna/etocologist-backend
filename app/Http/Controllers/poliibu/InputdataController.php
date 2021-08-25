<?php

namespace App\Http\Controllers\poliibu;

use App\Http\Controllers\Controller;
use App\Models\poliibu\Dataibu;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class InputdataController extends Controller
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
            $data = Dataibu::latest()->get();

            return DataTables::of($data)->make(true);
        }

        return view('poliibu.inputpasien.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = Dataibu::all();

        return view('poliibu.inputpasien.create',[
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
            'nama' => 'required|unique:dataibus,nama',
            'umur' => 'required',
            'pekerjaan' => 'required',
            'htpt' => 'required',
            'nama_suami' => 'max:255',
            'umur_suami' => 'max:255',
            'pekerjaan_suami' => 'max:255',
            'alamat' => 'required',
            'kelurahan' => 'required',
            'posyandu' => 'required',
            'no_telp' => 'required'
        ],[
            'nama.required' => 'Nama Pasien Ibu Tidak Boleh Kosong!',
            'nama.unique' => 'Nama Pasien Ibu Sudah Tersedia!',
            'umur.required' => 'Umur Tidak Boleh Kosong!',
            'pekerjaan.required' => 'Pekerjaan Tidak Boleh Kosong!',
            'htpt.required' => 'HPHT Tidak Boleh Kosong!',
            'alamat.required' => 'Alamat Tidak Boleh Kosong!',
            'kelurahan.required' => 'Kelurahan Tidak Boleh Kosong!',
            'posyandu.required' => 'Posyandu Tidak Boleh Kosong!',
            'no_telp.required' => 'No Telepon Tidak Boleh Kosong!'
        ]);

        $nama_pasien = $request->nama;

        $model = new Dataibu;

        $model->nama = $request->nama;
        $model->umur = $request->umur;
        $model->pekerjaan = $request->pekerjaan;
        $model->htpt = $request->htpt;
        $model->nama_suami = $request->nama_suami;
        $model->umur_suami = $request->umur_suami;
        $model->pekerjaan_suami = $request->pekerjaan_suami;
        $model->alamat = $request->alamat;
        $model->kelurahan = $request->kelurahan;
        $model->posyandu = $request->posyandu;
        $model->no_telp = $request->no_telp;

        $model->save();

        return redirect()->route('input-pasien-ibu.index')->with('success','Pasien dengan nama '. $nama_pasien . ' berhasil ditambahkan!');
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
    public function edit(Dataibu $dataibus)
    {
        return view('poliibu.inputpasien.edit', [
            'item' => $dataibus,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dataibu $dataibu)
    {
        $this->validate($request,[
            'nama' => 'required|unique:dataibus,nama',
            'umur' => 'required',
            'pekerjaan' => 'required',
            'htpt' => 'required',
            'nama_suami' => 'max:255',
            'umur_suami' => 'max:255',
            'pekerjaan_suami' => 'max:255',
            'alamat' => 'required',
            'kelurahan' => 'required',
            'posyandu' => 'required',
            'no_telp' => 'required'
        ],[
            'nama.required' => 'Nama Pasien Ibu Tidak Boleh Kosong!',
            'nama.unique' => 'Nama Pasien Ibu Sudah Tersedia!',
            'umur.required' => 'Umur Tidak Boleh Kosong!',
            'pekerjaan.required' => 'Pekerjaan Tidak Boleh Kosong!',
            'htpt.required' => 'HPHT Tidak Boleh Kosong!',
            'alamat.required' => 'Alamat Tidak Boleh Kosong!',
            'kelurahan.required' => 'Kelurahan Tidak Boleh Kosong!',
            'posyandu.required' => 'Posyandu Tidak Boleh Kosong!',
            'no_telp.required' => 'No Telepon Tidak Boleh Kosong!'
        ]);

        $nama_pasien = $request->nama;

        $data = $request->all();
        $dataibu->update($data);

        return redirect()->route('input-pasien-ibu.index')->with('updatesuccess', 'Pasien  '. $nama_pasien .' berhasil di ubah!');
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
}
