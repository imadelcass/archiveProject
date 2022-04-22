<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompositDossierController extends Controller
{
    protected $primaryKey = ['idTypeDossier','idTypePiece'];
}
