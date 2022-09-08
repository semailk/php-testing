<?php

use App\Http\Controllers\CatController;
use App\Http\Controllers\CoffeeController;
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

Route::get('cats/search', [CatController::class, 'search'])->name('cats.search');
Route::get('coffees/search', [CoffeeController::class, 'search'])->name('coffees.search');
