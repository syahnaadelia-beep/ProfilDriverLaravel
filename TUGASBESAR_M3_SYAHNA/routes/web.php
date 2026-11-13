
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\AuthController;


Route::get('/', function () {
    return redirect()->route('login');
});


Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');


Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware('auth')->group(function () {

    // Admin dan Staff dapat melihat, menambah, dan mengedit data
    Route::resource('drivers', DriverController::class)
        ->except(['destroy']);

    // Hanya Admin yang dapat menghapus data
    Route::delete('/drivers/{driver}', [DriverController::class, 'destroy'])
        ->middleware('role:admin')
        ->name('drivers.destroy');
});
