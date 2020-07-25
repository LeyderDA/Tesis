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




//RUTAS DE API PARA DOCENTES
Route::post('/docente', 'DocenteController@store')->name('docenteGuardar');
Route::get('/docente', 'DocenteController@index')->name('docenteListar');
Route::delete('/docente/{id}', 'DocenteController@destroy')->name('docenteEliminar');
Route::put('/docente/{id}', 'DocenteController@update')->name('docenteActualizar');
Route::get('/docente/{id}', 'DocenteController@buscar')->name('docentebuscar');


//RUTAS DE API PARA ESTUDIANTES
Route::post('/estudiante', 'EstudianteController@store')->name('estudianteGuardar');
Route::get('/estudiante', 'EstudianteController@index')->name('estudianteListar');
Route::delete('/estudiante/{id}', 'EstudianteController@destroy')->name('estudianteEliminar');
Route::put('/estudiante/{id}', 'EstudianteController@update')->name('estudianteActualizar');
Route::get('/estudiante/{id}', 'EstudianteController@buscar')->name('estudiantebuscar');


//RUTAS DE API PARA ADMINISTRATIVOS
Route::post('/administrativo', 'AdministrativoController@store')->name('administrativoGuardar');
Route::get('/administrativo', 'AdministrativoController@index')->name('administrativoListar');
Route::delete('/administrativo/{id}', 'AdministrativoController@destroy')->name('administrativoEliminar');
Route::put('/administrativo/{id}', 'AdministrativoController@update')->name('administrativoActualizar');
Route::get('/administrativo/{id}', 'AdministrativoController@buscar')->name('administrativobuscar');

//RUTAS DE API PARA RECEPCIONES
Route::post('/recepcion', 'RecepcionController@store')->name('recepcionGuardar');
Route::get('/recepcion', 'RecepcionController@index')->name('recepcionListar');
Route::delete('/recepcion/{id}', 'RecepcionControllerController@destroy')->name('recepcionEliminar');
Route::put('/recepcion/{id}', 'RecepcionController@update')->name('recepcionActualizar');

//RUTAS DE API PARA RECLAMANTES
Route::post('/reclamante', 'ReclamanteController@store')->name('reclamanteGuardar');
Route::get('/reclamante', 'ReclamanteController@index')->name('reclamanteListar');
Route::delete('/reclamante/{id}', 'ReclamanteController@destroy')->name('reclamanteEliminar');
Route::put('/reclamante/{id}', 'ReclamanteController@update')->name('reclamanteActualizar');
Route::get('/reclamante/{id}', 'ReclamanteController@buscar')->name('reclamantebuscar');
