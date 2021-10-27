<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DriversController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\API\ClientContoller;
use App\Http\Controllers\API\DriverContoller;
use App\Http\Controllers\Api\ReviewController;
use App\Http\Controllers\Api\RouteController;
use App\Models\Review;

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



// Route::group(['middleware' => ['jwt.verify']], function() {

// });

Route::apiResource('clients', ClientContoller::class);
Route::apiResource('drivers', DriverContoller::class);
Route::apiResource('reviews', ReviewController::class);
Route::apiResource('routes', RouteController::class)->middleware('auth:api');

// Route::post('reviews/', ReviewController::class, 'store');

Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::post('/update', [AuthController::class, 'update']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);
});


// Route::get('/reviews/all', [ReviewController::class, 'allreviews']);