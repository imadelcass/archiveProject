<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypeDossier;


class TypeDossierController extends Controller
{
    public function index()
    {
        $query = TypeDossier::query();
        return $query->get();
    }
    public function create(Request $request)
    {
        $typeDossier = new TypeDossier;
        $typeDossier->codeTypeDoss = $request->code;
        $typeDossier->libTypeDoss = $request->libel;
        if ($typeDossier->save()) {
            return response()->json([
                "success" => true,
                "typeDossier" => $typeDossier,
                'msg' => "Le type est bien ajouter.",
                'severity' => "success",
            ]);
        }
    }
}
