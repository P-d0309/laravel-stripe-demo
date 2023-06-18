<?php

namespace App\Http\Controllers;

use App\Models\StripeProduct;
use Illuminate\Http\Request;
use App\Traits\Integration\Stripe;
class SubscriptionController extends Controller
{
    use Stripe;
    public function index()
    {
        # code...
    }

    public function create()
    {
        return view('subscription.create');
    }

    public function store()
    {
        # code...
    }

    public function checkout($product_id)
    {
        $stripeProduct = StripeProduct::whereProductId($product_id)->firstOrFail();

        $paymentIntent = $this->createStripePaymentIntent($stripeProduct);

        return redirect($paymentIntent->url);
    }
}
