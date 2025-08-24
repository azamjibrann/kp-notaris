<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserDashboardController;
use App\Models\Layanan;

Route::middleware(['prevent-back-history'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Halaman Awal
    |--------------------------------------------------------------------------
    */
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


    /*
    |--------------------------------------------------------------------------
    | Guest Routes (Login & Register + Public Pages)
    |--------------------------------------------------------------------------
    */
    Route::middleware(['guest'])->group(function () {
        Route::get('/login/{mode?}', [AuthController::class, 'authPage'])->name('login.form');
        Route::post('/login', [AuthController::class, 'login'])->name('login');
        Route::post('/register', [AuthController::class, 'register'])->name('register');

        Route::view('/galeri', 'galeri')->name('galeri');
        Route::view('/layanan', 'layanan')->name('layanan');
        Route::view('/tentang', 'tentang')->name('tentang');
        Route::view('/kontak', 'kontak')->name('kontak');
    });


    /*
    |--------------------------------------------------------------------------
    | Authenticated Routes
    |--------------------------------------------------------------------------
    */
    Route::middleware(['auth'])->group(function () {

        // ------------------ USER ------------------
        Route::middleware(['user'])->prefix('user')->group(function () {
            Route::get('/dashboard', [UserDashboardController::class, 'index'])
        ->name('user.dashboard');

            Route::get('/layanan', [OrderController::class, 'layananUser'])->name('user.layanan');
            Route::get('/layanan/pesan/{id}', [OrderController::class, 'pesan'])->name('user.layanan.pesan');
            Route::post('/layanan/store', [OrderController::class, 'store'])->name('user.layanan.store');

            Route::get('/pesanan', [OrderController::class, 'pesananUser'])->name('user.pesanan');

            // User bisa lihat galeri
            Route::get('/galeri', [PhotoController::class, 'userIndex'])->name('user.galeri');
        });


        // ------------------ ADMIN ------------------
        Route::middleware(['admin'])->prefix('admin')->group(function () {
            Route::get('/dashboard', [LayananController::class, 'index'])->name('admin.dashboard');

            // CRUD Layanan
            Route::resource('layanan', LayananController::class);

            // Order List
            Route::get('/orders', [OrderController::class, 'adminIndex'])->name('admin.orders');

            // Galeri
            Route::resource('photos', PhotoController::class)->only(['index', 'store', 'destroy']);
        });

        // Logout
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    });
});
