<?php

use App\Http\Controllers\CountryController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\CityController;

Route::get('/state', [StateController::class, 'index'])->name('state.index');
Route::get('/addstate',[StateController::class,'create'])->name('state.create');
Route::post('/storeState',[StateController::class,'storeState'])->name('state.store');
Route::get('/state/{states}/edit', [StateController::class, 'edit'])->name('state.edit');
Route::put('/state/{state}', [StateController::class, 'update'])->name('state.update');
Route::delete('/state/{state}', [StateController::class, 'destroy'])->name('state.destroy');

Route::get('/country', [CountryController::class, 'index'])->name('country.index');
Route::get('/addCountry',[CountryController::class,'create'])->name('country.create');
Route::post('/store', [CountryController::class, 'store'])->name('country.store');
Route::get('/country/{countries}/edit', [CountryController::class, 'edit'])->name('country.edit');
Route::put('/country/{country}', [CountryController::class, 'update'])->name('country.update');
Route::delete('/country/{country}', [CountryController::class, 'destroy'])->name('country.destroy');
Route::get('/country/trashed', [CountryController::class, 'trashedData'])->name('country.trashed');
Route::post('/country/{id}/restore', [CountryController::class, 'restoreTrashData'])->name('country.restore');


Route::get('/city', [CityController::class, 'index'])->name('city.index');
Route::get('/addCity',[CityController::class,'create'])->name('city.create');
Route::post('/storeCity', [CityController::class, 'store'])->name('city.store');
Route::get('/city/{cities}/edit', [CityController::class, 'edit'])->name('city.edit');
Route::put('/city/{city}', [CityController::class, 'update'])->name('city.update');
Route::delete('/city/{city}', [CityController::class, 'destroy'])->name('city.destroy');