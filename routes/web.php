<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TeamController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::get('/', [HomeController::class, 'show'])->middleware(['auth', 'verified'])->name('dashboard');

Route::as('team.')->prefix('teams')->middleware(['auth', 'verified'])->controller(TeamController::class)->group(function () {
    Route::get('/create', 'createDisplay')->name('createDisplay');
    Route::post('/create', 'store')->name('store');
    Route::post('/add/mail/{id}', 'addUserByMail')->name('addUserByMail');
    Route::get('/{id}', 'show')->name('show');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
