<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * Global HTTP middleware stack.
     * Middleware di sini berjalan untuk setiap request.
     */
    protected $middleware = [
        \App\Http\Middleware\LogActivity::class, // <--- aktifkan global log
    ];

    /**
     * Middleware groups.
     */
    // protected $middlewareGroups = [
    //     'web' => [
    //         \App\Http\Middleware\EncryptCookies::class,
    //         \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
    //         \Illuminate\Session\Middleware\StartSession::class,
    //         \Illuminate\View\Middleware\ShareErrorsFromSession::class,
    //         \App\Http\Middleware\VerifyCsrfToken::class,
    //         \Illuminate\Routing\Middleware\SubstituteBindings::class,
    //     ],

    //     'api' => [
    //         \Illuminate\Routing\Middleware\ThrottleRequests::class.':api',
    //         \Illuminate\Routing\Middleware\SubstituteBindings::class,
    //     ],
    // ];

    /**
     * Route middleware.
     * Middleware di sini bisa digunakan spesifik di routes/web.php.
     */
    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        'role' => \App\Http\Middleware\RoleMiddleware::class,
        'log.activity' => \App\Http\Middleware\LogActivity::class,
    ];
}
