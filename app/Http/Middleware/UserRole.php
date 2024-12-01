<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role)
{

    if (!Auth::check()) {
        return redirect()->route('login');
    }

    $userRole = Auth::user()->role;

    if ($userRole === $role) {
        return $next($request);
    }

    if ($userRole === 'manager') {
        return redirect()->route('manager');
    }

    if ($userRole === 'chef') {
        return redirect()->route('chef');
    }

    if ($userRole === 'waiter') {
        return redirect()->route('waiter');
    }

    return redirect()->route('/');
}


}
