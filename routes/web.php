<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\BiodataController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\UserDashboardController;

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

Route::get('/', [PagesController::class, 'index'])->name('landingpage');
Route::get('/pendaftaran', [PagesController::class, 'formPage'])->name('form.index');

Route::group(['middleware' => 'mustLogin', 'prefix' => 'dashboard'], function () {
    Route::get('/', [PagesController::class, 'dashboard'])->name('dashboard.index');
    Route::get('/riwayat-pembayaran', [PembayaranController::class, 'riwayatPembayaran'])->name('dashboard.riwayatpembayaran.user');
    Route::prefix('pembayaran')->group(function () {
        Route::get('/', [PagesController::class, 'dashboardPembayaranUser'])->name('dashboard.pembayaran.user')->middleware('UserOnly');
        Route::post('/', [PembayaranController::class, 'store'])->name('dashboard.pembayaran.store');
        Route::middleware('AdminOnly')->group(function() {
            Route::put('/tolak-pembayaran/{pembayaran:id}', [PembayaranController::class, 'updateTolakPembayaran'])->name('dashboard.pembayaran.tolak');
            Route::put('/verifikasi-pembayaran/{pembayaran:id}', [PembayaranController::class, 'updateVerifikasiPembayaran'])->name('dashboard.pembayaran.verifikasi');
            Route::get('/list-pembayaran', [PembayaranController::class, 'dashboardPembayaranAdmin'])->name('dashboard.pembayaran.admin');
            Route::get('/detail-pembayaran/{pembayaran:id}', [PembayaranController::class, 'detailPembayaran'])->name('dashboard.detailPembayaran');
            Route::get('/bukti-pembayaran/{pembayaran:id}', [PembayaranController::class, 'buktiPembayaran'])->name('dashboard.buktiPembayaran');
        });
    });
    Route::middleware('AdminOnly')->group(function () {
        Route::get('/data-siswa', [BiodataController::class, 'dataSemuaSiswa'])->name('dashboard.dataSemuaSiswa');
        Route::get('/data-siswa/{biodata:id}', [BiodataController::class, 'dataSiswa'])->name('dashboard.dataSiswa');
        Route::delete('/data-siswa/{biodata:id}', [BiodataController::class, 'destroy'])->name('dashboard.dataSiswa.delete');
        Route::get('/all-users', [UserDashboardController::class, 'index'])->name('dashboard.allUsers');
    });
});
Route::get('/login', [LoginController::class, 'index'])->name('login.index')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::post('/pendaftaran', [BiodataController::class, 'store'])->name('form.store');

Route::get('/gk-boleh-kesini', function() {
    return view('forbidenPage');
})->name('forbidenPage');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
