<?php

namespace App\Http\Middleware;

use Closure;

class SessionVerify
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->session()->has('uname')) {
            //session thakle good to go otherwise go to login
            return $next($request);
        } else {
            $request->session()->flash('msg', 'Invalid request');
            return redirect('/login');
        }
    }
}