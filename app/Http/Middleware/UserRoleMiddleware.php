<?php

namespace App\Http\Middleware;
use Auth;
use Closure;
use App\User;
use Illuminate\Http\Request;

class UserRoleMiddleware
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
        if (Auth::check()) {
            // echo Auth()->user()->id;
            $user_detail=User::with('roles_admin')->find(Auth()->user()->id);
            // print_r($user_detail->roles_admin->role_id); exit('asd');
            if($user_detail->roles_admin->role_id == 2){
                return $next($request);
            }else{
                return redirect('index');
            }
        }
        return redirect('login');
        /*
        if (Auth::check()) {
            // echo"user";
            if (Auth()->user()->role_id == 2) {
                // echo"ifuser";
                return $next($request);
            } elseif (Auth()->user()->role_id == 1) {
                    // echo "else user";
                //     return redirect('index');
                //  return redirect('index');
                return $next($request);
            } else {
                // echo"else";
                return redirect('login')->with('error', 'You have not user access');
            }
        }*/
    }
}
