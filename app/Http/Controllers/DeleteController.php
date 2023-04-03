<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blogs;
use App\Models\Events;
use App\Models\Project;
use App\Models\Team;
use App\Models\photos;
use App\Models\category;
class DeleteController extends Controller
{
    public function deleteall(Request $request){
        $id = $request->id;
        $table= $request->table;

        switch ($table) {
            case 'blogs':
                     Blogs::findorFail($id)->delete();
                   
                    $ph = photos::where('fkid',$id)->where('photo_type','blogs');
                    foreach ($ph->get() as $key => $value) {
                        
                       $src = public_path('assets/img/'.$value->photos);
                       if(file_exists($src)){
                         unlink($src);
                       }
                    }
                    $ph->delete();

                break;
            
           case 'events':
                  Events::findorFail($id)->delete();

                   $ph = photos::where('fkid',$id)->where('photo_type','events');
                   foreach ($ph->get() as $key => $value) {
                       
                      $src = public_path('assets/img/'.$value->photos);
                      if(file_exists($src)){
                        unlink($src);
                      }
                   }
                   $ph->delete();

                break;
           case 'projects':
                    Project::findorFail($id)->delete();
                break;
            case 'teams':
                    Team::findorFail($id)->delete();
                break;
            case 'categories':
                category::findorFail($id)->delete();
                break;
        }

       return redirect()->back()->with('success','Item Deleted Successfully!');
    }


}
