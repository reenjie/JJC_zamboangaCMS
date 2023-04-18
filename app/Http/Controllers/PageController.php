<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partners;
use App\Models\Pledges;
use App\Models\Joinedevent;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($page)
    {
        if (view()->exists("pages.{$page}")) {
            return view("pages.{$page}");
        }
        return abort(404);
    }

    public function membership(Request $request){

     
        switch ($request->page) {
            case 'membership':
                return view('membership');
                break;
            case 'pledge':
                return view('pledge');
                break;
            case 'volunteer':
                return view('volunteer');
                break;
            case 'partner':
                return view('partner');
                break;

        }
       
    }

    public function verification_code(Request $request){
       return view('verification');
    }


    public function VerifiedSavePledge(Request $request){
             $vcode = $request->vcode;

             if($vcode != session()->get('sessioncode')){
                return redirect()->back()->with('invalidcode','code is invaid');
             }

        if(session()->has('volunteer')){

            if(session()->has('joinonly')){
                Joinedevent::create([
                    'userID'=>session()->get('pledges')['userID'],      
                    'typeof'=> 'events',
                    'TableID'=>session()->get('pledges')['eventtojoin'],  
                    'joinedDate'=>date('Y-m-d H:i:s'),
                    'status'=>0,
                ]);

                session()->forget('joinonly');
                return redirect('/membershipform?page=volunteer')->with('success', 'Your Request to be a Volunteer was Submitted we`ll response to you ASAP! ');
            }

            if(session()->has('attendonly')){
                Joinedevent::create([
                    'userID'=>session()->get('pledges')['userID'],      
                    'typeof'=> 'events',
                    'TableID'=>session()->get('pledges')['eventtojoin'],  
                    'joinedDate'=>date('Y-m-d H:i:s'),
                    'status'=>0,
                    'typeofjoin'=>1
                ]);

                session()->forget('attendonly');
                return redirect('/membershipform?page=volunteer')->with('success', 'Your Request to be a Volunteer was Submitted we`ll response to you ASAP! ');
            }


            

            Joinedevent::create([
                'userID'=>session()->get('pledges')['userID'],      
                'typeof'=> 'events',
                'TableID'=>session()->get('pledges')['eventtojoin'],  
                'joinedDate'=>date('Y-m-d H:i:s'),
                'status'=>0,
            ]);

            Partners::create([
                'email' => session()->get('pledges')['email'],
                'firstname' => session()->get('pledges')['firstname'],
                'middlename' => session()->get('pledges')['middlename'],
                'lastname' => session()->get('pledges')['lastname'],
                'dateofbirth' => session()->get('pledges')['dateofbirth'],
                'gender' => session()->get('pledges')['gender'],
                'status' => session()->get('pledges')['status'],
                'religion' =>session()->get('pledges')['religion'],
                'placeofbirth' => session()->get('pledges')['placeofbirth'],
                'address' =>session()->get('pledges')['address'],
                'members' =>session()->get('pledges')['members'],
                'pledges' =>0,
                'volunteer' =>1,
                'partnership' => session()->get('pledges')['partnership'],
                'userID' =>session()->get('pledges')['userID'],
                'message' => session()->get('pledges')['message'],
                'contact' => session()->get('pledges')['contact'],
                'contactadd' =>session()->get('pledges')['contactadd'],
                'facebook' => session()->get('pledges')['facebook'],
                'twitter' => session()->get('pledges')['twitter'],
                'instagram' => session()->get('pledges')['instagram'],
                'linkedin' => session()->get('pledges')['linkedin']
              ]);


              
              return redirect('/membershipform?page=volunteer')->with('success', 'WELCOME OUR VOLUNTEER. Your Form was Submitted and we will response to you ASAP!');
        }


    
        if($request->pledgeonly){
         
           $save =  Pledges::create([
                'amount' => session()->get('pledges')['amount'],
                'goods' => session()->get('pledges')['goods'],
                'qty' => session()->get('pledges')['qty'],
                'notes' =>  session()->get('pledges')['notes'],
                'status' => null,
                'where' => session()->get('pledges')['where'],
                'receiver' => session()->get('pledges')['receiver'],
                'detail' =>  session()->get('pledges')['detail'],
                'pledgedate' =>  session()->get('pledges')['pledgedate'],
                'received' =>session()->get('pledges')['received'] ,
                'email' => session()->get('pledges')['email']
              ]);
    
        return redirect('/membershipform?page=pledge')->with('success', 'Your Pledge was Submitted Successfully!');
            
         
        } 
        
        
        Partners::create([
            'email' => session()->get('pledges')['email'],
            'firstname' => session()->get('pledges')['firstname'],
            'middlename' => session()->get('pledges')['middlename'],
            'lastname' => session()->get('pledges')['lastname'],
            'dateofbirth' => session()->get('pledges')['dateofbirth'],
            'gender' => session()->get('pledges')['gender'],
            'status' => session()->get('pledges')['status'],
            'religion' =>session()->get('pledges')['religion'],
            'placeofbirth' => session()->get('pledges')['placeofbirth'],
            'address' =>session()->get('pledges')['address'],
            'members' =>session()->get('pledges')['members'],
            'pledges' => session()->get('pledges')['pledges'],
            'volunteer' =>session()->get('pledges')['volunteer'],
            'partnership' => session()->get('pledges')['partnership'],
            'userID' =>session()->get('pledges')['userID'],
            'message' => session()->get('pledges')['message'],
            'contact' => session()->get('pledges')['contact'],
            'contactadd' =>session()->get('pledges')['contactadd'],
            'facebook' => session()->get('pledges')['facebook'],
            'twitter' => session()->get('pledges')['twitter'],
            'instagram' => session()->get('pledges')['instagram'],
            'linkedin' => session()->get('pledges')['linkedin']
          ]);
          Pledges::create([
            'amount' => session()->get('pledges')['amount'],
            'goods' => session()->get('pledges')['goods'],
            'qty' => session()->get('pledges')['qty'],
            'notes' =>  session()->get('pledges')['notes'],
            'status' => session()->get('pledges')['status'],
            'where' => session()->get('pledges')['where'],
            'receiver' => session()->get('pledges')['receiver'],
            'detail' =>  session()->get('pledges')['detail'],
            'pledgedate' =>  session()->get('pledges')['pledgedate'],
            'received' =>session()->get('pledges')['received'] ,
            'email' => session()->get('pledges')['email']
          ]);
          return redirect('/membershipform?page=pledge')->with('success', 'WELCOME NEW MEMBER. Your Form and Pledge was Submitted and we will response to you ASAP!');
    
    
    
    }

}
