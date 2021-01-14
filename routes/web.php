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

Route::get('/', 'App\Http\Controllers\UserController@index')->name('UserIndex');
Route::get('/wisata','App\Http\Controllers\UserController@wisata')->name('UserWisata');
Route::get('/wisata/{id}','App\Http\Controllers\UserController@show')->name('DetailWisataUser');
Route::get('/wisata/{id}/show','App\Http\Controllers\UserController@showMaps');
Route::post('/wisata/{id}/rating','App\Http\Controllers\UserController@rating');
Route::post('/wisata/{id}/komentar','App\Http\Controllers\UserController@komentar');
Route::get('/lokasi','App\Http\Controllers\UserController@lokasi')->name('UserLokasi');
Route::get('/tentang','App\Http\Controllers\UserController@tentang')->name('UserTentang');
Route::get('/login','App\Http\Controllers\AuthController@index')->name('formLogin');
Route::post('/login','App\Http\Controllers\AuthController@login')->name('login');

Route::group(['middleware' => 'auth'], function(){
    Route::get('/logout','App\Http\Controllers\AuthController@logout')->name('logout');
    Route::get('/admin', 'App\Http\Controllers\AdminController@index')->name('AdminIndex');
    Route::get('/admin/tentang', 'App\Http\Controllers\AdminController@tentang')->name('AdminTentang');
    Route::get('/admin/lokasi', 'App\Http\Controllers\AdminController@lokasi')->name('AdminLokasi');
    Route::get('/admin/wisata/{id}/show', 'App\Http\Controllers\WisataController@showmaps');
    Route::post('/admin/wisata/{id}/rating', 'App\Http\Controllers\WisataController@rating');
    Route::post('/admin/wisata/{id}/komentar','App\Http\Controllers\WisataController@komentar');
    Route::resource('/admin/wisata', 'App\Http\Controllers\WisataController');
});
