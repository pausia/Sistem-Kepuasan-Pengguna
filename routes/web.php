<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\PenggunaLulusanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::post('/admin/submit-question', [AdminDashboardController::class, 'submitQuestion'])->name('admin.submitQuestion');
Route::get('/admin/question/create', [AdminDashboardController::class, 'createQuestion'])->name('admin.question.create');
Route::post('/admin/question/store', [AdminDashboardController::class, 'storeQuestion'])->name('admin.question.store');

route::get('/redirect',[HomeController::class,'redirect']);

Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
Route::post('/mahasiswa/submit-answer', [MahasiswaController::class, 'submitAnswer'])->name('mahasiswa.submitAnswer');

Route::get('/dosen', [DosenController::class, 'index'])->name('dosen.index');
Route::post('/dosen/submit-answer', [DosenController::class, 'submitAnswer'])->name('dosen.submitAnswer');

Route::get('/staff', [MahasiswaController::class, 'index'])->name('staff.index');
Route::post('/staff/submit-answer', [StaffController::class, 'submitAnswer'])->name('staff.submitAnswer');

Route::get('/mitra', [MahasiswaController::class, 'index'])->name('mitra.index');
Route::post('/mitra/submit-answer', [MitraController::class, 'submitAnswer'])->name('mitra.submitAnswer');

Route::get('/alumni', [MahasiswaController::class, 'index'])->name('alumni.index');
Route::post('/alumni/submit-answer', [AlumniController::class, 'submitAnswer'])->name('alumni.submitAnswer');

Route::get('/pengguna-lulusan', [MahasiswaController::class, 'index'])->name('pengguna-lulusan.index');
Route::post('/pengguna-lulusan/submit-answer', [PenggunaLulusanController::class, 'submitAnswer'])->name('pengguna-lulusan.submitAnswer');


