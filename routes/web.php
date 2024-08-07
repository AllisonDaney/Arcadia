<?php

use App\Http\Controllers\AdministrationController;
use App\Http\Controllers\AnimalsController;
use App\Http\Controllers\AnimalsReportController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\HomeCommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HourController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\MentionsLegalesController;
use App\Http\Controllers\MetricController;
use App\Http\Controllers\RgpdController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VeterinariansReportController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingController::class, 'index'])->name('landing');

Route::get('/mentions_legales', [MentionsLegalesController::class, 'index'])->name('mentions_legales');
Route::get('/rgpds', [RgpdController::class, 'index'])->name('rgpd');

Route::get('/homes', [HomeController::class, 'index'])->name('home');
Route::get('/homes/{homeId}', [HomeController::class, 'show'])->name('home_show');

Route::get('/animals', [AnimalsController::class, 'index'])->name('animals');

Route::get('/services', [ServiceController::class, 'index'])->name('services');

Route::get('/contacts', [ContactController::class, 'index'])->name('contacts');
Route::post('/contacts', [ContactController::class, 'create'])->name('contacts_create');

Route::get('/infos', [LandingController::class, 'index_infos'])->name('infos');

Route::post('/feedbacks', [FeedbackController::class, 'create'])->name('feedbacks_create');

Route::post('/metrics', [MetricController::class, 'create']);

Route::post('/auth/login', [AuthController::class, 'login'])->name('auth_login');
Route::post('/auth/logout', [AuthController::class, 'logout'])->name('auth_logout');
Route::get('/auth/reset_password', [AuthController::class, 'reset_password'])->name('reset_password');
Route::post('/auth/reset_password', [AuthController::class, 'reset_password_post'])->name('reset_password_post');
Route::get('/auth/change_password/{resetToken}', [AuthController::class, 'change_password'])->name('change_password');
Route::post('/auth/change_password', [AuthController::class, 'change_password_post'])->name('change_password_post');

Route::middleware(['auth'])->group(function () {
    Route::get('/administration/homes_comments', [HomeCommentController::class, 'index_admin'])->name('admin_homes_comments');

    Route::get('/administration/animals_reports', [AnimalsReportController::class, 'index_admin'])->name('admin_animals_reports');

    Route::get('/animals/{animalId}', [AnimalsController::class, 'show']);

    Route::middleware(['role:1'])->group(function () {
        Route::get('/administration/administrator', [AdministrationController::class, 'admin_administrator'])->name('admin_administrator');

        Route::post('/users', [UserController::class, 'create'])->name('admin_users_create');
        Route::get('/administration/users', [UserController::class, 'index_admin'])->name('admin_users');

        Route::post('/services', [ServiceController::class, 'create'])->name('admin_services_create');
        Route::delete('/services/{serviceId}', [ServiceController::class, 'delete'])->name('admin_services_delete');

        Route::post('/hours', [HourController::class, 'create'])->name('admin_hours_create');
        Route::put('/hours/{hourId}', [HourController::class, 'update'])->name('admin_hours_update');
        Route::delete('/hours/{hourId}', [HourController::class, 'delete'])->name('admin_hours_delete');
        Route::get('/administration/hours', [HourController::class, 'index_admin'])->name('admin_hours');

        Route::post('/homes', [HomeController::class, 'create'])->name('admin_homes_create');
        Route::put('/homes/{homeId}', [HomeController::class, 'update'])->name('admin_homes_update');
        Route::delete('/homes/{homeId}', [HomeController::class, 'delete'])->name('admin_homes_delete');
        Route::get('/administration/homes', [HomeController::class, 'index_admin'])->name('admin_homes');

        Route::post('/animals', [AnimalsController::class, 'create'])->name('admin_animals_create');
        Route::put('/animals/{animalId}', [AnimalsController::class, 'update'])->name('admin_animals_update');
        Route::delete('/animals/{animalId}', [AnimalsController::class, 'delete'])->name('admin_animals_delete');
        Route::get('/administration/animals', [AnimalsController::class, 'index_admin'])->name('admin_animals');
    });

    Route::middleware(['role:1|2'])->group(function () {
        Route::put('/services/{serviceId}', [ServiceController::class, 'update'])->name('admin_services_update');
        Route::get('/administration/services', [ServiceController::class, 'index_admin'])->name('admin_services');

        Route::get('/administration/feedbacks', [FeedbackController::class, 'index_admin'])->name('admin_feedbacks');
    });

    Route::middleware(['role:1|3'])->group(function () {
        Route::get('/administration/veterinarians_reports', [VeterinariansReportController::class, 'index_admin'])->name('admin_veterinarians_reports');
    });

    Route::middleware(['role:2'])->group(function () {
        Route::get('/administration/employee', [AdministrationController::class, 'admin_employee'])->name('admin_employee');

        Route::post('/animals_reports', [AnimalsReportController::class, 'create'])->name('admin_animals_reports_create');

        Route::put('/feedbacks/{feedbackId}', [FeedbackController::class, 'update'])->name('admin_feedbacks_update');
    });

    Route::middleware(['role:3'])->group(function () {
        Route::get('/administration/veterinary', [AdministrationController::class, 'admin_veterinary'])->name('admin_veterinary');

        Route::post('/veterinarians_reports', [VeterinariansReportController::class, 'create'])->name('admin_veterinarians_reports_create');

        Route::post('/homes_comments', [HomeCommentController::class, 'create'])->name('admin_homes_comments_create');
    });
});
