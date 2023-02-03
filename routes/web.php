<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    RegisterController,
    LoginController,
    RegisterPetugasController,
};
use App\Http\Controllers\Masyarakat\{
    DashboardController as MasyarakatDashboardController,
    PengaduanController as MasyarakatPengaduanController,
    AkunController as MasyarakatAkunController
};
use App\Http\Controllers\Petugas\{
    DashboardController as PetugasDashboardController,
    PengaduanController as PetugasPengaduanController,
    AkunController as PetugasAkunController
};

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

Route::get('/login', LoginController::class)->name('login');
Route::get('/masyarakat/daftar', RegisterController::class)->name('daftar');
Route::get('/masyarakat/logout', function(){
    auth()->guard('masyarakat')->logout();
    return redirect()->route('login');
})->name('masyarakat.logout');

/**
 * Route Petugas
 * **/
Route::name('petugas')->prefix('petugas')->group(function(){
    Route::get('logout', function(){
        auth()->guard('petugas')->logout();
        return redirect()->route('login');
   })->name('.logout');
    Route::get('daftar',RegisterPetugasController::class)->name('.daftar');
    Route::middleware('auth:petugas')->group(function(){
        Route::get('dashboard',PetugasDashboardController::class)->name('.dashboard');
        Route::get('akun',PetugasDashboardController::class)->name('.user.akun');
        Route::get('pengaduan_masuk',PetugasDashboardController::class)->name('.pengaduan.index');
        Route::middleware('petugas_role')->group(function(){
            Route::get('laporan')->name('.laporan');
            Route::get('manage_petugas')->name('.manage_petugas');
        });
    });
});


/**
 * Route masyarakat
 * **/
Route::prefix('masyarakat')->middleware('auth:masyarakat')->group(function () {
    Route::get('/', MasyarakatDashboardController::class)->name('masyarakat.dashboard');
    Route::name('user')->prefix('akun')->group(function(){
        Route::view('/','masyarakat.akun')->name('.akun');
        Route::put('/',[MasyarakatAkunController::class,'update'])->name('.akun.update');
    });
    Route::prefix('pengaduan')->group(function () {
        Route::get('{id}/detail', [MasyarakatPengaduanController::class, 'show'])->name('masyarakat.pengaduan.detail');
        Route::get('{id}/edit', [MasyarakatPengaduanController::class, 'edit'])->name('masyarakat.pengaduan.edit');
        Route::get('{id}/delete', [MasyarakatPengaduanController::class, 'destroy'])->name('masyarakat.pengaduan.delete');
        Route::get('all', [MasyarakatPengaduanController::class, 'index'])->name('masyarakat.pengaduan.index');
        Route::get('buat', [MasyarakatPengaduanController::class, 'create'])->name('masyarakat.pengaduan.buat');
    });
});