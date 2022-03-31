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
        $archive = new Archive();
        $archive->codeArchive = 'f';
        $archive->intitulArchive = 'dsf';
        $archive->save();
        return $archive();
    }
}
