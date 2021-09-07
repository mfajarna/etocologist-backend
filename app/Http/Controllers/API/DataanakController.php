<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Models\polianak\Inputanak;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DataanakController extends Controller
{
    public function getAnak(Request $request)
    {
        $limit = $request->input('limit', 100);
        $model = Inputanak::with(['ibu'])
                            ->where('id_user_ibu', Auth::user()->id);

        return ResponseFormatter::success(
            $model->paginate($limit),
            'Data List Ibu Berhasil Di Ambil!'
        );
    }

    public function getGrafikAnak(Request $request)
    {
        $id_anak = $request->input('id_anak');
        $data = DB::table('kunjungankeadaans')
            ->select('umur','bb')
            ->where('id_user_ibu', Auth::user()->id)
            ->where('id_anak', $id_anak)
            ->get();

        return ResponseFormatter::success(
            $data,
            'Data Grafik Berhasil Di Ambil'
        );

    }

}
