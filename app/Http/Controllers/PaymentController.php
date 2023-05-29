<?php

namespace App\Http\Controllers;

use Exception;

class PaymentController extends Controller
{
    public function index()
    {
        $stripe = $this->getStripeClient();

        $customer = $stripe->customers->create([
            'description' => 'My First Test Customer (created for API docs at https://www.stripe.com/docs/api)',
        ], [
                'idempotency_key' => 'bgwPFmnCG1f4oRaM',
            ]);
        $product = $stripe->products->create([
            'name' => 'Gold Special',
        ])->jsonSerialize();

        $price = $stripe->prices->create([
            'unit_amount' => 1000,
            'currency' => 'usd',
            'recurring' => ['interval' => 'month'],
            'product' => $product['id'],
        ])->jsonSerialize();

        try {
            $subscriptions = $stripe->subscriptions->create([
                'customer' => $customer,
                [
                    'payment_settings' => [
                        'payment_method_types' => ['card'],
                    ],
                ],

                'items' => [
                    ['price' => $price['id']],
                ],
            ]);
        } catch (Exception $th) {
            dd($th->getMessage());
        }

        dd($customer, $price, $subscriptions, $product);
    }
}
