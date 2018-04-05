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

Route::get('/', function () {
     return view('welcome');
});
/*
Route::get('/', function () {
     return view('index');
});
*/

Route::resource('archivos/resolucion','ResolucionController');


Route::resource('archivos/personeria','PersoneriaController');
Route::get('archivos/personeria.index','PersoneriaController@downloadFile');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
