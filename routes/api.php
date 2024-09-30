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

use App\Http\Controllers\Api\StarshipController;

Route::get('/starships', [StarshipController::class, 'index']);
Route::post('/starships', [StarshipController::class, 'store']);
Route::get('/starships/{id}', [StarshipController::class, 'show']);
Route::put('/starships/{id}', [StarshipController::class, 'update']);
Route::delete('/starships/{id}', [StarshipController::class, 'destroy']);
