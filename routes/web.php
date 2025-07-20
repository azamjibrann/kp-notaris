<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::middleware(['prevent-back-history'])->group(function () {
    Route::get('/', function () {
        if (auth()->check()) {
            return match (auth()->user()->role) {
                'admin' => redirect()->route('admin.dashboard'),
                'user'  => redirect()->route('user.dashboard'),
                default => redirect()->route('login.form'),
            };
        }
        return view('index');
    })->name('index');

    Route::middleware(['guest'])->group(function () {
        Route::get('/login/{mode?}', [AuthController::class, 'authPage'])->name('login.form');
        Route::post('/login', [AuthController::class, 'login'])->name('login');
        Route::post('/register', [AuthController::class, 'register'])->name('register');
    });

    Route::middleware(['auth'])->group(function () {
        // USER dashboard
        Route::get('/user/dashboard', function () {
            return view('dashboard_user');
        })->middleware('user')->name('user.dashboard');

        // ADMIN dashboard
        Route::get('/admin/dashboard', function () {
            return view('dashboard_admin');
        })->middleware('admin')->name('admin.dashboard');

        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    });
});
