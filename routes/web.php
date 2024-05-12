<?php

use App\Http\Controllers\AdministrationController;
use App\Http\Controllers\AnimalsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingController::class, 'index'])->name('landing');

Route::get('/homes', [HomeController::class, 'index'])->name('home');
Route::get('/homes/{homeId}', [HomeController::class, 'show'])->name('home_show');

Route::get('/animals', [AnimalsController::class, 'index'])->name('animals');

Route::get('/services', [ServiceController::class, 'index'])->name('services');

Route::get('/contacts', [ContactController::class, 'index'])->name('contacts');

Route::get('/infos', [LandingController::class, 'index_infos'])->name('infos');

Route::post('/feedbacks', [FeedbackController::class, 'create']);

Route::post('/emails/send/{templateId}', [EmailController::class, 'send']);

Route::post('/auth/login', [AuthController::class, 'login']);
Route::post('/auth/logout', [AuthController::class, 'logout']);

Route::get('/administration/administrator', [AdministrationController::class, 'admin_administrator'])->name('admin_administrator');

Route::post('/users', [UserController::class, 'create']);
Route::get('/administration/users', [UserController::class, 'index_admin'])->name('admin_users');


Route::get('/aa', [AdministrationController::class, 'admin_administrator'])->name('admin_services');
Route::get('/aaa', [AdministrationController::class, 'admin_administrator'])->name('admin_hours');
Route::get('/aaaa', [AdministrationController::class, 'admin_administrator'])->name('admin_homes');
Route::get('/b', [AdministrationController::class, 'admin_administrator'])->name('admin_animals');
Route::get('/bb', [AdministrationController::class, 'admin_administrator'])->name('admin_feedbacks');
Route::get('/bbb', [AdministrationController::class, 'admin_administrator'])->name('admin_report_veterinary');
