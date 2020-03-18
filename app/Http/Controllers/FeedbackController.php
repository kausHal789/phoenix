<?php

namespace App\Http\Controllers;

use App\Feedback;
use App\Mail\FeedbackMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FeedbackController extends Controller
{

    public function store() {

        request()->validate([
            'name' => ['bail', 'required', 'string', 'max:20'],
            'email' => ['bail', 'required', 'email', 'max:20'],
            'phone' => ['bail', 'required', 'numeric'],
            'description' => ['bail', 'required', 'string', 'max:500'],
        ]);

        // dd(request()->input());

        Feedback::create([
            'name' => request()->name,
            'email' => request()->email,
            'phone' => request()->phone,
            'description' => request()->description,
        ]);

        Mail::to(request()->email)->send(new FeedbackMail);
        return redirect('/');
    }
}
