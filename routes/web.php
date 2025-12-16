<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json(['Welcome' => 'Why are you here Curious cat?']);
});
