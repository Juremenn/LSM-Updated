<?php

use App\Http\Controllers\AlumniController;
use App\Http\Controllers\AdminPanelController;
use App\Http\Controllers\EkskulController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\PendingStudentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SchoolProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentWorkController;
use App\Http\Controllers\VisionMissionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Pages
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
});

Route::get('/visi-misi', [VisionMissionController::class, 'publicIndex'])->name('vision-mission');
Route::view('/sejarah', 'sejarah')->name('sejarah');

Route::view('/jurusan/akuntansi', 'majors.Akuntansi')->name('majors.akuntansi');
Route::view('/jurusan/pplg', 'majors.PPLG')->name('majors.pplg');
Route::view('/jurusan/dkv', 'majors.DKV')->name('majors.dkv');
Route::view('/jurusan/kuliner', 'majors.Kuliner')->name('majors.kuliner');
Route::view('/jurusan/hotel', 'majors.Hotel')->name('majors.hotel');

Route::get('/news', [NewsController::class, 'publicIndex'])->name('news.index');
Route::get('/news/{news:slug}', [NewsController::class, 'publicShow'])->name('news.show');
Route::get('/student-works', [StudentWorkController::class, 'publicIndex'])->name('student-works.index');
Route::get('/student-works/{studentWork:slug}', [StudentWorkController::class, 'publicShow'])->name('student-works.show');

/*
|--------------------------------------------------------------------------
| Localization
|--------------------------------------------------------------------------
*/

Route::get('/language/{locale}', function (string $locale) {
    if (!in_array($locale, ['en', 'id'], true)) {
        abort(404);
    }

    session(['locale' => $locale]);

    return redirect()->back();
})->name('language.switch');

/*
|--------------------------------------------------------------------------
| Registration (PPDB)
|--------------------------------------------------------------------------
*/

Route::get('/ppdb', [RegistrationController::class, 'create'])->name('ppdb.create');
Route::post('/ppdb', [RegistrationController::class, 'store'])->name('ppdb.store');

/*
|--------------------------------------------------------------------------
| Authenticated User
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    return redirect()->route('admin.panel');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Admin Area
|--------------------------------------------------------------------------
*/

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

require __DIR__.'/auth.php';
