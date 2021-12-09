<?php

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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes(['register'=>false]);

// Route::get('/home', function() {
//     return view('home');
// })->name('home')->middleware('auth');


Route::group(['middleware'=>['auth', 'ceklevel:Admin']], function(){
    Route::resource('users', \App\Http\Controllers\UserController::class)
    ->middleware('auth');
    Route::resource('/jenis', \App\Http\Controllers\JenisController::class)
    ->middleware('auth');
    Route::get('/produk/jenis/{jenis_kode}', [App\Http\Controllers\ProdukController::class, 'index']);
    // Route::get('/produk/create', [App\Http\Controllers\ProdukController::class, 'create']);
    Route::get('/tambahperaturan', [App\Http\Controllers\ProdukController::class, 'create']);
    Route::resource('tambahperaturan', \App\Http\Controllers\ProdukController::class)
    ->middleware('auth');
});


Route::group(['middleware'=>['auth', 'ceklevel:Admin,Operator']], function(){

    Route::get('produk/{berkas}/download', [App\Http\Controllers\ProdukController::class, 'download'])->name('produk.download');

    Route::get('/dashboard', function () {
        return view('dashboard');
    });
    Route::resource('produk', \App\Http\Controllers\ProdukController::class)
    ->middleware('auth');

    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');

    Route::post('/profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

    Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

});

