<?php

namespace App\Http\Controllers;

use App\Mail\SubscribeMail;
use App\Subscribe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SubscribeController extends Controller
{
    public function store() {
        request()->validate([
            'email' => ['bail', 'required', 'email', 'max:50']
        ]);

        Subscribe::create([
            'email' => request()->email
        ]);

        // Thanks mail
        Mail::to(request()->email)->send(new SubscribeMail);

        return redirect('/');
    }
}
