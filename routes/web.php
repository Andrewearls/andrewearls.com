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
Route::get('cms/create/project', 'ProjectController@create')->name('create_project');
Route::get('cms/edit/project/{id}', 'ProjectController@edit')->name('edit_project');
Route::post('cms/update/project/{id}', 'ProjectController@update')->name('update_project');

Route::post('cms/create/partner', 'PartnerController@create')->name('create_partner');

Route::post('cms/create/category', 'CategoryController@create')->name('create_category');


// hiding authentication features until needed
// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
