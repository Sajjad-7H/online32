<?php

      

namespace App\Http\Controllers;

       

use Illuminate\Http\Request;

use Stripe;

use Illuminate\View\View;

use Illuminate\Http\RedirectResponse;

       

class StripePaymentController extends Controller

{

    /**

     * success response method.

     *

     * @return \Illuminate\Http\Response

     */

    // public function stripe($value): View

    // {

    //     return view('home.stripe', compact('value'));



    // }

      

    /**

     * success response method.

     *

     * @return \Illuminate\Http\Response

     */

    // public function stripePost(Request $request,$value): RedirectResponse

    // {

    //     Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

      

    //     Stripe\Charge::create ([

    //             "amount" => $value * 100,

    //             "currency" => "usd",

    //             "source" => $request->stripeToken,

    //             "description" => "Test payment from complete" 

    //     ]);

                

    //     return back()

    //             ->with('success', 'Payment successful!');

    // }

//     public function postPayment(Request $request, $value)
// {
//     dd($value); // Check if the value is being received
// }


}