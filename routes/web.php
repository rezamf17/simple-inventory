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
    return view('auth/login');
});
Route::get('barang', 'c_item@read');
Route::post('barang', 'c_item@add');
Route::delete('barang/{id}', 'c_item@delete');
Route::patch('barang/{id}', 'c_item@softDelete');
Route::get('in', 'c_masuk@show');
Route::get('/masuk', 'c_masuk@index');
Route::post('masuk', 'c_masuk@add');
Route::patch('masuk/{id}', 'c_masuk@softDelete');
Route::get('masuk/edit/{id}', 'c_masuk@edit');
Route::patch('masuk/edit/{id}', 'c_masuk@editProcess');
Route::get('barang/edit/{id}', 'c_item@edit');
Route::patch('barang/edit/{id}', 'c_item@editProcess');
// Route::put('masuk/{id}', 'c_masuk@update');
// Route::get('masuk/{id}', function ($id) {
//     return App\Models\In::findOrFail($id);
// });
// Route::post('/barang', 'c_barang@create');
Route::get('/keluar', 'c_keluar@index');
Route::post('keluar', 'c_keluar@add');
Route::patch('keluar/{id}', 'c_keluar@softDelete');
Route::get('keluar/edit/{id}', 'c_keluar@edit');
Route::patch('keluar/edit/{id}', 'c_keluar@editProcess');
// sampah
Route::get('sampah/sampahkeluar', 'sampah@keluar');
Route::get('sampah/sampahmasuk', 'sampah@masuk');
Route::get('sampah/sampahbarang', 'sampah@barang');
Route::delete('sampah/sampahkeluar/{id}', 'sampah@hapusKeluar');
Route::patch('sampah/sampahkeluar/{id}', 'sampah@restoreKeluar');
Route::delete('sampah/sampahmasuk/{id}', 'sampah@hapusMasuk');
Route::patch('sampah/sampahmasuk/{id}', 'sampah@restoreMasuk');
Route::delete('sampah/sampahbarang/{id}', 'sampah@hapusBarang');
Route::patch('sampah/sampahbarang/{id}', 'sampah@restoreBarang');
// Route::resource('barang', 'c_barang');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
