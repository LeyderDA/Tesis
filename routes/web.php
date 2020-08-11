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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/area', 'HomeController@index')->name('area');
Route::get('/persona', 'HomeController@index')->name('persona');
Route::get('/Usuario', 'HomeController@index')->name('usuario');
Route::get('/Reclamante', 'HomeController@index')->name('reclamante');
Route::get('/Recepcion', 'HomeController@index')->name('recepcion');
Route::get('/Gestion', 'HomeController@index')->name('gestion');
Route::get('/Asignacion', 'HomeController@index')->name('asignacion');


Route::get('/estudiante', 'estopcController@index')->name('estudiante');
Route::get('/persona', 'estopcController@index')->name('persona');
Route::get('/Reclamante', 'estopcController@index')->name('reclamante');
Route::get('/Recepcion', 'estopcController@index')->name('recepcion');
Route::get('/Gestion', 'estopcController@index')->name('gestion');
Route::get('/Asignacion', 'estopcController@index')->name('asignacion');


Route::get('/administrativo', 'admopcController@index')->name('administrativo');
Route::get('/area', 'admopcController@index')->name('area');
Route::get('/persona', 'admopcController@index')->name('persona');
Route::get('/Usuario', 'admopcController@index')->name('usuario');
Route::get('/Reclamante', 'admopcController@index')->name('reclamante');
Route::get('/Recepcion', 'admopcController@index')->name('recepcion');
Route::get('/Asignacion', 'admopcController@index')->name('asignacion');


Route::get('/docente', 'docopcController@index')->name('docente');
Route::get('/Recepcion', 'docopcController@index')->name('recepcion');
Route::get('/Gestion', 'docopcController@index')->name('gestion');


