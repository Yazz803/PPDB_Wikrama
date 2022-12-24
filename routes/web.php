<?php

use App\Http\Controllers\BiodataController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PembayaranController;

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
    Route::prefix('pembayaran')->group(function () {
        Route::get('/', [PagesController::class, 'dashboardPembayaranUser'])->name('dashboard.pembayaran.user')->middleware('UserOnly');
        Route::post('/', [PembayaranController::class, 'store'])->name('dashboard.pembayaran.store');
        Route::middleware('AdminOnly')->group(function() {
            Route::put('/tolak-pembayaran/{pembayaran:id}', [PembayaranController::class, 'updateTolakPembayaran'])->name('dashboard.pembayaran.tolak');
            Route::put('/verifikasi-pembayaran/{pembayaran:id}', [PembayaranController::class, 'updateVerifikasiPembayaran'])->name('dashboard.pembayaran.verifikasi');
            Route::get('/list-pembayaran', [PagesController::class, 'dashboardPembayaranAdmin'])->name('dashboard.pembayaran.admin');
            Route::get('/detail-pembayaran/{pembayaran:id}', [PagesController::class, 'detailPembayaran'])->name('dashboard.detailPembayaran');
            Route::get('/bukti-pembayaran/{pembayaran:id}', [PagesController::class, 'buktiPembayaran'])->name('dashboard.buktiPembayaran');
        });
    });
});
Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::post('/pendaftaran', [BiodataController::class, 'store'])->name('form.store');

Route::get('/gk-boleh-kesini', function() {
    return view('forbidenPage');
})->name('forbidenPage');
