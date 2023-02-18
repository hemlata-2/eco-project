<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    function student()
    {
        // if(Auth::check()){                            //This part act as a ****Session****//
        //     return view('index');
        //   }
        //    return Redirect::to("login")->withSuccess('Opps! You do not have access');

        return view('student');
    }
}
