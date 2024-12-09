<?php

use App\Http\Middleware\AuthenticationMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //kita tambahin middleware kita kesini
        //kita bisa kasih alias ke mmiddleware kita 
        $middleware ->alias([
            'isLogin' => AuthenticationMiddleware::class,
            // 'isAdmib'=> IsAdminMiddleware
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
