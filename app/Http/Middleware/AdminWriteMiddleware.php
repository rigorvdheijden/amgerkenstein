<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     * Only pass request when user is administrators
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        //check if user is logged in
        if (\Auth::check() == false) {
          return redirect('/');
        }

        //check if user has admin role
        if ($request->user()->role != 'admin')
        {
            return redirect('/');
        }

        return $next($request);
    }

}
