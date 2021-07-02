<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Typecheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->session()->get('type') == 0) {

            return $next($request);
        } else {
            $request->session()->flash('msg', 'You have to be admin');
            return redirect("/home");
        }
    }
}