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

Route::middleware('auth')->group(function() {
    Route::get('/DNCList', 'DncController@index')->name('dnc_list');
    Route::get('/create', 'DncController@create')->name('dnc_create');
    Route::post('/create', 'DncController@create')->name('dnc_create_post');
    Route::get('/edit/{id}', 'DncController@update')->name('dnc_update');
    Route::patch('/edit/{id}', 'DncController@update')->name('dnc_update_post');
    Route::delete('/delete/{id}', 'DncController@destroy')->name('dnc_delete');
});

Route::group(['prefix' => 'users', 'middleware' => 'check_admin'], function() {
    Route::get('/', 'UserController@index')->name('users');
    Route::get('/create', 'UserController@create')->name('form.user');
    Route::post('/create', 'UserController@create')->name('create.user');
    Route::get('/update/{user}', 'UserController@update')->name('edit.user');
    Route::patch('/create/{user}', 'UserController@update')->name('update.user');
    Route::delete('/users/delete/{user}', 'UserController@destroy')->name('delete.user');
});
