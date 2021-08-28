<?php

namespace App\Http\Controllers\poliibu;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Models\poliibu\Proseskehamilan;
use App\Models\poliibu\Riwayatkehamilan;
use App\Models\poliibu\Riwayatpersalinan;

class PemantauankehamilanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Proseskehamilan::with('riwayat')->latest()->get();

        if(request()->ajax())
        {
            $data = Proseskehamilan::with('riwayat')->latest()->get();

            return DataTables::of($data)->make(true);
        }

        return view('poliibu.grafik.index',[
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

    public function pemantauan($id)
    {
        $model = Riwayatkehamilan::with('ibu')->find($id);
        $data = Proseskehamilan::where('id_riwayat',$id)->latest()->get();

        if(request()->ajax())
        {
            $data = Proseskehamilan::where('id_riwayat',$id)->latest()->get();

            return DataTables::of($data)->make(true);
        }

        return view('poliibu.grafik.create',[
            'model' => $model,
            'data' => $data,
            'id' => $id
        ]);
    }

    public function cetakPdf($id)
    {
        $model = Riwayatkehamilan::with('ibu')->find($id);
        $data = Proseskehamilan::where('id_riwayat',$id)->latest()->get();
        $riwayat = Riwayatpersalinan::where('id_riwayat', $id)->latest()->get();

        return view('poliibu.grafik.cetak',[
            'model' => $model,
            'data' => $data,
            'id' => $id,
            'riwayat' => $riwayat
        ]);
    }
}
