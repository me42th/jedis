<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/model-count', function () {
    $count = shell_exec('php artisan model:count');
    return response()->json(['model_count' => $count]);
});