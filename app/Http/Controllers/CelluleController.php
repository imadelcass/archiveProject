<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cellule;
class CelluleController extends Controller
{
    public function index()
    {
        $query = Cellule::query();
        return $query->get();
    }
    public function create(Request $request)
    {
        $cellule = new Cellule;
        $cellule->codeCellule = $request->codeCellule;
        $cellule->idRanger = $request->idRanger;
        $cellule->numLigne = $request->numLigne;
        $cellule->numColonne = $request->numColonne;
        if ($cellule->save()) {
            return $cellule;
        }
        
    }
}
