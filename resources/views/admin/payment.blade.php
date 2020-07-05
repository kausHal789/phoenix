@extends('layouts.admin')


@section('searchBar')
 <div class="row">
   <div class="col text-light h1 pt-3">
    Subscriptions
   </div>
 </div>
@endsection


@section('content')
  <div class="container m-5">
      

    <div class="row">
      <div class="col-4">
        <div class="tab-pane fade show active" role="tabpanel" aria-labelledby="listener-tab">
          <div class="card card-common border-success mb-3" style="max-width: 18rem;">
            <div class="card-body text-success">
              <h5 class="card-title h1 text-center">Daily Subscriptions</h5>
              <p class="text-dark h4 text-center">{{ $daysubscriptions }}</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-4">
        <div class="tab-pane fade show active"  role="tabpanel" aria-labelledby="listener-tab">
          <div class="card card-common border-success mb-3" style="max-width: 18rem;">
            <div class="card-body text-success">
              <h5 class="card-title h1 text-center">Monthly Subscriptions</h5>
              <p class="text-dark h4 text-center">{{ $monthsubscriptions }}</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-4">
        <div class="tab-pane fade show active" role="tabpanel" aria-labelledby="listener-tab">
          <div class="card card-common border-success mb-3" style="max-width: 18rem;">
            <div class="card-body text-success">
              <h5 class="card-title h1 text-center">Yearly Subscriptions</h5>
              <p class="text-dark h4 text-center">{{ $yearsubscriptions }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>

   
   

    <div class="row mt-5">
      @forelse ($subscriptions as $subscription)
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
        <h3>No subscription now!</h3>
      </div>
      @endforelse
    </div>


  </div>
@endsection


@section('script-section')
  
@endsection