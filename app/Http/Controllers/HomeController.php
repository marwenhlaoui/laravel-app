<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }



    public function profile($slug)
    {

       if(!empty($slug)){
       
            $user=User::where('slug',$slug)->first();

            if(!empty($user->id)){
                return view('pages.profile',compact('user'));
            }else{
                return redirect()->route('app.home');
            }

       }else{
          return redirect()->route('app.profile',\Auth::user()->slug());     
       }

    }
}
