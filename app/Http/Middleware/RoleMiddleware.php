<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if (!$request->user() || !$request->user()->hasRole($role)) {
            // Redirect based on their actual role instead of a generic 403
            if ($request->user()) {
                if ($request->user()->hasRole('admin')) {
                    return redirect()->route('admin.dashboard');
                }
                if ($request->user()->hasRole('user')) {
                    return redirect()->route('user.dashboard');
                }
            }

            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}
