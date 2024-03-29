<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;

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



Route::group(['namespace' => 'App\Http\Controllers\Auth'], function () {
    Route::group(['prefix' => 'auth'], function () {
        Route::post('login', 'AuthController@login');
        Route::post('logout', 'AuthController@logout');
        Route::post('register', 'AuthController@register');
        Route::post('reset-password', 'AuthController@resetPassword')->name("reset-password");
        Route::get('reset-password-test/{email}', 'AuthController@resetPasswordTest')->name("reset-password-test");
        Route::post('reset-password-confirm', 'AuthController@resetPasswordConfirm')->name("reset-password-confirm");
        // Route::post('set-password', 'UserController@setPassword')->name("set-password");
        Route::post('verify-email', 'AuthController@verifyEmail');
    });
});
Route::group(['namespace' => 'App\Http\Controllers'], function () {
    Route::get('idlists', 'IDController@index');
});

Route::group(['middleware' => 'auth:api'], function () {
    Route::group(['namespace' => 'App\Http\Controllers\Auth'], function () {
        Route::group(['prefix' => 'auth'], function () {
            Route::post('logout', 'AuthController@logout');
            Route::post('verify-token', 'AuthController@verifyToken');
        });
    });
    Route::get('test', function () {
        return response()->json(['message' => auth()->user()], 200);
    });
    Route::group(['namespace' => 'App\Http\Controllers'], function () {
        Route::get('stations', 'StationController@listStation');

        //POST
        Route::post('post/store', 'PostController@store');
        Route::get('post/user/badge', 'PostController@userBadge')->name('post.badge');
        // News
        Route::get('news', 'NewsController@indexJson');

        Route::get('reports', 'PostController@userHistory');

        Route::post('profile/upload', 'UserController@uploadProfile');

        Route::get('aids', 'AidsController@indexJson');
        Route::get('safety', 'SafetyController@indexJson');

        Route::post('delete', 'UserController@destroy');
    });
});
