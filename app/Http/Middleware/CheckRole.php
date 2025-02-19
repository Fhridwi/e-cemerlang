<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $user = Auth::user();
        
        // Jika user memiliki salah satu role yang diperbolehkan, lanjutkan
        if (in_array($user->role, $roles)) {
            return $next($request);
        }

        return redirect('/')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
    }
}
