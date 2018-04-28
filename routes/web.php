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

Route::get('/', 'StudentsController@index');

Route::post('/', 'StudentsController@insert');

Route::post('/studentinfo/edit', 'StudentsController@edit');
Route::post('/studentinfo/delete', 'StudentsController@delete');

