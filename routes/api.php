<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\BeneficiaireController;
use App\Http\Controllers\RangerController;
use App\Http\Controllers\CelluleController;

//archive
Route::get('/archive', [ArchiveController::class, 'index']);
Route::post('/archive/add', [ArchiveController::class, 'create']); 
Route::delete('/archive/destroy/{id}', [ArchiveController::class, 'destroy']);

//service
Route::get('/service', [ServiceController::class, 'index']);
Route::post('/service/add', [ServiceController::class, 'create']); 
Route::delete('/service/destroy/{id}', [ServiceController::class, 'destroy']);

Route::get('/beneficieres', [BeneficiaireController::class, 'index']);
Route::post('/beneficiaire/add', [BeneficiaireController::class, 'create']);
Route::put('/beneficiaire/update', [BeneficiaireController::class, 'update']);
Route::delete('/beneficiaire/destroy/{id}', [BeneficiaireController::class, 'destroy']);

Route::get('/rangers', [RangerController::class, 'index']);

Route::get('/cellules', [CelluleController::class, 'index']);




Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
