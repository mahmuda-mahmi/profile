<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('profile/', [ProfileController::class, 'index'])->name('profile.index');

// Create form — must come BEFORE the {profile} wildcard
Route::get('profile/create', [ProfileController::class, 'create'])->name('profile.create');

// Store submission
Route::post('/', [ProfileController::class, 'store'])->name('profile.store');

// Show / Edit / Update / Delete — the {profile} wildcard routes
Route::get('profile/{profile}',      [ProfileController::class, 'show'])->name('profile.show');
Route::get('profile/{profile}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::put('profile/{profile}',      [ProfileController::class, 'update'])->name('profile.update');
Route::delete('profile/{profile}',   [ProfileController::class, 'destroy'])->name('profile.destroy');

// register and login
Route::get('/register', [AuthController::class, 'showRegister'])->name('show.register');
Route::get('/login', [AuthController::class, 'showLogin'])->name('show.login');
//post methods for register and login
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route::prefix('profile')->middleware('auth')->group(function () {
//     Route::get('/', [ProfileController::class, 'index'])->name('profile.index');

//     // Create form — must come BEFORE the {profile} wildcard
//     Route::get('/create', [ProfileController::class, 'create'])->name('profile.create');

//     // Store submission
//     Route::post('/', [ProfileController::class, 'store'])->name('profile.store');

//     // Show / Edit / Update / Delete — the {profile} wildcard routes
//     Route::get('/{profile}',      [ProfileController::class, 'show'])->name('profile.show');
//     Route::get('/{profile}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::put('/{profile}',      [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/{profile}',   [ProfileController::class, 'destroy'])->name('profile.destroy');
// });


