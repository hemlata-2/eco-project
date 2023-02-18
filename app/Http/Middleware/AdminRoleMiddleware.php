<?php

namespace App\Http\Middleware;
use Auth;
use Closure;
use App\User;
use Illuminate\Http\Request;


class AdminRoleMiddleware
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
            $user_detail=User::with('roles_admin')->find(Auth()->user()->id);
            if($user_detail->roles_admin->role_id == 1){
                return $next($request);
            }else{
                return redirect('index');
            }
            // return $next($request);
        }
        return redirect('login');
        // if (isset(Auth()->user()->user_type)&&  !empty(Auth()->user()->user_type)) {
        /*if (Auth::check()) {
            // echo"admin";
            
            // echo"<pre>";
            // print_r($user_detail);
            // die;
            if ($user_detail->role_id == 1) {
                echo"ifadmin";
                return $next($request);
            // 
            // return redirect()->to('/');
            //     // die;
            // }
            //  elseif ($user_detail->role_id == 2) {
                // //         // echo "elseadmin";
                // //     //     return redirect('index');
                // //     //  return redirect('index');
                // //     return $next($request);
            } else {
                echo"else";
                // return $next($request);
            //     //  return redirect()->back();
                return redirect('/')->with('error', 'You have not Admin access');
            }
        }*/
    }
}
