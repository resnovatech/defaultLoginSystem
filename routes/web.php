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

Route::get('/clear', function() {
    \Illuminate\Support\Facades\Artisan::call('cache:clear');
    \Illuminate\Support\Facades\Artisan::call('config:clear');
    \Illuminate\Support\Facades\Artisan::call('config:cache');
    \Illuminate\Support\Facades\Artisan::call('view:clear');
    \Illuminate\Support\Facades\Artisan::call('route:clear');
    return 'Cleared!';
});



Route::get('forgetPassword', [RegisterController::class, 'forgetPassword']);
Route::get('checkEmailFromList', [RegisterController::class, 'checkEmailFromList'])->name('checkEmailFromList');
Route::get('changePassword/{id}', [RegisterController::class, 'changePassword'])->name('changePassword');

Route::post('postChangePassword', [RegisterController::class, 'postChangePassword'])->name('postChangePassword');


Route::get('emailSendSuccessfully', [RegisterController::class, 'emailSendSuccessfully'])->name('emailSendSuccessfully');
Route::post('sendEmail', [RegisterController::class, 'sendEmail'])->name('sendEmail');

Route::get('auth/facebook', [LoginController::class, 'redirectToFB']);
Route::get('callback/facebook', [LoginController::class, 'handleCallback']);


Route::get('auth/google', [LoginController::class, 'signInwithGoogle']);
Route::get('callback/google', [LoginController::class, 'callbackToGoogle']);

Route::resource('userLogin', LoginController::class);
Route::resource('userRegistration', RegisterController::class);

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
