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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/activities', 'ActivitiesController');

Route::get('/inprogress', 'AnalyticsController@inProgress');
Route::get('/completed', 'AnalyticsController@completed');

Route::get('/setup', 'AnalyticsController@setup');

Route::resource('/addclient', 'ClientsController');
Route::resource('/addproject', 'ProjectsController');
Route::resource('/addstat', 'ActivityStatController');

Route::resource('/users', 'UsersController');