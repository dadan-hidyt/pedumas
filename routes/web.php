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
    ManageMasyarakatController,
    AkunController as PetugasAkunController,
    KelolaPengaduanController,
    PetugasController
};


Route::view('/','landing_page');
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
    //petugas
    Route::middleware('auth:petugas')->group(function(){
        Route::get('dashboard',PetugasDashboardController::class)->name('.dashboard');
        Route::get('akun',PetugasDashboardController::class)->name('.user.akun');
        Route::controller(KelolaPengaduanController::class)->group(function(){
            Route::get('pengaduan/kelola','index')->name('.pengaduan.index');
            Route::get('pengaduan/{id}/detail','show')->name('.pengaduan.detail'); 
            Route::get('pengaduan/{id}/selesai','selesai')->name('.pengaduan.selesai'); 
            Route::get('pengaduan/{id}/proses','prosess')->name('.pengaduan.proses'); 
            Route::get('pengaduan/{id}/tanggapan/{idTanggapan}/delete','deleteTanggapan')->name('.pengaduan.tanggapan.delete');  
        });
        Route::middleware('petugas_role')->group(function(){
            Route::get('laporan')->name('.laporan');
            Route::controller(ManageMasyarakatController::class)->name('.manage-masyarakat')->group(function(){
                Route::get('manage_masyarakat','index')->name('.index');
                Route::get('masyarakat/tambah','add')->name('.add');
                Route::get('masyarakat/{id}/edit','edit')->name('.edit');
                Route::get('masyarakat/{id}/delete','delete')->name('.delete');
            });
            Route::controller(PetugasController::class)->name('.manage-petugas')->group(function(){
            //manage petugas
             Route::get('manage_petugas',[PetugasController::class,'index'])->name('.index');
             Route::get('petugas/{id}/edit',[PetugasController::class,'edit'])->name('.edit');
             Route::get('petugas/{id}/delete',[PetugasController::class,'delete'])->name('.delete');
             Route::get('petugas/add',[PetugasController::class,'add'])->name('.add');
         });
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