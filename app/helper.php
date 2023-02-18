<?php

use App\User;


if (!function_exists('dashboard')) {


    function dashboard(){
     $url='href='.route('index').'';
    return $url;

        // echo $data;


    }

    
}

if(!function_exists('role')){

    function role(){
        $role = User::with('roles_admin')->find(Auth()->user()->id);
       return $role;
   
           // echo $data;
   
   
       }
}
