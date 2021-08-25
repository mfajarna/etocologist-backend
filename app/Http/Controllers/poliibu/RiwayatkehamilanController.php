<?php

namespace App\Http\Controllers\poliibu;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\poliibu\Inputpasien;
use App\Models\poliibu\Riwayatkehamilan;
use Yajra\DataTables\Facades\DataTables;

class RiwayatkehamilanController extends Controller
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
            $data = Riwayatkehamilan::latest()->get();

            return DataTables::of($data)->make(true);
        }

        return view('poliibu.riwayatkehamilan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = Inputpasien::all();

        return view('poliibu.riwayatkehamilan.create',[
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
        $model = new Riwayatkehamilan;

        $model->id_ibu = $request->id_ibu;
        $model->gpa = $request->gpa;
        $model->jarak_kehamilan = $request->jarak_kehamilan;
        $model->siklus_haid = $request->siklus_haid;
        $model->tinggi_badan = $request->tinggi_badan;
        $model->kb_sebelum_hamil = $request->kb_sebelum_hamil;
        $model->riwayat_penyakit = $request->riwayat_penyakit;
        $model->riwayat_persalinan = $request->riwayatkehamilans;

        $model->save();
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
}
