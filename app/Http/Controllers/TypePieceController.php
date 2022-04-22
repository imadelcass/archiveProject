<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypePiece;

class TypePieceController extends Controller
{
    public function index()
    {
        $query = TypePiece::query();
        return $query->get();
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
