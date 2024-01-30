<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::redirect('/', '/login');
// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');
    Route::post('/token/{token}', [\App\Http\Controllers\UserController::class, 'updateToken'])->name('user.update');

    Route::get('dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::get('dashboard/{id}', [\App\Http\Controllers\DashboardController::class, 'show'])->name('dashboard.show');

    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::get('users/listusers', [\App\Http\Controllers\UserController::class, 'listusers'])->name('users.listusers');

    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

    //Locations
    Route::get('locations', [\App\Http\Controllers\LocationController::class, 'index'])->name('locations.index');
    Route::get('locations/station', [\App\Http\Controllers\LocationController::class, 'show'])->name('locations.show');

    //Messages
    Route::get('messages', [\App\Http\Controllers\MessageController::class, 'index'])->name('messages.index');

    //Fire
    Route::get('fires', [\App\Http\Controllers\FireController::class, 'index'])->name('fires.index');
    Route::post('fires/{id}', [\App\Http\Controllers\FireController::class, 'update'])->name('fires.update');

    //News
    Route::get('news', [\App\Http\Controllers\NewsController::class, 'index'])->name('news.index');
    Route::get('/news/create', [\App\Http\Controllers\NewsController::class, 'create'])->name('news.create');
    Route::post('/news/store', [\App\Http\Controllers\NewsController::class, 'store'])->name('news.store');
    Route::post('/news/{id}', [\App\Http\Controllers\NewsController::class, 'update'])->name('news.update');
    Route::get('/news/{id}', [\App\Http\Controllers\NewsController::class, 'show'])->name('news.show');

    //Safety
    Route::get('safety', [\App\Http\Controllers\SafetyController::class, 'index'])->name('safety.index');
    Route::get('/safety/create', [\App\Http\Controllers\SafetyController::class, 'create'])->name('safety.create');
    Route::post('/safety/store', [\App\Http\Controllers\SafetyController::class, 'store'])->name('safety.store');
    Route::get('/safety/{id}', [\App\Http\Controllers\SafetyController::class, 'update'])->name('safety.update');
    Route::delete('safetytips-remove/{id}', [\App\Http\Controllers\SafetyController::class, 'destroy'])->name('safety.delete');

    //Aid
    Route::get('aid', [\App\Http\Controllers\AidsController::class, 'index'])->name('aid.index');
    Route::get('/aids/create', [\App\Http\Controllers\AidsController::class, 'create'])->name('aid.create');
    Route::post('/aids/store', [\App\Http\Controllers\AidsController::class, 'store'])->name('aid.store');
    Route::get('/aids/{id}', [\App\Http\Controllers\AidsController::class, 'update'])->name('aid.update');
    Route::delete('aidtips-remove/{id}', [\App\Http\Controllers\AidsController::class, 'destroy'])->name('aid.delete');

    //About
    Route::get('aboutbfp', [\App\Http\Controllers\AboutController::class, 'index'])->name('about.index');

    //Station
    Route::get('stations', [\App\Http\Controllers\StationController::class, 'index'])->name('stations.index');
    Route::post('stations/{id}', [\App\Http\Controllers\StationController::class, 'update'])->name('stations.update');
    Route::post('station/add/user', [\App\Http\Controllers\StationController::class, 'addUserStation'])->name('station.user');
    Route::post('stations', [\App\Http\Controllers\StationController::class, 'updateStatus'])->name('stations.updateStatus');
    //POST
    Route::post('post/add', [\App\Http\Controllers\PostController::class, 'store'])->name('post.store');
    Route::post('post/update', [\App\Http\Controllers\PostController::class, 'update'])->name('post.update');

    //Station Add User
    Route::post('station', [\App\Http\Controllers\StationController::class, 'addUser'])->name('station.user.store');
    Route::get('station/status', [\App\Http\Controllers\StationController::class, 'stationStatus'])->name('station.status');

    //Post Update Vehicle
    Route::post('post/{id}', [\App\Http\Controllers\PostController::class, 'updateVehicle'])->name('post.vehicle');
    Route::post('post/delete/{id}', [\App\Http\Controllers\PostController::class, 'deleteVehicle'])->name('post.deleteVehicle');
    Route::post('post/station/{id}', [\App\Http\Controllers\StationController::class, 'show'])->name('post.station');

    //User Status
    Route::post('user-status/{id}', [\App\Http\Controllers\UserController::class, 'updateStatus'])->name('user.status');
    //User Remove
    Route::delete('user-remove/{id}', [\App\Http\Controllers\UserController::class, 'removeUser'])->name('user.remove');

    Route::post('user-approve/{id}', [\App\Http\Controllers\UserController::class, 'approve'])->name('user.approve');
    Route::post('user-cancel/{id}', [\App\Http\Controllers\UserController::class, 'decline'])->name('user.decline');

    Route::post('user-block/{id}', [\App\Http\Controllers\UserController::class, 'block'])->name('user.block');
    Route::post('user-unblock/{id}', [\App\Http\Controllers\UserController::class, 'unblock'])->name('user.unblock');
    
    Route::get('/export-users', [\App\Http\Controllers\FireController::class, 'exportUsers'])->name('export.users');
    //Notification Station Alerts
    Route::post('notify/{id}', [\App\Http\Controllers\DashboardController::class, 'notifyStations'])->name('notify.stations');

    Route::post('notification/all', [\App\Http\Controllers\PostController::class, 'alarmStations'])->name('notification.all');

    Route::post('/devicetoken', function (Request $request) {
        try {
            $request->validate([
                'token' => 'required|string',
                'userId' => 'required|string'
            ]);
            //Saves Device Token to DB
            $user = User::where('id', $request->userId)->first();
            if ($user->device_tokens == null) {
                $user->device_tokens = $request->device_token;
                $user->save();
            } else if ($user->device_tokens !== $request->device_token) {
                $user->device_tokens = $request->device_token;
                $user->update();
            }
            return response($user);
        } catch (Exception $e) {
            return response($e);
        }
    })->name('store.token');
});
