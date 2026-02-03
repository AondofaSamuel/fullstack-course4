<?php

use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\FeeItemController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::apiResource('schools', SchoolController::class);
Route::apiResource('students', StudentController::class);
Route::apiResource('enrollments', EnrollmentController::class);
Route::apiResource('fee-items', FeeItemController::class);
