<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Stripe\StripeClient;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function getStripeClient()
    {
        return  new StripeClient(env('STRIPE_PRIVATE_KEY'));
    }
}
