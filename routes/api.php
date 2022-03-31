<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArchiveController;


Route::get('/archive', [ArchiveController::class, 'index']);
Route::post('/archive/add', [ArchiveController::class, 'create']);








Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
