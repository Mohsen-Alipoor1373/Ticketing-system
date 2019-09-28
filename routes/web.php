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
Route::resource('/project', 'ProjectController');
Route::resource('/task', 'TaskController');
Route::resource('/protask', 'ProTask');
Route::get('/showproject', 'ProjectController@showproject');
Route::get('/viewtask/{task}', 'TaskController@viewtask');
Route::get('/asine', 'TaskController@asine');
Route::get('/showtask', 'TaskController@showtask');
Route::get('/delete/{task}', 'TaskController@delete');
Route::get('/deleteadmin/{task}', 'TaskController@deleteadmin');
Route::get('/editt/{task}', 'TaskController@editt');
Route::get('/show', 'UsersController@index');
Route::get('/taskshow', 'ProjectController@taskshow');
Route::get('/requestask', 'TaskController@requestask');
Route::post('/adduser', 'UsersController@adduser');
Route::post('/asinetask', 'ProTask@asinetask');
Route::post('/addtask', 'TaskController@addtask');
Route::get('/tasksshoww/{task}', 'TaskController@tasksshoww');
Route::patch('/edittask/{task}', 'TaskController@edittask');
