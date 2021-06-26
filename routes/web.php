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
    return view('/auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\BarangController::class, 'index'])->name('home');
Route::post('/home/tambah', [App\Http\Controllers\BarangController::class, 'tambah'])->name('home');
Route::get('/edit/{id}', [App\Http\Controllers\BarangController::class, 'edit'])->name('edit');
Route::post('/edit/update', [App\Http\Controllers\BarangController::class, 'update'])->name('edit');
Route::get('/hapus/{id}', [App\Http\Controllers\BarangController::class, 'hapus'])->name('hapus');
