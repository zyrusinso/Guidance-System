<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('/');
    Route::get('/home', function(){
        return redirect('/');
    });
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('studentProfile', App\Http\Controllers\StudProfileController::class);
    Route::post('studentProfile/check/{stud_num}', [App\Http\Controllers\StudProfileController::class, 'studentProfile']);
    Route::resource('complain', App\Http\Controllers\ComplainController::class);
    Route::resource('teacher', App\Http\Controllers\TeacherController::class);
    Route::resource('user', App\Http\Controllers\UserController::class);
});