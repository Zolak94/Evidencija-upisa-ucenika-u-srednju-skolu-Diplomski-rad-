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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/ucenici/unos', 'UcenikController@create')->name('ucenici.create');
Route::post('/ucenici', 'UcenikController@store')->name('ucenici.store');
Route::get('/ucenici', 'UcenikController@index')->name('ucenici.index');
Route::get('/ucenici/tabela', 'UcenikController@tabela')->name('ucenici.tabela');
Route::get('/ucenici/{id}/izmena', 'UcenikController@edit')->name('ucenici.edit');
Route::patch('/ucenici/{id}', 'UcenikController@update')->name('ucenici.update');
Route::get('/ucenici/{id}', 'UcenikController@show')->name('ucenici.show');
Route::delete('/ucenici/{id}', 'UcenikController@destroy')->name('ucenici.destroy');
