<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $query = User::query();
        return $query->get();
    }
    public function create(Request $request)
    {
        if(User::where('id' , $request->id)->exists()){
            $user = User::find($request->id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
        }else{
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
        }
        if($user->save()){
            return response()->json([
                "success" => true,
                "user" => $user,
            ]);
        }
    }
    public function destroy(Request $request)
    {
        $user = User::where('id' , $request->id)->delete();
        if(!User::where('id' , $request->id)->exists()){
            return response()->json([
                "success" => true,
                "user" => $user,
                "msg" => "L'utilisateur est bien supprimer",
            ]);
        }
    }
}
