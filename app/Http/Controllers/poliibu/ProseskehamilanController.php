<?php

namespace App\Http\Controllers\poliibu;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\poliibu\Proseskehamilan;
use App\Models\poliibu\Riwayatkehamilan;
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

        $tanggal = '';
        $umur_kehamilan = 0;
        $hb = '';
        $lila = '';
        $bb = 0;
        $tinggi_fut = 0;
        $letak_janin = '';
        $dda = '';
        $keluhan = '';
        $tindakan = '';
        $konseling = '';
        $nr = '';
        $paraf = '';


        dd($data);

        foreach($data as $item)
        {
            $tanggal = $item['tanggal'];
            $umur_kehamilan = $item['umur_kehamilan'];
            $hb = $item['hb'];
            $lila = $item['lila'];
            $bb = $item['bb'];
            $tinggi_fut = $item['tinggi_fut'];
            $letak_janin = $item['letak_janin'];
            $dda = $item['dda'];
            $keluhan = $item['keluhan'];
            $tindakan = $item['tindakan'];
            $konseling = $item['konseling'];
            $nr = $item['n/r'];
            $paraf = $item['paraf'];
        }

        // $item = [$tanggal,$umur_kehamilan, $hb, $lila,$bb,$tinggi_fut,$letak_janin,$dda,$keluhan,$tindakan,$konseling,$nr,$paraf];

        // dd($item);



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
        $data = Riwayatkehamilan::find($id);
        return view('poliibu.proseskehamilan.create',[
            'data' => $data
        ]);
    }

}
