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

Route::get('/logout', function(){
    Auth::logout();
    return view('welcome');
});

//свободное время
Route::any('/showBusinessHours/{manager}', 'ManagerController@showBusinessHours')
    ->name('showBusinessHours')
    ->middleware('signed');

Route::get('message/index', 'MessageController@index');
Route::get('message/send', 'MessageController@send');

