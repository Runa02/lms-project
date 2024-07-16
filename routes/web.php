<?php

use App\Http\Controllers\JabatanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('components.index');
});

Route::get('/login', function () {
    return view('components.pages-login');
})->name('login');
Route::post('/masuk', [LoginController::class, 'authenticate'])->name('masuk');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/apps/home', [LoginController::class, 'login'])->name('home');
Route::get('/apps/profile', [LoginController::class, 'profile'])->name('profile');
Route::put('/apps/profile/update', [LoginController::class, 'updateProfile'])->name('update.profile');

Route::get('/apps/siswa/data', [SiswaController::class, 'index'])->name('siswa');
Route::get('/apps/siswa/create', [SiswaController::class, 'create'])->name('create.siswa');
Route::post('/apps/siswa/store', [SiswaController::class, 'store'])->name('store.siswa');
Route::get('/datasiswa', [SiswaController::class, 'datasiswa'])->name('datasiswa');

Route::get('/apps/jabatan/data', [JabatanController::class, 'index'])->name('jabatan');
Route::get('/apps/jabatan/create', [JabatanController::class, 'create'])->name('create.jabatan');
Route::get('/apps/jabatan/edit/{id}', [JabatanController::class, 'edit'])->name('edit.jabatan');
Route::get('/datajabatan', [JabatanController::class, 'show'])->name('datajabatan');
Route::post('/apps/jabatan/store', [JabatanController::class, 'store'])->name('store.jabatan');
Route::put('/apps/jabatan/update/{id}', [JabatanController::class, 'update'])->name('update.jabatan');
Route::delete('/apps/jabatan/delete/{id}', [JabatanController::class, 'destroy'])->name('delete.jabatan');
