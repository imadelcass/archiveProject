<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        $query = Service::query();
        return $query->get();
    }
    public function create(Request $request)
    {
        if(Service::where('id' , $request->id)->exists()){
            $service = Service::find($request->id);
            $service->codeService = $request->codeService;
            $service->libService = $request->libService;
        }else{
            $service = new Service;
            $service->codeService = $request->codeService;
            $service->libService = $request->libService;
        }
        if($service->save()){
            return response()->json([
                "success" => true,
                "service" => $service,
            ]);
        }
    }
    public function destroy(Request $request)
    {
        $service = Service::where('id' , $request->id)->delete();
        if(!Service::where('id' , $request->id)->exists()){
            return response()->json([
                "success" => true,
                "service" => $service,
            ]);
        }
    }
}
