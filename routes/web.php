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

Route::get('/', 'IndexController@index');

Auth::routes();

Route::get('/b/create','BoardsController@add');
Route::post('/b/create','BoardsController@create');

Route::get('/b/{board}','BoardsController@view');

Route::get('/b_edit/{board}','BoardsController@edit');
Route::post('/b_edit/{board}','BoardsController@update');