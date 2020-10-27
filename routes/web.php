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
Route::get('/MisRecepciones', 'HomeController@index')->name('misrecepciones')->middleware('Administrativo_Middleware');
Route::get('/RECEPESTADOSUPER', 'HomeController@index')->name('persona')->middleware('Administrativo_Middleware');
Route::get('/persona', 'HomeController@index')->name('persona')->middleware('Administrativo_Middleware');
Route::get('/personavista', 'HomeController@index')->name('personavista')->middleware('Administrativo_Middleware');
Route::get('/Usuario', 'HomeController@index')->name('usuario')->middleware('Administrativo_Middleware');
Route::get('/UsuarioVista', 'HomeController@index')->name('usuariovista')->middleware('Administrativo_Middleware');
Route::get('/Reclamante', 'HomeController@index')->name('reclamante')->middleware('Administrativo_Middleware');
Route::get('/ReclamanteVista', 'HomeController@index')->name('reclamante')->middleware('Administrativo_Middleware');
Route::get('/Recepcion', 'HomeController@index')->name('recepcion')->middleware('Administrativo_Middleware');
Route::get('/Gestion', 'HomeController@index')->name('gestion')->middleware('EstudianteMiddleware');
Route::get('/GestionVistaSuper', 'HomeController@index')->name('gestionS')->middleware('Administrativo_Middleware');
Route::get('/Asignacion', 'HomeController@index')->name('asignacion')->middleware('Administrativo_Middleware');
Route::get('/AsignacionVista', 'HomeController@index')->name('asignacionvista')->middleware('Administrativo_Middleware');
Route::get('/RecepEst', 'HomeController@index')->name('recepest')->middleware('EstudianteMiddleware');
Route::get('/VistaReSu', 'HomeController@index')->name('vistaresu')->middleware('Administrativo_Middleware');
Route::get('/RecepDoc', 'HomeController@index')->name('recepdoc')->middleware('Docente_Middleware');
Route::get('/ForoDoc', 'HomeController@index')->name('Forodoc')->middleware('Docente_Middleware');
Route::get('/VerForoDoc', 'HomeController@index')->name('VerForodoc')->middleware('Docente_Middleware');
Route::get('/AggCalificaciones', 'HomeController@index')->name('calificaciones')->middleware('Docente_Middleware');
Route::get('/DocGestion', 'HomeController@index')->name('gestdocente')->middleware('Docente_Middleware');
Route::get('/EstGestion', 'HomeController@index')->name('gestdocente')->middleware('EstudianteMiddleware');
Route::get('/Notas', 'HomeController@index')->name('gestdoc')->middleware('Docente_Middleware');
Route::get('/Observaciones', 'HomeController@index')->name('gestdoc')->middleware('Docente_Middleware');
Route::get('/estudiante', 'estopcController@index')->name('estudiante')->middleware('Estudiante_Middleware');
Route::get('/administrativo', 'admopcController@index')->name('administrativo')->middleware('Administrativo_Middleware');
Route::get('/docente', 'docopcController@index')->name('docente')->middleware('Docente_Middleware');
Route::get('/qr', 'QRCode@index');
Route::get('/qr/{id}', 'QRCode@consultarRecepcion');
Route::get('/MiUsuario', 'HomeController@index')->name('miusuario');
Route::get('/recepcionqr/{id}', 'RecepcionController@qrcode');
Route::get('/Reportes', 'Controller@index')->name('reportes')->middleware('Administrativo_Middleware');
Route::get('/Est', 'EstadisticosController@est_recepciones')->name('estadisticos');
Route::get('tipo/{type}', 'SweetController@notification');
Route::get('/comentarios/{id}', 'ForosController@comentarios');
Route::get('/Prueba', 'HomeController@index')->name('prueba');


Route::post('/comentarios/crear', 'ComentariosController@store'); 






