<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductAccessMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token=env('TOKEN');

        
        if($request->header('Authorization') !== $token){
            return response()->json(['Unauthorized' => 'Token is invalid'], 401);
        }
        return $next($request);
    }
}
