<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\AuthController;



Route::get('/', function () {
    return response()->json(['Welcome' => 'Why are you here Curious cat?']);
});





Route::prefix('admin')->name('admin.')->group(function () {
    Route::post('login', [AuthController::class, 'login']);
});
