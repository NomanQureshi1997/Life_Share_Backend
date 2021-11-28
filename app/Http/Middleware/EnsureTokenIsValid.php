<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureTokenIsValid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->header('authorization') == 'Bearer 9jdMFRnOPVaogJ6jFd44zEDG3XmwNo4mm37GP6XC'){
            return $next($request);
        }else{
            return response()->json('Unauthorized', 401);
        }

    }
}
