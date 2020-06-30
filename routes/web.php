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

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//user
Route::get('/user', 'UsersController@index')->name('user');
Route::get('/user/edit/{id}', 'UsersController@edit');
Route::post('/user/update/{id}', 'UsersController@update');
Route::get('/user/delete/{id}', 'UsersController@delete');

//role
Route::get('/role', 'RoleController@index')->name('role');
Route::get('/role/create', 'RoleController@create')->name('createRole');
Route::post('/role/store', 'RoleController@store')->name('roleStore');
Route::get('/role/edit/{id}', 'RoleController@edit');
Route::post('/role/update/{id}', 'RoleController@update');
Route::get('/role/delete/{id}', 'RoleController@delete');

//group
Route::get('/group', 'GroupController@index')->name('group');
Route::get('/group/create', 'GroupController@create');
Route::post('/group/store', 'GroupController@store');
Route::get('/group/edit/{id}', 'GroupController@edit');
Route::post('/group/update/{id}', 'GroupController@update');
Route::get('/group/delete/{id}', 'GroupController@delete');

//client 
Route::get('/client', 'ClientController@index')->name('client');
Route::get('/client/create', 'ClientController@create');
Route::post('/client/store', 'ClientController@store');
Route::get('/client/edit/{id}', 'ClientController@edit');
Route::post('/client/update/{id}', 'ClientController@update');
Route::get('/client/delete/{id}', 'ClientController@delete');

//project
Route::get('/project', 'ProjectController@index')->name('project');
Route::get('/project/create', 'ProjectController@create');
Route::post('/project/store', 'ProjectController@store');
Route::get('/project/edit/{id}', 'ProjectController@edit');
Route::post('/project/update/{id}', 'ProjectController@update');
Route::get('/project/delete/{id}', 'ProjectController@delete');

//meeting 
Route::get('/meeting', 'MeetingController@index')->name('meeting');