<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blogs;
use App\Models\Events;
use App\Models\Project;
use App\Models\Team;

class DeleteController extends Controller
{
    public function deleteall(Request $request){
        $id = $request->id;
        $table= $request->table;

        switch ($table) {
            case 'blogs':
                    Blogs::findorFail($id)->delete();
                break;
            
           case 'events':
                    Events::findorFail($id)->delete();
                break;
           case 'projects':
                    Project::findorFail($id)->delete();
                break;
            case 'teams':
                    Team::findorFail($id)->delete();
                break;
        }

        return redirect()->back()->with('success','Item Deleted Successfully!');
    }


}
