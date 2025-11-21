<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\SubscribedUser;
use Symfony\Component\HttpFoundation\Response;

class SubscriptionAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        $isSubscribe = SubscribedUser::where('user_id', $user->id)
            ->where('is_active', true)
            ->first();

        if(!$isSubscribe) {
            return response()->json([
                'message' => 'You need an active subscription to access this resource.',
                'is_subscribed' => false,
                'user' => $user,
            ], 403);
        }

        return $next($request);
    }
}
