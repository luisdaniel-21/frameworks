<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CandidatoController;
use App\Http\Controllers\Api\CasillaController;
use App\Http\Controllers\Api\EleccionController;

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

Route::resource("candidato", CandidatoController::class);
Route::resource("casilla", CasillaController::class);
Route::resource("eleccion", EleccionController::class);
