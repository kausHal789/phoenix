<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;


    protected function authenticated(\Illuminate\Http\Request $request, $user)
    {

        // Check user has a subscription or not
        if(Auth::check()) {
            $subscriptions = $user->subscriptions()->get();
            foreach ($subscriptions as $subscription) {
                
                if($subscription->stripe_plan == "Day") {
                    if($subscription->created_at->addDay(1)->timestamp <= now()->timestamp) {
                        $subscription->markAsCancelled();
                        $subscription->save();
                    }
                }
                if($subscription->stripe_plan == "Month") {
                    if($subscription->created_at->addMonth(1)->timestamp <= now()->timestamp) {
                        $subscription->markAsCancelled();
                        $subscription->save();
                    }
                }
                if($subscription->stripe_plan == "Year") {
                    if($subscription->created_at->addYear(1)->timestamp <= now()->timestamp) {
                        $subscription->markAsCancelled();
                        $subscription->save();
                    }
                }

            }
            // dd('now');
        }
        
        if(Auth::check()) {
            if($user->role_id === 1) {
                return redirect()->route('admin.home');
             } elseif($user->role_id === 2) {
                return redirect()->route('artist.home');
            } elseif($user->role_id === 3) {
                return redirect()->route('home');
            }
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
