<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\QRCodeController;

Route::post('/', [QRCodeController::class, 'decodeQRCode']);

Route::get('/', function () {
    return view('welcome');
});
// toto je len ta k tu zatial
Route::get('logged in', function () {
    return view('logged in');
});


Route::get('welcome', function () {
    return view('welcome');
});

// auth, do not touch
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
