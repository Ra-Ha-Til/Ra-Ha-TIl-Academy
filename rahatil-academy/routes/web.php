<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\BatchController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\PaymentController;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('students', StudentController::class);
Route::resource('teachers', TeacherController::class);
Route::resource('courses', CourseController::class);
Route::resource('batches', BatchController::class);
Route::resource('enrollments', EnrollmentController::class);
Route::resource('payments', PaymentController::class);
Route::resource('attendances', AttendanceController::class)->middleware('auth');