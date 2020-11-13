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
Route::get('/user3/{id}', 'UsuarioController@aggestudianteRe')->name('buscarestud');
Route::get('/user4/{id}', 'UsuarioController@buscarusucedPRO')->name('userbuscarceduPRO');
Route::get('/user5/{id}', 'UsuarioController@buscarusucedADM')->name('userbuscarceduADM');


//RUTAS DE API PARA RECEPCIONES
Route::post('/recepcion', 'RecepcionController@store')->name('recepcionGuardar');
Route::get('/recepcionqr/{id}', 'RecepcionController@qrcode');
Route::get('/recepcionqr2/{id}', 'RecepcionController@qrcodedocest');
Route::get('/recepcionest', 'RecepcionController@indexEst')->name('recepcionListarest');
Route::get('/recepcionRE/{id}', 'RecepcionController@MostrarR')->name('recep');
Route::get('/recepcionEST/{id}', 'RecepcionController@MostraESTUDIANTE')->name('recepEST');
Route::get('/recepcion', 'RecepcionController@index')->name('recepcionListar');
Route::get('/recepcionn', 'RecepcionController@indexx')->name('recepcionListar2');
Route::delete('/recepcion/{id}', 'RecepcionController@destroy')->name('recepcionEliminar');
Route::put('/recepcion/{id}', 'RecepcionController@update')->name('recepcionActualizar');
Route::put('/recepcionAreUpdate/{id}', 'RecepcionController@updateArea')->name('recepcionActualizarArea');

Route::put('/recepcionaABO/{id}', 'RecepcionController@updateABOGADO')->name('recepcionActualizarAbogado');


Route::put('/recepcion2/{id}', 'RecepcionController@update2')->name('recepcionActualizar2');
Route::get('/recepcion/{id}', 'RecepcionController@buscar')->name('recepcionbuscar');
Route::get('/recepcionSUPER', 'SUPERADMINController@indexRecepcion')->name('recepcionSuperListar');
Route::get('/recepcionSUPEREsta', 'SUPERADMINController@indexRecepcionEstado')->name('recepcionSuperListarEsta');

Route::post('/recepcionRespaldo', 'RecepcionController@storeRespaldo')->name('recepcionResp');

//RUTAS DE API PARA RECLAMANTES
Route::post('/reclamante', 'ReclamanteController@store')->name('reclamanteGuardar');
Route::get('/reclamante', 'ReclamanteController@index')->name('reclamanteListar');
Route::delete('/reclamante/{id}', 'ReclamanteController@destroy')->name('reclamanteEliminar');
Route::put('/reclamante/{id}', 'ReclamanteController@update')->name('reclamanteActualizar');
Route::get('/reclamante/{id}', 'ReclamanteController@buscar')->name('reclamantebuscar');
Route::get('/reclamante2/{id}', 'ReclamanteController@buscarreclaced')->name('reclamantebuscar2');

//RUTAS DE API PARA LA GESTION
Route::post('/gestion', 'GestionController@store')->name('gestionGuardar');

Route::post('/gestionRespaldo', 'GestionController@storeRespaldo')->name('gestionGuardarR');

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


//RUTAS DE API PARA FOROS
Route::post('/foro', 'ForosController@store')->name('ForosGuardar');
Route::post('/forito', 'ForosController@storee')->name('ForosGuardar');
Route::get('/foro', 'ForosController@index')->name('ForosListar');
Route::get('/foroEst', 'ForosController@indexEst')->name('ForosListare');
Route::delete('/foro/{id}', 'ForosController@destroy')->name('ForosEliminar');
Route::put('/foro/{id}', 'ForosController@update')->name('ForosActualizar');
Route::get('/forobusq/{id}', 'ForosController@buscarForo')->name('Forosbuscar');


//RUTAS DE API PARA ARCHIVOS DE LA GESTION
Route::post('/archivoges', 'ArchivosGestionesController@store')->name('ARCHGuardar');
Route::post('/archivogestionA', 'ArchivosGestionesController@storeARCH')->name('ARCHGuardar');
Route::get('/archivogestion', 'ArchivosGestionesController@index')->name('ARCHListar');
Route::get('/archivogestion', 'ArchivosGestionesController@indexEst')->name('ARCHListare');
Route::delete('/archivogestion/{id}', 'ArchivosGestionesController@destroy')->name('ARCHEliminar');
Route::put('/archivogestion/{id}', 'ArchivosGestionesController@update')->name('ARCHActualizar');


//RUTAS DE API PARA ARCHIVOS DE LOS RECLAMANTES
Route::post('/archivoRecla', 'ArchivosReclamantesController@store')->name('ARCHGuardar');
Route::post('/archivoR', 'ArchivosReclamantesController@storeARCH')->name('ARCHGuardar');