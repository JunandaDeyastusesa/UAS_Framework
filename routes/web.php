<?php

use App\Http\Controllers\AbsensiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\PembayaranSppController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\JadwalController;
//operational
use App\Http\Controllers\KelasController;
use App\Http\Controllers\NilaiSiswaController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () { return view('welcome'); })->middleware('protect');

// Route::get('/dashboard',[HomeController::class,'dashboard']);
// Route::get('/dashboard/index', [DashboardController::class, 'index'])->name('dashboard.index');

// Route::resource('/staff', StaffController::class);
Route::resource('/guru', GuruController::class)->middleware('protect');
Route::resource('/siswa', SiswaController::class)->middleware('protect');
Route::resource('/jadwal', JadwalController::class)->middleware('protect');
Route::resource('/kelas', KelasController::class)->middleware('protect');
Route::resource('/barang', BarangController::class)->middleware('protect');

// EXPORT
Route::get('exportExcel', [SiswaController::class, 'exportExcel'])->name('siswa.exportExcel');
Route::get('exportPdf', [SiswaController::class, 'exportPdf'])->name('siswa.exportPdf');

//operasional

Route::post('/update-semester', [SiswaController::class, 'updateSemester'])->name('siswa.update-semester');
Route::resource('ruangan', RuanganController::class)->middleware('protect');
Route::get('/ruangan/lantai/{lantai}', [RuanganController::class, 'showLantai'])->name('showLantai');
Route::resource('barang', BarangController::class)->middleware('protect');


Auth::routes();

// Route::get('/home', [HomeController::class, 'index'])->name('home');
