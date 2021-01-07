<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\MessageController;
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
//Route::group(['middleware' => ['web']], function () {
//    Route::get('/dashboard', function () {
//        return view('dashboard');
//    })->middleware('auth');
//});

//Route::get('/dashboard', function () {
//    Route::get('dashboard', \App\Http\Controllers\DashboardController::class);
//})->middleware('auth');

//    ->middleware('auth');

Route::get('/login', function() {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
});

Route::get('/resetPassword', function () {
    return view('passwordReset');
});

Route::post('login', LoginController::class);

Route::post('register', RegistrationController::class);

Route::group(['middleware' => 'auth'], function () {
    Route::post('logout', LogoutController::class);
    Route::get('dashboard', DashboardController::class);
    Route::post('sendMessage', [MessageController::class, 'sendMessage']);

    Route::post('decryptMessage', [MessageController::class, 'decryptMessage']);
//    Route::get('decryptMessage', SendMessageController::class);
});


$ignorePrefixes = [
    'api',
    'js',
    'css',
    'images',
    'fonts',
];
$regex = '^(?!' . implode('|', array_map(function($prefix) { return $prefix . '\/'; }, $ignorePrefixes)) . ').*';
//Route::view('/{anything}', 'dashboard')->where('anything', $regex);

Route::any('{query}', function () {
    return redirect('/dashboard');
})->where('query', $regex);
