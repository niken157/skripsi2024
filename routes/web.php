<?php

use App\Http\Controllers\HomeController;
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
    Route::post('/',[SesiController::class,'login']);
});
Route::get('/', function () {
    return redirect('/superadmin');
});
Route::middleware(['auth'])->group(function() {
    Route::get('/superadmin', [HomeController::class, 'index'])->middleware('userAkses:admin');
     Route::get('/utama', [UserController::class, 'index'])->middleware('userAkses:user');
    Route::get('/logout', [SesiController::class, 'logout']);
});
// });
// untuk superadmin dan pegawai
// Route::middleware(['auth'])->group(function() {
//     Route::get('/superadmin', [HomeController::class, 'index'])->middleware('checkrole:1');
//     Route::get('/utama', [UserController::class, 'index'])->middleware('checkrole:1');
//     Route::post('/logout', [AuthController::class, 'logout']);
//     //Route::get('/redirect', [RedirectController::class, 'cek']);
// });
?>
