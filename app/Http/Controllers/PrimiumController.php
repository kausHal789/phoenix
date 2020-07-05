<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrimiumController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create() {
        $intent = auth()->user()->createSetupIntent();
        return view('primium', compact('intent'));
    }

    public function show() {
        // dd(auth()->user()->subscriptions()->get());
        $subcriptions = auth()->user()->subscriptions()->get();
        return view('primium.show', compact('subcriptions'));
    }

    public function payment() {
        $plan = request()->plan_name;
        $payment_method = request()->payment_method;
        $subscriptionBuilder = auth()->user()->newSubscription('download', $plan);
        $subscription = $subscriptionBuilder->create($payment_method);
        // dd($subscription);

        return redirect('/primium');
    }
}
