<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\PostController;
use App\Http\Controllers\Client\CommentController;
use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\CommentController as AdminCommentController;



Route::get('/', function () {
    return response()->json(['Welcome' => 'Why are you here Curious cat?']);
});


// Client Routes
Route::prefix('client')->name('client.')->group(function () {
    Route::apiResource('posts', PostController::class)->only(['index', 'show']);
    Route::apiResource('posts.comments', CommentController::class)->only(['index','store']);
});



// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::middleware('auth:sanctum')->group(function () {
        Route::apiResource('posts', AdminPostController::class);
        Route::apiResource('posts.comments', AdminCommentController::class);
    });
});
