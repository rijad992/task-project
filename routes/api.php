<?php

use App\Http\Controllers\ApartmentController;
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

Route::post('/apartments', [ApartmentController::class, 'index']);
Route::get('/apartments/get-fields', [ApartmentController::class, 'getFields']);
Route::get('/apartments/get-filters', [ApartmentController::class, 'getFilters']);


