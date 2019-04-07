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

Route::get  ('mis-solicitudes'                  , ['as' => 'my.student.requests'        , 'uses'  => 'StudentController@showRequestStudent']);
Route::get  ('crear-solicitud-estudiante'       , ['as' => 'create.student.request'     , 'uses'  => 'RequestController@createRequestStudent']);
Route::post ('generar-solicitud-estudiante'     , ['as' => 'generate.student.request'   , 'uses'  => 'RequestController@generateRequestStudent']);


Route::get  ('eventos'              , ['as' => 'all.events'         , 'uses'  => 'EventController@index']);
Route::get  ('crear-evento'         , ['as' => 'create.event'       , 'uses'  => 'EventController@create']);
Route::post ('generar-evento'       , ['as' => 'generate.event'     , 'uses'  => 'EventController@generateEvent']);
Route::get  ('editar-evento/{id}'   , ['as' => 'edit.event'         , 'uses'  => 'EventController@edit']);
Route::post ('editar-evento'        , ['as' => 'update.event'       , 'uses'  => 'EventController@update']);
Route::get ('delete/{id}'          , ['as' => 'delete.event'       , 'uses'  => 'EventController@delete']);
