<?php

namespace App\Http\Controllers\poliibu;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\poliibu\Proseskehamilan;
use App\Models\poliibu\Riwayatkehamilan;
use App\Models\poliibu\Riwayatpersalinan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Yajra\DataTables\Facades\DataTables;

class ProseskehamilanController extends Controller
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

        return view('poliibu.proseskehamilan.index',[
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

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->proseskehamilan;

        $id_riwayat = 0;

        foreach($data as $item)
        {
            $id_riwayat = (int) $item['id_riwayat'];
                Proseskehamilan::create([
                    'id_riwayat' => $item['id_riwayat'],
                    'id_ibu' => $request->id_ibu,
                    'id_user' => $request->id_user,
                    "tanggal" => $item['tanggal'],
                    "umur_kehamilan" => $item['umur_kehamilan'],
                    "hb" => $item['hb'],
                    'k' => $item['k'],
                    "lila" => $item['lila'],
                    "bb" => $item['bb'],
                    "tinggi_fut" => $item['tinggi_fut'],
                    "letak_janin" => $item['letak_janin'],
                    "dda" => $item['dda'],
                    "keluhan" => $item['keluhan'],
                    "tindakan" => $item['tindakan'],
                    "konseling" => $item['konseling'],
                    "nr" => $item['nr'],
                    "paraf" => $item['paraf'],
                ]);
        }
        return Redirect::to('poli-ibu/proseskehamilan-add/'.$id_riwayat);

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

    public function addData($id)
    {
        $model = Riwayatkehamilan::with('ibu')->find($id);
        $data = Proseskehamilan::where('id_riwayat',$id)->latest()->get();

        if(request()->ajax())
        {
            $data = Proseskehamilan::where('id_riwayat',$id)->latest()->get();

            return DataTables::of($data)->make(true);
        }

        return view('poliibu.proseskehamilan.create',[
            'model' => $model,
            'data' => $data,
            'id' => $id
        ]);
    }

    public function getRiwayat($id)
    {
        $data = Riwayatpersalinan::where('id_riwayat',$id)->latest()->get();



        if(request()->ajax())
        {
            $data = Riwayatpersalinan::where('id_riwayat',$id)->latest()->get();

            return DataTables::of($data)->make(true);
        }

        return response()->json($data);


    }

}
