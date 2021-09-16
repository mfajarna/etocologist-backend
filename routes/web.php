<?php

use App\Http\Controllers\Administrasi\AdministrasiController;
use App\Http\Controllers\Administrasi\PasienController;
use App\Http\Controllers\Administrasi\PembayaranController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\gudangfarmasi\InformasiobatController;
use App\Http\Controllers\gudangfarmasi\JenisobatController;
use App\Http\Controllers\gudangfarmasi\LaporanobatController;
use App\Http\Controllers\gudangfarmasi\ObatController;
use App\Http\Controllers\master\LayananController;
use App\Http\Controllers\polianak\InputanakController;
use App\Http\Controllers\polianak\KunjungankeadaanController;
use App\Http\Controllers\polianak\RiwayatkeadaanController;
use App\Http\Controllers\poliibu\InputdataController;
use App\Http\Controllers\poliibu\InputpasienController;
use App\Http\Controllers\poliibu\PemantauankehamilanController;
use App\Http\Controllers\poliibu\ProseskehamilanController;
use App\Http\Controllers\poliibu\RiwayatkehamilanController;
use App\Http\Controllers\Poliumum\PoliumumController;
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
           Route::get('getLayanan', [InputpasienController::class, 'getLayanan']);

           Route::get('remove', [JenisobatController::class, 'remove'])->name('jenisobat.remove');
           Route::get('hapus', [ObatController::class, 'hapus'])->name('obat.hapus');
           Route::get('autofill', [InformasiobatController::class, 'autofill'])->name('informasi-obat.autofill');
           Route::get('remove-informasi', [InformasiobatController::class, 'removeinformasi'])->name('informasi-obat.removeinformasi');
        });

        Route::resource('layanan', LayananController::class);
        Route::get('remove-layanan', [LayananController::class,'remove'])->name('layanan.remove');
    });

    //Route Poli Ibu
    Route::get('poli-ibu', [InputpasienController::class, 'getData'])->name('inputpasien.data');
    Route::post('edit-poli-ibu',[InputpasienController::class,'editData'])->name('inputpasien.editstatus');

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

        //Route Rujukan Apotek
        Route::get('rujukan-apotek', [InputpasienController::class,'rujukanApotek'])->name('inputpasien.rujukan');
        Route::post('rujukan-add', [InputpasienController::class,'addRujukan'])->name('inputpasien.addrujukan');

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

        Route::get('pelayanan-anak',[InputanakController::class,'getData'])->name('pelayanananak.data');

        Route::get('getRiwayatAnak/{id}',[RiwayatkeadaanController::class, 'getRiwayatKeadaanAnak']);
        Route::post('addRiwayatAnak', [RiwayatkeadaanController::class, 'addData'])->name('riwayatkeadaan.addData');
        Route::get('getKunjunganRiwayat/{id}', [KunjungankeadaanController::class, 'getRiwayatKeadaanKunjungan']);

        // Route Pelayanan Anak
        Route::prefix('pelayanan-anak')->group(function(){
            Route::resource('inputanak', InputanakController::class);
            Route::get('inputanak-delete', [InputanakController::class, 'hapus'])->name('inputanak.hapus');

            Route::resource('riwayatkeadaan', RiwayatkeadaanController::class);

            Route::resource('kunjungankeadaan', KunjungankeadaanController::class);
            Route::post('kunjungankeadaan-addKunjungan', [KunjungankeadaanController::class, 'addKunjungan'])->name('kunjungankeadaan.addkunjungan');
            Route::get('cetak-kartu-anak/{id}', [KunjungankeadaanController::class, 'cetakKartuAnak']);

        });
    });

    //Route Administrasi
    Route::resource('administrasi', AdministrasiController::class);

    Route::resource('pasien', PasienController::class);
    Route::get('antrian',[PasienController::class,'antrian'])->name('pasien.antrian');
    Route::resource('pembayaran', PembayaranController::class);

    Route::get('getRujukan',[PembayaranController::class,'getKodeRujukan'])->name('pembayaran.rujukan');
    Route::get('pembayaran-pasien/{id}',[PembayaranController::class,'pembayaran']);
    Route::get('cetak-invoice/{id}', [AdministrasiController::class, 'cetakInvoice']);

    // Route Poli Umum
    Route::resource('poli-umum', PoliumumController::class);

    Route::prefix('poli-umum')->group(function () {
        Route::get('tambah-keadaan/{id}', [PoliumumController::class,'tambahKeadaan']);
        Route::get('getRiwayat/{id}',[PoliumumController::class,'getData']);
        Route::prefix('tambah-keadaan')->group(function(){
            Route::get('cetak-kartu-umum/{id}', [PoliumumController::class,'cetak']);
        });
    });


    //Route Antrian
    Route::get('antrian-poli', [AdministrasiController::class, 'AntrianPoli'])->name('antrian.poli');
    Route::post('tambah-antrian', [AdministrasiController::class, 'tambahAntrianPoli'])->name('antrian.tambah');


});
