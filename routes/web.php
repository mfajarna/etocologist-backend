<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\gudangfarmasi\InformasiobatController;
use App\Http\Controllers\gudangfarmasi\JenisobatController;
use App\Http\Controllers\gudangfarmasi\LaporanobatController;
use App\Http\Controllers\gudangfarmasi\ObatController;
use App\Http\Controllers\polianak\InputanakController;
use App\Http\Controllers\polianak\KunjungankeadaanController;
use App\Http\Controllers\polianak\RiwayatkeadaanController;
use App\Http\Controllers\poliibu\InputdataController;
use App\Http\Controllers\poliibu\InputpasienController;
use App\Http\Controllers\poliibu\PemantauankehamilanController;
use App\Http\Controllers\poliibu\ProseskehamilanController;
use App\Http\Controllers\poliibu\RiwayatkehamilanController;
use App\Http\Livewire\Proseskehamilan;
use App\Http\Livewire\Riwayatkeadaanupdate;
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
        Route::get('riwayatkehamilan-addon/{id}', [RiwayatkehamilanController::class, 'editDataRiwayat'])->name('riwayatkehamilan.addon');
        Route::post('riwayatkehamilan-addnew', [RiwayatkehamilanController::class, 'addNewDataRiwayat'])->name('riwayatkehamilan.addnew');


        //Route Proses Kehamilan Pasien Ibu
        Route::resource('proseskehamilan', ProseskehamilanController::class);
        Route::get('proseskehamilan-add/{id}', [ProseskehamilanController::class,'addData'])->name('proseskehamilan.add');
        Route::get('get-riwayat/{id}', [ProseskehamilanController::class,'getRiwayat']);



        //Route Grafik
        Route::resource('pemantauan-kehamilan', PemantauankehamilanController::class);
        Route::get('pemantauankehamilan-add/{id}', [PemantauankehamilanController::class,'pemantauan'])->name('proseskehamilan.add');
        Route::get('cetak-kartu-ibu/{id}',[PemantauankehamilanController::class, 'cetakPdf'])->name('proseskehamilan.cetak');
    });


    // Route Poli Anak
    Route::get('poli-anak', function(){
        return view('polianak.index');
    });

    Route::prefix('poli-anak')->group(function (){

        Route::get('getIbu', [RiwayatkehamilanController::class, 'getDataPasien']);
        Route::get('getDataAnak', [RiwayatkeadaanController::class, 'getDataANak']);

        Route::get('pelayanan-anak', function(){
            return view('polianak.pelayanananak.index');
        });

        Route::get('getRiwayatAnak/{id}',[RiwayatkeadaanController::class, 'getRiwayatKeadaanAnak']);
        Route::post('addRiwayatAnak', [RiwayatkeadaanController::class, 'addData'])->name('riwayatkeadaan.addData');

        // Route Pelayanan Anak
        Route::prefix('pelayanan-anak')->group(function(){
            Route::resource('inputanak', InputanakController::class);
            Route::get('inputanak-delete', [InputanakController::class, 'hapus'])->name('inputanak.hapus');

            Route::resource('riwayatkeadaan', RiwayatkeadaanController::class);

            Route::resource('kunjungankeadaan', KunjungankeadaanController::class);
        });
    });
});
