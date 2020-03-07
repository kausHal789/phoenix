<?php

namespace App\Http\Controllers;

use App\Notifications\FollowNotification;
use App\User;
use Illuminate\Http\Request;

class FollowsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store($user_id) {
        $user = User::findOrFail($user_id);
        $result = auth()->user()->following()->toggle($user->profile);

        if(count($result['attached']) > 0) {
            $user->notify(new FollowNotification(auth()->user()));
        }

        return response()->json([
            'result' => true,
            'status' => 200,
            'data' => count($result['attached'])
        ]);
    }
}
