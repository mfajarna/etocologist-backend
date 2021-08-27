<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\gudangfarmasi\InformasiobatController;
use App\Http\Controllers\gudangfarmasi\JenisobatController;
use App\Http\Controllers\gudangfarmasi\LaporanobatController;
use App\Http\Controllers\gudangfarmasi\ObatController;
use App\Http\Controllers\poliibu\InputdataController;
use App\Http\Controllers\poliibu\InputpasienController;
use App\Http\Controllers\poliibu\ProseskehamilanController;
use App\Http\Controllers\poliibu\RiwayatkehamilanController;
use App\Http\Livewire\Proseskehamilan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});


Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    // Route Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Route Master
    Route::prefix('/master')->group(function(){
        // Route Gudang Farmasi
        Route::get('/gudang-farmasi', function(){
            return view ('master.gudangfarmasi.index');
        });

        Route::prefix('/gudang-farmasi')->group(function(){
           Route::resource('jenisobat', JenisobatController::class);
           Route::resource('obat', ObatController::class);
           Route::resource('informasi-obat', InformasiobatController::class);
           Route::resource('laporan-obat', LaporanobatController::class);


           Route::get('remove', [JenisobatController::class, 'remove'])->name('jenisobat.remove');
           Route::get('hapus', [ObatController::class, 'hapus'])->name('obat.hapus');
           Route::get('autofill', [InformasiobatController::class, 'autofill'])->name('informasi-obat.autofill');
           Route::get('remove-informasi', [InformasiobatController::class, 'removeinformasi'])->name('informasi-obat.removeinformasi');
        });
    });

    //Route Poli Ibu
    Route::get('/poli-ibu', function () {
            return view ('poliibu.index');
        });

    Route::prefix('/poli-ibu')->group(function() {
        //Route Input Data Pasien Ibu
        Route::resource('inputpasien', InputpasienController::class);
        Route::get('inputpasien-delete', [InputpasienController::class, 'deleteData'])->name('inputpasien.delete');

        //Route Riwayat Kehamilan Pasien Ibu
        Route::resource('riwayatkehamilan', RiwayatkehamilanController::class);
        Route::get('getPasien', [RiwayatkehamilanController::class, 'getDataPasien']);
        Route::get('riwayatkehamilan-delete', [RiwayatkehamilanController::class, 'hapus'])->name('riwayatkehamilan.hapus');

        //Route Proses Kehamilan Pasien Ibu
        Route::resource('proseskehamilan', ProseskehamilanController::class);
        Route::get('proseskehamilan-add/{id}', [ProseskehamilanController::class,'addData'])->name('proseskehamilan.add');
        Route::get('get-riwayat/{id}', [ProseskehamilanController::class,'getRiwayat']);


    });
});
