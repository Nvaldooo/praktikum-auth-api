<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController; // Tambahkan ini 
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

// Mengelompokkan route yang memerlukan login [cite: 93, 101]
Route::middleware(['auth'])->group(function () {
    
    // Route Dashboard [cite: 94, 95]
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Route Profile (Bawaan Laravel)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Tambahkan Route Resource untuk Product di sini 
    Route::resource('products', ProductController::class);
});

require __DIR__.'/auth.php';