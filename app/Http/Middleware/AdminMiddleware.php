<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // if (User::find($user->id)->tokenCan('role:admin')) {

        $user = Auth::user();
        if ($user->type == "admin" || $user->type == "master" ) {
            return $next($request);
        } else {
            return response()->json(
                [
                    'success' => false,
                    'msg' => "l'utilisateur doit être administrateur pour appliquer cette action.",
                    'severity' => "error",
                ]);
        }
    }
}
