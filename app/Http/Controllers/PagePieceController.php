<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PagePiece;

class PagePieceController extends Controller
{
    public function create(Request $request)
    {
        try {
            $image = $request->file('image');
            $extention = $image->getClientOriginalExtension();
        
        
        
        if ($request->has('image')) {
                        $filename = time().'.'.$extention;
                        $image->move(public_path('images'), $filename);
                $page = new PagePiece;
                $page->numPage = $request->numPage;
                $page->idPiece = $request->idPiece;
                $page->photo = $filename;
                if ($page->save()) {
                    return response()->json([
                        "success" => true,
                        "image" => $image,
                        'msg' => "Le page est bien ajouter.",
                        'severity' => "success",
                    ]);
                }
            }
        } catch (\Exception $exception) {
            if(PagePiece::where('numPage' ,'=', $request->numPage)
                    ->where('idPiece' ,'=', $request->idPiece)
                    ->exists()){
                        return response()->json([
                            "success" => true,
                            'msg' => "Le page est déja remplie.",
                            'severity' => "error",
                        ]);
                    }
        }        
    }
}
