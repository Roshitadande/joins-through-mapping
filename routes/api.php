<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountryApiController;
use App\Http\Controllers\CountryController;

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

Route::post('/country/{id}', [CountryController::class, 'update']);
Route::get('/countryData',[CountryApiController::class,'showCountry']);
Route::get('/singlecountry/{id}',[CountryApiController::class,'singleData']);


Route::post('/countries', [CountryApiController::class, 'store']);   
Route::post('/countries/{id}', [CountryApiController::class, 'update']); 
Route::delete('/countries/{id}', [CountryApiController::class, 'destroy']);