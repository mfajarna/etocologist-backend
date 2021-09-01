<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(Request $request){
        try{
            $request->validate([
                'email' => 'email|required',
                'password' => 'required'
            ],[
                'email.required' => 'Silahkan masukan email yang valid!',
                'password.required' => 'Silahkan masukan password yang benar!'
            ]);

            $credentials = request(['email', 'password']);

            if(!Auth::attempt($credentials)){
                return ResponseFormatter::error([
                'message' => 'Unauthorized'
                ], 'Authentication Failed', 500);
            }

            $user = User::where('email', $request->email)->first();
            if(!Hash::check($request->password, $user->password)){
                throw new \Exception('Invalid Credentials');
            }

            $tokenResult = $user->createToken('authToken')->plainTextToken;
            return ResponseFormatter::success([
                'access_token' => $tokenResult,
                'token_type' => 'Bearer',
                'user' => $user
            ], 'Authentication');
            }catch(Exception $error){
            return ResponseFormatter::error([
                'message' => 'Something Went Wrong',
                'error' => $error,
            ], 'Authentication Failed', 500);
            }
    }

    public function fetch(Request $request)
    {
        return ResponseFormatter::success(User::with('dataUser')->get()->latest(), 'Data profile user berhasil diambil!');
    }
}
