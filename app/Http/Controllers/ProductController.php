<?php

namespace App\Http\Controllers;

use App\Models\StripeProduct;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('stripe.products.index');
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
    public function store(Request $request)
    {
        //
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
