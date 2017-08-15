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

Route::get('login/github', 'Auth\LoginController@redirectToProvider');
Route::get('login/github/callback', 'Auth\LoginController@handleProviderCallback');

Route::group(['middleware'=>'auth'], function() {
    Route::get('/home', 'HomeController@index')->name('/home');
    Route::get('/', function () {
        return view('/home');
    });

    Route::resource('/actividades', 'ActividadController');
    Route::get('/actividades/{actividad}', 'ActividadController@show');
    Route::post('/actividades/{actividad}', 'ActividadController@store');

    Route::resource('perfil', 'PerfilController');
    
    Route::group([
        'middleware' => ['auth', 'acl'],
        'is' => 'professor'
    ], function() {
         Route::get('/actividades/editar/{actividad}', 'ActividadController@edit');
         Route::post('/actividades/actualizar/{actividad}', 'ActividadController@update');
         Route::get('/crear/actividad', 'ActividadController@create');
         Route::post('/crear/actividad', 'ActividadController@store');

         Route::get('/grupos', 'CrnController@index');
         Route::get('/grupos/{grupo}', 'CrnController@show');

         Route::get('/eliminarAlumno', 'CrnController@deleteStudent');
         Route::get('/agregarAlumno', 'CrnController@addStudent');
         Route::get('/grupos/agregarAlumno/{actividad_id}', 'CrnController@deleteStudent');

         Route::get('/crear/grupo', 'CrnController@create');
    });

    Route::group([
        'middleware' => ['auth', 'acl'],
        'is' => 'student'
    ], function() {
        
        Route::resource('/calificaciones', 'CalificacionesController');
        
    });

    

    Route::get('logout', function(){
        Auth::logout();
        return redirect()->route('/home');
    })->name('logout');
});

Auth::routes();