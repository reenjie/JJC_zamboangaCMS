<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partners;
class actionController extends Controller
{
    public function approve(Request $request){
       $id = $request->id;
       $email = $request->email;
       if($request->type == 'decline'){

        Partners::findorFail($id)->update([
           'approvedstate'=>2 
        ]);
        return redirect()->route('notify',["email"=>$email,"approve"=>false]);
       }

       if($request->type == 'approve'){
        Partners::findorFail($id)->update([
            'approvedstate'=>1 
         ]);
        return redirect()->route('notify',["email"=>$email,"approve"=>true]);
       }
    }
}
