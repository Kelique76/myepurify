<?php

use App\Http\Controllers\Admin\BrandCTRL;
use App\Http\Controllers\Admin\CategoryCTRL;
use App\Http\Controllers\Admin\ColorCTRL;
use App\Http\Controllers\Admin\PrdCTRL;
use App\Http\Controllers\Admin\PrdKolorCTRL;
use App\Http\Controllers\Admin\SliderCTRL;
use App\Http\Controllers\Admin\UserCTRL;
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

Route::get('/', [App\Http\Controllers\FrontEnd\FrontCTRL::class, 'index']);
Route::get('/kategoriall', [App\Http\Controllers\FrontEnd\FrontCTRL::class, 'semuakats']);
Route::get('/koleksi/{cat_slug}', [App\Http\Controllers\FrontEnd\FrontCTRL::class, 'prdkats']);
Route::get('/koleksi/{cat_slug}/{prd_slug}', [App\Http\Controllers\FrontEnd\FrontCTRL::class, 'prddetail']);
Route::get('/produknya/{id}', [App\Http\Controllers\FrontEnd\FrontCTRL::class, 'prdetail']);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function(){
    Route::get('dashboard',[App\Http\Controllers\Admin\DashboardController::class, 'index']);
    // Route::get('category',[App\Http\Controllers\Admin\CategoryCTRL::class, 'index']);
    // Route::get('liatcategory',[App\Http\Controllers\Admin\CategoryCTRL::class, 'lihat']);
  //  Route::get('categori/{id}/edit',[App\Http\Controllers\Admin\CategoryCTRL::class, 'editlihat']);
    Route::controller(CategoryCTRL::class)->group(function () {
        Route::get('category', 'index');
        Route::get('hapuscats/{id}', 'hpscat')->name('hapus.cat');
        Route::get('liatcategory', 'lihat');
        Route::get('/categori/{cats}/edit', 'show');
        Route::post('tambahkat', 'tambahkan');
        Route::put('ubahkat/{cats}', 'update');
    });
    // Route::post('tambahkat',[App\Http\Controllers\Admin\CategoryCTRL::class, 'tambahkan']); listUser
    Route::controller(UserCTRL::class)->group(function () {
        Route::get('users', 'listUser');
    });
    Route::controller(ColorCTRL::class)->group(function () {
        Route::get('warnas', 'indexs');//
        Route::post('tambahwarna', 'nambah');
        Route::get('/warna/{id}/edit', 'show');
        Route::get('hapuswrn/{id}', 'hpswrn')->name('hapus.wrn');
        Route::put('ubahwrn/{id}', 'updatewrn')->name('ubah.wrn');
    });
    Route::controller(BrandCTRL::class)->group(function () {
        Route::get('merks', 'index');
        Route::get('nambahbrand', 'nambah');
        Route::get('/brand/{id}/edit', 'show');
        Route::post('tambahmerk', 'tambahkan');
        Route::get('hapusmerk/{id}', 'hpsmrk')->name('hapus.mrk');
        Route::put('ubahmrk/{id}', 'updatekan')->name('ubah.mrk');
    });
    Route::controller(SliderCTRL::class)->group(function () { 
        Route::get('addsliders', 'addslide'); 
        Route::post('addupsliders', 'addupslide'); 
        Route::get('hapusslide/{id}', 'hpslide')->name('hapus.sld');
        Route::get('/slideedit/{id}', 'show');
        Route::post('updatesliders/{id}', 'update')->name('ubah.sld');
    });
    Route::controller(PrdCTRL::class)->group(function () {
        Route::get('nambahprd', 'tambahprd'); 
        Route::get('sliders', 'slide'); 
        Route::get('liatprd', 'lihatprd');     
        Route::post('nambahiprd', 'uploadata');    
        Route::get('hapusgbr/{id}', 'hpsgbr');
        Route::get('/produk/{id}/edit', 'show');
        Route::post('/produk/{id}/{idw}', 'updatewarna');
        Route::get('/produks/{id}', 'hpswarna');
        Route::get('/produkdel/{id}/hapus', 'hapus');
        Route::post('updateprd/{id}', 'updetan')->name('ubah.pdk');
       
    });
    Route::controller(PrdKolorCTRL::class)->group(function () {
        Route::post('ubahprdcolor/{id}', 'updetcolor')->name('ubah.pdklr');
    });
});
// Auth::routes();


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
