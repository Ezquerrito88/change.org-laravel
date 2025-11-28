<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PetitionController;

Route::get('/', [PagesController::class, 'home'])->name('home');

Route::controller(PetitionController::class)->group(function () {
    Route::get('petitions/index', 'index')->name('petitions.index');
    Route::get('petition/add', 'create')->name('petitions.create');
    Route::post('petition', 'store')->name('petitions.store');
    Route::get('mypetitions', 'listMine')->middleware('auth')->name('petitions.mine');
    Route::get('petitionsSigned', 'listSigned')->middleware('auth')->name('petitions.signed');
    Route::post('petitions/firmar/{id}', 'sign')->middleware('auth')->name('petitions.sign');
    Route::delete('petitions/{id}', 'destroy')->name('petitions.delete');
    Route::put('petitions/{id}', 'update')->name('petitions.update');
    Route::get('petition/{id}', 'show')->name('petitions.show');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
