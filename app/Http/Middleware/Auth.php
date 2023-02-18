<?php

namespace App\Http\Middleware;

use Closure;

class Auth
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
        // return $next($request);

        if (isset(Auth()->user()->id)&&  !empty(Auth()->user()->id)) {
        
            // echo "hello laravel";
            return $next($request);
        }else{
        // return redirect()->back();
        // return redirect()->back()->with('error', 'Please Login User'); 
        return redirect('login')->with('error', 'You have not user access');

    }
}
}
