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
Route::get('/area', 'HomeController@index')->name('area')->middleware('Administrativo_Middleware');
Route::get('/persona', 'HomeController@index')->name('persona')->middleware('Administrativo_Middleware');
Route::get('/Usuario', 'HomeController@index')->name('usuario')->middleware('Administrativo_Middleware');
Route::get('/Reclamante', 'HomeController@index')->name('reclamante')->middleware('Administrativo_Middleware');
Route::get('/Recepcion', 'HomeController@index')->name('recepcion')->middleware('Administrativo_Middleware');
Route::get('/Gestion', 'HomeController@index')->name('gestion')->middleware('EstudianteMiddleware');
Route::get('/Asignacion', 'HomeController@index')->name('asignacion')->middleware('Administrativo_Middleware');
Route::get('/RecepEst', 'HomeController@index')->name('recepest')->middleware('Compartido_Middleware');
Route::get('/DocGestion', 'HomeController@index')->name('gestdoc')->middleware('Docente_Middleware');

Route::get('/estudiante', 'estopcController@index')->name('estudiante')->middleware('Estudiante_Middleware');
Route::get('/administrativo', 'admopcController@index')->name('administrativo')->middleware('Administrativo_Middleware');
Route::get('/docente', 'docopcController@index')->name('docente')->middleware('Docente_Middleware');



Route::get('/recepcionqr/{id}', 'RecepcionController@qrcode');
Route::get('/recepcionqr2/{id}', 'RecepcionController@qrcodedocest');


