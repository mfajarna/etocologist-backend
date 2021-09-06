<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\poliibu\Proseskehamilan;
use Illuminate\Support\Facades\Auth;
use App\Models\poliibu\Riwayatkehamilan;
use Illuminate\Support\Facades\DB;

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

    public function getGrafik(Request $request)
    {
        $limit = $request->input('limit', 100);
        $id = $request->input('id');

        $data = DB::table('proseskehamilans')
                    ->select('umur_kehamilan','bb')
                    ->where('id_user', Auth::user()->id)
                    ->get();

                return ResponseFormatter::success(
                    $data,
                    'Data Grafik Berhasil Di Ambil'
                );

    }
}
