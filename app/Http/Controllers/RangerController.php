<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ranger;
class RangerController extends Controller
{
    public function index()
    {
        $query = Ranger::query();
        return $query->get();
    }
    public function create(Request $request)
    {
        // return $request;
        if(Ranger::where('id' , $request->id)->exists()){
            $ranger = Ranger::find($request->id);
            $ranger->codeRanger = $request->codeRanger;
            $ranger->intitulRanger = $request->intitulRanger;
            $ranger->idArchive = (int)$request->idArchive;
            $ranger->nbrColonnes = (int)$request->nbrColonnes;
            $ranger->nbrLignes = (int)$request->nbrLignes;
            if($ranger->save()){
                return response()->json([
                    "success" => true,
                    "ranger" => $ranger,
                    'msg' => "La ranger est bien modifier.",
                    'severity' => "success",
                ]);
            }else{
                return response()->json([
                    "success" => false,
                    'msg' => "La ranger est pas modifier.",
                    'severity' => "error",
                ]);
            }
            
        }else{
            $ranger = new Ranger;
            $ranger->codeRanger = $request->codeRanger;
            $ranger->intitulRanger = $request->intitulRanger;
            $ranger->idArchive = (int)$request->idArchive;
            $ranger->nbrColonnes = (int)$request->nbrColonnes;
            $ranger->nbrLignes = (int)$request->nbrLignes;
            if($ranger->save()){
                return response()->json([
                    "success" => true,
                    "ranger" => $ranger,
                    'msg' => "La ranger est bien ajouter.",
                    'severity' => "success",
                ]);
            }else{
                return response()->json([
                    "success" => false,
                    'msg' => "La ranger est pas ajouter.",
                    'severity' => "error",
                ]);
            }
        }
    }
    public function destroy(Request $request)
    {
        $ranger = Ranger::where('id' , $request->id)->delete();
        if(!Ranger::where('id' , $request->id)->exists()){
            return response()->json([
                "success" => true,
                "ranger" => $ranger,
            ]);
        }
    }
}