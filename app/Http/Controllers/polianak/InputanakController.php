<?php

namespace App\Http\Controllers\polianak;

use Illuminate\Http\Request;
use App\Models\polianak\Inputanak;
use App\Models\poliibu\Inputpasien;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class InputanakController extends Controller
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
            $data = Inputanak::with('ibu')->latest()->get();

            return DataTables::of($data)->make(true);
        }

        return view('polianak.pelayanananak.inputanak.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = Inputpasien::all();
        return view('polianak.pelayanananak.inputanak.create',[
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
        $nama_pasien = $request->nama;

        $this->validate($request, [
            'id_ibu' => 'required',
            'nama' => 'required|unique:inputanaks,nama',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'bb' => 'required',
            'bblr' => 'required',
            'keadaan_lahir' => 'required',
            'lahir_di' => 'required',
            'proses_lahir' => 'required',
            'ditolong_oleh' => 'required',
            'letak_janin' => 'required',
            'jenis_imunisasi' => 'required',
            'cara_lahir' => 'required',
        ],[
            'id_ibu.required' => 'Nama Ibu Tidak Boleh Kosong!',
            'nama.required' => 'Nama Anak Tidak Boleh Kosong!',
            'nama.unique' => 'Nama Anak Sudah Ada!',
            'jenis_kelamin.required' => 'Jenis Kelamin Tidak Boleh Kosong!',
            'bb.required' => 'Berat Badan Tidak Boleh Kosong!',
            'bblr.required' => 'BBLR Tidak Boleh Kosong!',
            'keadaan_lahir.required' => 'Keadaan Lahir Tidak Boleh Kosong!',
            'lahir_di.required' => 'Tempat Lahir Tidak Boleh Kosong!',
            'proses_lahir.required' => 'Proses Lahir Tidak Boleh Kosong!',
            'ditolong_oleh.required' => 'Ditolong Oleh Tidak Boleh Kosong!',
            'letak_janin.required' => 'Letak Janin Tidak Boleh Kosong!',
            'jenis_imunisasi.required' => 'Jenis Imunisasi Tidak Boleh Kosong!',
            'cara_lahir.required' => 'Cara Lahir Tidak Boleh Kosong!',
        ]);

        Inputanak::create([
            'id_ibu' => $request->id_ibu,
            'nama' => ucwords($request->nama),
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'bb' => $request->bb,
            'bblr' => $request->bblr,
            'keadaan_lahir' => $request->keadaan_lahir,
            'proses_lahir' => $request->proses_lahir,
            'letak_janin' => $request->letak_janin,
            'cara_lahir' => $request->cara_lahir,
            'lahir_di' => $request->lahir_di,
            'ditolong_oleh' => $request->ditolong_oleh,
            'jenis_imunisasi' => $request->jenis_imunisasi,
            'tempat_lahir' => $request->lahir_di
        ]);

        return redirect()->route('inputanak.index')->with('success','Anak dengan nama '. $nama_pasien . ' berhasil ditambahkan!');
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

    public function getDataPasien(Request $request)
    {
        $id = $request->input('id');
        $model = Inputpasien::find($id);

        return response()->json($model);
    }

    public function hapus(Request $request)
    {
         $data = Inputanak::find($request->input('id'));

        if($data){
            $data->each->delete();
        }
    }
}
