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
Route::resource('courses','CoursesController');
Route::resource('students','StudentsController');
Route::resource('groups','GroupsController');
Route::resource('modules','ModulesController');
Route::resource('banks','BanksController');
Route::resource('enrolments','EnrolmentsController');
Route::resource('payments','PaymentsController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
