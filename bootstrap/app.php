<?php

use App\Http\Middleware\SanctumAuth;
use Illuminate\Foundation\Application;
use App\Http\Middleware\SubscriptionAuth;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'auth.route' => SanctumAuth::class,
            'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
            'subscriber' => SubscriptionAuth::class,
        ]);

        // $middleware->api(prepend: [
        //     SanctumAuth::class,
        // ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
