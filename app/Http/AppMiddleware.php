<?php

namespace App\Http;

use Illuminate\Foundation\Configuration\Middleware;

class AppMiddleware
{
    public function __invoke(Middleware $middleware)
    {   

        //Adicionando middlewares globais:
        $middleware->append([
            \Illuminate\Session\Middleware\StartSession::class,
            \App\Http\Middleware\TrustProxies::class,
            \Illuminate\Http\Middleware\ValidatePostSize::class,
            \Illuminate\Foundation\Http\Middleware\TrimStrings::class,
            \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
        ]);

        //Adicionando para grupos web:
        $middleware->appendToGroup('web', [
            \App\Http\Middleware\LogAcessoMiddleware::class,

            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ]);
        //Adicionando para grupos api:
        $middleware->appendToGroup('api', [
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ]);

        //nomeando os middlewares
        $middleware->alias([
            'autenticacao' => \App\Http\Middleware\AutenticacaoMiddleware::class,

            'auth' => \App\Http\Middleware\Authenticate::class,
            'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
            'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
            'can' => \Illuminate\Auth\Middleware\Authorize::class,
            'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
            'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
            'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
            'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
            'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
        ]);
    }
}
