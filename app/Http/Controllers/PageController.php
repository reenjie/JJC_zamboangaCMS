<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
