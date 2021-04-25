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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/installer', 'AppController@installer');

Route::get('/', 'AppController@index');

Route::group(['prefix'=>'album', 'where'=>['album'=>'[0-9]+']], function() {
    Route::get('/', 'AlbumController@index');
    Route::get('/create', 'AlbumController@create');
    Route::post('/create', 'AlbumController@store');
    Route::get('/{album}', 'AlbumController@show');
    Route::get('/{album}/edit', 'AlbumController@edit');
    Route::post('/{album}/edit', 'AlbumController@update');
    Route::get('/{album}/delete', 'AlbumController@delete');
    Route::post('/{album}/delete', 'AlbumController@destroy');
});