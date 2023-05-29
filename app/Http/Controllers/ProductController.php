<?php

namespace App\Http\Controllers;

use App\Enums\Status;
use App\Http\Requests\ProductRequest;
use App\Models\StripeProduct;
use Illuminate\Http\Request;
use App\Traits\Integration\Stripe;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    use Stripe;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = StripeProduct::get();

        return view('stripe.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('stripe.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $data = $request->all();
        $product = $this->createProduct($data);
        if ($product['status'] == Status::SUCCESS()) {
            Session::flash('alert.success', $product['message']);
            return redirect()->route('products.index');
        } else {
            Session::flash('alert.error', $product['message']);

            return redirect()->back()->withInput($request->all());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(StripeProduct $stripeProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StripeProduct $stripeProduct)
    {
        return view('stripe.products.update');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StripeProduct $stripeProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StripeProduct $stripeProduct)
    {
        //
    }
}
