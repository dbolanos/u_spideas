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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix' => 'estudiante','middleware' => ['auth', 'role:student']], function () {
    Route::get  ('mis-solicitudes'       , ['as' => 'my.student.requests'        , 'uses'  => 'StudentController@showRequestStudent']);
    Route::get  ('crear-solicitud'       , ['as' => 'create.student.request'     , 'uses'  => 'RequestController@createRequestStudent']);
    Route::post ('generar-solicitud'     , ['as' => 'generate.student.request'   , 'uses'  => 'RequestController@generateRequestStudent']);
    Route::get  ('editar-solicitud/{id}' , ['as' => 'edit.student.request'       , 'uses'  => 'RequestController@editRequestStudent']);
    Route::post ('editar-solicitud'      , ['as' => 'update.student.request'     , 'uses'  => 'RequestController@updateRequestStudent']);
    Route::get('borrar-solicitud/{id}'   , ['as' => 'delete.student.request'     , 'uses'  => 'RequestController@delete']);
});

Route::group(['prefix' => 'admin','middleware' => ['auth', 'role:admin']], function () {
    Route::get('eventos'            , ['as' => 'all.events'     , 'uses' => 'EventController@index']);
    Route::get('crear-evento'       , ['as' => 'create.event'   , 'uses' => 'EventController@create']);
    Route::post('generar-evento'    , ['as' => 'generate.event' , 'uses' => 'EventController@generateEvent']);
    Route::get('editar-evento/{id}' , ['as' => 'edit.event'     , 'uses' => 'EventController@edit']);
    Route::post('editar-evento'     , ['as' => 'update.event'   , 'uses' => 'EventController@update']);
    Route::get('borrar-evento/{id}' , ['as' => 'delete.event'   , 'uses' => 'EventController@delete']);

    Route::get  ('infraestructuras'              , ['as' => 'all.infrastructures'         , 'uses'  => 'InfrastructureController@index']);
    Route::get  ('crear-infraestructura'         , ['as' => 'create.infrastructure'       , 'uses'  => 'InfrastructureController@create']);
    Route::post ('generar-infraestructura'       , ['as' => 'generate.infrastructure'     , 'uses'  => 'InfrastructureController@generateInfrastructure']);
    Route::get  ('editar-infraestructura/{id}'   , ['as' => 'edit.infrastructure'         , 'uses'  => 'InfrastructureController@edit']);
    Route::post ('editar-infraestructura'        , ['as' => 'update.infrastructure'       , 'uses'  => 'InfrastructureController@update']);
    Route::get  ('borrar-infraestructura/{id}'   , ['as' => 'delete.infrastructure'       , 'uses'  => 'InfrastructureController@delete']);
});
