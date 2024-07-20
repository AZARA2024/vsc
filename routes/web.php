<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehicleController;

Route::get('/', function () {
    return view('home', ['page' => 'home']);
});
Route::resource('vehicles', VehicleController::class);

Route::get('ar/inspection-status', function () {
    return view('inspection', ['page' => 'inspection']);
});

Route::post('vehicles/search', [VehicleController::class, 'search'])->name('vehicles.search');

Auth::routes();

Route::get('dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');