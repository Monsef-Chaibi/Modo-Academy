<?php

namespace App\Http\Controllers;
use App\Models\Addtocart;
use App\Models\recordcourses;
use App\Models\Livecourses;
use App\Models\Allrecord;
use App\Models\desccourse;
use Illuminate\Contracts\Session\Session;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    public function welcome()
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
            return view('welcome')->with('recordcourses',$recordcourses)->with('livecourses',$livecourses)->with('count',$count);

        }
    public function RecordCourses()
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
            return view('record')->with('recordcourses',$recordcourses)->with('livecourses',$livecourses)->with('count',$count);

    }
    public function LiveCourses()
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
            return view('live')->with('recordcourses',$recordcourses)->with('livecourses',$livecourses)->with('count',$count);

    }
    public function LiveCourseWatche($id)
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
        $namecourses  = Livecourses::where('id', $id)->select('name', 'name_en')->first();
        $allrecord = Allrecord::where('id-course', $id)->get();
            return view('livecourses')->with('recordcourses',$recordcourses)->with('count',$count)->with('livecourses',$livecourses)->with('allrecord',$allrecord)->with('namecourses',$namecourses);

    }
    public function CourseWatche($id)
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
        $desc1 = desccourse::where('idrecord', $id)->where(function($query) {$query->where('desc1', '<>', '')->orWhere('desc1_en', '<>', '');}) ->get();
        $desc2 = desccourse::where('idrecord',$id)->where('desc2', '<>', '')->get();
        $randomColumns = DB::table('allrecords')->inRandomOrder()->take(3)->get();
        $recordcourses = recordcourses::all();
        $livecourses = Livecourses::all();
        $allrecord = Allrecord::where('id', $id)->get();
        return view('courcewatche')->with('desc1',$desc1)->with('desc2',$desc2)->with('count',$count)->with('recordcourses',$recordcourses)->with('livecourses',$livecourses)->with('allrecord',$allrecord)->with('randomColumns',$randomColumns);

    }
    public function Cart()
    {
          // get number of course in cart
          if(auth()->check())
          {
              $count = Addtocart::where('userid', auth()->user()->id)->count();
              $items=Addtocart::where('userid',auth()->user()->id)->get();
              $some=Addtocart::where('userid',auth()->user()->id)->sum('price');
          }
          else
          {     $items= [];
                $count = 0;
                $some=0;
          }


        $recordcourses = recordcourses::all();
        $livecourses = Livecourses::all();
        return view('cart')->with('some',$some)->with('count',$count)->with('items',$items)->with('recordcourses',$recordcourses)->with('livecourses',$livecourses);

    }
    public function AddToCart(Request $request,$id)
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
        if(auth()->check()){
            $couseselect = Allrecord::find($id);
            $id_user=auth()->user()->id;
            $cart=new Addtocart;
            $cart->name=$couseselect->name;
            $cart->name_en=$couseselect->name_en;
            $cart->userid=$id_user;
            $cart->price=$couseselect->price;
            $cart->image=$couseselect->image;
            $cart->save();
            $recordcourses = recordcourses::all();
            $livecourses = Livecourses::all();
            return redirect()->back()->with('count',$count)->with('recordcourses',$recordcourses)->with('livecourses',$livecourses)->with('message','azerty');

        }
        else
        {

            return redirect('login');

        }
    }

    public function RemoveFromCart($id){
        $item= Addtocart::find($id);
        $item->delete();
        return redirect()->back();
    }



    public function StripePost(){
        $some=Addtocart::where('userid',auth()->user()->id)->sum('price');
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $session = \Stripe\Checkout\Session::create([
            'line_items'  => [
                [
                    'price_data' => [
                        'currency'     => 'USD',
                        'product_data' => [
                            "name" => auth()->user()->name,
                        ],
                        'unit_amount'  =>  $some * 100,
                    ],
                    'quantity'   => 1,
                ],

            ],
            'mode'        => 'payment',
            'success_url' => route('Success'),
            'cancel_url' =>  route('Cancel'),

        ]);

        return redirect()->away($session->url);
    }
    public function success(){
        return view('success');
    }
}
