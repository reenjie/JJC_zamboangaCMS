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
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Addcontroller extends Controller
{
  public function addall(Request $request)
  {

    $table = $request->table;

    switch ($table) {
      case 'blogs':

        $title = $request->title;
        $category = $request->category;
        $description = $request->description;
        $save = Blogs::create([
          'title' => $title,
          'dateblog' => date('Y-m-d'),
          'publish' => 0,
          'category' => $category,
          'description' => $description
        ]);

        $file = $request->photofile;

        foreach ($file as $item) {
          $item->move(public_path('assets/img'), $item->getClientOriginalName());
          photos::create([
            'photos' => $item->getClientOriginalName(),
            'fkid' => $save->id,
            'photo_type' => 'blogs'
          ]);
        }

        break;
      case 'events':
        $datestart = $request->datestart;
        $dateend = $request->dateend;
        $title = $request->title;
        $desc = $request->desc;

        $save = Events::create([
          'startdate' => $datestart,
          'enddate' => $dateend,
          'title' => $title,
          'desc' => $desc,
          'publish' => 0
        ]);


        $file = $request->photofile;

        foreach ($file as $item) {
          $item->move(public_path('assets/img'), $item->getClientOriginalName());
          photos::create([
            'photos' => $item->getClientOriginalName(),
            'fkid' => $save->id,
            'photo_type' => 'events'
          ]);
        }

        break;

      case 'projects':
        $title = $request->title;
        $desc  = $request->desc;
        $file = $request->photofile;
        $save =   Project::create([
          'title' => $title,
          'desc'  => $desc
        ]);
        foreach ($file as $item) {
          $item->move(public_path('assets/img'), $item->getClientOriginalName());
          photos::create([
            'photos' => $item->getClientOriginalName(),
            'fkid' => $save->id,
            'photo_type' => 'projects'
          ]);
        }


        break;

      case 'teams':
        $file = $request->photofile;
        $file->move(public_path('assets/img'), $file->getClientOriginalName());
        $name = $request->name;
        $desc = $request->desc;
        $facebook = $request->facebook;
        $twitter  = $request->twitter;
        $instagram = $request->instagram;
        $linkedin  = $request->linkedin;

        Team::create([
          'photo' => $file->getClientOriginalName(),
          'name'  => $name,
          'desc'  => $desc,
          'facebook' => $facebook,
          'twitter'  => $twitter,
          'instagram' => $instagram,
          'linkedin' => $linkedin,
          'dump' => 0
        ]);
        break;

      case 'category':
        category::create([
          'category' => 'New Category'
        ]);
        break;
    }
    return redirect()->back()->with('success', 'Item Added Successfully!');
  }

  public function membership(Request $request)
  {

    $check = $request->check;
    $email = $request->email;
    $fname = $request->fname;
    $lname = $request->lname;
    $mname = $request->mname;
    $gender = $request->gender;
    $status = $request->status;
    $religion = $request->religion;
    $dob = $request->dob;
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


    $validate =  User::where('email', $email)->where('role', 3);
    if (count($validate->get()) == 0) {
      $user =  User::create([
        'name' => $fname . ' ' . $lname,
        'email' => $email,
        'password' => Hash::make('jjc_' . $lname),
        'role' => 3,
        'resetcode' => ''
      ]);
    } else {
      $user = $validate->get()[0];
    }

    if ($check == "add") {
      Partners::create([
        'email' => $email,
        'firstname' => $fname,
        'middlename' => $mname,
        'lastname' => $lname,
        'dateofbirth' => $dob,
        'gender' => $gender,
        'status' => $status,
        'religion' => $religion,
        'placeofbirth' => $pob,
        'address' => $ad1 . ' ,' . $ad2 . ' ,' . $ad3 . '  ,' . $ad4,
        'members' => 1,
        'pledges' => 0,
        'volunteer' => 0,
        'partnership' => 0,
        'userID' => $user->id,
        'message' => null,
        'contact' => $contact,
        'contactadd' => $contactadd,
        'facebook' => $facebook,
        'twitter' => $twitter,
        'instagram' => $instagram,
        'linkedin' => $linkedin
      ]);

      return redirect()->back()->with('success', 'WELCOME NEW MEMBER. Your Form was Submitted and we`ll response to you ASAP!');
    } else if ($check == "update") {
     
      $req = Partners::where('email', $email);

      if (count($req->get()) >= 1) {


        if ($request->amount) {
        
          $pledge_data = [
            'email' => $email,
            'amount' =>$request->amount,
            'goods' =>$request->typeofgoods,
            'qty' =>$request->Qty,
            'notes' =>null,
            'where'=> null,
            'receiver' =>$request->receiver,
            'detail' =>null,
            'pledgedate'=>$request->expecteddate,
            'received'=>0,   
           
          ];
          session(['pledges' =>$pledge_data]);
          session(['pledgesonly' =>1]);

          return redirect()->route('mailResetcodes',["vercode"=>true]);

        }

        if($request->typeofgoods){
          
          $pledge_data = [
            'email' => $email,
            'amount' =>$request->amount,
            'goods' =>$request->typeofgoods,
            'qty' =>$request->Qty,
            'notes' =>null,
            'where'=> null,
            'receiver' =>$request->receiver,
            'detail' =>null,
            'pledgedate'=>$request->expecteddate,
            'received'=>0,   
          

           
          ];
          session(['pledges' =>$pledge_data]);
          session(['pledgesonly' =>1]);

          return redirect()->route('mailResetcodes',["vercode"=>true]);
        }


        if ($request->vol) {
          $pledge_data = [
            'email' => $email,
            'amount' =>$request->amount,
            'goods' =>$request->typeofgoods,
            'qty' =>$request->Qty,
            'notes' =>null,
            'where'=> null,
            'receiver' =>$request->receiver,
            'detail' =>null,
            'pledgedate'=>$request->expecteddate,
            'received'=>0,   
            'userID' => $user->id,
            'eventtojoin'=>$request->eventtojoin 
           
          ];
          session(['pledges' =>$pledge_data]);
          session(['volunteer' =>1]);
          session(['joinonly' =>1]);

          return redirect()->route('mailResetcodes',["vercode"=>true]);
          // $req->update([
          //   'volunteer' => 1
          // ]);

          // return redirect()->back()->with('success', 'Your Request to be a Volunteer was Submitted we`ll response to you ASAP! ');
        }

        if ($request->parts) {
          $req->update([
            'partnership' => 1
          ]);

          return redirect()->back()->with('success', 'Your Request to be our Partner was Submitted we`ll response to you ASAP! ');
        }


      } else {
        return redirect()->back()->with('error', 'Sorry , it seems like the email you entered is unrecognize by our system. Please fillup all required data and be a member.');
      }


    } else if ($check == "addwpledge") {

     
      $pledge_data = [
        'email' => $email,
        'firstname' => $fname,
        'middlename' => $mname,
        'lastname' => $lname,
        'dateofbirth' => $dob,
        'gender' => $gender,
        'status' => $status,
        'religion' => $religion,
        'placeofbirth' => $pob,
        'address' => $ad1 . ' ,' . $ad2 . ' ,' . $ad3 . '  ,' . $ad4,
        'members' => 0,
        'pledges' => 1,
        'volunteer' => 0,
        'partnership' => 0,
        'userID' => $user->id,
        'message' => '',
        'contact' => $contact,
        'contactadd' => $contactadd,
        'facebook' => $facebook,
        'twitter' => $twitter,
        'instagram' => $instagram,
        'linkedin' => $linkedin,
        'amount' =>$request->amount,
        'goods' =>$request->typeofgoods,
        'qty' =>$request->Qty,
        'notes' =>null,
        'where'=> null,
        'receiver' =>$request->receiver,
        'detail' =>null,
        'pledgedate'=>$request->expecteddate,
        'received'=>0,   
      ];
      session(['pledges' =>$pledge_data]);




      return redirect()->route('mailResetcodes',["vercode"=>true]);
    } else if ($check == "addvolunteer") {


          $pledge_data = [
        'email' => $email,
        'firstname' => $fname ?? null,
        'middlename' => $mname ?? null,
        'lastname' => $lname ?? null,
        'dateofbirth' => $dob ?? null,
        'gender' => $gender ?? null,
        'status' => $status ?? null,
        'religion' => $religion ?? null,
        'placeofbirth' => $pob ?? null,
        'address' => $ad1 . ' ,' . $ad2 . ' ,' . $ad3 . '  ,' . $ad4,
        'members' => 0,
        'pledges' => 1,
        'volunteer' => 0,
        'partnership' => 0,
        'userID' => $user->id,
        'message' => '',
        'contact' => $contact,
        'contactadd' => $contactadd ?? null,
        'facebook' => $facebook ?? null,
        'twitter' => $twitter ?? null,
        'instagram' => $instagram ?? null,
        'linkedin' => $linkedin ?? null,
        'amount' =>$request->amount ?? null,
        'goods' =>$request->typeofgoods ?? null,
        'qty' =>$request->Qty ?? null,
        'notes' =>null,
        'where'=> null,
        'receiver' =>$request->receiver ?? null,
        'detail' =>null,
        'pledgedate'=>$request->expecteddate ?? null,
        'received'=>0,  
        'eventtojoin'=>$request->eventtojoin 
      ];
      session(['volunteer' =>1]);
      session(['pledges' =>$pledge_data]);
      return redirect()->route('mailResetcodes',["vercode"=>true]);
      // Partners::create([
      //   'email' => $email,
      //   'firstname' => $fname,
      //   'middlename' => $mname,
      //   'lastname' => $lname,
      //   'dateofbirth' => $dob,
      //   'gender' => $gender,
      //   'status' => $status,
      //   'religion' => $religion,
      //   'placeofbirth' => $pob,
      //   'address' => $ad1 . ' ,' . $ad2 . ' ,' . $ad3 . '  ,' . $ad4,
      //   'members' => 0,
      //   'pledges' => 0,
      //   'volunteer' => 1,
      //   'partnership' => 0,
      //   'userID' => $user->id,
      //   'message' => null,
      //   'contact' => $contact,
      //   'contactadd' => $contactadd,
      //   'facebook' => $facebook,
      //   'twitter' => $twitter,
      //   'instagram' => $instagram,
      //   'linkedin' => $linkedin
      // ]);

      // return redirect()->back()->with('success', 'WELCOME OUR VOLUNTEER. Your Form was Submitted and we will response to you ASAP!');
    } else if ($check == "addpartnership") {


      Partners::create([
        'email' => $email,
        'firstname' => $fname,
        'middlename' => $mname,
        'lastname' => $lname,
        'dateofbirth' => $dob,
        'gender' => $gender,
        'status' => $status,
        'religion' => $religion,
        'placeofbirth' => $pob,
        'address' => $ad1 . ' ,' . $ad2 . ' ,' . $ad3 . '  ,' . $ad4,
        'members' => 0,
        'pledges' => 0,
        'volunteer' => 0,
        'partnership' => 1,
        'userID' => $user->id,
        'message' => null,
        'contact' => $contact,
        'contactadd' => $contactadd,
        'facebook' => $facebook,
        'twitter' => $twitter,
        'instagram' => $instagram,
        'linkedin' => $linkedin
      ]);

      return redirect()->back()->with('success', 'WELCOME OUR PARTNER. Your Form was Submitted and we will response to you ASAP!');
    }
  }

  public function sendmessage(Request $request)
  {
    //
    $name = $request->name;
    $email = $request->email;
    $subject = $request->subject;
    $message = $request->message;

    Contacts::create([
      'name' => $name,
      'email' => $email,
      'subject' => $subject,
      'message' => $message,
      'status' => 0
    ]);

    return redirect()->back()->with('successsent', 'Thank you for contacting us. Your message has been received and we will respond to you as soon as possible.');
  }

  public function readmessage(Request $request)
  {
    Contacts::where('status', 0)->update([
      'status' => 1
    ]);
    echo "success";
  }

  public function changestatus(Request $request)
  {
    $type = $request->type;
    $pb = $request->pb;
    $id = $request->id;


    if ($type == 'blogs') {
      Blogs::findorFail($id)->update([
        'publish' => $pb
      ]);
      if ($pb == 1) {
        //unpublish
        return redirect()->route('mail.NotifyALLUsers', ['types' => 'blogs']);
      }
      return redirect()->back()->with('success', 'Blog unpublished Successfully!');
    }

    if ($type == 'events') {
      Events::findorFail($id)->update([
        'publish' => $pb
      ]);
      if ($pb == 1) {
        //unpublish
        return redirect()->route('mail.NotifyALLUsers', ['types' => 'events']);
      }
      return redirect()->back()->with('success', 'Event unpublished Successfully!');
    }
  }


}
