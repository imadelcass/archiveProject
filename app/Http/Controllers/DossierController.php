<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dossier;


class DossierController extends Controller
{
    public function index(Request $request)
    {
        $query = Dossier::query();
        return $query->with('beneficiaire')
        ->with('pieces.type')->get();
    }
    
    public function create(Request $request)
    {
        $dossier = new Dossier;
                // $dossier->NUMDOSSIER = $request->numDoss;
                // $dossier->IDTYPEDOSSIER = $request->idTypeDoss;
                // $dossier->IDSERVICE= $request->idService;
                // $dossier->IDBENEFICIAIRE= $request->idBenef;
                // $dossier->DATEDOSSIER= $request->dateDoss;
                // $dossier->idCellule= $request->idCellule;
                // $dossier->AnneeDossier= (int)$request->anneeDoss;
                // $dossier->ObjetDossier= $request->objetDoss;
                // $dossier->DISPODOSSIER= $request->dispoDoss;
                // $dossier->VALID= $request->dossValid;
                // $dossier->VALIDPAR = $request->idUser;
        $dossier->NUMDOSSIER = "dfd";
        $dossier->IDTYPEDOSSIER = 1;
        $dossier->IDSERVICE= 1;
        $dossier->IDBENEFICIAIRE= 1;
        $dossier->idCellule= 1;
        $dossier->AnneeDossier= 2005;
        $dossier->ObjetDossier= "dfd";
        $dossier->VALID= false;
        $dossier->VALIDPAR = null;
        $dossier->DATEDOSSIER= "2022-04-15 14:26:19";
        $dossier->DISPODOSSIER= false;
        if ($dossier->save()) {
            return response()->json([
                "success" => true,
                "dossier" => $dossier,
                'msg' => "Le dossier est bien ajouter.",
                'severity' => "success",
            ]);
        }
        return $dossier;
    }
    public function update(Request $request)
    {
        if(Dossier::where('id' , $request->id)->exists()){
            $dossier = Dossier::find($request->id);
            $dossier->NUMDOSSIER = $request->NUMDOSSIER;
            $dossier->IDTYPEDOSSIER = $request->IDTYPEDOSSIER;
            $dossier->IDSERVICE= $request->IDSERVICE;
            $dossier->IDBENEFICIAIRE= $request->IDBENEFICIAIRE;
            $dossier->DATEDOSSIER= $request->DATEDOSSIER;
            $dossier->idCellule= $request->idCellule;
            $dossier->AnneeDossier= (int)$request->AnneeDossier;
            $dossier->ObjetDossier= $request->ObjetDossier;
            $dossier->DISPODOSSIER= $request->DISPODOSSIER;
            $dossier->VALID= $request->VALID;
            $dossier->VALIDPAR = $request->VALIDPAR;
            if (!$request->VALID) {
                $dossier->VALIDPAR= null;
            }

            if ($request->VALID && $request->VALIDPAR == null) {
                return response()->json([
                    "success" => false,
                    "dossier" => $dossier,
                    'msg' => "Le champs ' valider par ' est vide.",
                    'severity' => "error",
                ]);
            }
            elseif($dossier->save()){
                return response()->json([
                    "success" => true,
                    "dossier" => $dossier,
                    'msg' => "Le dossier est bien modifier.",
                    'severity' => "success",
                ]);
            }

            
        }
    }
    public function destroy(Request $request)
    {
        $dossier = Dossier::where('id' , $request->id)->delete();
        if(!Dossier::where('id' , $request->id)->exists()){
            return response()->json([
                "success" => true,
                "dossier" => $dossier,
                'msg' => "Le dossier est bien supprimer.",
                'severity' => "success",
            ]);
        }
    }
}
