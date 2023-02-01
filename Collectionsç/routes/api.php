<?php

use App\Http\Controllers\PersonasController;
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

Route::post('create', [PersonasController::class, 'create']);
Route::post('collection', [PersonasController::class, 'collection']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
