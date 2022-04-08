<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CidadeController;
use App\Http\Controllers\gasStationsController;

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

Route::get('/cidade/{id}', [CidadeController::class, 'getAllGasStations']);
Route::get('/cidades', [CidadeController::class, 'getCities']);
Route::get('/posto/{id}', [gasStationsController::class, 'getGasStationById']);

Route::post('/cidade/', [CidadeController::class, 'setGasStation']);
Route::put('/posto/', [gasStationsController::class, 'editGasStation']);

Route::delete('/posto/{id}', [gasStationsController::class, 'deleteGasStation']);
