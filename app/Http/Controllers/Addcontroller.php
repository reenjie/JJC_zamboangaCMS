<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blogs;
use App\Models\Events;
use App\Models\Project;
use App\Models\Team;

class Addcontroller extends Controller
{
   public function addall(Request $request){
     $table= $request->table;
    
     switch ($table) {
        case 'blogs':
            $title = $request->title;
            $subtitle = $request->subtitle;
            $file = $request->photofile;
            $file->move(public_path('assets/img'),$file->getClientOriginalName());
            Blogs::create([
                'photo'=>$file->getClientOriginalName(),
                'subtitle'=>$subtitle,
                'title'=>$title,
                'dateblog'=>date('Y-m-d'),
            ]);
            
            break;
            case 'events':
              $dateofevent = $request->dateofevent;
              $title=$request->title;
              $desc = $request->desc;
              $file = $request->photofile;
              $file->move(public_path('assets/img'),$file->getClientOriginalName());
              Events::create([
                'photo' => $file->getClientOriginalName(),
                'dateofevent' =>$dateofevent,
                'title'=>$title,
                'desc'=>$desc,
              ]);
               
            break;

            case 'projects':
                $title = $request->title;
                $desc  = $request->desc;
                $file = $request->photofile;
                $file->move(public_path('assets/img'),$file->getClientOriginalName());
                Project::create([
                    'photo' => $file->getClientOriginalName(),
                    'title' =>$title,
                    'desc'  =>$desc
                ]);

            break;

            case 'teams':
                $file = $request->photofile;
                $file->move(public_path('assets/img'),$file->getClientOriginalName());
                $name = $request->name;
                $desc = $request->desc;
                $facebook = $request->facebook;
                $twitter  = $request->twitter;
                $instagram = $request->instagram;
                $linkedin  = $request->linkedin;

                Team::create([
                    'photo' => $file->getClientOriginalName(),
                    'name'  =>$name,
                    'desc'  =>$desc,
                    'facebook' =>$facebook,
                    'twitter'  =>$twitter,
                    'instagram'=>$instagram,
                    'linkedin' =>$linkedin
                ]);
            break;
      
     }
     return redirect()->back()->with('success','Item Added Successfully!');
   }
}
