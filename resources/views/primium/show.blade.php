@extends('layouts.app')

@section('head-section')
<link rel="stylesheet" href="{{ asset('css/style.bundle.css') }}">
<link rel="stylesheet" href="{{ asset('css/pricing-v1.css') }}">
<link href="{{asset('css/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
  <div class="container">
    <div class="row text-center ml-5 mr-5 mb-5">
      <div class="col">
        <a href="{{ route('primium.create') }}">
          <button class="btn-success btn btn-lg rounded-pill">Buy new Subscription</button>
        </a>
      </div>
    </div>
    <div class="row">
      
      @forelse ($subcriptions as $subscription)
      <div class="col-4">
        <div class="card text-center">
          <div class="card-body">
            <h4 class="card-title font-weight-bold">{{ $subscription->stripe_plan }}</h4>
            <p class="card-text">Song download primium plan.</p>
            <p class="card-text">
              
              Status ▪ <span class="font-weight-bold text-capitalize">{{ $subscription->stripe_status }}</span>

            </p>
            @php
              if($subscription->stripe_plan == 'Day') {
                $endAt = $subscription->created_at->addDay(1)->diffForHumans();
                // $endAt = date('M d, Y', strtotime($subscription->created_at->addDay(1)->diffForHumans()));
              }
              else if($subscription->stripe_plan == 'Month') {
                $endAt = $subscription->created_at->addDay(1)->diffForHumans();
                // $endAt = date('M d, Y', strtotime($subscription->created_at->addMonth(1)->diffForHumans()));
              }
              else if($subscription->stripe_plan == 'Year') {
                $endAt = $subscription->created_at->addDay(1)->diffForHumans();
                // $endAt = date('M d, Y', strtotime($subscription->created_at->addYear(1)->diffForHumans()));
              }
            @endphp
            <p class="card-text"><small class="text-muted">Start at: <span class="font-weight-bold mr-3">{{ date('M d, Y', strtotime($subscription->created_at)) }}</span> End at: <span class="font-weight-bold">{{ $endAt }}</span></small></p>
          </div>
        </div>
      </div>    
      @empty
        <div class="col">
          <h3>You have no subscription now!</h3>
        </div>
      @endforelse
    </div>
  </div>
@endsection

