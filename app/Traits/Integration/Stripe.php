<?php
namespace App\Traits\Integration;

use App\Enums\Status;
use App\Models\StripeProduct;
use Illuminate\Support\Facades\Auth;
use Stripe\StripeClient;

trait Stripe
{
    public $client;
    public function __construct()
    {
        $this->client = new StripeClient(env('STRIPE_PRIVATE_KEY'));
    }

    public function createProduct($data)
    {
        // Create a product
        try {
            $client = $this->client;
            $product = $client->products->create([
                'name' => $data['name'],
            ])->jsonSerialize();
            // Create a price for the product
            $price = $this->createPrice($product, $data);
            $price = $price['data'];

            $stripeProduct = new StripeProduct;
            $stripeProduct->name = $product['name'];
            $stripeProduct->object = $product['object'];
            $stripeProduct->description = $product['description'];
            $stripeProduct->default_price = $price['unit_amount'];
            $stripeProduct->interval = $data['interval'];
            $stripeProduct->product_id = $product['id'];
            $stripeProduct->price_id = $price['id'];
            $stripeProduct->save();

            return ['data' => $stripeProduct, 'status' => Status::SUCCESS(), 'message' => 'Product has been added successfully.'];

        } catch (\Throwable $th) {
            return ['data' => [], 'status' => Status::ERROR(), 'message' => $th->getMessage()];
        }
    }

    public function createPrice($product, $data)
    {
        try {
            $client = $this->client;

            $price = $client->prices->create([
                'unit_amount' => $data['default_price'],
                'currency' => 'usd',
                'recurring' => ['interval' => $data['interval']],
                'product' => $product['id'],
            ])->jsonSerialize();
            return ['data' => $price, 'status' => Status::SUCCESS(), 'message' => ''];
        } catch (\Throwable $th) {
            return ['data' => [], 'status' => Status::ERROR(), 'message' => $th->getMessage()];
        }
    }

    public function retriveStripeClient()
    {
        return $this->client;
    }

    public function createStripePaymentIntent()
    {
        $client = $this->client;
        $stripe_customer_id = null;
        $user = Auth::user();
        $stripe_customer_id = $user->stripe_customer_id;
        if(!$stripe_customer_id) {

        }

        $paymentIntent = $client->paymentIntents->create([
            'amount' => 2000,
            'currency' => 'usd',
            'automatic_payment_methods' => [
                'enabled' => true,
            ],
            'customer' => $user
        ]);

        return $paymentIntent;
    }
}
