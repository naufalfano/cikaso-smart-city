<?php

namespace App\Http\Middleware;

use App\Models\AkunPemilikLapangan;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;

class UsersCikaso extends Middleware
{
    public function handle($request, Closure $next, ...$guards)
    {
        if (!Auth::guard("users")->check()) {
            return $this->redirect();
        }

        $user = Auth::guard("users")->user();

        if (!isset($user->nik)) {
            return $this->redirect();
        }

        return $next($request);
    }

    protected function redirect()
    {
        redirect()->route('login')->send();
    }
}
