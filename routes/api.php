<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AprendizController;


Route::apiResource(
    'v1/aprendiz',
    AprendizController::class
);