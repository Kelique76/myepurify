<?php

use App\Http\Controllers\Admin\BrandCTRL;
use App\Http\Controllers\Admin\CategoryCTRL;
use App\Http\Controllers\Admin\PrdCTRL;
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

Route::get('/', function () {
    return view('welcome');
});


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
    // Route::post('tambahkat',[App\Http\Controllers\Admin\CategoryCTRL::class, 'tambahkan']); addprd
    Route::controller(BrandCTRL::class)->group(function () {
        Route::get('merks', 'index');
              
        Route::get('nambahbrand', 'nambah');
        Route::get('/brand/{id}/edit', 'show');
        Route::post('tambahmerk', 'tambahkan');
        Route::get('hapusmerk/{id}', 'hpsmrk')->name('hapus.mrk');
        Route::put('ubahmrk/{id}', 'updatekan')->name('ubah.mrk');
    });

    Route::controller(PrdCTRL::class)->group(function () {
        Route::get('nambahprd', 'tambahprd'); 
        Route::get('liatprd', 'lihatprd');     
        Route::post('nambahiprd', 'uploadata');    
        // Route::get('nambahbrand', 'nambah');
        // Route::get('/brand/{id}/edit', 'show');
        // Route::post('tambahmerk', 'tambahkan');
        // Route::get('hapusmerk/{id}', 'hpsmrk')->name('hapus.mrk');
        // Route::put('ubahmrk/{id}', 'updatekan')->name('ubah.mrk');
    });
   // Route::get('/merks',App\Http\Livewire\Admin\Brand\Index::class);
});
// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
