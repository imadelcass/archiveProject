<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cellule;
class CelluleController extends Controller
{
    public function index()
    {
        $query = Cellule::query();
        return $query->get();
    }
}
