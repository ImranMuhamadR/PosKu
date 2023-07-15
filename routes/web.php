<?php

use App\Http\Controllers\KatagoriController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\PembelianDetailController;
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
    Route::post('/produk/delete_selected', [ProdukController::class, 'deleteSelected'])->name('produk.delete_selected');
    Route::resource('/produk', ProdukController::class);

    Route::get('/supplier/data', [SupplierController::class, 'data'])->name('supplier.data');
    Route::resource('/supplier', SupplierController::class);

    Route::get('/pengeluaran/data', [PengeluaranController::class, 'data'])->name('pengeluaran.data');
    Route::resource('/pengeluaran', PengeluaranController::class);

    Route::get('/pembelian/data', [PembelianController::class, 'data'])->name('pembelian.data');
    Route::get('/pembelian/{id}/create', [PembelianController::class, 'create'])->name('pembelian.create');
    Route::resource('/pembelian', PembelianController::class)
        ->except('create');

    Route::get('/pembelian_detail/{id}/data', [PembelianDetailController::class, 'data'])->name('pembelian_detail.data');
    Route::get('/pembelian_detail/loadform/{diskon}/{total}', [PembelianDetailController::class, 'loadForm'])->name('pembelian_detail.load_form');
    Route::resource('/pembelian_detail', PembelianDetailController::class)
    ->except('create', 'show', 'edit');
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
