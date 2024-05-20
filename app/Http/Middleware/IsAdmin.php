<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();

        if(!$user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        if ($user->is_admin) {
            return $next($request);
        }

        return response()->json(['error' => 'Vous n\'avez pas les permissions nécessaires pour accéder à cette ressource.'], 403);
    }
}
