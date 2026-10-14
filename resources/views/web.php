<?php

use App\Http\Controllers\Auth\Logout;
use App\Http\Controllers\Auth\Register;
use App\Http\Controllers\TweetController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TweetController::class, 'index']);

Route::get('/tweets')->group(function() {
    Route::post('/', [TweetController::class, 'store']);
    Route::get('/{tweet}/edit', [TweetController::class, 'edit']);
    Route::put('/{tweet}', [TweetController::class, 'update']);
    Route::delete('/{tweet}', [TweetController::class, 'destroy']);

    //logout route
    Route::post('/logout', Logout::class);
})->middleware('auth');


Route::middleware('guest')->group(function() {
    Route::view('/login', 'auth.login')->name('login');
    
    Route::view('/register', 'auth.register')->name('register');
    Route::post('/register', Register::class);
});
