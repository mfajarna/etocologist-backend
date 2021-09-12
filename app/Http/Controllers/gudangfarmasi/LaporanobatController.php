<?php

namespace App\Http\Controllers\gudangfarmasi;

use Illuminate\Http\Request;
use App\Models\gudangfarmasi\Obat;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\gudangfarmasi\Laporanobat;
use Yajra\DataTables\Facades\DataTables;

class LaporanobatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $obat = Obat::all();

        if(request()->ajax()){
             $input = $request->filter_tanggal_periode;
             $bln = date('m', strtotime($input));
             $tahun = date('Y');

            // $data = Laporanobat::with(['obat','informasiobat'])->latest()->get();
            if(!empty($request->filter_jenis_obat))
            {
                $data = DB::table('laporanobats')
                        ->join('informasiobats', 'laporanobats.id_informasiobat', '=' , 'informasiobats.id')
                        ->where('nama_obat', $request->filter_jenis_obat)
                        ->whereMonth('tgl_keluar_obat', $bln)
                        ->whereYear('tgl_keluar_obat', $tahun)
                        ->get();
            }else{

             $data = DB::table('laporanobats')
                        ->join('informasiobats', 'laporanobats.id_informasiobat', '=' , 'informasiobats.id')
                        ->get();
            }

            return datatables()->of($data)->make(true);
        }



        return view('master.gudangfarmasi.laporanobat.index',[
            'obat' => $obat,
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
}
