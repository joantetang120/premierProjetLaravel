<?php

namespace App\Http\Middleware;

use App\Models\Article;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CanEditArticle
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $action): Response
    {
        $article = $request->route('article');
        $user = $request->user();

        if (!$article instanceof \App\Models\Article) {
            $article = Article::findOrFail($article);
        }

        $allowed = $user->isAdmin() || $article->user_id === $user->id;

        if (!$allowed) {
            abort(403, 'Action non autoriser');
        }
        return $next($request);
    }
}
