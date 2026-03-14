<?php

use App\Http\Controllers\AdminPanelController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\EkskulController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\PendingStudentController;
use App\Http\Controllers\SchoolProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentWorkController;
use App\Http\Controllers\VisionMissionController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('panel', [AdminPanelController::class, 'index'])->name('panel');

    Route::resource('student', StudentController::class);

    Route::resource('pending-students', PendingStudentController::class)->only(['index', 'show', 'destroy']);
    Route::patch('pending-students/{pendingStudent}/status', [PendingStudentController::class, 'updateStatus'])
        ->name('pending-students.update-status');

    Route::resource('alumni', AlumniController::class);
    Route::resource('ekskuls', EkskulController::class);
    Route::resource('student-works', StudentWorkController::class);
    Route::resource('majors', MajorController::class);

    Route::resource('school-profile', SchoolProfileController::class)->except(['show']);
    Route::resource('vision-mission', VisionMissionController::class)->except(['show']);
    Route::resource('organizations', OrganizationController::class);
    Route::resource('news', NewsController::class);
});
