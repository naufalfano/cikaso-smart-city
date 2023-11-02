<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;

class AdminsCikaso extends Middleware
{
    public function handle($request, Closure $next, ...$guards)
    {
        if (!Auth::guard("admins")->check()) {
            return $this->redirectTo($request);
        }

        $user = Auth::guard("admins")->user();

        if (!isset($user->name)) {
            return $this->redirectTo($request);
        }

        return $next($request);
    }

    protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : route('login');
    }
}
