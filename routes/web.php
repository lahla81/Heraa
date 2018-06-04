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
Route::get('/', 'MainController@index');

Route::get('/contact', 'MainController@contact')->name('contact');

Route::resource('plugs', 'PlugController');
Route::get('/plugs/{year}/{month}','PlugController@archive');

Route::resource('projects', 'ProjectController');

Route::resource('team', 'TeamController');

Route::resource('comments', 'CommentController');

Route::resource('plugcomments', 'PlugcommentController');

Auth::routes();

//Route::get('/home', 'HomeController@index');


