<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partners;
use App\Models\Team;

class actionController extends Controller
{
   public function approve(Request $request)
   {
      $id = $request->id;
      $email = $request->email;
      if ($request->type == 'decline') {

         Partners::findorFail($id)->update([
            'approvedstate' => 2
         ]);
         return redirect()->route('notify', ["email" => $email, "approve" => false]);
      }

      if ($request->type == 'approve') {
         Partners::findorFail($id)->update([
            'approvedstate' => 1
         ]);
         return redirect()->route('notify', ["email" => $email, "approve" => true]);
      }
   }


   public function deactivate(Request $request)
   {
      $selectIDS = $request->selectIDS;
      $upt = $request->upt;


      foreach ($selectIDS as $key => $value) {

         Team::findorFail($value)->update([
            'dump' => $upt
         ]);
      }

      return redirect()->back()->with('success', 'Status Changed Successfully!');
   }
}
