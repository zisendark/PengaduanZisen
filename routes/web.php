<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\GuruController;
use App\Http\Controllers\SiswaContoller;

use App\Http\Controllers\ProfileController;


Route::get('/', function () {
    return view('welcome');
});

Route::resource('guru', GuruController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// Group untuk profile yang memerlukan autentikasi
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Route khusus untuk role "siswa"
Route::group(['middleware' => ['auth', 'role:siswa']], function () {
    Route::resource('Siswa', SiswaContoller::class);
    // Tambahkan route lain khusus siswa di sini
});


// Route khusus untuk role "guru"
Route::group(['middleware' => ['auth', 'role:guru']], function () {
    // Route::get('/guru/index', [GuruController::class, 'index'])->name('guru.index');
    Route::resource('guru', GuruController::class);
    // Tambahkan route lain khusus guru di sini
});


// Auth routes
require __DIR__.'/auth.php';
