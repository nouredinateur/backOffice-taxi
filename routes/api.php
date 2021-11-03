<?php

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DriversController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\API\ClientContoller;
use App\Http\Controllers\API\DriverContoller;
use App\Http\Controllers\Api\ParamController;
use App\Http\Controllers\Api\RouteController;
use App\Http\Controllers\Api\ReviewController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::apiResource('clients', ClientContoller::class);
Route::apiResource('drivers', DriverContoller::class);
Route::apiResource('reviews', ReviewController::class)->middleware('auth:api,web');
Route::apiResource('routes', RouteController::class);
Route::apiResource('params', ParamController::class);


Route::group(['prefix' => 'auth'], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::post('/update', [AuthController::class, 'update']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);
    Route::post('/register', [AuthController::class, 'register']);
});
