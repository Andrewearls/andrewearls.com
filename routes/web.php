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
    return view('dashboard');
});

Route::get('project', 'ProjectController@index')->name('project');

Route::get('cms', 'ProjectController@list')->name('cms');
Route::get('cms/create', 'ProjectController@create')->name('create');
Route::get('cms/edit/{id}', 'ProjectController@edit')->name('edit');
Route::post('cms/update/{id}', 'ProjectController@update')->name('update');


// hiding authentication features until needed
// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
