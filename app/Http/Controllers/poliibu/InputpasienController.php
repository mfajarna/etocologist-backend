<?php

namespace App\Http\Controllers\poliibu;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\layanan\Layanan;
use App\Models\poliibu\Dataibu;
use App\Models\rujukan\Rujukan;
use App\Models\poliibu\Inputpasien;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\poliibu\Proseskehamilan;
use App\Models\poliibu\Riwayatkehamilan;
use Yajra\DataTables\Facades\DataTables;
use App\Actions\Fortify\PasswordValidationRules;
use App\Models\antrian\Antrianpoliibu;
use App\Models\rujukan\Detailobat;
use App\Models\rujukan\Detailrujukan;

class InputpasienController extends Controller
{
    use PasswordValidationRules;

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

        return view('poliibu.inputpasien.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = Inputpasien::all();

        return view('poliibu.inputpasien.create',[
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
        $this->validate($request,[
            'nama' => 'required|unique:dataibus,nama',
            'umur' => 'required',
            'pekerjaan' => 'required',
            'htpt' => 'required',
            'nama_suami' => 'max:255',
            'umur_suami' => 'max:255',
            'pekerjaan_suami' => 'max:255',
            'alamat' => 'required',
            'kelurahan' => 'required',
            'posyandu' => 'required',
            'no_telp' => 'required',
            'email' => 'required|string|email|unique:users,email',
            'password' => $this->passwordRules(),
        ],[
            'nama.required' => 'Nama Pasien Ibu Tidak Boleh Kosong!',
            'nama.unique' => 'Nama Pasien Ibu Sudah Tersedia!',
            'umur.required' => 'Umur Tidak Boleh Kosong!',
            'pekerjaan.required' => 'Pekerjaan Tidak Boleh Kosong!',
            'htpt.required' => 'HPHT Tidak Boleh Kosong!',
            'alamat.required' => 'Alamat Tidak Boleh Kosong!',
            'kelurahan.required' => 'Kelurahan Tidak Boleh Kosong!',
            'posyandu.required' => 'Posyandu Tidak Boleh Kosong!',
            'no_telp.required' => 'No Telepon Tidak Boleh Kosong!'
        ]);

        $nama_pasien = $request->nama;

        $model = new Inputpasien;

        $model->nama = $request->nama;
        $model->umur = $request->umur;
        $model->pekerjaan = $request->pekerjaan;
        $model->htpt = $request->htpt;
        $model->nama_suami = $request->nama_suami;
        $model->umur_suami = $request->umur_suami;
        $model->pekerjaan_suami = $request->pekerjaan_suami;
        $model->alamat = $request->alamat;
        $model->kelurahan = $request->kelurahan;
        $model->posyandu = $request->posyandu;
        $model->no_telp = $request->no_telp;

        $model->save();

        $id_pasien = $model->id;

        User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'id_pasien' => $id_pasien,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('inputpasien.index')->with('success','Pasien dengan nama '. $nama_pasien . ' berhasil ditambahkan!');
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
    public function edit(Inputpasien $inputpasien)
    {
        return view('poliibu.inputpasien.edit', [
            'item' => $inputpasien,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inputpasien $inputpasien)
    {
        $this->validate($request,[
            'nama' => 'required',
            'umur' => 'required',
            'pekerjaan' => 'required',
            'htpt' => 'required',
            'nama_suami' => 'max:255',
            'umur_suami' => 'max:255',
            'pekerjaan_suami' => 'max:255',
            'alamat' => 'required',
            'kelurahan' => 'required',
            'posyandu' => 'required',
            'no_telp' => 'required'
        ],[
            'nama.required' => 'Nama Pasien Ibu Tidak Boleh Kosong!',
            'nama.unique' => 'Nama Pasien Ibu Sudah Tersedia!',
            'umur.required' => 'Umur Tidak Boleh Kosong!',
            'pekerjaan.required' => 'Pekerjaan Tidak Boleh Kosong!',
            'htpt.required' => 'HPHT Tidak Boleh Kosong!',
            'alamat.required' => 'Alamat Tidak Boleh Kosong!',
            'kelurahan.required' => 'Kelurahan Tidak Boleh Kosong!',
            'posyandu.required' => 'Posyandu Tidak Boleh Kosong!',
            'no_telp.required' => 'No Telepon Tidak Boleh Kosong!'
        ]);

        $nama_pasien = $request->nama;

        $data = $request->all();
        $inputpasien->update($data);

        return redirect()->route('inputpasien.index')->with('updatesuccess', 'Pasien  '. $nama_pasien .' berhasil di ubah!');
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

    public function deleteData(Request $request)
    {
        $data = Inputpasien::find($request->input('id'));
        $data2 = User::where('id_pasien', $request->input('id'))->get();
        $data3 = Riwayatkehamilan::where('id_ibu', $request->input('id'))->get();
        $data4 = Proseskehamilan::where('id_ibu', $request->input('id'))->get();

        if($data){
            $data->each->delete();
            $data2->each->delete();
            $data3->each->delete();
            $data4->each->delete();
        }
    }

    public function rujukanApotek(Request $request)
    {
        $model = Inputpasien::all();
        $cari_kode = Rujukan::max('kode_rujukan');

        if($cari_kode)
        {
            $nilai_kode = substr($cari_kode,3);
            $kode = (int) $nilai_kode;
            $kode = $kode+1;
            $hasil_kode = "RUJ".str_pad($kode,3,"0",STR_PAD_LEFT);
        }else{
            $hasil_kode = 'RUJ001';
        }

        return view('poliibu.rujukan.index', [
            'hasil_kode' => $hasil_kode,
            'model' => $model
        ]);
    }

    public function getLayanan(Request $request)
    {
        $id = $request->input('id');
        $model = Layanan::find($id);

        return response()->json($model);

    }

    public function addRujukan(Request $request)
    {
        $rujukan = $request->data_keluhan;
        $obat = $request->data_obat;

        $id_ibu = $request->id_ibu;

        $model = new Rujukan;

        $model->id_ibu = $id_ibu;
        $model->kode_rujukan = $request->kode_rujukan;
        $model->catatan_obat = $request->catatan_obat;
        $model->status = "BELUM DIBAYAR";


        $model->save();
        $id_rujukan = $model->id;

        foreach($rujukan as $item)
        {
            Detailrujukan::create([
                'id_rujukan' => $id_rujukan,
                'id_layanan' => $item['nama_layanan'],
                'id_ibu' => $id_ibu
            ]);
        }

        foreach($obat as $data)
        {


            Detailobat::create([
                'id_rujukan' => $id_rujukan,
                'id_informasiobat' => $data['nama_obat'],
                'quantity' => $data['quantity'],
                'id_ibu' => $id_ibu,
            ]);
        }

        return redirect()->route('inputpasien.index')->with('success','Rujukan dengan kode '. $request->kode_rujukan . ' berhasil!');
    }

        public function getData(Request $request)
    {

         $data = Antrianpoliibu::with('ibu')->latest()->get();
        if(request()->ajax()){
            $data = Antrianpoliibu::with('ibu')->where('status', 'MENUNGGU')->latest()->get();

            return DataTables::of($data)
            ->addColumn('aksi', function($data){
                $button = "<button class='update btn btn-danger' id='". $data->id ."'>SELESAI</button>";

                return $button;
            })
            ->rawColumns(['aksi'])
            ->make(true);
        }

        return view('poliibu.index');
    }

    public function editData(Request $request)
    {
        $id = $request->id;
        $model = Antrianpoliibu::find($id);

        $model->status = "SELESAI";

        $model->save();
    }
}
