<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();
        if (! $user || ! $user->is_active || ! $user->role) {
            abort(403, 'Access denied.');
        }
        if (! in_array($user->role->slug, ['admin', 'editor'], true)) {
            abort(403, 'Access denied.');
        }
        return $next($request);
    }
}