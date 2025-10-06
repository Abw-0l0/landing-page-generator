<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\SetLocale;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;

// Root route - show welcome page (always en-US)
Route::get('/', function () {
    app()->setLocale('en-US');
    session()->put('locale', 'en-US');
    return view('welcome');
})->name('welcome');

// Redirect /dashboard to home
Route::get('/dashboard', function () {
    return redirect('/');
});

// Locale-based routes
Route::prefix('{locale}')->middleware(SetLocale::class)->group(function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('locale.welcome');

    // Authentication routes
    Route::get('/auth', [AuthController::class, 'showAuthForm'])->name('locale.auth');
    Route::get('/login', [AuthController::class, 'showAuthForm'])->name('locale.login');
    Route::get('/register', [AuthController::class, 'showAuthForm'])->name('locale.register');

    // API routes for authentication
    Route::post('/api/login', [AuthController::class, 'login'])->name('api.locale.login.submit');
    Route::post('/api/register', [AuthController::class, 'register'])->name('api.locale.register.submit');

    // Dashboard route (protected)
    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('locale.dashboard');
});

// Global logout route
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
