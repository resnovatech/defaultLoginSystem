<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\User\RegisterController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('userDashboard', [LoginController::class, 'userDashboard']);


Route::get('auth/facebook', [LoginController::class, 'redirectToFB']);
Route::get('callback/facebook', [LoginController::class, 'handleCallback']);


Route::get('auth/google', [LoginController::class, 'signInwithGoogle']);
Route::get('callback/google', [LoginController::class, 'callbackToGoogle']);

Route::resource('userLogin', LoginController::class);
Route::resource('userRegistration', RegisterController::class);

Route::get('/', function () {
    return view('user.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
