@extends('layouts.admin')

@section('searchBar')
 <div class="row">
   <div class="col text-light h1 pt-3">
    Subscribers
   </div>
 </div>
@endsection



@section('content')
  <div class="container">
    <div class="row">
      <div class="col">
        @foreach ($subscriptions as $subscription)
        <div class="col m-3 alert alert-success fade show" role="alert">
          <div class="alert-text">{{ $subscription->email }} <span class="float-right">{{ date('M d, Y', strtotime($subscription->created_at)) }}</span></div>
          <div class="alert-close">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true"><i id="{{ $subscription->id }}" class="la la-close deleteSubscription"></i></span>
            </button>
          </div>
        </div>    
        @endforeach
      </div>
    </div>
  </div>
@endsection

@section('script-section')
  <script>
    $(document).on('click', '.deleteSubscription', function() {
      var id = $(this).attr('id');
      console.log(id);
      $.ajax({
        url: "/subscription/" + id + "/admin", 
        method: 'GET',
        cache: false,
        // success: function(_data) {
        //   console.log(_data);
        // },
        // error: function(err) {
        //   console.log(err);
        // }
      })
    })
  </script>
@endsection