<?php

use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\BeneficiaireController;
use App\Http\Controllers\CelluleController;
use App\Http\Controllers\DossierController;
use App\Http\Controllers\PagePieceController;
use App\Http\Controllers\PieceController;
use App\Http\Controllers\RangerController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TypeDossierController;
use App\Http\Controllers\TypePieceController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [UserController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/archive', [ArchiveController::class, 'index']);
    Route::get('/dossiers', [DossierController::class, 'index']);
    Route::get('/beneficieres', [BeneficiaireController::class, 'index']);
    Route::get('/rangers', [RangerController::class, 'index']);
    Route::get('/cellules', [CelluleController::class, 'index']);
    Route::get('/typedossiers', [TypeDossierController::class, 'index']);
    Route::get('/dossiers', [DossierController::class, 'index']);
    Route::get('/pieces', [PieceController::class, 'index']);
    Route::get('/typepieces', [TypePieceController::class, 'index']);
    Route::get('/users', [UserController::class, 'index']);
    Route::get('/service', [ServiceController::class, 'index']);
});

Route::middleware(['auth:sanctum', 'admin'])->group(function () {
    Route::post('/user/add', [UserController::class, 'create']);
    Route::post('/archive/add', [ArchiveController::class, 'create']);
    Route::post('/service/add', [ServiceController::class, 'create']);
    Route::post('/beneficiaire/add', [BeneficiaireController::class, 'create']);
    Route::put('/beneficiaire/update', [BeneficiaireController::class, 'update']);
    Route::post('/ranger/add', [RangerController::class, 'create']);
    Route::put('/ranger/update', [RangerController::class, 'update']);
    Route::post('/typedossier/add', [TypeDossierController::class, 'create']);
    Route::post('/dossier/add', [DossierController::class, 'create']);
    Route::put('/dossier/update', [DossierController::class, 'update']);
    Route::post('/piece/add', [PieceController::class, 'create']);
    Route::put('/piece/update', [PieceController::class, 'update']);
    Route::post('/page_piece/add', [PagePieceController::class, 'create']);
    Route::post('/typepiece/add', [TypePieceController::class, 'create']);
});

Route::middleware(['auth:sanctum', 'admin', 'master'])->group(function () {
    Route::delete('/dossier/destroy/{id}', [DossierController::class, 'destroy']);
    Route::delete('/piece/destroy/{id}', [PieceController::class, 'destroy']);
    Route::delete('/user/destroy/{id}', [UserController::class, 'destroy']);
    Route::delete('/archive/destroy/{id}', [ArchiveController::class, 'destroy']);
    Route::delete('/service/destroy/{id}', [ServiceController::class, 'destroy']);
    Route::delete('/beneficiaire/destroy/{id}', [BeneficiaireController::class, 'destroy']);
    Route::delete('/ranger/destroy/{id}', [RangerController::class, 'destroy']);
});
