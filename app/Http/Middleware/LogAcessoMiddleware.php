<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\LogAcesso;

class LogAcessoMiddleware
{
    public function handle($request, Closure $next)
    {
        $ip = $request->server->get('REMOTE_ADDR');
        $rota = $request->getRequestUri();
        LogAcesso::create(['log' => "$ip xyz requisitou a rota $rota"]);

        return $next($request);
    }
}
