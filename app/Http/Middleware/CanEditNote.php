<?php

namespace App\Http\Middleware;

use App\Models\Note;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class CanEditNote
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $action): Response
    {
        $note= $request->route('note');
        $user= $request->user();

        if(!$note instanceof Note){
            $note = Note::findOrFail($note);
        }

        $allowed=$user->isAdmin() || $note->client_id===$user->id;
        if(!$allowed){
            abort(403, 'Action non autoriser');
        }

        return $next($request);
    }
}
