<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sesion;
use Stripe;
class StripeController extends Controller
{
    public function Stripe(){
        return view('stripe');
    }
    public function StripePost(Request $request){
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create([
            'amount' => 100*100,
            'currency'=>"usd",
            'source'=> $request->stripeToken,
            'description' =>'Test payment from muhammed essa'
        ]);

        return back();
    }

}
