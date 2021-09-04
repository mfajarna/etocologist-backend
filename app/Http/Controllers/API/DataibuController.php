<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\poliibu\Riwayatkehamilan;

class DataibuController extends Controller
{
    public function all(Request $request)
    {
        $limit = $request->input('limit', 100);
        $id = $request->input('id');

        $model = Riwayatkehamilan::with('ibu')
                            ->where('id_ibu', Auth::user()->id);

        if($id)
        {
            $model = Riwayatkehamilan::with('ibu')->find($id);

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
}
