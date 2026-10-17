<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('profile')->middleware('auth')->controller(ProfileController::class)->group(function () {
    Route::get('/', 'index')->name('profile.index');
    Route::get('/create', 'create')->name('profile.create');
    Route::post('/', 'store')->name('profile.store'); // Store submission
    Route::get('/{profile}', 'show')->name('profile.show');
    Route::get('/{profile}/edit', 'edit')->name('profile.edit');
    Route::put('/{profile}', 'update')->name('profile.update');
    Route::delete('/{profile}', 'destroy')->name('profile.destroy');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('guest')->controller(AuthController::class)->group(function () {
    Route::get('/register', 'showRegister')->name('show.register');
    Route::get('/login', 'showLogin')->name('show.login');

    Route::post('/register', 'register')->name('register');
    Route::post('/login', 'login')->name('login');
});


// Route::get('profile/', [ProfileController::class, 'index'])->name('profile.index');

// Route::get('profile/create', [ProfileController::class, 'create'])->name('profile.create');

// Route::post('/', [ProfileController::class, 'store'])->name('profile.store');

// Route::get('profile/{profile}',      [ProfileController::class, 'show'])->name('profile.show');
// Route::get('profile/{profile}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
// Route::put('profile/{profile}',      [ProfileController::class, 'update'])->name('profile.update');
// Route::delete('profile/{profile}',   [ProfileController::class, 'destroy'])->name('profile.destroy');