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

Route::get('/', function () {
    return view('home');
});


Route::get('mascotas/{mascota_id}/vacunaciones', 'VacunacionController@index');
Route::get('mascotas/{mascota_id}/vacunaciones/create', 'VacunacionController@create');
Route::post('mascotas/{mascota_id}/vacunaciones', 'VacunacionController@store');
Route::get('mascotas/{mascota_id}/vacunaciones/{vacuna_id}/edit', 'VacunacionController@edit');
Route::patch('mascotas/{mascota_id}/vacunaciones/{vacuna_id}', 'VacunacionController@update');
Route::delete('mascotas/{mascota_id}/vacunaciones/{vacuna_id}', 'VacunacionController@destroy');

Route::resource('mascotas', 'MascotaController');
Route::resource('veterinarias', 'VeterinariaController');