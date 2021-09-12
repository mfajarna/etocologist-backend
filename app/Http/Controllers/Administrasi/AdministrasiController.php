<?php

namespace App\Http\Controllers\Administrasi;

use Illuminate\Http\Request;
use App\Models\rujukan\Detailobat;
use Illuminate\Support\Facades\DB;
use App\Models\poliibu\Inputpasien;
use App\Http\Controllers\Controller;
use App\Models\administrasi\Checkout;
use App\Models\rujukan\Detailrujukan;
use Yajra\DataTables\Facades\DataTables;

class AdministrasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = Inputpasien::count();
        $sum = DB::table('checkouts')->sum('total_harga_pembayaran');

        if(request()->ajax())
        {
            $data = Checkout::with('ibu')->latest()->get();
            return DataTables::of($data)->make(true);
        }

        return view('administrasi.index',[
            'model' => $model,
            'sum' => $sum
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

    public function cetakInvoice($id)
    {
        $model= Checkout::with(['ibu','rujukan'])->latest()->get();

        $id_rujukan = 0;

        foreach($model as $item)
        {
            $id_rujukan = $item->rujukan->id;
        }

        $detail_obat = Detailobat::with('obat','informasiobat')->where('id_rujukan', $id_rujukan)->latest()->get();
        $layanan = Detailrujukan::with('layanan')->where('id_rujukan', $id_rujukan)->latest()->get();

        $sum = DB::table('detailrujukans')
        ->join('layanans','detailrujukans.id_layanan', '=' ,'layanans.id')
        ->where('id_rujukan', $id_rujukan)
        ->sum('harga');

        $sum2 = DB::table('detailobats')
        ->join('informasiobats','detailobats.id_informasiobat', '=' , 'informasiobats.id')
        ->sum(DB::raw('detailobats.quantity * informasiobats.harga'));

        $total_bayar = $sum + $sum2;

        return view('administrasi.pembayaran.cetak',[
            'model' => $model,
            'detail_obat' => $detail_obat,
            'layanan' => $layanan,
            'sum' => $sum,
            'sum2' => $sum2,
            'total_bayar' => $total_bayar
        ]);
    }
}
