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


//Route::name('sessions.')->group(function () {
//    Route::post('login', [SessionsController::class, 'login'])->name('login');
//    Route::post('register', [SessionsController::class, 'register'])->name('register');
//    Route::get('register/activate/{token}', [SessionsController::class, 'activateAccount'])->name('activate-account');
//    Route::post('register/resend-activation-email', [SessionsController::class, 'resendActivationEmail'])->name('resend-activation-email');
//
//    /**
//     * Here we put protected routes
//     */
//    Route::middleware('auth:sanctum')->group(function () {
//        Route::post('password/change', [SessionsController::class, 'changePassword'])->name('change-password');
//        Route::post('logout', [SessionsController::class, 'logout'])->name('logout');
//    });
//});
