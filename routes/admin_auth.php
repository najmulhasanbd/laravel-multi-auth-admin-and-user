<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\LandFormController;
use App\Http\Controllers\Admin\DistrictController;
use App\Http\Controllers\Admin\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')
    ->middleware('guest:admin')
    ->group(function () {
        Route::get('register', [RegisteredUserController::class, 'create'])->name('admin.register');

        Route::post('register', [RegisteredUserController::class, 'store']);

        Route::get('login', [LoginController::class, 'create'])->name('admin.login');

        Route::post('login', [LoginController::class, 'store']);
    });

Route::prefix('admin')
    ->middleware('auth:admin')
    ->group(function () {
        //admin dashboard
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');

        Route::post('logout', [LoginController::class, 'destroy'])->name('admin.logout');

        //district
        Route::prefix('admin')
            ->name('district.')
            ->group(function () {
                Route::get('/districts', [DistrictController::class, 'index'])->name('index');
                Route::get('/districts/create', [DistrictController::class, 'create'])->name('create');
                Route::post('/districts', [DistrictController::class, 'store'])->name('store');
                Route::get('/districts/{id}/edit', [DistrictController::class, 'edit'])->name('edit');
                Route::put('/districts/{id}', [DistrictController::class, 'update'])->name('update');
                Route::delete('/districts/{id}', [DistrictController::class, 'delete'])->name('delete');
            });

        Route::get('land-list', [LandFormController::class, 'landform'])->name('land.form');
        Route::get('land-create', [LandFormController::class, 'landCreate'])->name('land.create');
    });
