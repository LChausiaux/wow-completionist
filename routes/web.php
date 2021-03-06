<?php

use App\Http\Controllers\CharacterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShowLandingPage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', ShowLandingPage::class)->name('landing');

Route::post('/character', [CharacterController::class, 'search'])->name('character.search');
Route::get('/character/{region}/{server}/{username}', [CharacterController::class, 'show'])->name('character.show');
