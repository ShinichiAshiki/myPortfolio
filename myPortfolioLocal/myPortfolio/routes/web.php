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
Route::get('/logout', 'Admin\TodoController@index'); 

Route::group(['middleware' => 'auth'], function() {
    Route::get('/', 'Admin\TodoController@index'); 
    Route::get('/home', 'Admin\TodoController@index'); 
}); 
Route::group(['prefix' => 'todo/'], function() {
    Route::group(['middleware' => 'auth'], function() {
        Route::get('', 'Admin\TodoController@index'); 
        Route::get('create', 'Admin\TodoController@add');
        Route::post('create', 'Admin\TodoController@create');
        Route::get('edit', 'Admin\TodoController@edit'); 
        Route::post('edit', 'Admin\TodoController@update'); 
        Route::get('delete', 'Admin\TodoController@delete');
        Route::get('complete', 'Admin\TodoController@complete');
        Route::get('complete_list', 'Admin\TodoController@complete_list');
        Route::get('incomplete', 'Admin\TodoController@incomplete');
        Route::get('sort', 'Admin\TodoController@sort');
        Route::get('dead_list', 'Admin\TodoController@dead_list');
        Route::post('dead_list', 'Admin\TodoController@search_dead_list');
    });
});
Auth::routes();