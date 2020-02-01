<?php

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

Route::get('/', function () { return view('index'); });
/**
 * pegawai
 */
Route::get('/pegawai',          function () { return view('pegawai.index'); });
Route::get('/pegawai/create',   function () { return view('pegawai.create'); });
Route::get('/pegawai/riwayat',   function () { return view('pegawai.riwayat'); });
Route::get('/pegawai/show',   function () { return view('pegawai.show'); });
// Route::get('/', function () { return view('welcome'); });
// Route::get('/', function () { return view('welcome'); });

// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
