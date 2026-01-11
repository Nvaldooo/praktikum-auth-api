<?php

use App\Http\Controllers\Api\ProductController; // Tambahkan import ini
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Tambahkan rute produk di bawah ini
Route::prefix('products')->group(function () {
    // Mengambil semua data produk
    Route::get('/', [ProductController::class, 'index']);
    
    // Mengambil satu data produk berdasarkan ID
    Route::get('/{id}', [ProductController::class, 'show']);
    
    // Menambah produk baru
    Route::post('/', [ProductController::class, 'store']);
    
    // Mengupdate data produk
    Route::put('/{id}', [ProductController::class, 'update']);
    
    // Menghapus produk
    Route::delete('/{id}', [ProductController::class, 'destroy']);
});