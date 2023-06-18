<?php
namespace App\Traits\Integration;

use App\Enums\Status;
use App\Models\StripeProduct;
use App\Models\User;
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

    public function createCustomer(User $user)
    {
        // Create a product
        try {
            $client = $this->client;

            $customer = $client->customers->create([
                'description' => 'Created via browser',
                'name' => $user->name,
                'email' => $user->email
            ]);
            $user->stripe_customer_id = $customer->id;
            $user->save();

            return ['data' => $user, 'status' => Status::SUCCESS(), 'message' => 'Customer has been added successfully.'];

        } catch (\Throwable $th) {
            return ['data' => [], 'status' => Status::ERROR(), 'message' => $th->getMessage()];
        }
    }

    public function createPrice($product, $data)
    {
        try {
            $client = $this->client;
            $productPriceData = [
                'unit_amount' => $data['default_price'],
                'currency' => 'usd',
                'product' => $product['id'],
            ];
            if($data['interval'] !== 'one_time') {

                $productPriceData['recurring'] = ['interval' => $data['interval']];
            }
            $price = $client->prices->create($productPriceData)->jsonSerialize();
            return ['data' => $price, 'status' => Status::SUCCESS(), 'message' => ''];
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return ['data' => [], 'status' => Status::ERROR(), 'message' => $th->getMessage()];
        }
    }

    public function retriveStripeClient()
    {
        return $this->client;
    }

    public function createStripePaymentIntent(StripeProduct $product)
    {
        $client = $this->client;
        $stripe_customer_id = null;
        $user = Auth::user();
        $stripe_customer_id = $user->stripe_customer_id;
        if(!$stripe_customer_id) {
            $user = $this->createCustomer($user);
            $user = $user['data'];
            $stripe_customer_id = $user->stripe_customer_id;
        }

        $sessions = $client->checkout->sessions->create([
            'line_items' => [
                [
                    'price' => $product->price_id,
                    'quantity' => 1,
                ]
            ],
            'mode' => request()->route('type'),
            'success_url' => route('subscriptions.redirectPath', [$product->product_id , Status::SUCCESS()]),
            'cancel_url' => route('subscriptions.redirectPath', [$product->product_id , Status::ERROR()]),
            'customer' => $stripe_customer_id
        ]);

        return $sessions;
    }
}
