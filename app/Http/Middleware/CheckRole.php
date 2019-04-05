<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle( $request, Closure $next, ...$roles )
    {
        foreach( $roles as $role ) {

            if( $request->session()->get( 'user' )->Role == $role ) {

                return $next($request);

            }

        }

        return response( 'Access denied!' );

    }
}
