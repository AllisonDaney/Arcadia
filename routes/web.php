<?php

use App\Http\Controllers\AnimalsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingController::class, 'index'])->name('landing');

Route::get('/homes', [HomeController::class, 'index'])->name('home');
Route::get('/homes/{homeId}', [HomeController::class, 'show'])->name('home_show');

Route::get('/animals', [AnimalsController::class, 'index'])->name('animals');

Route::get('/services', [ServiceController::class, 'index'])->name('services');


Route::get('/aaaa', [LandingController::class, 'index'])->name('contact');
Route::get('/aaaaa', [LandingController::class, 'index'])->name('infos');
