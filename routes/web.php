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

Route::group(['middleware' => 'auth'], function () {
    Route::resource('meeting', 'MeetingController');
    Route::resource('business', 'BusinessHourController');
    Route::resource('manager', 'ManagerController');
    //генерация ссылки на час
    Route::get('/generateUrl/{manager}', function($manager){
        return response(URL::temporarySignedRoute('showBusinessHours', now()->addHour(), $manager));
    });
});

//свободное время
Route::any('/showBusinessHours/{manager}', 'ManagerController@showBusinessHours')
    ->name('showBusinessHours')
    ->middleware('signed');

Route::get('message/index', 'MessageController@index');
Route::get('message/send', 'MessageController@send');

