<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;


Route::apiResource('/posts', PostController::class);
Route::apiResource('/websites', WebsiteController::class);
Route::apiResource('/subscriptions', SubscriptionController::class)->only(['index','store']);
