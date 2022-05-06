<?php

namespace App\Http\Controllers;

use App\Models\TypePiece;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TypePieceController extends Controller
{
    public function index(Request $request)
    {
        if ($request->PiecesManquants) {
            #les types des pieces manquants
            $query = "select * from type_pieces where id in (
                select idTypePiece from composit_dossiers where idTypePiece not in
            (select distinct idTypePiece from pieces where idDossier = {$request->idDossier})
            and idTypeDossier = (select idTypeDossier from dossiers where id = {$request->idDossier}))";

            return DB::select($query);

        } else {
            $query = TypePiece::query();
            return $query->get();
        }
    }
    public function create(Request $request)
    {
        $typePiece = new TypePiece;
        $typePiece->codeTypePiece = $request->code;
        $typePiece->IntituleTypePiece = $request->intitule;
        if ($typePiece->save()) {
            return response()->json([
                "success" => true,
                "typePiece" => $typePiece,
                'msg' => "Le type est bien ajouter.",
                'severity' => "success",
            ]);
        }

    }
}
