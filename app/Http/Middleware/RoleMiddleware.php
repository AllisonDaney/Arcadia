<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $guard = null)
    {
        $roles = explode('|', $guard);

        if (!in_array(auth()->user()->role_id, $roles)) {
            if (auth()->user()->role_id === 1) { // Administrator
                return redirect()->route('admin_administrator');
            } else if (auth()->user()->role_id === 2) { // Employee
                return redirect()->route('admin_employee');
            } else if (auth()->user()->role_id === 3) { // Veterinary
                return redirect()->route('admin_veterinary');
            }
        }

        return $next($request);
    }
}
