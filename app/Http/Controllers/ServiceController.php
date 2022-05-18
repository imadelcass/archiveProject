<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $query = Service::query();
        return $query->get();
    }
    public function create(Request $request)
    {
        if (Service::where('id', $request->id)->exists()) {
            $service = Service::find($request->id);
            $service->codeService = $request->codeService;
            $service->libService = $request->libService;
            if ($service->save()) {
                return response()->json([
                    "success" => true,
                    "service" => $service,
                    'msg' => "Le service est bien modifier.",
                    'severity' => "success",
                ]);
            }
        } else {
            $service = new Service;
            $service->codeService = $request->codeService;
            $service->libService = $request->libService;
            if ($service->save()) {
                return response()->json([
                    "success" => true,
                    "service" => $service,
                    'msg' => "Le service est bien ajouter.",
                    'severity' => "success",
                ]);
            }
        }
    }
    public function destroy(Request $request)
    {
        $service = Service::where('id', $request->id)->delete();
        if (!Service::where('id', $request->id)->exists()) {
            return response()->json([
                "success" => true,
                "service" => $service,
                'msg' => "Le service est bien supprimer.",
                'severity' => "success",
            ]);
        }
    }
}
