<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Vérifier si l'utilisateur est authentifié
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Vérifier si l'utilisateur est admin
        // Adaptez selon votre logique (champ 'role', 'is_admin', etc.)
        $user = Auth::user();
        
        if (!$user->is_admin && $user->role !== 'admin') {
            abort(403, 'Accès non autorisé');
        }

        return $next($request);
    }
}