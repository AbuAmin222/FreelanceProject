<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EmailVerifiedByGuard
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $guard): Response
    {
        $user = Auth::guard($guard)->user();
        if (!$user) {
            return redirect()->route($guard . '.login')->withErrors('Unauthorized Access!!!');
        }
        if (is_null($user->email_verified_at) || !is_null($user->verification_token_sent_at) || !is_null($user->verification_token)) {
            return redirect()->route($guard . '.login')->withErrors('Please verified your account');
        }
        return $next($request);
    }
}
