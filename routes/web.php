<?php

use App\Http\Controllers\Admin\ClassroomController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LessonController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::prefix('admin')->group(function(){
    Route::group(['middleware' => ['auth']], function(){
        Route::get('/dashboard', DashboardController::class)->name('admin.dashboard');
        //route resource lessons
        Route::resource('/lessons', LessonController::class, ['as' => 'admin']);
                //route resource classrooms
        Route::resource('/classrooms', ClassroomController::class, ['as' => 'admin']);
    });
});
