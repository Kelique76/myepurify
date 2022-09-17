<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('pure', [App\Http\Controllers\PurifyCTRL::class, 'index']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
