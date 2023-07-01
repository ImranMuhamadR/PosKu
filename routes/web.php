<?php

use App\Http\Controllers\KatagoriController;
use App\Http\Controllers\ProdukController;
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

// no fix there is one problem on '=>'
// fungsi ini akan meredirect ke halaman login
// Route::get('/', fn () => redirect()->route('login'));

// fix
// fungsi ini akan meredirect ke halaman login
Route::get('/', function () {
    return redirect()->route('login');
});

// fix
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function(){
    // ini akan mengembalikan ke halaman home.blade.php yang di extends dari file master.blade.php
    return view('home');
})->name('dashboard');

Route::group(['middleware' => 'auth'], function(){
    Route::get('/katagori/data', [KatagoriController::class, 'data'])->name('katagori.data');
    Route::resource('/katagori', KatagoriController::class);

    Route::get('/produk/data', [ProdukController::class, 'data'])->name('produk.data');
    Route::resource('/produk', ProdukController::class);
});

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     // route ini mengakses pada views/dashboard.blade.php
//     Route::get('/dashboard', function () {
//         return view('home');
//     })->name('dashboard');
// });
