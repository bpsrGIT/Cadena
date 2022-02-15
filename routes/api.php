<?php

use App\Http\Controllers\ListingsController;
use App\Http\Controllers\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/a', function () {
    return 'Test';
});

Route::middleware('auth:api')->group(function () {
    Route::post('/listing/new', [ListingsController::class, 'newListing']);
});
