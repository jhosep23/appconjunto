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
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

Route::get('/',"inicioController@index");

Route::get('verNoticias',"inicioController@verNoticias");

Route::get('/ingresar',"loginController@logueo");

Route::post('ingresar',"loginController@logueo");
	
Route::get('salir',"loginController@logOut");

Route::post('obtenerFormulario',"noticiaController@obtenerFormulario");

Route::post('enviarNotificacion',"noticiaController@enviarNotificacion");

Route::post('obtenerFormNotificacion',"noticiaController@obtenerFormNotificacion");

Route::get('jsonNoticias/{interior}',"noticiaController@obtenerJsonNoticias");

Route::get('jsonUsuario/{correo}/{pass}',"usuariosController@obtenerJsonUsuario");

Route::resource('noticias', 'noticiaController');

Route::resource('usuarios', 'usuariosController');


