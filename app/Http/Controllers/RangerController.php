<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ranger;
use App\Models\Cellule;
use DB;
class RangerController extends Controller
{
    public function index()
    {
        $query = Ranger::query();
        return $query->get();
    }
    public function create(Request $request)
    {
            $ranger = new Ranger;
            $ranger->codeRanger = $request->codeRanger;
            $ranger->intitulRanger = $request->intitulRanger;
            $ranger->idArchive = (int)$request->idArchive;
            $ranger->nbrColonnes = (int)$request->nbrColonnes;
            $ranger->nbrLignes = (int)$request->nbrLignes;
            if($ranger->save()){
                //create new cellules
                $nbrLignes = (int)$request->nbrLignes;
                $nbrColonnes = (int)$request->nbrColonnes;
                $cellules = [];
                for ($l=1; $l <= $nbrLignes; $l++) {
                    for ($c=1; $c <= $nbrColonnes; $c++) { 
                        $cellule = new Cellule;
                        $cellule->codeCellule = "{$ranger->codeRanger}-{$l}-{$c}";
                        $cellule->idRanger = $ranger->id;
                        $cellule->numLigne = $l;
                        $cellule->numColonne = $c;
                        array_push($cellules, $cellule->attributesToArray());
                    }
                }
                $inserted = Cellule::insert($cellules);
                if ($inserted) {
                    return response()->json([
                        "success" => true,
                        "ranger" => $ranger,
                        'msg' => "La ranger est bien ajouter.",
                        'severity' => "success",
                    ]);
                }
                // else {
                //     # rollback inserted ranger
                // }
            }
            
            
            
            else{
                return response()->json([
                    "success" => false,
                    'msg' => "La ranger est pas ajouter.",
                    'severity' => "error",
                ]);
            }
    }
    public function update(Request $request)
    {
        $codeCellulesArr = [];
        $codeCellulesObj = DB::table("cellules")
                        ->select("codeCellule")
                        ->where("idranger", "=", $request->id)
                        ->get();
        foreach ($codeCellulesObj as $code) {
            array_push($codeCellulesArr , $code->codeCellule);
        };
        $req = DB::table("dossiers")
                ->whereIn("CodeCellule", $codeCellulesArr)
                ->get();

        if($req->isEmpty()){
            if(Ranger::where('id' , $request->id)->exists()){
                $ranger = Ranger::find($request->id);
                $ranger->codeRanger = $request->codeRanger;
                $ranger->intitulRanger = $request->intitulRanger;
                $ranger->idArchive = (int)$request->idArchive;
                $ranger->nbrColonnes = (int)$request->nbrColonnes;
                $ranger->nbrLignes = (int)$request->nbrLignes;
                if($ranger->save()){
                    //delete all cellules
                    DB::table('cellules')
                        ->where('idRanger','=',$request->id)
                        ->delete();
                    //create new cellules
                    $nbrLignes = (int)$request->nbrLignes;
                    $nbrColonnes = (int)$request->nbrColonnes;
                    $cellules = [];
                    for ($l=1; $l <= $nbrLignes; $l++) {
                        for ($c=1; $c <= $nbrColonnes; $c++) { 
                            $cellule = new Cellule;
                            $cellule->codeCellule = "{$request->codeRanger}-{$l}-{$c}";
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
                            "ranger" => $ranger,
                            'msg' => "La ranger est bien modifier.",
                            'severity' => "success",
                        ]);
                    }
                    // else {
                    //     # rollback inserted ranger
                    // }

                }else{
                    return response()->json([
                        "success" => false,
                        'msg' => "La ranger est pas modifier.",
                        'severity' => "error",
                    ]);
                }
                
            }
            
        }

    }
    public function destroy(Request $request)
    { 
        $codeCellulesArr = [];
        $codeCellulesObj = DB::table("cellules")
                        ->select("codeCellule")
                        ->where("idranger", "=", $request->id)
                        ->get();
        foreach ($codeCellulesObj as $code) {
            array_push($codeCellulesArr , $code->codeCellule);
        };
        $req = DB::table("dossiers")
                ->whereIn("CodeCellule", $codeCellulesArr)
                ->get();

        if($req->isEmpty()){
            //delete all cellules
            Cellule::where('idRanger',$request->id)->delete();
            Ranger::where('id',$request->id)->delete();
            if(!Ranger::where('id' , $request->id)->exists()){
                return response()->json([
                    "success" => true,
                    'msg' => "La ranger est bien supprimer.",
                    'severity' => "success",

                ]);
            }
        }
        else{
            return response()->json([
                "success" => false,
                'msg' => "La ranger contient des dossiers.",
                'severity' => "error",

            ]);
        }

    }
}