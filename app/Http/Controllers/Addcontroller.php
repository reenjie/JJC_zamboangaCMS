<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blogs;
use App\Models\Events;
use App\Models\Project;
use App\Models\Team;
use App\Models\Partners;
use App\Models\Pledges;
use App\Models\Contacts;
use App\Models\photos;
use App\Models\category;


class Addcontroller extends Controller
{
   public function addall(Request $request){
    
     $table= $request->table;
    
     switch ($table) {
        case 'blogs':
      
            $title = $request->title;
            $category = $request->category;
            $description= $request->description;
            $save = Blogs::create([
                'title'=>$title,
                'dateblog'=>date('Y-m-d'),
                'publish'=>0,
                'category'=>$category,
                'description'=>$description
            ]);

            $file = $request->photofile;

            foreach($file as $item){
             $item->move(public_path('assets/img'),$item->getClientOriginalName());
             photos::create([
               'photos'=>$item->getClientOriginalName(),
                'fkid'=>$save->id, 
                'photo_type'=>'blogs'
             ]);

            }
             
            break;
            case 'events':
              $datestart = $request->datestart;
              $dateend = $request->dateend;
              $title=$request->title;
              $desc = $request->desc;
        
              $save = Events::create([
                'startdate' =>$datestart,
                'enddate'=>$dateend,
                'title'=>$title,
                'desc'=>$desc,
                'publish'=>0
              ]);


              $file = $request->photofile;

              foreach($file as $item){
               $item->move(public_path('assets/img'),$item->getClientOriginalName());
               photos::create([
                 'photos'=>$item->getClientOriginalName(),
                  'fkid'=>$save->id, 
                  'photo_type'=>'events'
               ]);
  
              }
               
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

            case 'category':
              category::create([
                'category'=>'New Category'
              ]);
              break;
      
     }
     return redirect()->back()->with('success','Item Added Successfully!');
   }

