<?php

use App\Http\Controllers\cetak_absen;
use App\Http\Controllers\cetak_absen_siswa_pdf;
use App\Http\Controllers\cetak_presensi_siswa;
use App\Http\Controllers\DataAbsenGuru;
use App\Http\Controllers\DataAbsenSiswa;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\GuruMengajarController;
use App\Http\Controllers\info_account;
use App\Http\Controllers\info_account_guru;
use App\Http\Controllers\info_account_siswa;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\InformasiSekolahController;
use App\Http\Controllers\jadwal_mengajarController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\PresensiSiswaController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\rekap_absen_siswa;
use App\Http\Controllers\Rekap_absen_siswaController;
use App\Http\Controllers\SiswaController;
use App\Models\guruMengajar;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware('CheckLevel:admin')->group(function() {
    Route::resource('/informasi', InformasiController::class);
    Route::resource('/data_umum/kelas', KelasController::class);
    Route::resource('/data_umum/jurusan', JurusanController::class);
    Route::resource('/data_umum/mata_pelajaran', MapelController::class);
    Route::resource('/jadwal_mengajar', jadwal_mengajarController::class);
    Route::resource('/data_siswa', SiswaController::class);
    Route::resource('/data_guru', GuruController::class);
    Route::resource('/info_account', info_account::class);
    Route::get('data_absen_siswa', [DataAbsenSiswa::class, 'index']);
    Route::get('data_absen_siswa/{id}', [DataAbsenSiswa::class, 'show']);
    Route::resource('cetak_absen_siswa_pdf', cetak_absen_siswa_pdf::class);
    Route::get('data_absen_guru', [DataAbsenGuru::class, 'index']);
    Route::get('cetak_absen_guru/cetak', [DataAbsenGuru::class, 'cetak']);
});

Route::middleware('CheckLevel:admin,guru')->group(function() {
    Route::get('/rekap_absen_siswa', [rekap_absen_siswa::class, 'index']);
    Route::get('/rekap_absen_siswa/{id}', [rekap_absen_siswa::class, 'show']);
    Route::get('/rekap_absen_siswa/{id}/edit', [rekap_absen_siswa::class, 'edit']);
    Route::put('/rekap_absen_siswa/{id}', [rekap_absen_siswa::class, 'update']);
    Route::resource('/cetak_pdf', cetak_absen::class);
});

Route::get('/informasi_sekolah', [InformasiSekolahController::class, 'index'])
->middleware('CheckLevel:guru,siswa');

Route::middleware('CheckLevel:guru')->group(function() {
    Route::resource('/mengajar', GuruMengajarController::class);
    Route::resource('/info_account_guru', info_account_guru::class);
});

Route::middleware('CheckLevel:siswa')->group(function() {
    Route::resource('/presensi_siswa', PresensiSiswaController::class);
    Route::resource('/info_account_siswa', info_account_siswa::class);
});


Route::middleware('guest')->group(function () {
    Route::controller(RegisterController::class)->group(function() {
        Route::get('register', 'showRegistrationForm')->name('register');
        Route::get('register/siswa', 'registerSiswa')->name('registerSiswa');
        Route::post('register/siswa', 'registerUserSiswa')->name('registerSiswa');
        Route::get('register/guru', 'registerGuru')->name('registerGuru');
        Route::post('register/guru', 'registerUserGuru')->name('registerGuru');
    });

    Route::controller(LoginController::class)->group(function() {
        Route::get('login', 'showLoginForm')->name('login');
        Route::get('/', 'showLoginForm');
        Route::post('login', 'loginUser');
    });
});

Route::get('/logout', [LoginController::class, 'logout'])->middleware('auth');
