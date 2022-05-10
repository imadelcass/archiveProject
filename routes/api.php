<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\BeneficiaireController;
use App\Http\Controllers\RangerController;
use App\Http\Controllers\CelluleController;
use App\Http\Controllers\TypeDossierController;
use App\Http\Controllers\DossierController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PieceController;
use App\Http\Controllers\TypePieceController;
use App\Http\Controllers\PagePieceController;

Route::get('/users', [UserController::class, 'index']);
Route::post('/user/add', [UserController::class, 'create']);
Route::delete('/user/destroy/{id}', [UserController::class, 'destroy']);
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
Route::post('/ranger/add', [RangerController::class, 'create']);
Route::put('/ranger/update', [RangerController::class, 'update']);
Route::delete('/ranger/destroy/{id}', [RangerController::class, 'destroy']);

Route::get('/cellules', [CelluleController::class, 'index']);
// Route::post('/cellule/add', [CelluleController::class, 'create']);

Route::get('/typedossiers', [TypeDossierController::class, 'index']);
Route::post('/typedossier/add', [TypeDossierController::class, 'create']);

Route::get('/dossiers', [DossierController::class, 'index']);
Route::post('/dossier/add', [DossierController::class, 'create']);
Route::put('/dossier/update', [DossierController::class, 'update']);
Route::delete('/dossier/destroy/{id}', [DossierController::class, 'destroy']);

Route::get('/pieces', [PieceController::class, 'index']);
Route::post('/piece/add', [PieceController::class, 'create']);
Route::put('/piece/update', [PieceController::class, 'update']);
Route::delete('/piece/destroy/{id}', [PieceController::class, 'destroy']);

Route::get('/typepieces', [TypePieceController::class, 'index']);
Route::post('/typepiece/add', [TypePieceController::class, 'create']);

Route::post('/page_piece/add', [PagePieceController::class, 'create']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
