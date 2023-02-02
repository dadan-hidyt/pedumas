<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    RegisterController,
    LoginController,
};
use App\Http\Controllers\Masyarakat\{
    DashboardController as MasyarakatDashboardController,
    PengaduanController as MasyarakatPengaduanController,
    AkunController as MasyarakatAkunController
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