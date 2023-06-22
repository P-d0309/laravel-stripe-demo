<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Jobs\CreateStripeCustomer;
use App\Models\User;
use App\Traits\Integration\Stripe;
use Illuminate\Http\Request;
use Session;

class UserController extends Controller
{
    use Stripe;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = (new User)->paginate(10);

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        try {
            //code...
            $user = User::create($request->all());
            Session::flash('alert.success', 'User has been added successfully.');
            // Add customer to the stripe
            dispatch(new CreateStripeCustomer($user));

            return redirect()->route('users.index');
        } catch (\Throwable $th) {
            //throw $th;
            Session::flash('alert.error', $th->getMessage());
            return back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
