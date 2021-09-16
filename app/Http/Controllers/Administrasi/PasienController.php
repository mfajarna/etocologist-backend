<?php

namespace App\Http\Controllers\Administrasi;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\poliibu\Inputpasien;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Actions\Fortify\PasswordValidationRules;
use App\Models\administrasi\Politujuan;
use Yajra\DataTables\Facades\DataTables;

class PasienController extends Controller

{
    use PasswordValidationRules;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('administrasi.pasien.index');
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
            'no_telp.required' => 'No Telepon Tidak Boleh Kosong!',
        ]);

        $model = new Inputpasien;
        $model2 = new User;

        $no = Politujuan::max('no');



        if($no == null)
        {
            $no = 1;
        }else if($no != null){
            $no++;
        }



        $no_antrian = '';

        if($request->nama_poli_tujuan == 'Poli Ibu'){
            $no_antrian = "POLIIBU_".$no;
        }if($request->nama_poli_tujuan == 'Poli Anak'){
            $no_antrian = "POLIANAK_".$no;
        }if($request->nama_poli_tujuan == 'Poli Umum'){
            $no_antrian = "POLIUMUM_".$no;
        }

        // dd($no_antrian);


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
        $id_ibu = $model->id;

        $model2->name = $request->nama;
        $model2->email = $request->email;
        $model2->id_pasien = $request->id_ibu;
        $model2->password = Hash::make($request->password);
        $model2->is_messages = 0;
        $model2->pwd = $request->password;
        $model2->role_id = 5;

        $model2->save();
        $id_user = $model2->id;

        $pasien = Inputpasien::findOrFail($id_ibu);
        $pasien->id_user = $id_user;
        $pasien->save();

        $nama_pasien = $request->nama;


        return redirect()->route('pasien.index')->with('success','Pasien dengan nama '. $nama_pasien . ' berhasil ditambahkan!');

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

    public function antrian(Request $request)
    {


        if(request()->ajax()){
            $model = Politujuan::with('ibu')->where('status','MENUNGGU')->latest()->get();

            return DataTables::of($model)
            ->editColumn('created_at', function ($request){
                 return $request->created_at->format('Y-m-d H:i');
            })
            ->make(true);
        }

        return view('administrasi.pasien.antrian');
    }
}
