<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/test', function () {
    dd(true);
});


Route::group(['namespace' => 'App\Http\Controllers\Auth'], function () {
    Route::group(['prefix' => 'auth'], function () {
        Route::post('login', 'AuthController@login');
        Route::post('register', 'AuthController@register');
        Route::post('reset-password', 'AuthController@resetPassword')->name("reset-password");
        Route::get('reset-password-test/{email}', 'AuthController@resetPasswordTest')->name("reset-password-test");
        Route::post('reset-password-confirm', 'AuthController@resetPasswordConfirm')->name("reset-password-confirm");
        // Route::post('set-password', 'UserController@setPassword')->name("set-password");
        Route::post('verify-email', 'AuthController@verifyEmail');
    });
});

// Route::group(['middleware' => 'auth:api'], function () {
//     Route::group(['namespace' => 'App\Http\Controllers'], function () {
//         //Get All Stations
//         Route::get('locations', 'StationController@listStation')->name('station.list');
//     });
// });