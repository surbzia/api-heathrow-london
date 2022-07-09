<?php

use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\NewsLetterController;
use App\Http\Controllers\Admin\VehicleController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('get_all_vehicles', [VehicleController::class, 'getAllVehicle']);
Route::get('location',          [LocationController::class, 'getLocation']);
Route::post('newsletter/store',   [NewsLetterController::class, 'store']);
Route::post('booking/journey-details',   [BookingController::class, 'journey_details']);
