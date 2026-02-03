<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
// Students: index, create, store
Route::get('/students', [StudentController::class, 'index'])->name('students.index');
Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
Route::post('/students', [StudentController::class, 'store'])->name('students.store');

// Home Page
Route::get('/', function () {
    return view('home');
});

// View Student Page
Route::get('/students/{id}', function ($id) {
    return view('students.show');
});

// Edit Student Page
Route::get('/students/{id}/edit', function ($id) {
    return view('students.edit');
});
