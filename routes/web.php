<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\bendahara\BendaharaController;
use App\Http\Controllers\pengasuh\PengasuhController;
use App\Http\Controllers\wali\WaliSantriController;

// Route Login dan Logout
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

// Route Grup dengan Middleware 'auth'
Route::middleware(['auth'])->group(function () {
    // Dashboard Admin (Hanya bisa diakses oleh admin)
    Route::prefix('admin')->middleware('checkrole:admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard.admin');
    });

    // Dashboard Bendahara (Hanya bisa diakses oleh bendahara)
    Route::prefix('bendahara')->middleware('checkrole:bendahara')->group(function () {
        Route::get('/dashboard', [BendaharaController::class, 'index'])->name('dashboard.bendahara');
    });

    // Dashboard Pengasuh (Hanya bisa diakses oleh pengasuh)
    Route::prefix('pengasuh')->middleware('checkrole:pengasuh')->group(function () {
        Route::get('/dashboard', [PengasuhController::class, 'index'])->name('dashboard.pengasuh');
    });

    // Dashboard Wali Santri (Hanya bisa diakses oleh walisantri)
    Route::prefix('walisantri')->middleware('checkrole:walisantri')->group(function () {
        Route::get('/dashboard', [WaliSantriController::class, 'index'])->name('dashboard.walisantri');
    });
});