<?php

namespace App\Http\Controllers;

use App\Models\Piece;
use Illuminate\Http\Request;

class PieceController extends Controller
{
    public function index(Request $request)
    {

        $query = Piece::query();
        return $query->with('type')->get();
        
    }

    public function create(Request $request)
    {
        try {
            $file = $request->file('file');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move(public_path('files'), $filename);
            $piece = new Piece;
            $piece->numPiece = $request->num;
            $piece->idTypePiece = $request->idTypePiece;
            $piece->idDossier = $request->idDossier;
            $piece->intitulePiece = $request->intitule;
            $piece->file = $filename;
            if ($piece->save()) {
                return response()->json([
                    "success" => true,
                    "piece" => $piece,
                    'msg' => "La piece est bien ajouter.",
                    'severity' => "success",
                ]);
            }
        } catch (\Exception$exception) {
            if (!$request->has('file')) {
                return response()->json([
                    "success" => true,
                    'msg' => "Un fichier dois etre ajouter.",
                    'severity' => "error",
                ]);
            }
        }
    }
    public function update(Request $request)
    {
        if (Piece::where('id', $request->id)->exists()) {
            $piece = Piece::find($request->id);
            $piece->numPiece = $request->numPiece;
            $piece->idTypePiece = $request->idTypePiece;
            $piece->idDossier = $request->idDossier;
            $piece->intitulePiece = $request->intitulePiece;
            if ($piece->save()) {
                return response()->json([
                    "success" => true,
                    "piece" => $piece,
                    'msg' => "La piece est bien modifier.",
                    'severity' => "success",
                ]);
            }
        }

        // return response()->json([
        //     "success" => false,
        //     "dossier" => $dossier,
        //     'msg' => "Le champs ' valider par ' est vide.",
        //     'severity' => "error",
        // ]);

    }
    public function destroy(Request $request)
    {
        $piece = Piece::where('id', $request->id)->delete();
        if (!Piece::where('id', $request->id)->exists()) {
            return response()->json([
                "success" => true,
                "piece" => $piece,
                'msg' => "La piece est bien supprimer.",
                'severity' => "success",
            ]);
        }
    }
}
