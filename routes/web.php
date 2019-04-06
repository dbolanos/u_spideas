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

Route::get  ('mis-solicitudes'      , ['as' => 'my.student.requests'    , 'uses'  => 'StudentController@showRequestStudent']);
Route::get  ('crear-solicitudes'    , ['as' => 'create.student.request'         , 'uses'  => 'RequestController@createRequestStudent']);
Route::post ('generar-solicitud-estudiante'   , ['as' => 'generate.student.request'         , 'uses'  => 'RequestController@generateRequestStudent']);
