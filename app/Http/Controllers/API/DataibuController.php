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

        $model = Riwayatkehamilan::with('ibu')->all();



        return ResponseFormatter::success(
            $model->paginate($limit),
            'Data List Ibu Berhasil Di Ambil!'
        );
    }
}
