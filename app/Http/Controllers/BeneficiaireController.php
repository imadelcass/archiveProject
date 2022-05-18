<?php

namespace App\Http\Controllers;

use App\Models\Beneficiaire;
use Illuminate\Http\Request;

class BeneficiaireController extends Controller
{
    public function index()
    {
        $query = Beneficiaire::query();
        return $query->get();
    }
    public function create(Request $request)
    {
        $beneficiaire = new Beneficiaire;
        $beneficiaire->CODEBENEFICIAIRE = $request->code;
        $beneficiaire->NOMBENEFICIAIRE = $request->name;
        $beneficiaire->RUE = $request->adresse;
        $beneficiaire->VILLE = $request->ville;
        $beneficiaire->CP = $request->codePostal;
        $beneficiaire->EMAIL = $request->email;
        $beneficiaire->TEL = $request->tel;
        $beneficiaire->CONTACT = $request->contact;
        $beneficiaire->GSM = $request->gsm;
        if ($beneficiaire->save()) {
            return response()->json([
                "success" => true,
                "beneficiaire" => $beneficiaire,
            ]);
        }
    }
    public function update(Request $request)
    {
        if (Beneficiaire::where('id', $request->id)->exists()) {
            $beneficiaire = Beneficiaire::find($request->id);
            $beneficiaire->CODEBENEFICIAIRE = $request->CODEBENEFICIAIRE;
            $beneficiaire->NOMBENEFICIAIRE = $request->NOMBENEFICIAIRE;
            $beneficiaire->RUE = $request->RUE;
            $beneficiaire->VILLE = $request->VILLE;
            $beneficiaire->CP = $request->CP;
            $beneficiaire->EMAIL = $request->EMAIL;
            $beneficiaire->TEL = $request->TEL;
            $beneficiaire->CONTACT = $request->CONTACT;
            $beneficiaire->GSM = $request->GSM;
            if ($beneficiaire->save()) {
                return response()->json([
                    "success" => true,
                    "beneficiaire" => $beneficiaire,
                ]);
            }
        }
    }
    public function destroy(Request $request)
    {
        $beneficiaire = Beneficiaire::where('id', $request->id)->delete();
        if (!Beneficiaire::where('id', $request->id)->exists()) {
            return response()->json([
                "success" => true,
                "beneficiaire" => $beneficiaire,
                'msg' => "Le beneficiaire est bien supprimmer.",
            ]);
        }
    }
}
