<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;

Route::get('/', function () {
    return view('home');
})->name('home');


Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/education', function () {
    return view('education');
})->name('education');

Route::get('/projects/dashboard', [ProjectController::class, 'dashboard'])->name('projects.dashboard');
Route::resource('projects', ProjectController::class);
Route::post('/projects/restore/{id}', [ProjectController::class, 'restore'])->name('projects.restore');
Route::delete('/projects/force-delete/{id}', [ProjectController::class, 'forceDelete'])->name('projects.forceDelete');
Route::patch('/projects/publish/{id}', [ProjectController::class, 'publish'])->name('projects.publish');
Route::patch('/projects/unpublish/{id}', [ProjectController::class, 'unpublish'])->name('projects.unpublish');

Route::get('/form', function () {
    return view('form');
})->name('form');