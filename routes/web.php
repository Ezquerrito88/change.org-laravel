<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PetitionController;

Route::get('/', [PagesController::class, 'home'])->name('home');

// CORRECCIÓN: Usamos PetitionController::class
Route::controller(PetitionController::class)->group(function () {
    // Mantenemos las URLs y nombres en 'peticiones' para no romper tus Vistas HTML
    Route::get('peticiones', 'index')->name('peticiones.index');
    Route::get('peticiones/crear', 'create')->name('peticiones.create');
    Route::post('peticiones', 'store')->name('peticiones.store');
    Route::get('peticiones/{id}', 'show')->name('peticiones.show');
});
