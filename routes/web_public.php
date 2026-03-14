<?php

use App\Http\Controllers\NewsController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\StudentWorkController;
use App\Http\Controllers\VisionMissionController;
use Illuminate\Support\Facades\Route;

Route::get('/visi-misi', [VisionMissionController::class, 'publicIndex'])->name('vision-mission');
Route::view('/sejarah', 'sejarah')->name('sejarah');

Route::view('/jurusan/akuntansi', 'majors.Akuntansi')->name('majors.akuntansi');
Route::view('/jurusan/pplg', 'majors.PPLG')->name('majors.pplg');
Route::view('/jurusan/dkv', 'majors.DKV')->name('majors.dkv');
Route::view('/jurusan/kuliner', 'majors.Kuliner')->name('majors.kuliner');
Route::view('/jurusan/hotel', 'majors.Hotel')->name('majors.hotel');

Route::get('/language/{locale}', function (string $locale) {
    if (!in_array($locale, ['en', 'id'], true)) {
        abort(404);
    }

    session(['locale' => $locale]);

    return redirect()->back();
})->name('language.switch');

Route::get('/news', [NewsController::class, 'publicIndex'])->name('news.index');
Route::get('/news/{news:slug}', [NewsController::class, 'publicShow'])->name('news.show');

Route::get('/student-works', [StudentWorkController::class, 'publicIndex'])->name('student-works.index');
Route::get('/student-works/{studentWork:slug}', [StudentWorkController::class, 'publicShow'])->name('student-works.show');

Route::get('/ppdb', [RegistrationController::class, 'create'])->name('ppdb.create');
Route::post('/ppdb', [RegistrationController::class, 'store'])->name('ppdb.store');
