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
}
