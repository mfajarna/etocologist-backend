<?php

namespace App\Http\Controllers\Poliumum;

use Illuminate\Http\Request;
use App\Models\Poliumum\Poliumum;
use App\Models\poliibu\Inputpasien;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Yajra\DataTables\Facades\DataTables;

class PoliumumController extends Controller
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
            $data = Inputpasien::latest()->get();

            return DataTables::of($data)->make(true);
        }


        return view('poliumum.index');
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
        $data = $request->keadaan;
        $id = $request->id_ibu;

        foreach($data as $item)
        {
            Poliumum::create([
                'id_ibu' => $id,
                'tanggal' => $item['tanggal'],
                'keluhan' => $item['keluhan'],
                'tensi' => $item['tensi'],
                'bb' => $item['bb'],
                'lab'=> $item['lab'],
                'pemeriksaan' => $item['pemeriksaan'] ,
                'theraphi' => $item['theraphi'],
                'ket' => $item['theraphi'],
            ]);
        }

        return Redirect::to('poli-umum/tambah-keadaan/'.$id);
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

    public function tambahKeadaan($id)
    {



        return view('Poliumum.tambahkeadaan',[
            'id' => $id
        ]);
    }

    public function getData($id)
    {

        if(request()->ajax())
        {
            $data = Poliumum::where('id_ibu',$id)->latest()->get();

            return DataTables::of($data)->make(true);
        }
    }

    public function cetak($id)
    {
        $model = Poliumum::with('ibu')->where('id_ibu', $id)->latest()->get();

        $nama = '';
        $umur = '';
        $no_telp = '';
        $alamat = '';

        foreach($model as $item)
        {
            $nama = $item->ibu->nama;
            $umur = $item->ibu->umur;
            $no_telp = $item->ibu->no_telp;
            $alamat = $item->ibu->alamat;
        }


        return view('Poliumum.cetak',[
            'model' => $model,
            'nama' => $nama,
            'umur' => $umur,
            'no_telp' => $no_telp,
            'alamat' => $alamat
        ]);
    }
}
