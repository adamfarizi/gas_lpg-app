<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckKurirRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next){
        if (!$request->user() || !$request->user()->hasRole('kurir')) {
            return response()->json(['message' => 'Unauthorized for agen'], 401);
        }

        return $next($request);
    }

}
