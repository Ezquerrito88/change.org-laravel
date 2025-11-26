<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PetitionController;

// --- 1. TU PORTADA (La home de Change.org) ---
// Breeze había puesto aquí "return view('welcome')", lo cambiamos por tu controlador:
Route::get('/', [PagesController::class, 'home'])->name('home');

// --- 2. TUS RUTAS DE PETICIONES ---
Route::controller(PetitionController::class)->group(function () {
    Route::get('peticiones', 'index')->name('peticiones.index');
    Route::get('peticiones/crear', 'create')->name('peticiones.create');
    Route::post('peticiones', 'store')->name('peticiones.store');
    Route::get('peticiones/{id}', 'show')->name('peticiones.show');
});

// --- 3. PANEL DE CONTROL DE BREEZE (Donde vas al loguearte) ---
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// --- 4. PERFIL DE USUARIO (Breeze) ---
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// --- 5. RUTAS DE LOGIN/REGISTRO (El archivo mágico que se instaló antes) ---
require __DIR__.'/auth.php';
