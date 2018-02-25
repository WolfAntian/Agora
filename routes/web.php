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

//board
Route::get('/b/create','BoardsController@add');
Route::post('/b/create','BoardsController@create');

Route::get('/b/{board}','BoardsController@view');

Route::get('/b_edit/{board}','BoardsController@edit');
Route::post('/b_edit/{board}','BoardsController@update');

//thread
Route::get('/b/{board}/t/create','ThreadsController@add');
Route::post('/b/{board}/t/create','ThreadsController@create');

Route::get('/b/{board}/t/{thread}','ThreadsController@view');

Route::get('/b/{board}/t_edit/{thread}','ThreadsController@edit');
Route::post('/b/{board}/t_edit/{thread}','ThreadsController@update');

Route::post('/b/{board}/t/{thread}/star','ThreadsController@star');

//comment
Route::post('/b/{board}/t/{thread}/c/create','CommentsController@create');

Route::post('/b/{board}/t/{thread}/c/{comment}/star','CommentsController@star');

//users
Route::get('/u/{user}','UsersController@view');

Route::get('/u_edit/{user}','UsersController@edit');
Route::post('/u_edit/{user}','UsersController@update');

