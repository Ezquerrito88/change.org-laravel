<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PeticioneController;

Route::get('/', [PagesController::class, 'home'])->name('home');

Route::controller(PeticioneController::class)->group(function () {
    Route::get('peticiones', 'index')->name('peticiones.index');
    Route::get('peticiones/crear', 'create')->name('peticiones.create');
    Route::post('peticiones', 'store')->name('peticiones.store');
    Route::get('peticiones/{id}', 'show')->name('peticiones.show');
});
