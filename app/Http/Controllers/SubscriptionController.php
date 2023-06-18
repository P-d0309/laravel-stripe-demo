<?php

namespace App\Http\Controllers;

use App\Models\StripeProduct;
use Illuminate\Http\Request;
use App\Traits\Integration\Stripe;
class SubscriptionController extends Controller
{
    use Stripe;

    public function checkout($product_id)
    {
        $stripeProduct = StripeProduct::whereProductId($product_id)->firstOrFail();

        $paymentIntent = $this->createStripePaymentIntent($stripeProduct);

        return redirect($paymentIntent->url);
    }


    public function redirectPath($product_id, $status)
    {
        return view('stripe.products.status', compact('status'));
    }

    public function webhook (Request $request) {
        $data = $request->all();

        // Manupulate the data according to the need
        if ($data['type'] == 'payment_intent.succeeded') {

        } else if ($data['type'] == 'charge.succeeded') {

        }
    }
}
