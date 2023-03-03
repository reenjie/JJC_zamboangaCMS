<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Aboutus;
use App\Models\Header_video;
class HeaderandAboutController extends Controller
{
    
    public function storevideo(Request $request){
        $videolink = $request->videolink;

        Header_video::create([
            'videolinks'=>$videolink
        ]);

        return redirect()->back()->with('success','Videolinks added Successfully!');
    }

    public function savePhoto(Request $request){
       $photofile = $request->file('photofile');
        $id = $request->id;
        
        $data = Aboutus::findorFail($id);

        $photofile->move(public_path('assets/img'),$photofile->getClientOriginalName());


       if($data->photo == "stats-img.jpg"){


            $data->update([
                'photo'=>$photofile->getClientOriginalName()
            ]);

       }else{
        $unlinksrc = public_path('assets/img').'/'.$data->photo;

        if(file_exists($unlinksrc)){
         unlink($unlinksrc);
        }

        $data->update([
            'photo'=>$photofile->getClientOriginalName()
        ]);


       }

       return redirect()->back()->with('success','Photo Change Successfully!');
    }

    public function updateAllWritten(Request $request){
       $id = $request->id;
       $table = $request->table;
       $entity = $request->entity;
       $value = $request->value;

       DB::select('UPDATE `'.$table.'` SET `'.$entity.'` = "'.$value.'"  WHERE id = '.$id.' ');
        
        
    }

    public function deletevlinks(Request $request){
        $id = $request->id;
       if(Header_video::findorFail($id)->delete()){
        echo "success";
       }
    }
}
