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
    return view('home');
});

/* -------------------------- CONSULTAS ----------------------------------*/
Route::get('mascotas/{mascota_id}/consultas', 'ConsultaController@index');
Route::get('mascotas/{mascota_id}/consultas/create', 'ConsultaController@create');
Route::post('mascotas/{mascota_id}/consultas', 'ConsultaController@store');
Route::get('mascotas/{mascota_id}/consultas/{vacuna_id}', 'ConsultaController@show');
Route::get('mascotas/{mascota_id}/consultas/{vacuna_id}/edit', 'ConsultaController@edit');
Route::patch('mascotas/{mascota_id}/consultas/{consulta_id}', 'ConsultaController@update');
Route::delete('mascotas/{mascota_id}/consultas/{consulta_id}', 'ConsultaController@destroy');


/* -------------------------- VACUNACIONES ----------------------------------*/
Route::get('mascotas/{mascota_id}/vacunaciones', 'VacunacionController@index');
Route::get('mascotas/{mascota_id}/vacunaciones/create', 'VacunacionController@create');
Route::post('mascotas/{mascota_id}/vacunaciones', 'VacunacionController@store');
Route::get('mascotas/{mascota_id}/vacunaciones/{vacuna_id}/edit', 'VacunacionController@edit');
Route::patch('mascotas/{mascota_id}/vacunaciones/{vacuna_id}', 'VacunacionController@update');
Route::delete('mascotas/{mascota_id}/vacunaciones/{vacuna_id}', 'VacunacionController@destroy');


/* -------------------------- DESPARASITACIONES ----------------------------------*/
Route::get('mascotas/{mascota_id}/desparasitaciones', 'DesparasitacionController@index');
Route::get('mascotas/{mascota_id}/desparasitaciones/create', 'DesparasitacionController@create');
Route::post('mascotas/{mascota_id}/desparasitaciones', 'DesparasitacionController@store');
Route::get('mascotas/{mascota_id}/desparasitaciones/{desparasitacion_id}/edit', 'DesparasitacionController@edit');
Route::patch('mascotas/{mascota_id}/desparasitaciones/{desparasitacion_id}', 'DesparasitacionController@update');
Route::delete('mascotas/{mascota_id}/desparasitaciones/{desparasitacion_id}', 'DesparasitacionController@destroy');


/* -------------------------- OPERACIONES ----------------------------------*/
Route::get('mascotas/{mascota_id}/operaciones', 'OperacionController@index');
Route::get('mascotas/{mascota_id}/operaciones/create', 'OperacionController@create');
Route::post('mascotas/{mascota_id}/operaciones', 'OperacionController@store');
Route::get('mascotas/{mascota_id}/operaciones/{vacuna_id}/edit', 'OperacionController@edit');
Route::patch('mascotas/{mascota_id}/operaciones/{vacuna_id}', 'OperacionController@update');
Route::delete('mascotas/{mascota_id}/operaciones/{vacuna_id}', 'OperacionController@destroy');

Route::resource('mascotas', 'MascotaController');
Route::resource('veterinarias', 'VeterinariaController');

Route::get( '(.*)', function(){
    return redirect('/');
});
