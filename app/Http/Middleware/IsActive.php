<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsActive
{
    public function handle($request, Closure $next)
    {
        if (!Auth::user()->is_active) {
            return redirect()->route('user.not_active');
        }
    }
}
