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

Route::get('/home', 'HomeController@index')->name('home')->middleware();
Route::get('/area', 'HomeController@index')->name('area')->middleware('Usuario_Area_Asig');
Route::get('/persona', 'HomeController@index')->name('persona')->middleware('Persona_Reclamante');
Route::get('/Usuario', 'HomeController@index')->name('usuario')->middleware('Usuario_Area_Asig');
Route::get('/Reclamante', 'HomeController@index')->name('reclamante')->middleware('Persona_Reclamante');
Route::get('/Recepcion', 'HomeController@index')->name('recepcion')->middleware();
Route::get('/Gestion', 'HomeController@index')->name('gestion')->middleware('Gestion');
Route::get('/Asignacion', 'HomeController@index')->name('asignacion')->middleware('Usuario_Area_Asig');


Route::get('/estudiante', 'estopcController@index')->name('estudiante')->middleware();
Route::get('/administrativo', 'admopcController@index')->name('administrativo')->middleware();
Route::get('/docente', 'docopcController@index')->name('docente')->middleware();





