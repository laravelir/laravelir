<?php

namespace App\Http\Middleware;

use App\Enum\AuthGuardEnum;
use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticatedAuthPages
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::guard(AuthGuardEnum::USER)->check()) {
            return redirect()->route('customer.index');
        }

        if(Auth::guard(AuthGuardEnum::FREELANCER)->check()) {
            return redirect()->route('freelancer.index');
        }

        return $next($request);
    }
}
