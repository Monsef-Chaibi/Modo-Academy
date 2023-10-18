<?php

namespace App\Http\Controllers;
use App\Models\recordcourses;
use App\Models\Livecourses;
use Illuminate\Http\Request;
use App\Models\Addtocart;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
         // get number of course in cart
         if(auth()->check())
         {
             $count = Addtocart::where('userid', auth()->user()->id)->count();
         }
         else
         {
             $count = 0;
         }
         //
             $recordcourses = recordcourses::all();
             $livecourses = Livecourses::all();
             return Redirect('/verify')->with('recordcourses',$recordcourses)->with('livecourses',$livecourses)->with('count',$count);

    }
}