   public function membership(Request $request){
    $check = $request->check;
    $email = $request->email;
    if($check == "add"){
    $fname = $request->fname;
    $lname = $request->lname;
    $mname = $request->mname;
    $gender= $request->gender;
    $status = $request->status;
    $religion = $request->religion;
    $dob= $request->dob;
    $age = $request->age;
    $pob = $request->pob;
    $ad1 = $request->ad1;
    $ad2 = $request->ad2;
    $ad3 = $request->ad3;
    $ad4 = $request->ad4;
    $contact = $request->contact;
    $contactadd = $request->contactadd;
    $facebook = $request->facebook;
    $twitter = $request->twitter;
    $instagram = $request->instagram;
    $linkedin = $request->linkedin;

    Partners::create([
        'email'=>$email,
        'firstname'=>$fname,
        'middlename'=>$mname,
        'lastname'=>$lname,
        'dateofbirth'=>$dob,
        'gender'=>$gender,
        'status'=>$status,
        'religion'=>$religion ,
        'age'=>$age,
        'placeofbirth'=>$pob,
        'address'=>$ad1.' ,'.$ad2.' ,'.$ad3.'  ,'.$ad4,
        'members'=>1,
        'pledges'=>0,
        'volunteer'=>0,
        'partnership'=>0,
        'message'=>null,
        'contact'=>$contact,
        'contactadd'=>$contactadd,
        'facebook'=>$facebook,
        'twitter'=>$twitter,
        'instagram'=>$instagram,
        'linkedin'=>$linkedin
    ]);
    
    return redirect()->back()->with('success','WELCOME NEW MEMBER. Your Form was Submitted Successfully!');
    }else if($check == "update"){

      $req = Partners::where('email',$email);

      if(count($req->get()) >=1){
          if($request->amount){
            $amount = $request->amount;
            Pledges::create([
              'amount'=>$amount,
              'email' => $email
            ]);
            return redirect()->back()->with('Thank You!','Your Pledge was Submitted Successfully!');
          }

          if($request->vol){
            $req->update([
              'volunteer'=>1
            ]);

            return redirect()->back()->with('success','Your Request to be a Volunteer was Submitted and Granted! ');
          }

          if($request->parts){
            $req->update([
              'partnership'=>1
            ]);

            return redirect()->back()->with('success','Your Request to be our Partner was Submitted and Granted! ');
          }
    
      }else {
        return redirect()->back()->with('error','Sorry , it seems like the email you entered is unrecognize by our system. Please fillup all required data and be a member.');
      }


    }else if($check == "addwpledge"){
      $fname = $request->fname;
      $lname = $request->lname;
      $mname = $request->mname;
      $gender= $request->gender;
      $status = $request->status;
      $religion = $request->religion;
      $dob= $request->dob;
      $age = $request->age;
      $pob = $request->pob;
      $ad1 = $request->ad1;
      $ad2 = $request->ad2;
      $ad3 = $request->ad3;
      $ad4 = $request->ad4;
      $contact = $request->contact;
      $contactadd = $request->contactadd;
      $facebook = $request->facebook;
      $twitter = $request->twitter;
      $instagram = $request->instagram;
      $linkedin = $request->linkedin;
    $amount = $request->amount;
  
      Partners::create([
          'email'=>$email,
          'firstname'=>$fname,
          'middlename'=>$mname,
          'lastname'=>$lname,
          'dateofbirth'=>$dob,
          'gender'=>$gender,
          'status'=>$status,
          'religion'=>$religion ,
          'age'=>$age,
          'placeofbirth'=>$pob,
          'address'=>$ad1.' ,'.$ad2.' ,'.$ad3.'  ,'.$ad4,
          'members'=>0,
          'pledges'=>1,
          'volunteer'=>0,
          'partnership'=>0,
          'message'=>$amount,
          'contact'=>$contact,
          'contactadd'=>$contactadd,
          'facebook'=>$facebook,
          'twitter'=>$twitter,
          'instagram'=>$instagram,
          'linkedin'=>$linkedin
      ]);
      Pledges::create([
        'amount'=>$amount,
        'email' => $email
      ]);
      return redirect()->back()->with('success','WELCOME NEW MEMBER. Your Form and Pledge was Submitted Successfully!');
    }else if ($check == "addvolunteer"){
      $fname = $request->fname;
      $lname = $request->lname;
      $mname = $request->mname;
      $gender= $request->gender;
      $status = $request->status;
      $religion = $request->religion;
      $dob= $request->dob;
      $age = $request->age;
      $pob = $request->pob;
      $ad1 = $request->ad1;
      $ad2 = $request->ad2;
      $ad3 = $request->ad3;
      $ad4 = $request->ad4;
      $contact = $request->contact;
      $contactadd = $request->contactadd;
      $facebook = $request->facebook;
      $twitter = $request->twitter;
      $instagram = $request->instagram;
      $linkedin = $request->linkedin;
  
      Partners::create([
          'email'=>$email,
          'firstname'=>$fname,
          'middlename'=>$mname,
          'lastname'=>$lname,
          'dateofbirth'=>$dob,
          'gender'=>$gender,
          'status'=>$status,
          'religion'=>$religion ,
          'age'=>$age,
          'placeofbirth'=>$pob,
          'address'=>$ad1.' ,'.$ad2.' ,'.$ad3.'  ,'.$ad4,
          'members'=>0,
          'pledges'=>0,
          'volunteer'=>1,
          'partnership'=>0,
          'message'=>null,
          'contact'=>$contact,
          'contactadd'=>$contactadd,
          'facebook'=>$facebook,
          'twitter'=>$twitter,
          'instagram'=>$instagram,
          'linkedin'=>$linkedin
      ]);
      
      return redirect()->back()->with('success','WELCOME OUR NEW MEMBER AND VOLUNTEER. Your Form was Submitted Successfully!');
    }else if ($check == "addpartnership"){
      $fname = $request->fname;
      $lname = $request->lname;
      $mname = $request->mname;
      $gender= $request->gender;
      $status = $request->status;
      $religion = $request->religion;
      $dob= $request->dob;
      $age = $request->age;
      $pob = $request->pob;
      $ad1 = $request->ad1;
      $ad2 = $request->ad2;
      $ad3 = $request->ad3;
      $ad4 = $request->ad4;
      $contact = $request->contact;
      $contactadd = $request->contactadd;
      $facebook = $request->facebook;
      $twitter = $request->twitter;
      $instagram = $request->instagram;
      $linkedin = $request->linkedin;
  
      Partners::create([
          'email'=>$email,
          'firstname'=>$fname,
          'middlename'=>$mname,
          'lastname'=>$lname,
          'dateofbirth'=>$dob,
          'gender'=>$gender,
          'status'=>$status,
          'religion'=>$religion ,
          'age'=>$age,
          'placeofbirth'=>$pob,
          'address'=>$ad1.' ,'.$ad2.' ,'.$ad3.'  ,'.$ad4,
          'members'=>0,
          'pledges'=>0,
          'volunteer'=>0,
          'partnership'=>1,
          'message'=>null,
          'contact'=>$contact,
          'contactadd'=>$contactadd,
          'facebook'=>$facebook,
          'twitter'=>$twitter,
          'instagram'=>$instagram,
          'linkedin'=>$linkedin
      ]);
      
      return redirect()->back()->with('success','WELCOME OUR NEW MEMBER AND PARTNER. Your Form was Submitted and Request is Granted!');
    }
   
    
     

   }

   public function sendmessage(Request $request){
    //
    $name = $request->name;
    $email = $request->email;
    $subject = $request->subject;
    $message = $request->message;

    Contacts::create([
      'name' =>$name,
      'email'=>$email,
      'subject'=>$subject,
      'message'=>$message,
      'status'=>0
    ]);

    return redirect()->back()->with('successsent','Thank you for contacting us. Your message has been received and we will respond to you as soon as possible.');
   }

   public function readmessage(Request $request){
    Contacts::where('status',0)->update([
      'status'=>1
    ]);
    echo "success";
   }

   public function changestatus(Request $request){
    $type = $request->type;
    $pb = $request->pb;
    $id = $request->id;


    switch ($type) {
      case 'blogs':
        Blogs::findorFail($id)->update([
          'publish'=>$pb
        ]);
        break;

      case 'events':
        Events::findorFail($id)->update([
          'publish'=>$pb
        ]);
        break;

    }


    return redirect()->back()->with('success','Item updated Successfully!');
   }
}
