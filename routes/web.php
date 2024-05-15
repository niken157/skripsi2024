<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\UserController;
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


Route::middleware(['guest'])->group(function() {
    Route::get('/login',[SesiController::class,'index'])->name('login');
    Route::post('/login',[SesiController::class,'login']);
    Route::get('/register', [SesiController::class, 'register']);
    Route::post('registerdone', [SesiController::class, 'create']);
});
Route::get('/', function () {
    return redirect('/superadmin');
});
Route::middleware(['auth'])->group(function() {
    Route::get('/superadmin', [HomeController::class, 'index'])->middleware('userAkses:admin');
    //halaman produk
    Route::get('/produk', [ProdukController::class, 'index'])->middleware('userAkses:admin');
    Route::get('/produkk', [ProdukController::class, 'utama'])->middleware('userAkses:admin');
    Route::get('/produk/tambah', [ProdukController::class, 'tambah'])->middleware('userAkses:admin');
    Route::post('/produk/store', [ProdukController::class, 'store'])->middleware('userAkses:admin');
    Route::get('/produk/edit/{id_produk}', [ProdukController::class, 'edit'])->middleware('userAkses:admin');
    Route::post('/produk/update', [ProdukController::class, 'update'])->middleware('userAkses:admin');
    Route::get('/produk/hapus/{id_produk}', [ProdukController::class, 'hapus'])->middleware('userAkses:admin');
    Route::get('/produk/hapus_semua', [ProdukController::class, 'hapus_s'])->middleware('userAkses:admin');
    //halaman pemesanan
    Route::get('/pemesanan', [PemesananController::class, 'index'])->middleware('userAkses:admin');
    Route::get('/pemesanan/tambah', [PemesananController::class, 'tambah'])->middleware('userAkses:admin');
    Route::post('/pemesanan/store', [PemesananController::class, 'store'])->middleware('userAkses:admin');
    Route::get('/pemesanan/edit/{id_penjualan}', [PemesananController::class, 'edit'])->middleware('userAkses:admin');
    Route::post('/pemesanan/update', [PemesananController::class, 'update'])->middleware('userAkses:admin');
    Route::get('/pemesanan/hapus/{id_penjualan}', [PemesananController::class, 'hapus'])->middleware('userAkses:admin');
    Route::get('/pemesanan/hapus_semua', [PemesananController::class, 'hapus_s'])->middleware('userAkses:admin');
    //halaman penjualan
    Route::get('/penjualan', [PenjualanController::class, 'index'])->middleware('userAkses:admin');
    Route::post('/penjualan/store', [PenjualanController::class, 'store'])->middleware('userAkses:admin');
    Route::get('/penjualan/edit/{id_penjualan}', [PenjualanController::class, 'edit'])->middleware('userAkses:admin');
    Route::post('/penjualan/update', [PenjualanController::class, 'update'])->middleware('userAkses:admin');
    Route::get('/penjualan/hapus/{id_penjualan}', [PenjualanController::class, 'hapus'])->middleware('userAkses:admin');
    Route::get('/penjualan/hapus_kelompok/{nomer_penjualan}', [PenjualanController::class, 'hapus_s'])->middleware('userAkses:admin');
    Route::get('/detail/{nomer_penjualan}', [PenjualanController::class, 'detailshow'])->middleware('userAkses:admin');
    Route::get('/detail/selesai/{nomer_penjualan}', [PenjualanController::class, 'updateData'])->middleware('userAkses:admin');
    Route::get('/detail/nota/{nomer_penjualan}', [PenjualanController::class, 'cetak'])->middleware('userAkses:admin');
    //halaman riwayat
    Route::get('/riwayat', [RiwayatController::class, 'index'])->middleware('userAkses:admin');
    Route::get('/riwayatt/{nomer_penjualan}', [RiwayatController::class, 'detail'])->middleware('userAkses:admin');
    Route::get('/riwayatt/nota/{nomer_penjualan}', [PenjualanController::class, 'cetak'])->middleware('userAkses:admin');
    //halaman user
    Route::get('/utama', [UserController::class, 'index'])->middleware('userAkses:user');
    Route::get('/keranjang/{id_users}', [UserController::class, 'keranjang'])->middleware('userAkses:user');
    Route::post('/keranjang/update', [UserController::class, 'update'])->middleware('userAkses:user');
    Route::get('/keranjang/hapus/{id_keranjang}', [UserController::class, 'hapus'])->middleware('userAkses:user');
    Route::get('/checkout/{id_users}', [UserController::class, 'checkout'])->middleware('userAkses:user');
    Route::post('/checkoutproses', [UserController::class, 'prosescheckout'])->middleware('userAkses:user'); //tambah penjualan

    Route::get('/konfirmasi', [UserController::class, 'selesai'])->middleware('userAkses:user');
    Route::get('/detailproduk/{id_produk}', [UserController::class, 'detail'])->middleware('userAkses:user');
    Route::post('/detailproduk/store', [UserController::class, 'store'])->middleware('userAkses:user');
    Route::get('/logout', [SesiController::class, 'logout']);
});
?>
