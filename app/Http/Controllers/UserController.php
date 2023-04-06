<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        return view('users.index', ['users' => $model->paginate(15)]);
    }
    public function addadmin(Request $request){
       $username = $request->username;
       $useremail = $request->useremail;
       $userrole = $request->userrole;
       $userpass = $request->userpass;

    

       $valid = User::where('role',1)->get();

       if(count($valid)>=1){
        if($userrole == $valid[0]->role){
         return redirect()->back()->with('error','User role already Exist!');
        }

        User::create([
            'name'=>$username,
            'email'=>$useremail,
            'password'=>Hash::make($userpass),
            'role'=>$userrole,
        ]);
       }else {
        User::create([
            'name'=>$username,
            'email'=>$useremail,
            'password'=>Hash::make($userpass),
            'role'=>$userrole,
        ]);
      
       }
       return redirect()->back()->with('success','User Added Successfully!');
      
    }
}
