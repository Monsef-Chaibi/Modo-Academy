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
        \Stripe\Stripe::setApiKey(env('STIPE_SECRET'));
        $session =  \Stripe\Checkout/Session::create([
            'line_items' => [[
              'price_data' => [
                'currency' => 'usd',
                'product_data' => [
                  'name' => 'T-shirt',
                ],
                'unit_amount' => 2000,
              ],
              'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => 'http://localhost:4242/success',
            'cancel_url' => 'http://localhost:4242/cancel',
          ]);


        return back();
    }

}
