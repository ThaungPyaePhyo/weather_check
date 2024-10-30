<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeatherController;

Route::get('/', function () {
    return view('welcome');
});

Route::match(['get', 'post'], '/', [WeatherController::class, 'index'])->name('weather.index');
