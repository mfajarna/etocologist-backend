<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Models\polianak\Inputanak;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DataanakController extends Controller
{
    public function getAnak()
    {
        $model = Inputanak::with(['ibu'])
                            ->where('id_user_ibu', Auth::user()->id);

        return ResponseFormatter::success(
            $model,
            'Data Transaksi Berhasil Di Ambil'
        );
    }

}
