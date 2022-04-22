<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cellule;
use DB;
class CelluleController extends Controller
{
    public function index()
    {
        $query = Cellule::query();
        return $query->get();
    }
    public function create(Request $request)
    {
        $codeRanger = $request->codeRanger;
        $nbrLignes = $request->nbrLignes;
        $nbrColonnes = $request->nbrColonnes;
        $cellules = [];
        for ($l=1; $l <= $nbrLignes; $l++) {
            for ($c=1; $c <= $nbrColonnes; $c++) { 
                $cellule = new Cellule;
                $cellule->codeCellule = "{$codeRanger}-{$l}-{$c}";
                $cellule->idRanger = $request->id;
                $cellule->numLigne = $l;
                $cellule->numColonne = $c;
                array_push($cellules, $cellule->attributesToArray());
            }
        }
        $inserted = Cellule::insert($cellules);
        if ($inserted) {
            return response()->json([
                "success" => true,
                'msg' => "Les cellues est bien ajouter.",
                'severity' => "success",
            ]);
        }

        
    }
}
