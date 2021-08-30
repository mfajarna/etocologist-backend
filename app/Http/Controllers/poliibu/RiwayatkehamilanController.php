<?php

namespace App\Http\Controllers\poliibu;

use Illuminate\Http\Request;
use App\Models\poliibu\Inputpasien;
use App\Http\Controllers\Controller;
use App\Models\poliibu\Proseskehamilan;
use App\Models\poliibu\Riwayatkehamilan;
use Illuminate\Support\Facades\Redirect;
use Yajra\DataTables\Facades\DataTables;
use App\Models\poliibu\Riwayatpersalinan;

class RiwayatkehamilanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $data = Riwayatkehamilan::with('ibu')->latest()->get();
        if(request()->ajax())
        {
            $data = Riwayatkehamilan::with('ibu')->latest()->get();

            return DataTables::of($data)->make(true);
        }

        return view('poliibu.riwayatkehamilan.index',[
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

        $this->validate($request, [
            'id_ibu' => 'required|unique:riwayatkehamilans,id_ibu',
            'gpa' => 'required',
            'jarak_kehamilan' => 'required',
            'siklus_haid' => 'required',
            'tinggi_badan' => 'required',
            'kb_sebelum_hamil' => 'required',
            'riwayat_penyakit' => 'required',
        ],
        [
            'id_ibu.required' => 'Nama Pasien Ibu Tidak Boleh Kosong!',
            'id_ibu.unique' => 'Nama Pasien Ibu Sudah Ada',
            'gpa.required' => 'GPA Tidak Boleh Kosong!',
            'jarak_kehamilan.required' => 'Jarak Kehamilan Tidak Boleh Kosong!',
            'siklus_haid.required' => 'Siklus HaidTidak Boleh Kosong!',
            'tinggi_badan.required' => 'Tinggi Badang Tidak Boleh Kosong!',
            'kb_sebelum_hamil.required' => 'Kb Sebelum Hamil Tidak Boleh Kosong!',
            'riwayat_penyakit.required' => 'Riwayat Penyakit Tidak Boleh Kosong!',
        ]);

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

        $id = $model->id;

        $riwayatKehamilan = $request->riwayatkehamilans;

        foreach($riwayatKehamilan as $riwayat)
        {
            Riwayatpersalinan::create([
                'id_riwayat' => $id,
                'no' => $riwayat['no_riwayat'],
                'umur' => $riwayat['umur_riwayat'],
                'partus' => $riwayat['partus_riwayat'],
                'cara' => $riwayat['cara_riwayat'],
                'keterangan' => $riwayat['ket_riwayat']
            ]);
        }

        return redirect()->route('riwayatkehamilan.index')->with('updatesuccess', 'Riwayat Kehamilan Pasien berhasil di Tambahkan!');
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
        $model = Riwayatkehamilan::with('ibu')->find($id);

        return view('poliibu.riwayatkehamilan.edit',[
            'model' => $model
        ]);
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

    public function hapus(Request $request)
    {
         $data = Riwayatkehamilan::find($request->input('id'));
         $data2 = Proseskehamilan::where('id_riwayat', $request->input('id'))->get();

        if($data && $data2){
            $data->each->delete();
            $data->each->delete();
        }
    }

    public function getDataPasien(Request $request)
    {
        $id = $request->input('id');
        $model = Inputpasien::find($id);

        return response()->json($model);
    }

    public function editDataRiwayat($id)
    {
        $model = Riwayatkehamilan::with('ibu')->find($id);

        return view('poliibu.riwayatkehamilan.edit',[
            'model' => $model
        ]);
    }

    public function addNewDataRiwayat(Request $request)
    {
        $riwayatkehamilan = $request->riwayatkehamilanupdate;

        foreach($riwayatkehamilan as $riwayat)
        {
            Riwayatpersalinan::create([
                'id_riwayat' => $request->id_riwayat,
                'no' => $riwayat['no_riwayat'],
                'umur' => $riwayat['umur_riwayat'],
                'partus' => $riwayat['partus_riwayat'],
                'cara' => $riwayat['cara_riwayat'],
                'keterangan' => $riwayat['ket_riwayat']
            ]);
        }

         return Redirect::to('poli-ibu/riwayatkehamilan/'.$request->id_riwayat.'/edit');
    }
}
