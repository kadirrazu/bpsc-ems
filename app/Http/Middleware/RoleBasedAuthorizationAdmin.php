<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleBasedAuthorizationAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        
        if( auth()->user()->role->id !== 2 )
        {
            return redirect('/admin/dashboard')->withError('Depending on your role, you are not authorized to access the intended resource!');
        }
        
        return $next($request);
    }
}
