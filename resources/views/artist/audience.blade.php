@extends('layouts.artist')

@section('content')

<div class="container">
  <div class="row mt-5">
    <div class="col display-3 font-weight-bold">
      Audience
    </div>
  </div>
  
  <div class="row m-5">
    <div class="col-6 col-sm-12 col-md-4 col-xl-6">
      <div class="tab-pane fade show active" id="listener" role="tabpanel" aria-labelledby="listener-tab">
        <div class="card card-common border-success mb-3" style="max-width: 18rem;">
          <div class="card-body text-success">
            <h5 class="card-title h1 text-center">Total Listener</h5>
            <p class="text-dark h4 text-center">{{ $totalListeners }}</p>
          </div>
        </div>
      </div>
    </div>
    <div class="col-6 col-sm-12 col-md-4 col-xl-6">
      <div class="tab-pane fade show active" id="listener" role="tabpanel" aria-labelledby="listener-tab">
        <div class="card card-common border-success mb-3" style="max-width: 18rem;">
          <div class="card-body text-success">
            <h5 class="card-title h1 text-center">Followers</h5>
            <div class="text-dark h4 text-center">{{ $followersCount }}</div>
          </div>
        </div>
      </div>
  </div>
  </div>
</div>

@endsection