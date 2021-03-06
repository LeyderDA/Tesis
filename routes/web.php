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
Route::get('/ALLGestion', 'HomeController@index')->name('area')->middleware('Administrativo_Middleware');

Route::get('/PersonaUSU', 'HomeController@index')->middleware('Administrativo_Middleware');

Route::get('/USERADMIN', 'HomeController@index')->middleware('Administrativo_Middleware');
Route::get('/USERADMINIS', 'HomeController@index')->middleware('Administrativo_Middleware');
Route::get('/USERABOGADO', 'HomeController@index')->middleware('Administrativo_Middleware');
Route::get('/USERDOCENTE', 'HomeController@index')->middleware('Administrativo_Middleware');

Route::get('/Notificaciones', 'HomeController@index')->name('mismensajes')->middleware('auth');

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
Route::get('/Reportes', 'HomeController@index')->name('reportes')->middleware('Administrativo_Middleware');


Route::get('/Est', 'EstadisticosController@est_recepciones')->name('estadisticos');

Route::get('/Est2', 'EstadisticosController@est_recepciones2')->name('estadisticos2');



Route::get('tipo/{type}', 'SweetController@notification');
Route::get('/Prueba', 'HomeController@index')->name('prueba');
Route::get('/BuscarQr', 'HomeController@index')->name('buscarqr');
Route::get('/CrearFirma', 'HomeController@index')->name('FIR')->middleware('Docente_Middleware');




//Firma de los pdf
Route::get('/CrearFir', 'FirmaController@index')->name('firma');

//rutas para los archivos de las gestiones
Route::get('/view_arch_gest/{id}', 'GestionController@mostrarArchivos');
Route::post('archivoGest','ArchivosGestionesController@store')->name('archivo')->middleware('auth');
Route::post('archivoGest/media','ArchivosGestionesController@storeMedia')->name('archivoG.storeMedia')->middleware('auth');
Route::get('add_archivosGesti/{id}','ArchivosGestionesController@add_archivos')->middleware('auth');


//rutas para los archivos de las reclamantes
Route::get('/view_arch_recla/{id}', 'ReclamanteController@mostrarArchivos');
Route::post('archivoRecla','ArchivosReclamantesController@store')->name('archivo')->middleware('auth');
Route::post('archivoRecla/media','ArchivosReclamantesController@storeMedia')->name('archivoR.storeMedia')->middleware('auth');
Route::get('add_archivosRecla/{id}','ArchivosReclamantesController@add_archivos')->middleware('auth');

//rutas para los foros
Route::get('/view_arch_foro/{id}', 'ForosController@mostrarArchivos');
Route::post('archivoForo','ArchivosForosController@store')->name('archivo')->middleware('auth');
Route::post('archivoForo/media','ArchivosForosController@storeMedia')->name('archivoF.storeMedia')->middleware('auth');
Route::get('add_archivosForo/{id}','ArchivosForosController@add_archivos')->middleware('auth');
Route::get('/view_foro/{id}', 'ForosController@comentarios');
Route::post('/add_comentarios/{id}', 'ComentariosController@store'); 


//Route::post('/getComent/{id}', 'ComentariosController@getComent'); 
Route::get('/getComent/{id}', 'ComentariosController@getComent')->middleware('auth');




//rutas para las fotos de los estudiantes
Route::get('/HojaDeVida/{id}', 'usuarioController@mostrarArchivos');
Route::post('fotoest','FotosEstudiantesController@store')->name('fotoest')->middleware('auth');
Route::post('fotoest/media','FotosEstudiantesController@storeMedia')->name('Foto.storeMedia')->middleware('auth');
Route::get('add_archivos1/{id}','FotosEstudiantesController@add_archivos')->middleware('auth');



Route::get('/HojaDeVidaR/{id}', 'usuarioController@mostrarArchivosRecla');


//rutas para las fotos de los ROLES
Route::get('/HojaDeVidaROLES/{id}', 'usuarioController@mostrarArchivosRoles');
Route::post('fotorol','FotosRolesController@store')->name('fotorol')->middleware('auth');
Route::post('fotorol/media','FotosRolesController@storeMedia')->name('FotoROL.storeMedia')->middleware('auth');
Route::get('add_archivos/{id}','FotosRolesController@add_archivos')->middleware('auth');




Route::get('/rango/{fecha_ini}/{fecha_fin}', 'RecepcionController@mostrarArchivosRoles');