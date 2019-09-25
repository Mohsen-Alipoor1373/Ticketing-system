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


Route::resource('/project', 'ProjectController')->middleware('admin');
Route::resource('/task', 'TaskController')->middleware('admin');
Route::resource('/protask', 'ProTask')->middleware('admin');
Route::get('/showproject', 'ProjectController@showproject');
Route::get('/viewtask/{task}', 'TaskController@viewtask');

