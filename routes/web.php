<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json([
        'message' => 'School Management System API for Nigerian primary and secondary schools.',
        'docs' => '/api',
    ]);
});
