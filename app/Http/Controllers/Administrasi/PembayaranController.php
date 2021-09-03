<?php

namespace App\Http\Controllers\Administrasi;

use Illuminate\Http\Request;
use App\Models\rujukan\Rujukan;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\gudangfarmasi\Informasiobat;
use App\Models\rujukan\Detailobat;
use App\Models\rujukan\Detailrujukan;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('administrasi.pembayaran.index');
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
        $total_bayar = $request->total_bayar;
        $total_pembayaran = $request->total_pembayaran;

        if($total_bayar < $total_pembayaran)
        {
            return redirect()->route('pembayaran.index')->with('fail','Gagal Melakukan Transaksi, Total Bayar Tidak Mencukupi!');
        }else{
            return redirect()->route('pembayaran.index')->with('success','Berhasil Melakukan Transaksi!');
        }
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

    public function getKodeRujukan(Request $request)
    {
        $kode_rujukan = $request->kode_rujukan;

        $model = Rujukan::with('ibu')->where('kode_rujukan', $kode_rujukan)->get()->toArray();

        return response()->json($model);
    }

    public function pembayaran($id)
    {
        $model = Detailrujukan::with('ibu','rujukan','layanan')->where('id_rujukan', $id)->latest()->get();
        $model_obat = Detailobat::with('ibu','rujukan','obat','informasiobat')->where('id_rujukan', $id)->latest()->get();



        $sum = DB::table('detailrujukans')
                ->join('layanans','detailrujukans.id_layanan', '=' ,'layanans.id')
                ->where('id_rujukan', $id)
                ->sum('harga');

        $sum2 = DB::table('detailobats')
                ->join('informasiobats','detailobats.id_informasiobat', '=' , 'informasiobats.id')
                ->sum(DB::raw('detailobats.quantity * informasiobats.harga'));

        $total_bayar = $sum + $sum2;


        return view('administrasi.pembayaran.create',[
            'model' => $model,
            'sum' => $sum,
            'sum2' => $sum2,
            'model_obat' => $model_obat,
            'total_bayar' => $total_bayar
        ]);
    }
}
