<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::group(['middleware' => 'auth'], function () {
    Route::resource('meeting', 'MeetingController');
    Route::resource('business', 'BusinessHourController');
    Route::resource('manager', 'ManagerController');
    //генерация ссылки на час
    Route::get('/generateUrl/{manager}', function($manager){
        return response(URL::temporarySignedRoute('showBusinessHours', now()->addHour(), $manager));
    });
});
