<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JoinController;

Route::get('/joins/inner', [JoinController::class, 'innerJoin']);
Route::get('/joins/left', [JoinController::class, 'leftJoin']);
Route::get('/joins/right', [JoinController::class, 'rightJoin']);
Route::get('/joins/cross', [JoinController::class, 'crossJoin']);
Route::get('/joins/multiple', [JoinController::class, 'multipleJoins']);
