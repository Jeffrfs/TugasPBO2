<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

// Tambahkan semua import middleware di bawah ini
use App\Http\Middleware\TrustProxies;
use Illuminate\Http\Middleware\HandleCors;
use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance;
use Illuminate\Foundation\Http\Middleware\ValidatePostSize;
use App\Http\Middleware\TrimStrings;
use Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull;
use App\Http\Middleware\EncryptCookies;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use App\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\RedirectIfAuthenticated;
use Illuminate\Auth\Middleware\EnsureEmailIsVerified;
use Illuminate\Auth\Middleware\RequirePassword;
use Illuminate\Routing\Middleware\ThrottleRequests;

// ✅ Import middleware custom admin
use App\Http\Middleware\IsAdmin;

class Kernel extends HttpKernel
{
    /**
     * Global middleware yang selalu dijalankan
     */
    protected $middleware = [
        TrustProxies::class,
        HandleCors::class,
        PreventRequestsDuringMaintenance::class,
        ValidatePostSize::class,
        TrimStrings::class,
        ConvertEmptyStringsToNull::class,
    ];

    /**
     * Group middleware web & api
     */
    protected $middlewareGroups = [
        'web' => [
            EncryptCookies::class,
            AddQueuedCookiesToResponse::class,
            StartSession::class,
            ShareErrorsFromSession::class,
            VerifyCsrfToken::class,
            SubstituteBindings::class,
        ],

        'api' => [
            'throttle:api',
            SubstituteBindings::class,
        ],
    ];

    /**
     * Route middleware
     */
    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class,
    'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
    'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
        'password.confirm' => RequirePassword::class,
        'throttle' => ThrottleRequests::class,

        // ✅ Tambahkan middleware admin di sini
        'is_admin' => \App\Http\Middleware\IsAdmin::class,
    ];
}
