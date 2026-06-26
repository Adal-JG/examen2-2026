<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MaterialController;

Route::post('/materiales', [MaterialController::class, 'store']);
Route::put('/materiales/{codigo}', [MaterialController::class, 'update']);