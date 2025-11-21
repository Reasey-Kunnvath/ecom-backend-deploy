<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class SanctumAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
       // 1. Check if authenticated with Sanctum
        if (!Auth::guard('sanctum')->check()) {
            return response()->json([
                'message' => 'Endpoint Access Denied',
                'authenticated' => false,
            ], 401);
        }

        $user = Auth::guard('sanctum')->user();

        // 2. If specific roles are required, check them
        if (!empty($roles) && !in_array($user->role, $roles)) {
            return response()->json([
                'message' => 'Forbidden: Insufficient permissions',
                'authenticated' => true,
            ], 403);
        }

        return $next($request);
    }
}
