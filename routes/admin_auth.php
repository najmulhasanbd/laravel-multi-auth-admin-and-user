<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\LandFormController;
use App\Http\Controllers\Admin\DistrictController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ThanaController;
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
        // Route::get('/dashboard', function () {
        //     return view('admin.dashboard');
        // })->name('admin.dashboard');

        Route::get('dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');

        Route::post('logout', [LoginController::class, 'destroy'])->name('admin.logout');

        //district
        Route::prefix('district')
            ->name('district.')
            ->group(function () {
                Route::get('/districts', [DistrictController::class, 'index'])->name('index');
                Route::get('/districts/create', [DistrictController::class, 'create'])->name('create');
                Route::post('/districts', [DistrictController::class, 'store'])->name('store');
                Route::get('/districts/{id}/edit', [DistrictController::class, 'edit'])->name('edit');
                Route::put('/districts/{id}', [DistrictController::class, 'update'])->name('update');
                Route::delete('/districts/{id}', [DistrictController::class, 'delete'])->name('delete');
            });
        //thana
        Route::prefix('thana')
            ->name('thana.')
            ->group(function () {
                Route::get('/thanas', [ThanaController::class, 'index'])->name('index');
                Route::get('/thanas/create', [ThanaController::class, 'create'])->name('create');
                Route::post('/thanas', [ThanaController::class, 'store'])->name('store');
                Route::get('/thanas/{id}/edit', [ThanaController::class, 'edit'])->name('edit');
                Route::put('/thanas/{id}', [ThanaController::class, 'update'])->name('update');
                Route::delete('/thanas/{id}', [ThanaController::class, 'delete'])->name('delete');
            });
        //thana
        Route::prefix('land')
            ->name('land.')
            ->group(function () {
                Route::get('/lands', [LandFormController::class, 'index'])->name('index');
                Route::get('/show/{id}', [LandFormController::class, 'show'])->name('show');
                Route::get('/lands/create', [LandFormController::class, 'create'])->name('create');
                Route::post('/lands', [LandFormController::class, 'store'])->name('store');
                Route::get('/lands/{id}/edit', [LandFormController::class, 'edit'])->name('edit');
                Route::put('/lands/{id}', [LandFormController::class, 'update'])->name('update');
                Route::delete('/lands/{id}', [LandFormController::class, 'destroy'])->name('delete');
                Route::get('/get-thana/{district_id}', [LandFormController::class, 'getThana'])->name('get.thana');
            });
        Route::get('pdf', function () {
            $defaultConfig = (new ConfigVariables())->getDefaults();
            $fontDirs = $defaultConfig['fontDir'];

            $defaultFontConfig = (new FontVariables())->getDefaults();
            $fontData = $defaultFontConfig['fontdata'];

            $path = public_path('fonts'); // Ensure your SolaimanLipi.ttf is here

            $mpdf = new Mpdf([
                'format' => 'A4',
                'orientation' => 'P',
                'fontDir' => array_merge($fontDirs, [$path]),
                'fontdata' => $fontData + [
                    'solaimanlipi' => [
                        'R' => 'SolaimanLipi.ttf',
                        'useOTL' => 0xff,
                        'useKashida' => 75,
                    ],
                ],
                'default_font' => 'solaimanlipi',
            ]);

            $html = view('pdf')->render(); // Make sure you have a resources/views/pdf.blade.php file
            $mpdf->WriteHTML($html);
            $mpdf->Output('test.pdf', 'I'); // 'I' for inline view in browser, use 'D' for download
        });
    });
