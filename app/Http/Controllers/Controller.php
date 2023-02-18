<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\User;
use App\Role;
use App\UserRoleModel;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect, Response;
use App\Mail\WelcomeMail;
use Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\bcrypt;
use Illuminate\Support\Facades\Validator;

use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
     use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

     function template()
     {
        // $role1 = role()->roles_admin->role_id == 1;
        // $role= Role::where('id', 2)->count();
        
        // $role=User::with('roles_admin')->find(2);
        // $role=Auth::check();
        // $role=auth()->user()->id;
        
        // $role_id = Role::all();
        // $role_id=  auth()->user()->roles_admin()->first()->role_id;
        $college = User::where('user_role','3')->count();
        $student = User::where('user_role','2')->count();


        // $roles = User::count()->user_role == 1;
        // echo"<pre>";print_r($users); die;

        //  if(role()->roles_admin->role_id == 1){            //This part act as a ****Session****//
        //      $role_id->count();
        //    }

         //    return Redirect::to("login")->withSuccess('Opps! You do not have access');

         return view('index', ['college'=> $college, 'student'=>$student]);
     }
 


    public function add(){


        $roles = Role::all()->except(1);
        return view('registration',compact('roles'));

    }

    public function registration_post(Request $request){


        $validator = Validator::make($request->all(),[
            'email'=> 'required|email|unique:users',
            'contact' => 'required|string|min:10|max:10|unique:users',
            'password' => 'required',
            'username' => 'required|unique:users,username',
            // 'image' => 'required|image|mimes:jpeg,png,jpg',

        ]);
        
        if($validator->fails()){
            // return response()->json(['status'=>401, 'message'=>$validator->errors()],401);
            return redirect()->back()->withErrors($validator->errors())->withInput();

        }

       
     
        


        
    //  $role = User::with('roles_admin')->find(Auth()->user()->id);
        
    //  $role = User::all()->except(Auth::id()=1);
    //     if($role->roles_admin->role_id == 2){
    //         // return $next($request);
    //     }else{
    //         return redirect('deshboard');
    //     }
        
        
        $insertdata=$request->all();
        // echo"<pre>"; print_r($insertdata); die;
        // unset($insertdata['user_role'].);
        $insertdata['password'] = bcrypt($request['password']);
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = rand(10000, 99999) . time() . '.' . $image->getClientOriginalExtension();
            
            $destinationPath = public_path('uploadimage/');
            $imagePath = $destinationPath . "/" . $name;
            $image->move($destinationPath, $name);
            $insertdata['image'] = $name;
        }
        
        unset($insertdata["_token"]);

        $res =User::create($insertdata);
        // echo"<pre>"; print_r($res); die;

      $rolesd = UserRoleModel::create(['user_id'=>$res->id,'role_id'=>$request->user_role]);
        
        // echo"<pre>"; print_r($rolesd); exit();
       
       //i will commited the email section code because email smtp server nahi chal raha hai , vo purchase ka bol raha hai, so i commited the email code .

        //         Mail::send($req->email)->send(new WelcomeMail($res));

        // Mail::to($request['email'])->send(new WelcomeMail($res));
        // return $res;

        if($res){

            if($request->user_role==2){
                // exit('student');
            return redirect()->intended('table')->with('success', 'record updated successfully.');

            }else{
            return redirect()->intended('table')->with('success', 'record updated successfully.');

                // exit('collage');
            }

            return redirect()->intended('login')->withSuccess('Registration Created successfully.');

            // return redirect()->back()->with('success','Registration created successfully');
        }else{
            return back()->with('error', 'Whoops! some error Registration. Please try again.'); 
        }
   
    }


    public function email(){
        return view('email');
    }

    public function login(){

        
        // if (Auth::check()) {
		// 	return redirect('index');
		// }
        return view('login');

    }


     public function loginuser(Request $request)
     {
         $request->validate([

            "email" => "required|email",
            "password" => "required|min:6"
         ]);

         $userCredentials = $request->only('email', 'password');
         if(Auth::attempt($userCredentials)){
             $role = User::with('roles_admin')->find(Auth()->user()->id);
            //  print_r($role); exit();
            // echo"<pre>"; print_r($role); exit();
        
            if($role->roles_admin->role_id == 1){
                return redirect()->route('index');
                // return $next($request);
               
            }else{
      
            // if (Auth::check()) {
            // 	return redirect('index');
            // }
            return redirect ('edituser');
            }

            // return redirect()->intended('table')->withSuccess('You have Login successfully.');

         }else{
            //  return Redirect::to("login")->with('error','incorrect Email and Password');
            //  return redirect()->back()->withErrors($userCredentials)->withInput();
             return Redirect::to("login")->with('error', 'Incorrect Email and Password');


         }


    }






    public function table($role_id='')
    {

        // $email = '';
        // if ($request->input('Search')) {
        //     $search = $request->input('Search');
        // $role_id=  auth()->user()->roles_admin()->first()->role_id;
        //     // echo"<pre>"; print_r($role_id); die;

        // // $this->data['role_id'] = $role_id;
        // // $this->data['company_id'] = $company_id;
        // if($role_id==2){
        //     $data = User::where('email', 'LIKE', "%{$search}%")->orderBy('id','desc')->get();
        // }else{
        //     $data = User::where('email', 'LIKE', "%{$search}%")->orderBy('id','desc')->get();
        // }

        $role_id=  auth()->user()->roles_admin()->first()->role_id;
            // echo"<pre>"; print_r($role_id); die;

        
        // $company_id = auth()->user()->company_id;
        // $role_id = $role_id;
      
        if($role_id==2){

            $data = User::where(['user_role' => $role_id])->orderBy('id','desc')->get();
            // echo"<pre>"; print_r($data); die;

        }elseif($role_id==3){
            $data = User::where(['user_role' => $role_id])->orderBy('id','desc')->get();
        }else{
            $data = User::orderBy('id','desc')->get();

        }

    
            // $data = User::where('email', 'LIKE', "%{$search}%")->get();
        // } else {
        //     $data = User::all();
         
        // }

        if (isset($data) && $data != '') {

            // echo"<pre>"; print_r($data); die;
     

            return view('table-basic', ['data'=> $data]);

        }
           
        
    }

    public function profile($id = '')
    {
        // print_r(Auth::user()->role === 'admin'); exit('asdasd');
        if (isset($id) && $id != '') {

        
            $result['response'] = User::find($id);
            return view('user-profile', $result);
        } else {
            return view('user-profile');
        }

    }

    
    public function update(Request $req)
    {
    
        $response = User::find($req->id);
         
     
        $response->name = $req['name'];
        $response->address = $req['address'];
        $response->email = $req['email'];
        $response->contact = $req['contact'];
        $response->password= bcrypt($req['password']);
    
        if ($req->hasFile('image')) {
            $image = $req->file('image');
            $name = rand(10000, 99999) . time() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('uploadimage/');
            $imagePath = $destinationPath . "/" . $name;
            $image->move($destinationPath, $name);
            // $result->image = $name;
            $response['image'] = $name;
        }
        
    
        $response->save();



        if (!is_null($response)) {
            return redirect()->intended('table')->with('success', 'record updated successfully.');
        
        }else{
            return back()->with('error', 'Whoops! some error While Update. Please try again.'); 
        }
   
    }

  

    public function delete($id)
    {

        $result = User::find($id);
      

        $result->delete();

        if (!is_null($result)) {

            return redirect()->back()->with('danger', 'record Deleted successfully.');
        }else{
            return back()->with('error', 'Whoops! some error While Delete. Please try again.'); 

        }
    }
        
    public function logout()
    {
        Auth::logout();
        // session()->all();
        return redirect()->intended('login')->withSuccess('You have successfully Logout Please Login.');
        // return Redirect('login');
    } 
}
