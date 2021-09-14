<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\uploadusg\Uploadusg;
use Illuminate\Support\Facades\Validator;

class UploadphotousgController extends Controller
{


    public function all(Request $request)
    {
         $limit = $request->input('limit', 100);
         $id = $request->input('id');

         if($id)
         {
             $photo = Uploadusg::find($id);

            if($photo)
            {
                return ResponseFormatter::success(
                    $photo,
                    'Data Photo Berhasil Di Ambil'
                );
            }else{
                return ResponseFormatter::error([
                    null,
                    'Data Photo Tidak Ada',
                    404
                ]);
            }
         }
    }


    public function addPhoto(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'file' => 'required|image:jpeg,png,jpg|max:2048',
        ]);

        if ($validator->fails()) {
            return ResponseFormatter::error(['error'=>$validator->errors()], 'Update Photo Fails', 401);
        }

        if ($request->file('file')) {

            $file = $request->file->store('assets/user', 'public');

            //store your file into database

            $photo = new Uploadusg();

            $photo->id_ibu = $request->id_ibu;
            $photo->title = $request->title;
            $photo->photoPath = $file;

            $photo->save();


            return ResponseFormatter::success([$file],'File successfully uploaded');
        }
    }
}
