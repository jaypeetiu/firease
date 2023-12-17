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

    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

    //Locations
    Route::get('locations', [\App\Http\Controllers\LocationController::class, 'index'])->name('locations.index');
    
    //Messages
    Route::get('messages', [\App\Http\Controllers\MessageController::class, 'index'])->name('messages.index');
    
    //Fire
    Route::get('fires', [\App\Http\Controllers\FireController::class, 'index'])->name('fires.index');
    Route::post('fires/{id}', [\App\Http\Controllers\FireController::class, 'update'])->name('fires.update');
    
    //News
    Route::get('news', [\App\Http\Controllers\NewsController::class, 'index'])->name('news.index');
    Route::get('/news/create', [\App\Http\Controllers\NewsController::class, 'create'])->name('news.create');
    Route::post('/news/store', [\App\Http\Controllers\NewsController::class, 'store'])->name('news.store');
    Route::get('/news/{id}', [\App\Http\Controllers\NewsController::class, 'update'])->name('news.update');

    //Safety
    Route::get('safety', [\App\Http\Controllers\SafetyController::class, 'index'])->name('safety.index');
    Route::get('/safety/create', [\App\Http\Controllers\SafetyController::class, 'create'])->name('safety.create');
    Route::get('/safety/store', [\App\Http\Controllers\SafetyController::class, 'store'])->name('safety.store');
    Route::get('/safety/{id}', [\App\Http\Controllers\SafetyController::class, 'update'])->name('safety.update');
    
    //Aid
    Route::get('aid', [\App\Http\Controllers\AidController::class, 'index'])->name('aid.index');

    //Station
    Route::get('stations', [\App\Http\Controllers\StationController::class, 'index'])->name('stations.index');
    Route::post('stations/{id}', [\App\Http\Controllers\StationController::class, 'update'])->name('stations.update');
    
    //POST
    Route::post('post/add', [\App\Http\Controllers\PostController::class, 'store'])->name('post.store');
    Route::post('post/update', [\App\Http\Controllers\PostController::class, 'update'])->name('post.update');
    
    //Station Add User
    Route::post('station', [\App\Http\Controllers\StationController::class, 'addUser'])->name('station.user.store');
    
    //Post Update Vehicle
    Route::post('post/{id}', [\App\Http\Controllers\PostController::class, 'updateVehicle'])->name('post.vehicle');
    Route::post('post/delete/{id}', [\App\Http\Controllers\PostController::class, 'deleteVehicle'])->name('post.deleteVehicle');
    
    //User Status
    Route::post('user-status/{id}', [\App\Http\Controllers\UserController::class, 'updateStatus'])->name('user.status');
    //User Remove
    Route::delete('user-remove/{id}', [\App\Http\Controllers\UserController::class, 'removeUser'])->name('user.remove');
    //Notification Station Alerts
    Route::post('notify/{id}', [\App\Http\Controllers\DashboardController::class, 'notifyStations'])->name('notify.stations');
    Route::post('notify/all', [\App\Http\Controllers\PostController::class, 'alarmStations'])->name('notify.all');
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
