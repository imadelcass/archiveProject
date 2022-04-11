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
}
