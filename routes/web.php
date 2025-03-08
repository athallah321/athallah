<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\SuratTugasController;
use App\Http\Controllers\SpdController;
use App\Http\Controllers\GolonganController;
use App\Http\Controllers\TransportasiController;
use App\Http\Controllers\DaftarNominatifController;
use App\Models\SuratTugas;
use App\Http\Controllers\DaftarRiilController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use Ramsey\Uuid\Uuid;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
// Rute untuk halaman utama yang mengarahkan ke login
Route::get('/', function () {
    return redirect()->route('login'); // Mengarahkan ke halaman login
});
Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login-proses',[LoginController::class,'login_proses'])->name('login-proses');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/get-data', [UserController::class, 'getUsers'])->name('users.data');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
Route::get('/users/{username}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');

Route::get('/pegawais', [PegawaiController::class, 'index'])->name('pegawais.index');
Route::get('/get-data/', [PegawaiController::class, 'getPegawais'])->name('pegawais.data');
Route::get('/pegawais/create', [PegawaiController::class, 'create'])->name('pegawais.create');
Route::post('/pegawais', [PegawaiController::class, 'store'])->name('pegawais.store');
Route::delete('/pegawais/{uuid}', [PegawaiController::class, 'destroy'])->name('pegawais.destroy');
Route::get('/pegawais/{uuid}/edit', [PegawaiController::class, 'edit'])->name('pegawais.edit');
Route::put('/pegawais/{uuid}', [PegawaiController::class, 'update'])->name('pegawais.update');

Route::get('surat_tugas', [SuratTugasController::class, 'index'])->name('surat_tugas.index');
Route::get('/get-data', [SuratTugasController::class, 'getSuratTugas'])->name('surat_tugas.data');
Route::get('/surat_tugas/create', [SuratTugasController::class, 'create'])->name('surat_tugas.create');
Route::post('/surat_tugas', [SuratTugasController::class, 'store'])->name('surat_tugas.store');
Route::delete('/surat_tugas/{uuid}', [SuratTugasController::class, 'destroy'])->name('surat_tugas.destroy');
Route::get('/surat_tugas/{username}/edit', [SuratTugasController::class, 'edit'])->name('surat_tugas.edit');
Route::put('/surat_tugas/{uuid}', [SuratTugasController::class, 'update'])->name('surat_tugas.update');

Route::get('/surat_tugas/{id}/pdf', [SuratTugasController::class, 'generatePDF'])->name('surat_tugas.pdf');
Route::get('/surat_tugas/{id}', [SuratTugasController::class, 'show'])->name('surat_tugas.show');

Route::get('spds', [SpdController::class, 'index'])->name('spds.index');
Route::get('/spds/create', [SpdController::class, 'create'])->name('spds.create');
Route::post('/spds', [SpdController::class, 'store'])->name('spds.store');
Route::delete('/spds/{id}', [SpdController::class, 'destroy'])->name('spds.destroy');
Route::get('/spds/{username}/edit', [SpdController::class, 'edit'])->name('spds.edit');
Route::put('/spds/{id}', [SpdController::class, 'update'])->name('spds.update');
Route::get('/spds/{id}/pdf', [SpdController::class, 'generatePDF'])->name('spds.pdf');
Route::get('/spds/{id}', [SpdController::class, 'show'])->name('spds.show');
Route::get('/get-data', [SpdController::class, 'getSpd'])->name('spds.data');

Route::get('golongans', [GolonganController::class, 'index'])->name('golongans.index');
Route::get('/golongans/create', [GolonganController::class, 'create'])->name('golongans.create');
Route::post('/golongans', [GolonganController::class, 'store'])->name('golongans.store');
Route::get('/golongans/{username}/edit', [GolonganController::class, 'edit'])->name('golongans.edit');
Route::put('/golongans/{id}', [GolonganController::class, 'update'])->name('golongans.update');

Route::get('transportasis', [TransportasiController::class, 'index'])->name('transportasis.index');
Route::get('/transportasis/create', [TransportasiController::class, 'create'])->name('transportasis.create');
Route::post('/transportasis', [TransportasiController::class, 'store'])->name('transportasis.store');
Route::get('/transportasis/{id}/edit', [TransportasiController::class, 'edit'])->name('transportasis.edit');
Route::put('/transportasis/{id}', [TransportasiController::class, 'update'])->name('transportasis.update');
Route::delete('/transportasis/{id}', [TransportasiController::class, 'destroy'])->name('transportasis.destroy');

Route::get('daftar-riils', [DaftarRiilController::class, 'index'])->name('daftar_riils.index');
Route::get('/daftar-riils/create', [DaftarRiilController::class, 'create'])->name('daftar_riils.create');
Route::post('/daftar-riils', [DaftarRiilController::class, 'store'])->name('daftar_riils.store');
Route::get('/daftar-riils/{id}/edit', [DaftarRiilController::class, 'edit'])->name('daftar_riils.edit');
Route::put('/daftar-riils/{id}', [DaftarRiilController::class, 'update'])->name('daftar_riils.update');
Route::delete('/daftar-riils/{id}', [DaftarRiilController::class, 'destroy'])->name('daftar_riils.destroy');

Route::get('daftar-nominatif', [DaftarNominatifController::class, 'index'])->name('daftar_nominatif.index');
Route::get('/daftar-nominatif/create', [DaftarNominatifController::class, 'create'])->name('daftar_nominatif.create');
Route::post('/daftar-nominatif', [DaftarNominatifController::class, 'store'])->name('daftar_nominatif.store');
Route::get('/daftar-nominatif/{id}/edit', [DaftarNominatifController::class, 'edit'])->name('daftar_nominatif.edit');
Route::put('/daftar-nominatif/{id}', [DaftarNominatifController::class, 'update'])->name('daftar_nominatif.update');
Route::delete('/daftar-nominatif/{id}', [DaftarNominatifController::class, 'destroy'])->name('daftar_nominatif.destroy');
Route::post('/daftar_nominatif/store_inline', [DaftarNominatifController::class, 'storeInline'])->name('daftar_nominatif.store_inline');
