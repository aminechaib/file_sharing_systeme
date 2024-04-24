<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FileController;
use Illuminate\Support\Facades\Route;

// Change the default route to use 'login' view instead of 'welcome'
Route::get('/', function () {
    if (auth()->check()) {  // Check if the user is already authenticated
        return redirect()->route('dashboard');  // Redirect to the dashboard route
    }
    return view('auth.login');  // Show the login page if the user is not logged in
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
Route::middleware(['web', 'auth'])->group(function () {
    Route::get('/dashboard', [FileController::class, 'index'])->name('dashboard');
    Route::post('/upload', [FileController::class, 'upload'])->name('file.upload');
    Route::get('/files/{file}/download', [FileController::class, 'download'])->name('files.download');
});
// Adding a new route for displaying sent files
Route::get('/sent-files', [FileController::class, 'showSentFiles'])->name('files.sent');
