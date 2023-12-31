<?php

use App\Http\Controllers\Api\LineUpController;
use App\Http\Controllers\Api\PlayerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::apiResource('/players', PlayerController::class);
Route::apiResource('/lineups', LineUpController::class);