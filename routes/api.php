<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
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


Route::prefix('v1')->group(function () {


    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
    Route::post('forgot-password', [AuthController::class, 'sendResetLink']);
    // Get All Drop Down Menu 
    Route::get('dropdown/{model}', [DropDownController::class, 'index']);


    Route::middleware('auth:sanctum')->group(function () {
        Route::resource('role', RoleController::class);
        Route::resource('user', UserController::class);
        Route::resource('visitor', VisitorController::class);
        Route::resource('district', DistrictController::class);
        Route::resource('tehsil', TehsilController::class);

        Route::get('visitor/status{status}', [VisitorController::class, 'visitor_status']);
        Route::group(['prefix' => 'visitors'], function () {
            Route::get('dashboard', [VisitorController::class, 'dashboard']);
        });

        Route::group(['prefix' => 'profile'], function () {
            Route::get('details', [UserController::class, 'details']);
        });
    });
});
