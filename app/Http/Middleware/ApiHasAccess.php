<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ApiHasAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $token = $request->header('Authorization');
        $code = 401;
        if (!$token) {
            return response()->json([ 'message' => 'token is required', 'code' => $code ], $code);
        }
        if (!auth()->user()) {
            return response()->json([ 'message' => 'token not valid', 'code' => $code ], $code);
        }
        return $next($request);
    }
}
