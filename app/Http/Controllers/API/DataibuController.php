<?php

namespace App\Http\Controllers\API;

use Exception;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\antrian\Antrianpoliibu;
use App\Models\poliibu\Proseskehamilan;
use App\Models\poliibu\Riwayatkehamilan;

class DataibuController extends Controller
{
    public function all(Request $request)
    {
        $limit = $request->input('limit', 100);
        $id = $request->input('id');

        $model = Proseskehamilan::with(['ibu','riwayat'])
                            ->where('id_user', Auth::user()->id);

        if($id)
        {
            $model = Proseskehamilan::with('ibu')->find($id);

            if($model)
            {
                return ResponseFormatter::success(
                    $model,
                    'Data Transaksi Berhasil Di Ambil'
                );
            }else{
                return ResponseFormatter::error([
                    null,
                    'Data Transaksi Tidak Ada',
                    404
                ]);
            }
        }

        return ResponseFormatter::success(
            $model->paginate($limit),
            'Data List Ibu Berhasil Di Ambil!'
        );
    }

    public function getGrafik()
    {

        $data = DB::table('proseskehamilans')
                    ->select('umur_kehamilan','bb')
                    ->where('id_user', Auth::user()->id)
                    ->get();

                return ResponseFormatter::success(
                    $data,
                    'Data Grafik Berhasil Di Ambil'
                );
    }

    public function getAntrian()
    {
        $no_poliibu = Antrianpoliibu::max('no_antrian');

        if($no_poliibu)
        {
            $nilai_kode = substr($no_poliibu,7);
            $kode = (int) $nilai_kode;
            $kode = $kode+1;
            $antrian_poliibu = "POLIIBU".str_pad($kode,3,"0",STR_PAD_LEFT);
        }else{
            $antrian_poliibu = 'POLIIBU001';
        }

         return ResponseFormatter::success(
                    $antrian_poliibu,
                    'Data Grafik Berhasil Di Ambil'
        );

    }

    public function antrianPoliIbu(Request $request)
    {
        try{
            $request->validate([
                'id_ibu' => 'required',
                'no_antrian' => 'required',
                'nama_poli' => 'required',
                'status' => 'required'
            ]);

            $antrian = Antrianpoliibu::create([
                'id_ibu' => $request->id_ibu,
                'no_antrian' => $request->no_antrian,
                'nama_poli' => $request->no_antrian,
                'status' => $request->status
            ]);

            return ResponseFormatter::success($antrian, 'Berhasil input data');
        }catch(Exception $e)
       {
           return ResponseFormatter::error($e->getMessage(),'Gagal Input Data');
       }
    }

    public function getDataAntrian(Request $request)
    {
        try{
        $id_ibu = $request->input('id_ibu');

        $data = Antrianpoliibu::with('ibu')
                ->where('id_ibu', $id_ibu)
                ->where('status', 'MENUNGGU')
                ->latest()->get();

         return ResponseFormatter::success($data, 'Berhasil Ambil data');
        }catch(Exception $e)
       {
           return ResponseFormatter::error($e->getMessage(),'Gagal Ambil Data');
       }

    }
}
