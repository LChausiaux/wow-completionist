<?php

use App\Http\Controllers\CharacterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShowLandingPage;

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
Route::name('api.')->group(function() {
    Route::get('/filter-username/{region}/{server}/{username}', [CharacterController::class, 'filterByUsername'])->name('character.filter-by-username');
    Route::get('/filter-server/{region}/{server}', [CharacterController::class, 'filterByServer'])->name('character.filter-by-server');
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
