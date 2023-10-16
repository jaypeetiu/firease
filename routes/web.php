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

    Route::get('locations', [\App\Http\Controllers\LocationController::class, 'index'])->name('locations.index');
    Route::get('messages', [\App\Http\Controllers\MessageController::class, 'index'])->name('messages.index');
    Route::get('fires', [\App\Http\Controllers\FireController::class, 'index'])->name('fires.index');

    Route::post('post/add', [\App\Http\Controllers\PostController::class, 'store'])->name('post.store');
    Route::post('post/update', [\App\Http\Controllers\PostController::class, 'update'])->name('post.update');

    Route::post('station', [\App\Http\Controllers\StationController::class, 'addUser'])->name('station.user.store');

    Route::post('post/{id}', [\App\Http\Controllers\PostController::class, 'updateVehicle'])->name('post.vehicle');
    Route::post('user-status/{id}', [\App\Http\Controllers\UserController::class, 'updateStatus'])->name('user.status');
    Route::delete('user-remove/{id}', [\App\Http\Controllers\UserController::class, 'removeUser'])->name('user.remove');

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
