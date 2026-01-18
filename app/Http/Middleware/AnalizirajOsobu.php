<?php

namespace App\Http\Middleware;

use App\Services\OsobaService;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AnalizirajOsobu
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $osobe=(new OsobaService())->getAll();
        return $next($request);
    }
}
