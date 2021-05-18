<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class UserUrlBlocker
{
    protected $forbidden_message = [
        'You dont have Permission Access to this Area !! Please Contact Administrator'
    ];
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            if (!Auth::user()->isAllowed)

                return Response::make(collect($this->forbidden_message)->random(), 403);
        }
        return $next($request);
    }
}
