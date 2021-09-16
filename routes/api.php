<?php

use App\Http\Controllers\API\DataanakController;
use App\Http\Controllers\API\DataibuController;
use App\Http\Controllers\API\UploadphotousgController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->group(function(){
    Route::get('user', [UserController::class, 'fetch']);
    Route::get('data-pasien', [DataibuController::class,'all']);
    Route::get('data-grafik', [DataibuController::class,'getGrafik']);

    Route::get('anak', [DataanakController::class,'getAnak']);
    Route::get('grafik-anak', [DataanakController::class,'getGrafikAnak']);
    Route::post('update-messages/{id}',[UserController::class, 'updateMessages']);

    Route::get('photo-usg', [UploadphotousgController::class, 'all']);
    Route::post('upload-usg',[UploadphotousgController::class, 'addPhoto']);

    Route::get('getantrianibu',[DataibuController::class,'getAntrian']);
    Route::post('input-antrian-ibu', [DataibuController::class,'antrianPoliIbu']);
    Route::get('get-no-antrian-ibu', [DataibuController::class,'getDataAntrian']);


    Route::get('get-data-ibu', [DataibuController::class, 'getDataIbu']);
});

Route::post('login', [UserController::class, 'login']);
