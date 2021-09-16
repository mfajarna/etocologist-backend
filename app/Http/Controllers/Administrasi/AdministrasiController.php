<?php

namespace App\Http\Controllers\Administrasi;

use Illuminate\Http\Request;
use App\Models\rujukan\Detailobat;
use Illuminate\Support\Facades\DB;
use App\Models\poliibu\Inputpasien;
use App\Http\Controllers\Controller;
use App\Models\administrasi\Checkout;
use App\Models\antrian\Antrianpolianak;
use App\Models\antrian\Antrianpoliibu;
use App\Models\antrian\Antrianpolimassas;
use App\Models\antrian\Antrianpoliumum;
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
        $model= Checkout::with(['ibu','rujukan'])->where('id', $id)->get();


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


    public function AntrianPoli(Request $request)
    {
        $model = Inputpasien::all();

        $no_polianak = Antrianpolianak::max('no_antrian');
        $no_poliibu = Antrianpoliibu::max('no_antrian');
        $no_poliumum = Antrianpoliumum::max('no_antrian');
        $no_polimassas = Antrianpolimassas::max('no_antrian');


        if($no_polianak)
        {
            $nilai_kode = substr($no_polianak,8);
            $kode = (int) $nilai_kode;
            $kode = $kode+1;
            $antrian_polianak = "POLIANAK".str_pad($kode,3,"0",STR_PAD_LEFT);
        }else{
            $antrian_polianak = 'POLIANAK001';
        }

        if($no_poliibu)
        {
            $nilai_kode = substr($no_poliibu,7);
            $kode = (int) $nilai_kode;
            $kode = $kode+1;
            $antrian_poliibu = "POLIIBU".str_pad($kode,3,"0",STR_PAD_LEFT);
        }else{
            $antrian_poliibu = 'POLIIBU001';
        }

        if($no_poliumum)
        {
            $nilai_kode = substr($no_poliumum,8);
            $kode = (int) $nilai_kode;
            $kode = $kode+1;
            $antrian_poliumum = "POLIUMUM".str_pad($kode,3,"0",STR_PAD_LEFT);
        }else{
            $antrian_poliumum = 'POLIUMUM001';
        }

        if($no_polimassas)
        {
            $nilai_kode = substr($no_polimassas,10);
            $kode = (int) $nilai_kode;
            $kode = $kode+1;
            $antrian_polimassas = "POLIMASSAS".str_pad($kode,3,"0",STR_PAD_LEFT);
        }else{
            $antrian_polimassas = 'POLIMASSAS001';
        }


        return view('Administrasi.antrian',[
            'model' => $model,
            'polianak' => $antrian_polianak,
            'poliibu' => $antrian_poliibu,
            'poliumum' => $antrian_poliumum,
            'polimassas' => $antrian_polimassas
        ]);
    }

    public function tambahAntrianPoli(Request $request)
    {
        $this->validate($request,[
            'id_ibu' => 'required',
            'nama_poli' => 'required',
        ],[
            'id_ibu.required' => 'Nama Ibu Tidak Boleh Kosong!',
            'nama_poli.required' => 'Nama Poli Tujuan Tidak Boleh Kosong!'
        ]);

        $nama_poli = $request->nama_poli;

        if($nama_poli === 'Poli Anak')
        {
            $model = new Antrianpolianak;
            $model->id_ibu = $request->id_ibu;
            $model->no_antrian = $request->no_antrian;
            $model->status = "MENUNGGU";
            $model->nama_poli = $nama_poli;

            $model->save();
            return redirect()->route('pasien.antrian')->with('success','Antrian '. $request->no_antrian . ' berhasil ditambahkan!');
        }
        if($nama_poli === 'Poli Ibu')
        {
            $model = new Antrianpoliibu;
            $model->id_ibu = $request->id_ibu;
            $model->no_antrian = $request->no_antrian;
            $model->status = "MENUNGGU";
            $model->nama_poli = $nama_poli;

            $model->save();
            return redirect()->route('pasien.antrian')->with('success','Antrian '. $request->no_antrian . ' berhasil ditambahkan!');
        }
        if($nama_poli === 'Poli Umum')
        {
            $model = new Antrianpoliumum;
            $model->id_ibu = $request->id_ibu;
            $model->no_antrian = $request->no_antrian;
            $model->status = "MENUNGGU";
            $model->nama_poli = $nama_poli;

            $model->save();
            return redirect()->route('pasien.antrian')->with('success','Antrian '. $request->no_antrian . ' berhasil ditambahkan!');
        }
        if($nama_poli === 'Poli Massas')
        {
            $model = new Antrianpolimassas;
            $model->id_ibu = $request->id_ibu;
            $model->no_antrian = $request->no_antrian;
            $model->status = "MENUNGGU";
            $model->nama_poli = $nama_poli;

            $model->save();
            return redirect()->route('pasien.antrian')->with('success','Antrian '. $request->no_antrian . ' berhasil ditambahkan!');
        }


    }
}
