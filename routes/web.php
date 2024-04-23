<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FileController;
use Illuminate\Support\Facades\Route;

// Change the default route to use 'login' view instead of 'welcome'
Route::get('/', function () {
    return view('auth.login');  // Assuming 'login.blade.php' is located in 'resources/views/auth/login.blade.php'
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';  // Authentication routes are defined here

Route::middleware(['auth'])->group(function () {
    Route::post('/upload-file', [FileController::class, 'upload'])->name('file.upload');
});

Route::get('/users', [UserController::class, 'index'])->name('users.index')->middleware('auth');

Route::get('/files/shared-with-me', [FileController::class, 'sharedWithMe'])->name('files.shared');
Route::get('/files/download/{file}', [FileController::class, 'download'])->name('files.download');
