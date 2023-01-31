<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    RegisterController,
    LoginController,
};
use App\Http\Controllers\Masyarakat\{
    DashboardController as MasyarakatDashboardController,
    PengaduanController as MasyarakatPengaduanController,
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
    Route::prefix('pengaduan')->group(function () {
        Route::get('{id}/detail', [MasyarakatPengaduanController::class, 'show'])->name('masyarakat.pengaduan.detail');
        Route::get('{id}/tanggapan', [MasyarakatPengaduanController::class, 'index'])->name('masyarakat.pengaduan.tanggapan');
        Route::get('all', [MasyarakatPengaduanController::class, 'index'])->name('masyarakat.pengaduan.index');
        Route::get('buat', [MasyarakatPengaduanController::class, 'create'])->name('masyarakat.pengaduan.buat');
    });
});