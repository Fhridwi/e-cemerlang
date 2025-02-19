<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriPembayaranController;

// Middleware auth:api (nanti bisa diganti sesuai kebutuhan)
// Route::middleware('auth:sanctum')->group(function () {
    Route::get('/kategori-pembayaran', [KategoriPembayaranController::class, 'index']);
    Route::post('/kategori-pembayaran', [KategoriPembayaranController::class, 'store']);
    Route::get('/kategori-pembayaran/{id}', [KategoriPembayaranController::class, 'show']);
    Route::put('/kategori-pembayaran/{id}', [KategoriPembayaranController::class, 'update']);
    Route::delete('/kategori-pembayaran/{id}', [KategoriPembayaranController::class, 'destroy']);
// });
