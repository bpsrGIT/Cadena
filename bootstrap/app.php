<?php

use App\Http\Middleware\Authenticate;
use App\Http\Middleware\EncryptCookies;
use App\Http\Middleware\PreventRequestsDuringMaintenance;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Middleware\TrimStrings;
use App\Http\Middleware\TrustProxies;
use App\Http\Middleware\VerifyCsrfToken;
use Illuminate\Cookie\Middleware\EncryptCookies as BaseEncryptCookies;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BasePreventRequestsDuringMaintenance;
use Illuminate\Foundation\Http\Middleware\TrimStrings as BaseTrimStrings;
use Illuminate\Foundation\Http\Middleware\ValidateCsrfToken as BaseValidateCsrfToken;
use Illuminate\Http\Middleware\TrustProxies as BaseTrustProxies;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Keep using this app's own middleware subclasses (with their
        // existing custom $except/$headers) in place of the framework
        // defaults Laravel 11 would otherwise use.
        $middleware->replace(BaseTrustProxies::class, TrustProxies::class);
        $middleware->replace(BasePreventRequestsDuringMaintenance::class, PreventRequestsDuringMaintenance::class);
        $middleware->replace(BaseTrimStrings::class, TrimStrings::class);
        $middleware->replace(BaseEncryptCookies::class, EncryptCookies::class);
        $middleware->replace(BaseValidateCsrfToken::class, VerifyCsrfToken::class);

        $middleware->throttleApi();

        $middleware->alias([
            'auth' => Authenticate::class,
            'guest' => RedirectIfAuthenticated::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
