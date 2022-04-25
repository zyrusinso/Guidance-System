<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\AddComplainComponent;
use App\Http\Livewire\ComplainReport;
use App\Http\Controllers\ComplainController;

if (App::environment('production')) {
    URL::forceScheme('https');
}

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('/');
    Route::redirect('/home', '/');
    Route::get('/complain', [ComplainController::class, 'index'])->name('complain.index');
    Route::get('/complain/create', AddComplainComponent::class)->name('complain.create');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('studentProfile', App\Http\Controllers\StudProfileController::class);
    Route::post('studentProfile/check/{stud_num}', [App\Http\Controllers\StudProfileController::class, 'studentProfile']);
    Route::resource('teacher', App\Http\Controllers\TeacherController::class);
    Route::resource('user', App\Http\Controllers\UserController::class);
    Route::get('complain-reports', ComplainReport::class)->name('complain-report');
});