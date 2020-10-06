<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//RUTAS DE API PARA AREAS
Route::post('/area', 'AreaController@store')->name('areaGuardar');
Route::get('/area', 'AreaController@index')->name('areaListar');
Route::delete('/area/{id}', 'AreaController@destroy')->name('areaEliminar');
Route::put('/area/{id}', 'AreaController@update')->name('areaActualizar');
Route::get('/area/{id}', 'AreaController@buscar')->name('areabuscar');


//RUTAS DE API PARA PERSONAS
Route::post('/persona', 'PersonaController@store')->name('personaGuardar');
Route::get('/persona', 'PersonaController@index')->name('personaListar');
Route::delete('/persona/{id}', 'PersonaController@destroy')->name('personaEliminar');
Route::put('/persona/{id}', 'PersonaController@update')->name('personaActualizar');
Route::get('/persona/{id}', 'PersonaController@buscar')->name('personabuscar');


//RUTAS DE API PARA USUARIOS
Route::post('/user', 'UsuarioController@store')->name('usuarioGuardar');
Route::get('/user', 'UsuarioController@index')->name('usuarioListar');
Route::delete('/user/{id}', 'UsuarioController@destroy')->name('usuarioEliminar');
Route::put('/user/{id}', 'UsuarioController@update')->name('usuarioActualizar');
Route::get('/user/{id}', 'UsuarioController@buscar')->name('userbuscar');
Route::get('/user2/{id}', 'UsuarioController@buscarusuced')->name('userbuscarcedu');

//RUTAS DE API PARA RECEPCIONES
Route::post('/recepcion', 'RecepcionController@store')->name('recepcionGuardar');
Route::get('/recepcionqr/{id}', 'RecepcionController@qrcode');
Route::get('/recepcionqr2/{id}', 'RecepcionController@qrcodedocest');

Route::get('/recepcion', 'RecepcionController@index')->name('recepcionListar');
Route::delete('/recepcion/{id}', 'RecepcionController@destroy')->name('recepcionEliminar');
Route::put('/recepcion/{id}', 'RecepcionController@update')->name('recepcionActualizar');
Route::get('/recepcion/{id}', 'RecepcionController@buscar')->name('recepcionbuscar');

Route::get('/recepcionSUPER', 'SUPERADMINController@indexRecepcion')->name('recepcionSuperListar');

//RUTAS DE API PARA RECLAMANTES
Route::post('/reclamante', 'ReclamanteController@store')->name('reclamanteGuardar');
Route::get('/reclamante', 'ReclamanteController@index')->name('reclamanteListar');
Route::delete('/reclamante/{id}', 'ReclamanteController@destroy')->name('reclamanteEliminar');
Route::put('/reclamante/{id}', 'ReclamanteController@update')->name('reclamanteActualizar');
Route::get('/reclamante/{id}', 'ReclamanteController@buscar')->name('reclamantebuscar');

//RUTAS DE API PARA LA GESTION
Route::post('/gestion', 'GestionController@store')->name('gestionGuardar');
Route::get('/gestion', 'GestionController@index')->name('gestionListar');
Route::delete('/gestion/{id}', 'GestionController@destroy')->name('gestionEliminar');
Route::put('/gestion/{id}', 'GestionController@update')->name('gestionActualizar');

Route::get('/gestionSUPER', 'SUPERADMINController@indexGestion')->name('gestionSuperListar');

//RUTAS DE API PARA ASIGNAR RECEPCIONES
Route::post('/asigrecep', 'AsigRecepController@store')->name('asigrecepGuardar');
Route::get('/asigrecep', 'AsigRecepController@index')->name('asigrecepListar');
Route::delete('/asigrecep/{id}', 'AsigRecepController@destroy')->name('asigrecepEliminar');
Route::put('/asigrecep/{id}', 'AsigRecepController@update')->name('asigrecepActualizar');
Route::get('/asigrecep/{id}', 'AsigRecepController@indexRecepcion')->name('asigrecepbuscar');


//RUTAS DE API PARA NOTAS
Route::post('/notas', 'NotasController@store')->name('notasGuardar');
Route::get('/notas', 'NotasController@index')->name('notasListar');
Route::delete('/notas/{id}', 'NotasController@destroy')->name('notasEliminar');
Route::put('/notas/{id}', 'NotasController@update')->name('NotasActualizar');


//RUTAS DE API PARA OBSERVACIONES
Route::post('/observaciones', 'ObservacionesController@store')->name('obsGuardar');
Route::get('/observaciones', 'ObservacionesController@index')->name('obsListar');
Route::delete('/observaciones/{id}', 'ObservacionesController@destroy')->name('obsEliminar');
Route::put('/observaciones/{id}', 'ObservacionesController@update')->name('obsActualizar');

//RUTA PARA MOSTRAR EL QR DEL USUARIO LOGUEADO
Route::get('/miusuario', 'MiUsuarioController@index')->name('Listar');