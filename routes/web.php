<?php

use App\Http\Controllers\Admin\SantriController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\Admin\KeuanganController as AdminKeuanganController;
use App\Http\Controllers\Bendahara\KeuanganController as BendaharaKeuanganController;
use App\Http\Controllers\Admin\KoperasiTransactionController as AdminKoperasiTransactionController;
use App\Http\Controllers\Koperasi\KoperasiTransactionController as DataKoperasiTransactionController;
use App\Http\Controllers\Bendahara\DashboardController as BendaharaDashboardController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Koperasi\DashboardController as KoperasiDashboardController;
use App\Http\Controllers\Santri\DashboardController as SantriDashboardController;
use App\Http\Controllers\Santri\HistoryController;





Route::get('/', function () {
    return redirect('/login');
});


Route::prefix('admin')
    ->middleware(['auth'])
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        Route::get('/santri', [SantriController::class, 'index'])->name('santri.index');
        Route::get('/santri/create', [SantriController::class, 'create'])->name('santri.create');
        Route::post('/santri', [SantriController::class, 'store'])->name('santri.store');
        Route::get('/santri/{santri}/edit', [SantriController::class, 'edit'])->name('santri.edit');   // form edit
        Route::put('/santri/{santri}', [SantriController::class, 'update'])->name('santri.update');   // simpan perubahan
        Route::delete('/santri/{santri}', [SantriController::class, 'destroy'])->name('santri.destroy');
        Route::get('/keuangan', [AdminKeuanganController::class, 'index'])->name('keuangan.index');
        Route::post('/keuangan', [AdminKeuanganController::class, 'store'])->name('keuangan.store');
        Route::get('/keuangan/kamar/{kamar}', [AdminKeuanganController::class, 'kamar'])->name('keuangan.kamar');
        Route::get('/koperasi', [AdminKoperasiTransactionController::class, 'index'])->name('koperasi.index');
        Route::get('/koperasi/create', [AdminKoperasiTransactionController::class, 'create'])->name('koperasi.create');
        Route::post('/koperasi', [AdminKoperasiTransactionController::class, 'store'])->name('koperasi.store');
        Route::get('koperasi/struk/{id}', [AdminKoperasiTransactionController::class, 'struk'])->name('koperasi.struk');
        Route::get('/koperasi/transaksi/{id}/simpan-pdf', [AdminKoperasiTransactionController::class, 'simpanPdf'])->name('koperasi.pdf.simpan');

 
    });

Route::prefix('bendahara')
    ->middleware(['auth'])
    ->name('bendahara.')
    ->group(function () {
        Route::get('/dashboard', [BendaharaDashboardController::class, 'index'])->name('dashboard');
        Route::get('/keuangan', [BendaharaKeuanganController::class, 'index'])->name('keuangan.index');
        Route::post('/keuangan', [BendaharaKeuanganController::class, 'store'])->name('keuangan.store');
        Route::get('/keuangan/kamar/{kamar}', [BendaharaKeuanganController::class, 'kamar'])->name('keuangan.kamar');   
    });
Route::prefix('koperasi')
    ->middleware(['auth'])
    ->name('koperasi.')
    ->group(function () {
        Route::get('/dashboard', [KoperasiDashboardController::class, 'index'])->name('dashboard');
        Route::get('/data', [DataKoperasiTransactionController::class, 'index'])->name('data.index');
        Route::get('/data/create', [DataKoperasiTransactionController::class, 'create'])->name('data.create');
        Route::post('/data', [DataKoperasiTransactionController::class, 'store'])->name('data.store');
        Route::get('data/struk/{id}', [DataKoperasiTransactionController::class, 'struk'])->name('data.struk');
        Route::get('/data/transaksi/{id}/simpan-pdf', [DataKoperasiTransactionController::class, 'simpanPdf'])->name('data.pdf.simpan');

        });
Route::prefix('santri')
    ->middleware(['auth'])
    ->name('santri.')
    ->group(function () {
        Route::get('/dashboard', [SantriDashboardController::class, 'index'])->name('dashboard');
        Route::get('/history', [HistoryController::class, 'index'])->name('history');

        });





Route::middleware('auth')->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

require __DIR__.'/auth.php';