<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\User\Http\Controllers\Api\v1\SessionsController;

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

Route::prefix('sessions')->group(function () {
    Route::post('login', [SessionsController::class, 'login']);

    /**
     * Protecting Routes
     */
    Route::middleware('auth:sanctum')->group(function () {
        Route::post('logout', [SessionsController::class, 'logout']);
    });
});
