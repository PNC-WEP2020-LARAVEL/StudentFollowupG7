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
Route::resource('students', 'StudentController');
Route::resource('users', 'UserController');
Route::post('/addTutor/{id}', 'StudentController@addTutor')->name('addTutor');
Route::post('/outFollowUp/{id}', 'StudentController@outFollowUp')->name('outFollowUp');
Route::get('/deleteUser/{id}', 'UserController@deleteUser')->name('deleteUser');
Route::get('/getCommentForm/{id}', 'StudentController@getCommentForm')->name('getCommentForm');
Route::post('/commentStudent/{id}', 'StudentController@commentStudent')->name('commentStudent');


