@extends('layouts.admin')

@section('searchBar')
 <div class="row">
   <div class="col text-light h1 pt-3">
    Claim Artist Profile Requests
   </div>
 </div>
@endsection


@section('content')
  <div class="container m-5">
   
    @forelse ($requests as $request)
        
    <div class="row mr-5">
      <div class="kt-portlet">
        <div class="kt-portlet__body">
          <div class="kt-blog-list">
            <div class="row">
              <div class="col-xl-2">
                <div class="kt-blog-list__head" style="background-image:url();">
                  <img src="{{ $request->user->profile->profileImage() }}" class="w-100 h-auto" alt="">
                </div>
              </div>
              <div class="col-xl-8 align-items-end">
                <div class="kt-blog-list__body">
                  <h2 class="kt-blog-list__title font-weight-bold text-dark">
                    {{ $request->user->profile->name }}
                  </h2>
                  <div class="kt-blog-list__meta">
                    <div class="kt-blog-list__date">
                      {{ date('M d, Y', strtotime($request->created_at)) }}
                    </div>
                  </div>
                  <div class="kt-blog-list__content">
                    {{ $request->user->profile->about }}
                  </div>
                  <a href="{{ $request->url }}" target="_blank" class="kt-blog-list__link">
                    <span>social link</span>
                  </a>
                </div>
              </div>
              <div class="col-xl-2">
                <div class="kt-blog-list__head float-right">
                  <a href="{{ route('admin.request.approve', $request->id) }}">
                    <button class="btn rounded-pill btn-success">Approve</button>
                  </a>
                  <a href="{{ route('admin.request.cancel', $request->id) }}">
                    <button class="btn btn-danger rounded-pill">Cancel</button>
                  </a>
                </div>
              </div>
            </div>			
          </div>
        </div>
      </div>
    </div>
   
    @empty
      <div class="row mr-5">
        <div class="col">
          <h1>No Requests</h1>
        </div>
      </div>
    @endforelse


  </div>
@endsection


@section('script-section')
  <script>
    $(document).on('click', '.deleteCategory', function () {
      var id = $(this).attr('id');
      console.log(id);
      $.ajax({
        url: "/category/" + id + "/admin", 
        method: 'GET',
        cache: false,
        success: function(_data) {
          console.log(_data);
        },
        error: function(err) {
          console.log(err);
        }
      })
    })

  </script>
@endsection