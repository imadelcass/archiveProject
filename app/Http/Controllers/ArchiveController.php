<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Archive;
class ArchiveController extends Controller
{
    public function index()
    {
        $query = Archive::query();
        return $query->get();
    }
    public function create(Request $request)
    {
        if(Archive::where('id' , $request->id)->exists()){
            $archive = Archive::find($request->id);
            $archive->codeArchive = $request->codeArchive;
            $archive->intitulArchive = $request->intitulArchive;
        }else{
            $archive = new Archive;
            $archive->codeArchive = $request->codeArchive;
            $archive->intitulArchive = $request->intitulArchive;
        }
        if($archive->save()){
            return response()->json([
                "success" => true,
                "archive" => $archive,
            ]);
        }
    }
    public function destroy(Request $request)
    {
        $archive = Archive::where('id' , $request->id)->delete();
        if(!Archive::where('id' , $request->id)->exists()){
            return response()->json([
                "success" => true,
                "archive" => $archive,
            ]);
        }
    }
}
