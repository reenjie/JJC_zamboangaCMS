<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

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
    public function addadmin(Request $request)
    {
        $username = $request->username;
        $useremail = $request->useremail;
        $userrole = $request->userrole;
        $userpass = $request->userpass;



        $valid = User::where('role', 1)->get();

        if (count($valid) >= 1) {
            if ($userrole == $valid[0]->role) {
                return redirect()->back()->with('error', 'User role already Exist!');
            }

            User::create([
                'name' => $username,
                'email' => $useremail,
                'password' => Hash::make($userpass),
                'role' => $userrole,
            ]);
        } else {
            User::create([
                'name' => $username,
                'email' => $useremail,
                'password' => Hash::make($userpass),
                'role' => $userrole,
            ]);
        }
        return redirect()->back()->with('success', 'User Added Successfully!');
    }

    public function confirmcode(Request $request)
    {
        $email = session()->get('useremail');

        $newpass = $request->newpass;
        $resetcode = $request->resetcode;

        $validate = User::where('email', $email);
        if ($validate->get()[0]->resetcode == $resetcode) {


            session(['codematch' => true]);
            session()->forget('emailsend');
            return redirect()->Back();
            //     return redirect()->route('login')->with('success', 'Password Changed Successfully!');
        }

        return redirect()->Back()->with('error', 'reset code does not match');
    }
    public function changepass(Request $request)
    {
        $email = session()->get('useremail');
        $password = $request->password;
        $confirmpass = $request->confirmpass;

        if(Auth::check()){
            User::where('id', Auth::user()->id)->update([
                'password' => Hash::make($password),
                'fl'       =>1
            ]);
            return redirect()->route('dashboard');
        }else {
            User::where('email', $email)->update([
                'password' => Hash::make($password),
            ]);
            return redirect()->route('login')->with('success', 'Password Changed Successfully!');
     
        }

      
        
    }
}
