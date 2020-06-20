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

Route::get('/', 'HomeController@index')->name('ucenici.pocetna');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/ucenici/unos', 'UcenikController@create')->name('ucenici.create');
Route::post('/ucenici', 'UcenikController@store')->name('ucenici.store');
Route::get('/ucenici', 'UcenikController@index')->name('ucenici.index');
Route::post('/ucenici/tabela', 'UcenikController@tabela')->name('ucenici.tabela');
Route::get('/ucenici/{id}/izmena', 'UcenikController@edit')->name('ucenici.edit');
Route::patch('/ucenici/{id}', 'UcenikController@update')->name('ucenici.update');
Route::get('/ucenici/{id}', 'UcenikController@show')->name('ucenici.show');
Route::delete('/ucenici/{id}', 'UcenikController@destroy')->name('ucenici.destroy');


Route::get('/odeljenja/unos', 'OdeljenjeController@create')->name('odeljenja.create');
Route::post('/odeljenja', 'OdeljenjeController@store')->name('odeljenja.store');
Route::get('/odeljenja', 'OdeljenjeController@index')->name('odeljenja.index');
Route::post('/odeljenja/tabela', 'OdeljenjeController@tabela')->name('odeljenja.tabela');
Route::get('/odeljenja/{id}/izmena', 'OdeljenjeController@edit')->name('odeljenja.edit');
Route::patch('/odeljenja/{id}', 'OdeljenjeController@update')->name('odeljenja.update');
Route::get('/odeljenja/{id}', 'OdeljenjeController@show')->name('odeljenja.show');
Route::delete('/odeljenja/{id}', 'OdeljenjeController@destroy')->name('odeljenja.destroy');
